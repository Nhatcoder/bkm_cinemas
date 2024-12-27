<?php

namespace App\Services\Admin\Movies\Services;

use App\Repositories\Admin\Actors\Interfaces\ActorInterface;
use App\Repositories\Admin\Movies\Interfaces\MovieInterface;
use App\Services\Admin\Movies\Interfaces\MovieServiceInterface;
use App\Services\Base\BaseService;
use Illuminate\Support\Facades\Storage;

class MovieService extends BaseService implements MovieServiceInterface
{
    protected $actorRepository;
    public function __construct(
        ActorInterface $actorRepository,
    ) {
        $this->actorRepository = $actorRepository;

        parent::__construct();
    }
    public function getRepository()
    {
        return MovieInterface::class;
    }

    public function filter($request)
    {
        return $this->repository->filter($request);
    }

    public function create(&$data)
    {
        $data['movie_actors'] = $data['movie_actors'] ?? [];
        if (!empty($data['movie']['image'])) {
            $uploadData = $this->uploadFile($data['movie']['image'], 'public/movies');
            $data['movie']['image'] = $uploadData['path'];
        }
        if (!empty($data['movie']['banner_movie'])) {
            $uploadData = $this->uploadFile($data['movie']['banner_movie'], 'public/movies');
            $data['movie']['banner_movie'] = $uploadData['path'];
        }

        $record = $this->repository->create($data['movie']);
        if (!empty($data['genre_id'])) {
            $this->repository->createGenre($record, $data['genre_id']);
        }
        if (!empty($data['actors'])) {
            $filteredActors = array_filter($data['actors'], function ($actor) {
                return !empty($actor['name']);
            });

            if (!empty($filteredActors)) {
                foreach ($filteredActors   as $key => $value) {
                    if (!empty($value['image'])) {
                        $uploadData = $this->uploadFile($value['image'], 'public/actors');
                        $filteredActors[$key]['image'] = $uploadData['path'];
                    }
                }
                $actors = $this->actorRepository->createMany($filteredActors, $data['role']);
                $data['movie_actors'] = array_merge($data['movie_actors'], $actors);
            }
        }
        if (!empty($data['movie_actors'])) {

            $this->repository->createMovieActors($record, $data['movie_actors']);
        }
        return $record;
    }
    public function update(&$data, $id)
    {
        $record = $this->find($id);
        if (!$record) {
            return false;
        }

        $data['movie_actors'] ?? [];

        $this->updateImage($data, $record, 'image');
        $this->updateImage($data, $record, 'banner_movie');

        $this->repository->update($record->id, $data['movie']);

        if (!empty($data['genre_id'])) {
            $this->updateGenres($record, $data['genre_id']);
        }

        if (!empty($data['movie_actors'])) {
            $filteredActorsCreate = $this->updateActors($record, $data['movie_actors']);
        }else{
            $currentActors = $record->movieActor()->pluck('actor_id')->toArray();
            if (!empty($currentActors)) {
                $this->repository->deleteActor($record, $currentActors);
            }
        }

        if (!empty($data['actors'])) {
            $filteredActors = array_filter($data['actors'], function ($actor) {
                return !empty($actor['name']);
            });

            if (!empty($filteredActors)) {
                foreach ($filteredActors   as $key => $value) {
                    if (!empty($value['image'])) {
                        $uploadData = $this->uploadFile($value['image'], 'public/actors');
                        $filteredActors[$key]['image'] = $uploadData['path'];
                    }
                }
                $newActors = $this->createNewActors($filteredActors, $data['role']);
                $filteredActorsCreate = array_merge($filteredActorsCreate ?? [], $newActors);
            }

        }

        if (!empty($filteredActorsCreate)) {
            $this->repository->createMovieActors($record, $filteredActorsCreate);
        }

        return $record;
    }

    public function deleteMultipleChecked($request)
    {
        if (count($request->selectedIds) < 0) {
            return false;
        }
        $this->repository->deleteMultiple($request->selectedIds);
        return true;
    }
    public function changeActive($request)
    {
        return $this->repository->changeActive($request->id);
    }

    public function changeHot($request)
    {
        return $this->repository->changeHot($request->id);
    }

    public function changeOrder($request)
    {
        return $this->repository->changeOrder($request->id, $request->order);
    }

    private function updateImage(&$data, $record, $type)
    {
        if (!empty($data['movie'][$type])) {
            if ($record->$type) {
                $this->deleteAvatar($record->$type, 'movies');
            }
            $uploadData = $this->uploadFile($data['movie'][$type], 'public/movies');
            $data['movie'][$type] = $uploadData['path'];
        }
    }

    private function updateGenres($record, $newGenres)
    {
        $currentGenres = $record->movieGenre()->pluck('genre_id')->toArray();
        $newGenreIds = array_column($newGenres, 'genre_id');
        $removedGenres = array_diff($currentGenres, $newGenreIds);
        $createGenres = array_diff($newGenreIds, $currentGenres);
        $filterGenreCreate = array_filter($newGenres, fn($item) => in_array($item['genre_id'], $createGenres));

        if (!empty($removedGenres)) {
            $this->repository->deleteGenre($record, $removedGenres);
        }
        if (!empty($createGenres)) {
            $this->repository->createGenre($record, $filterGenreCreate);
        }
    }

    private function createNewActors($actors, $role)
    {
        return $this->actorRepository->createMany($actors, $role);
    }

    private function updateActors($record, $movieActors)
    {
        $currentActors = $record->movieActor()->pluck('actor_id')->toArray();
        $newActorIds = array_column($movieActors, 'actor_id');
        $removedActors = array_diff($currentActors, $newActorIds);
        $createActors = array_diff($newActorIds, $currentActors);
        $updateActors = array_intersect($currentActors, $newActorIds);
        $filteredActorsCreate = array_filter($movieActors, fn($item) => in_array($item['actor_id'], $createActors));
        $filteredActorsUpdate = array_filter($movieActors, fn($item) => in_array($item['actor_id'], $updateActors));

        if (!empty($removedActors)) {
            $this->repository->deleteActor($record, $removedActors);
        }
        if (!empty($filteredActorsUpdate)) {
            $this->repository->updateActors($record, $filteredActorsUpdate);
        }

        return $filteredActorsCreate;
    }

    private function uploadFile($data, $folderName)
    {
        $path = $data->store($folderName);

        return [
            'name' => $data->getClientOriginalName(),
            'path' => Storage::url($path),
        ];
    }

    private function deleteAvatar($avatar, $folderName)
    {
        $path = "public/$folderName/" . basename($avatar);
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
    }
}

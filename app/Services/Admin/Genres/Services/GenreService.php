<?php

namespace App\Services\Admin\Genres\Services;

use App\Repositories\Admin\Genres\Interfaces\GenreInterface;
use App\Services\Admin\Genres\Interfaces\GenreServiceInterface;
use App\Services\Base\BaseService;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Storage;

class GenreService extends BaseService implements GenreServiceInterface
{
    use StorageImageTrait;

    public function __construct()
    {
        parent::__construct();
    }
    public function getRepository()
    {
        return GenreInterface::class;
    }

    public function filter($request)
    {
        return $this->repository->filter($request);
    }

    public function create(&$request)
    {
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'order' => $request->order ?? 0,
            'parent_id' => $request->parent_id ?? 0,
            'description' => $request->description,
            'content' => $request->content,
            'position' => $request->position ?? 0
        ];



        $uploadData = $this->storageTraitUpload($request, 'avatar', 'public/genres');
        if ($uploadData) {
            $data['avatar'] = $uploadData['path'];
        }


        $this->repository->create($data);

        return true;
    }


    public function update(&$request, $id)
    {
        $genre = $this->find($id);

        if (!$genre) {
            $redirectUrl = $request->parent_id ?
                route('admin.Genres.index') . '?parent_id=' . $request->parent_id :
                route('admin.Genres.index');

            return redirect($redirectUrl)->with([
                'status_failed' => 'Không tìm thấy thể loại'
            ]);
        }

        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'order' => $request->order ?? 0,
            'description' => $request->description,
            'content' => $request->content,
            'parent_id' => $request->parent_id ?? 0,
            'position' => $request->position ?? 0
        ];

        if ($request->hasFile('avatar')) {
            if ($genre->avatar) {
                $path = 'public/genres/' . basename($genre->avatar);
                if (Storage::exists($path)) {
                    Storage::delete($path);
                }
            }

            $imageUploadData = $this->storageTraitUpload($request, 'avatar', 'public/genres');
            $data['avatar'] = $imageUploadData['path'];
        }

        return  $this->repository->update($id, $data);
    }


    public function getListGenreEdit($id)
    {
        return $this->repository->getListGenreEdit($id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function changeOrder($request)
    {
        $item = $this->repository->find($request->id);

        $item->update([
            'order' => $request->order
        ]);

        return $item;
    }

    public function changePosition($request)
    {
        $result = $this->repository->checkPosition($request->position);

        if ($result) {
            return false;
        }

        $item = $this->repository->find($request->id);

        $item->update([
            'position' => $request->position
        ]);

        return $item;
    }
    public function deleteMultipleChecked($request)
    {
        if (count($request->selectedIds) > 0) {
            foreach ($request->selectedIds as $id) {
                $this->repository->delete($id);
            }
            return true;
        }
    }
}

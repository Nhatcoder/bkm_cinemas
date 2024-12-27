<?php

namespace App\Repositories\Admin\Movies\Repositories;

use App\Models\Movie;
use App\Models\MovieActor;
use App\Models\MovieGenre;
use App\Repositories\Admin\Movies\Interfaces\MovieInterface;
use App\Repositories\Base\BaseRepository;
use Carbon\Carbon;

class MovieRepository extends BaseRepository implements MovieInterface
{
    public function getModel()
    {
        return Movie::class;
    }

    public function filter($request)
    {
        $data = $this->model->newQuery();
        if(!empty($request->cinema_id)){
          $data = $this->filterMoviesByCinemaId($request->cinema_id);

        }

        $data = $this->filterByTitle($data, $request);
        $data = $this->filterByStatus($data, $request);
        $data = $this->applyOrdering($data, $request);
        $data = $this->filterByGenres($data, $request);

        $data = $data->paginate(self::PAGINATION);
        return $data->appends([
            'title' => $request->title,
            'order_with' => $request->order_with,
            'genres' => $request->genres,
            'fill_action' => $request->fill_action
        ]);
    }

    public function find($id)
    {
        $result = $this->model->with('movieGenre', 'movieActor.actor')->find($id);

        if ($result) {
            return $result;
        }

        return false;
    }

    public function changeActive($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->active ^= 1;
            $result->save();
            return $result;
        }
        return false;
    }

    public function changeHot($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->hot ^= 1;
            $result->save();
            return $result;
        }
        return false;
    }

    public function changeOrder($id, $order)
    {
        $result = $this->find($id);
        if ($result) {
            $result->order = $order;
            $result->save();
            return $result;
        }
        return false;
    }

    public function createGenre($record, $data)
    {
        return $record->movieGenre()->createMany($data);
    }

    public function createMovieActors($record, $data)
    {
        return $record->movieActor()->createMany($data);
    }

    public function updateActors($record, $data)
    {
        foreach ($data as $actorData) {
            $actor = $record->movieActor()->where('actor_id', $actorData['actor_id'])->first();
            if ($actor) {
                $actor->update($actorData);
            }
        }
    }

    public function deleteGenre($record, $data)
    {
        return $record->movieGenre()->whereIn('genre_id', $data)->forceDelete();
    }

    public function deleteActor($record, $data)
    {
        return $record->movieActor()->whereIn('actor_id', $data)->forceDelete();
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->movieActor()->forceDelete();
            $result->movieGenre()->forceDelete();
            $result->delete();
            return true;
        }

        return false;
    }

    public function deleteMultiple(array $ids)
    {
        collect($ids)->chunk(1000)->each(function ($chunk) {
            MovieGenre::whereIn('movie_id', $chunk)->forceDelete();
            MovieActor::whereIn('movie_id', $chunk)->forceDelete();
            $this->model->whereIn('id', $chunk)->delete();
        });
        return true;
    }
    private function filterByTitle($query, $request)
    {
        if (!empty($request->title)) {
            return $query->where('title', 'like', '%' . $request->title . '%');
        }
        return $query;
    }

    private function filterByGenres($query, $request)
    {
        $genres = $request->genres;
        if (!empty($genres)) {
            return $query->whereHas('movieGenre', function ($q) use ($genres) {
                $q->whereIn('id', $genres);
            });
        }
        return $query;
    }

    private function filterByStatus($query, $request)
    {
        if (!empty($request->fill_action)) {
            switch ($request->fill_action) {
                case 'active':
                    return $query->where('active', 1);
                case 'noActive':
                    return $query->where('active', 0);
                case 'hot':
                    return $query->where('hot', 1);
                case 'noHot':
                    return $query->where('hot', 0);
            }
        }
        return $query;
    }

    private function applyOrdering($query, $request)
    {
        if (!empty($request->order_with)) {
            switch ($request->order_with) {
                case 'postedDateASC':
                    return $query->orderBy('created_at', 'asc');
                case 'postedDateDESC':
                    return $query->orderBy('created_at', 'desc');
                case 'releaseDateASC':
                    return $query->orderBy('release_date', 'asc');
                case 'releaseDateDESC':
                    return $query->orderBy('release_date', 'desc');
                case 'premiereDateASC':
                    return $query->orderBy('premiere_date', 'asc');
                case 'premiereDateDESC':
                    return $query->orderBy('premiere_date', 'desc');
            }
        }
        return $query->orderBy('order');
    }

    public function filterMoviesByCinemaId($cinemaId)
{
    return $this->model->whereHas('cinemas', function ($query) use ($cinemaId) {
        // Lọc các bộ phim với cinema_id cụ thể và start_time >= ngày hôm nay
        $query->where('cinema_id', $cinemaId)
              ->whereDate('showtimes.start_time', '>=', Carbon::today()->toDateString());
    })
    // Đảm bảo rằng chỉ lấy các bộ phim duy nhất, không bị trùng
    ->distinct();
    // Trả về tất cả các bộ phim thỏa mãn điều kiện trên
}

}

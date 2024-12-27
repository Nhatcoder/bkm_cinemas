<?php

namespace App\Repositories\Admin\Genres\Repositories;

use App\Repositories\Admin\Genres\Interfaces\GenreInterface;
use App\Repositories\Base\BaseRepository;

class GenreRepository extends BaseRepository implements GenreInterface
{
    public function getModel()
    {
        return \App\Models\Genre::class;
    }

    public function filter($request)
    {
        $query = $this->model->newQuery();

        $parentId = $request->query('parent_id', 0);

        if ($request->has('name') && !is_null($request->name)) {

            $query->where('name', 'like', '%' . $request->name . '%');

            $query->where('parent_id', $parentId)->orderBy('order');

            $data = $query->paginate(self::PAGINATION);

            if ($request->name) {
                $data = $data->appends('name', $request->name);
            }

            if ($request->parent_id) {
                $data = $data->appends('parent_id', $request->parent_id);
            }
            return $data;
        }

        $query->where('parent_id', $parentId)->orderBy('order');

        $data = $query->withCount('childs')->paginate(self::PAGINATION);

        return $data;

    }


    public function delete($id)
    {
        $category = $this->model->find($id);

        if (!$category) {
            $redirectUrl = request()->parent_id ?
                route('admin.Genres.index') . '?parent_id=' . request()->parent_id :
                route('admin.Genres.index');

            return redirect($redirectUrl)->with([
                'status_failed' => 'Không tìm thấy thể loại'
            ]);
        }

        foreach ($category->childs as $child) {
            $this->delete($child->id);
        }

        $category->delete();

        return true;
    }

    public function getListGenre()
    {
        $genre =  $this->model
            ->where('parent_id', 0)
            ->get();

        return $genre;
    }

    public function checkPosition($positionValue)
    {
        return $this->model->where('position', $positionValue)
            ->where('position', '!=', 0)->first();
    }

    public function getListGenreEdit($id)
    {
        $genre = $this->model->query()
            ->with(['childrenRecursive' => function ($value) use ($id) {
                $value->where('id', '<>', $id);
            }])
            ->where('id', '<>', $id)
            ->where('parent_id', 0)
            ->get();

        return $genre;
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
}

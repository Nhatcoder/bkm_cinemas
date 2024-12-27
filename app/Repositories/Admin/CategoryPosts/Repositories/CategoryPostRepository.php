<?php

namespace App\Repositories\Admin\CategoryPosts\Repositories;

use App\Repositories\Admin\CategoryPosts\Interfaces\CategoryPostInterface;
use App\Repositories\Base\BaseRepository;

class CategoryPostRepository extends BaseRepository implements CategoryPostInterface
{
    public function getModel()
    {
        return \App\Models\CategoryPost::class;
    }

    public function filter($request)
    {
        $query = $this->model->newQuery();
        $parentId = $request->parent_id ?? 0;
        if (!empty($request->name)) {
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
                route('admin.categoryPosts.index') . '?parent_id=' . request()->parent_id :
                route('admin.categoryPosts.index');

            return redirect($redirectUrl)->with([
                'status_failed' => 'Không tìm thấy danh mục'
            ]);
        }
        if (!empty($category->childs)) {
            foreach ($category->childs as $child) {

                $child->delete();
            }
        }
        return $category->delete();
    }

    public function getListCategoryPost()
    {
        $categoryPost = $this->model
            ->where('parent_id', 0)
            ->get();
        return $categoryPost;
    }

    public function checkPosition($positionValue)
    {
        return $this->model->where('position', $positionValue)
            ->where('position', '!=', 0)->first();
    }

    public function getListCategoryPostEdit($id)
    {
        $categoryPost = $this->model->query()
            ->with([
                'childrenRecursive' => function ($category) use ($id) {
                    $category->where('id', '<>', $id);
                }
            ])
            ->where('id', '<>', $id)
            ->where('parent_id', 0)
            ->get();

        return $categoryPost;
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

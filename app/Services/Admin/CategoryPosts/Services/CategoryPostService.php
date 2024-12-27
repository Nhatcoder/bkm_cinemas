<?php

namespace App\Services\Admin\CategoryPosts\Services;

use App\Repositories\Admin\CategoryPosts\Interfaces\CategoryPostInterface;
use App\Services\Admin\CategoryPosts\Interfaces\CategoryPostServiceInterface;
use App\Services\Base\BaseService;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Storage;

class CategoryPostService extends BaseService implements CategoryPostServiceInterface
{
    use StorageImageTrait;

    public function __construct()
    {
        parent::__construct();
    }
    public function getRepository()
    {
        return CategoryPostInterface::class;
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

        $uploadData = $this->storageTraitUpload($request, 'avatar', 'public/categoryPosts');

        if ($uploadData) {
            $data['avatar'] = $uploadData['path'];
        }


        $this->repository->create($data);

        return true;
    }
    public function update(&$request, $id)
    {
        $categoryPost = $this->find($id);

        if (!$categoryPost) {
            $redirectUrl = $request->parent_id ?
                route('admin.categoryPosts.index') . '?parent_id=' . $request->parent_id :
                route('admin.categoryPosts.index');

            return redirect($redirectUrl)->with([
                'status_failed' => 'Không tìm thấy danh mục'
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
            if ($categoryPost->avatar) {
                $path = 'public/systems/' . basename($categoryPost->avatar);
                if (Storage::exists($path)) {
                    Storage::delete($path);
                }
            }

            $imageUploadData = $this->storageTraitUpload($request, 'avatar', 'public/categoryPosts');
            $data['avatar'] = $imageUploadData['path'];
        }

        return  $this->repository->update($id, $data);
    }
    public function getListCategoryPostEdit($id)
    {
        return $this->repository->getListCategoryPostEdit($id);
    }

    public function changeOrder($request)
    {
        return $this->repository->changeOrder($request->id, $request->order);
    }
    public function changeActive($request)
    {
        return $this->repository->changeActive($request->id);
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

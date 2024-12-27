<?php

namespace App\Services\Admin\Posts\Services;

use App\Models\Notification;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\User;
use App\Repositories\Admin\Posts\Interfaces\PostInterface;
use App\Services\Admin\Posts\Interfaces\PostServiceInterface;
use App\Services\Base\BaseService;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Storage;

class PostService extends BaseService implements PostServiceInterface
{
    use StorageImageTrait;
    protected $postTag;
    public function __construct(
        PostTag             $postTag,
    ) {
        $this->postTag = $postTag;
        parent::__construct();
    }

    public function getRepository()
    {
        return PostInterface::class;
    }

    public function filter($request)
    {
        return $this->repository->filter($request);
    }

    public function getAllActive(){
        return $this->repository->getAllActive();
    }
    public function create(&$request)
    {
        $dataPost = [
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'content' => $request->content,
            'order' => $request->order,
            'active' => $request->active,
            'hot' => $request->hot ? 1 : 0,
            'promotion' => $request->promotion ? 1 : 0
        ];

        $uploadData = $this->storageTraitUpload($request, 'avatar', 'public/posts');

        if ($uploadData) {
            $dataPost['avatar'] = $uploadData['path'];
        }

        $post = $this->repository->create($dataPost);


        if ($post) {
            foreach ($request->parent_id as $category) {
                $post->postCategories()->create([
                    'category_id' => $category
                ]);
            }
        }

        $relatedPhotos = [];
        if ($request->hasFile('relatedPhotos')) {
            $relatedPhotos = $this->storageTraitUploadMultiple($request, 'relatedPhotos', 'public/postRelated');
        }

        foreach ($relatedPhotos as $photo) {
            $post->images()->create([
                'path' => $photo['path']
            ]);
        }

        $tagIds = [];

        if (isset($request->tags) && count($request->tags) > 0) {
            foreach ($request->tags as $tagName) {
                $tag = $this->repository->checkExitsTags($tagName);
                $tagIds[] = $tag->id;
            }
        }

        $tagData = [];

        foreach ($tagIds as $tagId) {
            $tagData[$tagId] = [
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        $post->tags()->attach($tagData);

        return true;
    }

    public function categoryOfPost($id)
    {
        return $this->repository->categoryOfPost($id);
    }

    public function tagsSelected($id)
    {
        return $this->repository->tagsSelected($id);
    }

    public function update(&$request, $id)
    {
        $post = $this->find($id);

        $uploadAvatar = $this->storageTraitUpload($request, 'avatar', 'public/posts');

        $dataPost = [
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'content' => $request->content,
            'order' => $request->order,
            'active' => $request->active,
            'hot' => $request->hot ? 1 : 0,
            'promotion' => $request->promotion ? 1 : 0,
        ];

        if ($uploadAvatar) {
            $dataPost['avatar'] = $uploadAvatar['path'];
        }

        // Update post categories
        $categoryIds = $post->postCategories->pluck('category_id')->toArray();

        // Xóa các danh mục theo bài viết không còn trong request
        foreach ($categoryIds as $existingCategoryId) {

            if (!in_array($existingCategoryId, $request->parent_id)) {
                // xóa mối quan hệ giữa sản phẩm và các danh mục (categories) mà hiện tại
                $this->repository->deleteCategoryPostByPost($post, $existingCategoryId);
            }
        }

        // Thêm hoặc cập nhật các danh mục từ request
        foreach ($request->parent_id as $category) {
            // Kiểm tra nếu đã có bản ghi với category_id này tồn tại
            $existingPostCategory = $this->repository->checkExitsCategoryPost($post, $category);

            if ($existingPostCategory) {
                // Nếu tồn tại và đã bị xóa, khôi phục nó
                if ($existingPostCategory->trashed()) {
                    $existingPostCategory->restore();
                }
            } else {
                // Nếu không tồn tại, tạo mới
                $this->repository->createCategoryPost($post, [
                    'category_id' => $category
                ]);
            }
        }

        // Handle related photos
        $relatedPhotos = [];
        if ($request->hasFile('relatedPhotos')) {
            $relatedPhotos = $this->storageTraitUploadMultiple($request, 'relatedPhotos', 'public/postRelated');
        }

        // Save related photos
        foreach ($relatedPhotos as $photo) {
            $this->repository->createRelatedPhotoPost($post, [
                'path' => $photo['path']
            ]);
        }

        // Đây là danh sách thẻ từ form, có thể là ID số nguyên hoặc tên thẻ
        $inputTags = [];

        $tagIds = [];

        if (is_array($request->tags)) {
            $inputTags = $request->tags;
            $tagIds = array_filter($inputTags, 'is_numeric'); // Thẻ đã tồn tại (ID số nguyên)
        }

        // Tách biệt các thẻ đã tồn tại (ID số nguyên) và các thẻ mới (chuỗi văn bản)
        $newTags = array_filter($inputTags, function ($tag) {
            return !is_numeric($tag); // Thẻ mới (chuỗi văn bản)
        });

        $tagData = [];
        foreach ($newTags as $tagName) {
            $tag = $this->repository->checkExitsTags($tagName);
            $tagData[] = $tag->id; // Thêm ID của thẻ mới vào mảng tagData
        }

        // Cập nhật $tagIds để bao gồm các ID của thẻ mới
        $tagIds = array_merge($tagIds, $tagData);


        // Bước 3: Xử lý việc xóa các tag không còn được chọn
        $currentTagIds = $post->tags->pluck('id')->toArray(); // ID của các tag hiện tại gán cho bài viết

        $tagsToRemove = array_diff($currentTagIds, $tagIds);

        if ($tagsToRemove) {
            // Xóa các bản ghi từ bảng post_tags (xóa mềm)
            $this->postTag->where('post_id', $post->id)
                ->whereIn('tag_id', $tagsToRemove)
                ->delete();
        }

        $tagsDeletedSoft = $this->postTag
            ->where('post_id', $post->id)
            ->whereIn('tag_id', $tagIds)
            ->onlyTrashed()
            ->get();

        foreach ($tagsDeletedSoft as $tag) {
            // Cập nhật (Khôi phục) lại tất cả các bản ghi bị xóa mềm
            $this->repository->updateAllRecordPostTagByPost($tag->tag_id);
        }

        foreach ($tagIds as $tagId) {
            if (!$post->tags->contains($tagId)) {
                // có tác dụng gắn (attach) một thẻ (tag) vào bài viết nếu thẻ đó chưa được liên kết với bài viết.
                $this->repository->attachTagIfNotExists($post, $tagId);
            }
        }
        $this->repository->update($id, $dataPost);

        // dịch tags
        $tagsData = [];

        if (isset($request->tags) && count($request->tags) > 0) {
            foreach ($request->tags as $tagName) {
                $tag = $this->repository->checkExitsTags($tagName);

                $tagIds[] = $tag->id;

                $tagsData[$tag->id] = [
                    'name' => $tagName, // Lưu tên thẻ để dịch sau này
                ];
            }
        }

        return $post;
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

    public function changeHot($request)
    {
        $item = $this->repository->find($request->id);
        $item->hot = $item->hot == 1 ? 0 : 1;
        $item->save();
        return $item;
    }

    public function changeActive($request)
    {
        $item = $this->repository->find($request->id);
        $item->active = $item->active == 1 ? 0 : 1;
        $item->save();
        return $item;
    }

    public function destroyImage($id)
    {
        $image = $this->repository->getImageRelatedPhotoById($id);

        if (!$image) {
            return response()->json([
                'deleted' => false,
                'message' => 'Không tìm thấy hình ảnh'
            ], 404);
        }
        $imagePath = 'public/postRelated/' . basename($image->path);
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }

        $image->delete();

        return true;
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
    public function sendPromotion($id){
        $users = User::where('type','member')->where('status',1)->get();
        $post = Post::where('id',$id)->first();
        
        $data = [];
        foreach ($users as $user) {
            $data[] = [
                'user_id' => $user->id,
                'title'=>$post->name,
                'content'=>$post->description,
                'type' => 'promotion',
                'created_at' => now(),
            ];
        }
        Notification::insert($data);
        $this->repository->sendPromotion($id);
        return true;
    }
    
}

<?php

namespace App\Repositories\Admin\Tags\Repositories;

use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Repositories\Admin\Tags\Interfaces\TagInterface;
use App\Repositories\Base\BaseRepository;

class TagRepository extends BaseRepository implements TagInterface
{
    protected $postTag;
    public function __construct(PostTag $postTag)
    {
        $this->postTag = $postTag;
        parent::__construct();
    }
    public function getModel()
    {
        return \App\Models\Tag::class;
    }

    public function getAll()
    {
        $query = $this->model->newQuery();

        if (!empty(request()->name)) {
            $query->where('name', 'like', '%' . request()->name . '%');
        }
        if (!empty(request()->fill_action)) {
            switch (request()->fill_action):
                case 'active':
                    $query->where('active', 1);
                    break;
                case 'noActive':
                    $query->where('active', 0);
                    break;
            endswitch;
        }
        $data = $query->orderBy('order')->paginate(self::PAGINATION);

        switch (request()->fill_action):
            case 'active':
                $data = $data->appends('fill_action', 'active');
                break;
            case 'noActive':
                $data = $data->appends('fill_action', 'noActive');
                break;
        endswitch;

        return $data;
    }
    public function tagsSelected($id)
    {
        return $this->postTag
            ->where('post_id', $id)
            ->whereNull('deleted_at')
            ->pluck('tag_id'); // Lấy các tag chưa bị xóa
    }
    public function delete($id)
    {
        $tag = $this->model->find($id);

        if (!$tag) {

            $redirectUrl = route('admin.tags.index');

            return redirect($redirectUrl)->with([
                'status_failed' => 'Không tìm thấy thẻ'
            ]);
        }

        $tag->postTags()->delete();
        $tag->delete();

        return true;
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
    public function getAllActive()
    {
        $tags = $this->model->select(
            'id',
            'name',
        )->where('active', 1)->get();
        return $tags;
    }
}

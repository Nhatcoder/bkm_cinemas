<?php

namespace App\Repositories\Admin\Blocks\Repositories;

use App\Models\Block;
use App\Models\BlockContent;
use App\Models\BlockType;
use App\Models\Page;
use App\Repositories\Admin\Blocks\Interfaces\BlockInterface;
use App\Repositories\Base\BaseRepository;

class BlockRepository extends BaseRepository implements BlockInterface
{
    protected $page;

    protected $blockType;

    protected $blockContent;

    public function __construct(
        Page         $page,
        BlockType    $blockType,
        BlockContent $blockContent
    ) {
        $this->blockType = $blockType;
        $this->page = $page;
        $this->blockContent = $blockContent;
        parent::__construct();
    }
    public function getModel()
    {
        return Block::class;
    }

    public function countBlock()
    {
        $count = $this->model->count();

        return $count;
    }

    public function filter($request)
    {
        $blocks = $this->model->newQuery();

        if (!empty($request->name)) {
            $blocks = $blocks->where('name', 'like', '%' . $request->name . '%');
        }
        $blocks = $blocks->orderBy('order');
        $blocks = $blocks->paginate(self::PAGINATION);

        return $blocks;
    }

    public function find($id)
    {
        $result = $this->model->with('blockContents')->find($id);
        if ($result) {
            return $result;
        }

        return false;
    }

    public function deleteBlockContentById($id)
    {
        $blockContent = $this->blockContent->where('block_id', $id)->delete();

        return $blockContent;
    }

    public function updateOrCreateBlockContent($blockId, $keyName, $content)
    {
        return $this->blockContent->updateOrCreate(
            [
                'block_id' => $blockId,
                'key_name' => $keyName
            ],
            [
                'value' => $content
            ]
        );
    }

    public function delete($id)
    {
        $block = $this->model->find($id);
        $block->blockContents()->delete();
        $block->delete();
        return $block;
    }
}

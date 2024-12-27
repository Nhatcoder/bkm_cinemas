<?php

namespace App\Services\Admin\Blocks\Services;

use App\Repositories\Admin\Blocks\Interfaces\BlockInterface;
use App\Services\Admin\Blocks\Interfaces\BlockServiceInterface;
use App\Services\Base\BaseService;

class BlockService extends BaseService implements BlockServiceInterface
{
    public function getRepository()
    {
        return BlockInterface::class;
    }

    public function countBlock()
    {
        return $this->repository->countBlock();
    }
    public function filter($request)
    {
        return $this->repository->filter($request);
    }
    public function create(&$data)
    {
        $block = $this->repository->create($data);

        return $block->id;
    }

    public function update(&$data, $id)
    {
        $block = $this->repository->find($id);

        if(!$block) {
            return back()->with('status_failed', 'Không tìm thấy khối trang');
        }

        $this->repository->update($id, $data['block']);

        $this->repository->deleteBlockContentById($id);

        $contentTypes = [];

        if (!empty($request->html)) {
            $contentTypes['html'] = $data['html'];
        }

        if (!empty($request->css)) {
            $contentTypes['css'] = $data['css'];
        }

        if (!empty($request->js)) {
            $contentTypes['js'] = $data['js'];
        }

        foreach ($contentTypes as $keyName => $content) {
            $this->repository->updateOrCreateBlockContent($id, $keyName, $content);
        }

        return true;
    }
}

<?php

namespace App\Repositories\Admin\Blocks\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface BlockInterface extends RepositoryInterface
{
    public function countBlock();
    public function filter($request);
    public function updateOrCreateBlockContent($blockId, $keyName, $content);
    public function deleteBlockContentById($id);
}

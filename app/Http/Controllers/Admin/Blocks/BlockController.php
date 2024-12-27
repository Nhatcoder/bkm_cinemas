<?php

namespace App\Http\Controllers\Admin\Blocks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blocks\BlockRequest;
use App\Services\Admin\Blocks\Interfaces\BlockServiceInterface;
use App\Services\Admin\BlockTypes\Interfaces\BlockTypeServiceInterface;
use App\Services\Admin\Pages\Interfaces\PageServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BlockController extends Controller
{
    protected $blockService;
    protected $blockTypeService;
    protected $pageService;

    public function __construct(
        BlockServiceInterface $blockService,
        BlockTypeServiceInterface $blockTypeService,
        PageServiceInterface $pageService,
    ){
        $this->blockService = $blockService;
        $this->blockTypeService = $blockTypeService;
        $this->pageService = $pageService;
    }

    public function index(Request $request)
    {
        $countBlock = $this->blockService->countBlock();

        $pages = $this->pageService->getAllActive();

        $blockTypes = $this->blockTypeService->getAllActive();

        $blocks = $this->blockService->filter($request);

        return view('admin.pages.blocks.index', compact(
                'countBlock',
                'pages',
                'blocks',
                'blockTypes'
            )
        );
    }

    public function create()
    {
        $blockTypes = $this->blockTypeService->getAllActive();

        return view('admin.pages.blocks.create', compact('blockTypes'));
    }

    public function store(BlockRequest $request)
    {
        $data = $request->block;
        try {
            DB::beginTransaction();

            $block = $this->blockService->create($data);

            DB::commit();

            // Khi thêm mới xong thì sẽ chuyển trực tiếp sang edit để viết code
            return redirect()->route('admin.blocks.edit', ['id' => $block]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with('status_failed', 'Đã xảy ra lỗi khi thêm');
        }
    }

    public function edit($id)
    {
        $pages = $this->pageService->getAllActive();

        $data = $this->blockService->find($id);

        $block = $data;

        $contents = $data->blockContents->pluck('value', 'key_name')->toArray();

        $blockTypes = $this->blockTypeService->getAllActive();

        return view('admin.pages.blocks.edit', compact(
            'pages',
            'block',
            'contents',
            'blockTypes',
        ));
    }

    public function update(BlockRequest $request, $id)
    {
        $data = $request->all();

        try {
            DB::beginTransaction();

            $this->blockService->update($data, $id);

            DB::commit();

            return redirect()->route('admin.blocks.index')->with('status_succeed', 'Cập nhật khối trang thành công');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with('status_failed', 'Đã xảy ra lỗi khi cập nhật');
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();

            $this->blockService->delete($id);

            DB::commit();

            return redirect()->route('admin.blocks.index')->with('status_succeed', 'Xóa khối trang thành công');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with('status_failed', 'Đã xảy ra lỗi khi xóa');
        }
    }
}

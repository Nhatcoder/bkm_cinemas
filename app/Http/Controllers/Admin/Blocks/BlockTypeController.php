<?php

namespace App\Http\Controllers\Admin\Blocks;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlockTypes\BlockTypeRequest;
use App\Services\Admin\BlockTypes\Interfaces\BlockTypeServiceInterface;
use App\Services\Admin\Pages\Interfaces\PageServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BlockTypeController extends Controller
{
    protected $blockTypeService;
    protected $pageService;

    public function __construct(
        BlockTypeServiceInterface $blockTypeService,
        PageServiceInterface $pageService
    )
    {
        $this->blockTypeService = $blockTypeService;
        $this->pageService = $pageService;
    }

    public function index(Request $request)
    {
        $countBlockType = $this->blockTypeService->countBlockType();

        $pages = $this->pageService->getAllActive();

        $blockTypes = $this->blockTypeService->filter($request);

        return view('admin.pages.blockTypes.index', compact(
                'pages',
                'blockTypes',
                'countBlockType'
            )
        );
    }

    public function create()
    {
        return view('admin.pages.blockTypes.create');
    }

    public function store(BlockTypeRequest $request)
    {
        $data = $request->blockType;
        try {
            DB::beginTransaction();

            $this->blockTypeService->create($data);

            DB::commit();

            return redirect()->route('admin.blockTypes.index')->with('status_succeed', 'Thêm loại khối thành công');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with('status_failed', 'Đã xảy ra lỗi khi thêm');
        }
    }

    public function edit($id)
    {
        $blockType = $this->blockTypeService->find($id);

        if (!$blockType) {
            return redirect()->route('admin.blockTypes.index')->with('status_failed', 'Không tìm thấy loại khối');
        }

        return view('admin.pages.blockTypes.edit', compact('blockType'));
    }

    public function update(BlockTypeRequest $request, $id)
    {
        $data = $request->blockType;
        try {
            DB::beginTransaction();

            $this->blockTypeService->update($data, $id);

            DB::commit();

            return redirect()->route('admin.blockTypes.index')->with('status_succeed', 'Cập nhật loại khối thành công');
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

            $this->blockTypeService->delete($id);

            DB::commit();

            return redirect()->route('admin.blockTypes.index')->with('status_succeed', 'Xóa loại khối thành công');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with('status_failed', 'Đã xảy ra lỗi khi xóa');
        }
    }
}

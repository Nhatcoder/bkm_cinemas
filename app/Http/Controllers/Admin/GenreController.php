<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Genres\GenreRequest;
use App\Models\Genre;
use App\Services\Admin\Genres\Interfaces\GenreServiceInterface;
use App\Traits\RemoveImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GenreController extends Controller
{
    use RemoveImageTrait;
    protected $genreService;

    public function __construct(
        GenreServiceInterface $genreService,
    ) {
        $this->genreService = $genreService;
    }

    public function index(Request $request)
    {

        if ($request->query('page')) {
            $currentPage = $request->query('page', 1);
        }

        if ($request->query('parent_id')) {
            $parentId = $request->query('parent_id', null);
        }

        session([
            'page' => $currentPage ?? null,
            'parent_id' => $parentId ?? null
        ]);

        $data = $this->genreService->filter($request);

        return view('admin.pages.genres.index', compact('data'));
    }


    public function create()
    {
        $listGenre = $this->genreService->getAll();


        return view('admin.pages.genres.create', compact('listGenre'));
    }
    public function store(GenreRequest $request)
    {
        try {
            DB::beginTransaction();

            $this->genreService->create($request);

            DB::commit();

            $currentPage = session('page', 1);

            $parentId = session('parent_id', null);

            $redirectUrl = route('admin.genres.index', [
                'page' => $currentPage,
                'parent_id' => $parentId
            ]);
            return redirect($redirectUrl)->with([
                'status_succeed' => "Thêm mới thể loại thành công"
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with([
                'status_failed' => 'Đã xảy ra lỗi khi thêm thể loại'
            ]);
        }
    }

    public function edit($id)
    {
        $genreEdit = $this->genreService->find($id);

        if (!$genreEdit) {
            return redirect()->route('admin.genres.index')->with([
                'status_failed' => 'Không tìm thấy thể loại'
            ]);
        }

        $getListGenreEdit = $this->genreService->getListGenreEdit($id);

        if ($getListGenreEdit) {
            return view('admin.pages.genres.edit', compact('genreEdit', 'getListGenreEdit'));
        }
    }

    public function update(GenreRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $this->genreService->update($request, $id);

            DB::commit();

            $currentPage = session('page', 1);

            $parentId = session('parent_id', null);

            $redirectUrl = route('admin.genres.index', [
                'page' => $currentPage,
                'parent_id' => $parentId
            ]);

            return redirect($redirectUrl)->with([
                'status_succeed' => 'Cập nhật thể loại thành công'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with([
                'status_failed' => 'Đã xảy ra lỗi khi cập nhật'
            ]);
        }
    }
    public function delete($id)
    {
        try {
            DB::beginTransaction();

            $this->genreService->delete($id);

            DB::commit();

            $currentPage = session('page', 1);

            $parentId = session('parent_id', null);

            $redirectUrl = route('admin.genres.index', [
                'page' => $currentPage,
                'parent_id' => $parentId
            ]);

            return redirect($redirectUrl)->with([
                'status_succeed' => 'Xóa thể loại thành công'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with([
                'status_failed' => 'Đã xảy ra lỗi khi xóa'
            ]);
        }
    }


    public function removeAvatarImage(Request $request)
    {
        $genre = $this->removeImage($request, new Genre, 'avatar', 'Genres');
        return response()->json(['avatar' => $genre]);
    }

    public function changeOrder(Request $request)
    {
        $this->genreService->changeOrder($request);

        return response()->json(['newOrder' => $request->order]);
    }

    public function changePosition(Request $request)
    {
        $result = $this->genreService->changePosition($request);

        if (!$result) {
            return response()->json([
                'status' => false,
                'newPosition' => $request->position,
            ]);
        }

        return response()->json([
            'status' => true,
            'newPosition' => $request->position,
        ]);
    }
    public function deleteItemMultipleChecked(Request $request)
    {

        if (empty($request->selectedIds)) {
            return response()->json(['message' => 'Vui lòng chọn ít nhất 1 bản ghi'], 400); // Trả về mã lỗi 400
        }
        $this->genreService->deleteMultipleChecked($request);

        return response()->json(['message' => 'Xóa thành công!']);
    }
}

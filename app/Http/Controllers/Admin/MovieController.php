<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Movies\MovieRequest;
use App\Models\Movie;
use App\Services\Admin\Actors\Interfaces\ActorServiceInterface;
use App\Services\Admin\Areas\Interfaces\AreaServiceInterface;
use App\Services\Admin\Cinemas\Interfaces\CinemaServiceInterface;
use App\Services\Admin\Cities\Interfaces\CityServiceInterface;
use App\Services\Admin\Genres\Interfaces\GenreServiceInterface;
use App\Services\Admin\Movies\Interfaces\MovieServiceInterface;
use App\Traits\RemoveImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    use RemoveImageTrait;

    protected $movieService;

    protected $genreService;
    protected $actorService;
    protected $cityService;
    protected $areaService;
    protected $cinemaService;




    public function __construct(
        MovieServiceInterface    $movieService,
        GenreServiceInterface    $genreService,
        ActorServiceInterface    $actorService,
        CityServiceInterface     $cityService,
        AreaServiceInterface     $areaService,
        CinemaServiceInterface   $cinemaService
    ) {
        $this->movieService = $movieService;
        $this->genreService = $genreService;
        $this->actorService = $actorService;
        $this->cityService = $cityService;
        $this->areaService = $areaService;
        $this->cinemaService = $cinemaService;
    }


    public function index(Request $request)
    {
        $listGenre = $this->genreService->getAll();
        $data = $this->movieService->filter($request);
        $cities = $this->cityService->getAll();
        return view('admin.pages.movies.index', compact('data','listGenre','cities'));
    }

    public function create()
    {
        $listGenre = $this->genreService->getAll();
        $actors = $this->actorService->getAll();

        return view('admin.pages.movies.create',compact('listGenre','actors'));
    }

    public function store(MovieRequest $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();

            $this->movieService->create($data);

            DB::commit();

            $redirectUrl = route('admin.movies.index');

            return redirect($redirectUrl)->with([
                'status_succeed' => "Thêm phim thành công"
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with('status_failed', 'Đã xảy ra lỗi khi thêm');
        }
    }


    public function edit($id)
    {
        $data = $this->movieService->find($id);
        $listGenre = $this->genreService->getAll();
        $actors = $this->actorService->getAll();

        if (!$data) {
            return redirect()->route('admin.posts.index')->with([
                'status_failed' => "Không tìm thấy phim"
            ]);
        }

        return view('admin.pages.movies.edit', compact('data', 'listGenre','actors'));

    }

    public function update(MovieRequest $request, $id)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();

            $this->movieService->update($data, $id);

            DB::commit();

            $redirectUrl = route('admin.movies.index');

            return redirect($redirectUrl)->with([
                'status_succeed' => "Cập nhật phim thành công"
            ]);
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

            $this->movieService->delete($id);

            DB::commit();

            $redirectUrl = route('admin.movies.index');

            return redirect($redirectUrl)->with([
                'status_succeed' => 'Xóa phim thành công'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with('status_failed', 'Đã xảy ra lỗi khi xóa');
        }
    }

    public function removeAvatarImage(Request $request)
    {
        $movie = $this->removeImage($request, new Movie, 'image', 'movies');

        return response()->json(['image' => $movie]);
    }

    public function removeBannerImage(Request $request)
    {
        $movie = $this->removeImage($request, new Movie, 'banner_movie', 'movies');

        return response()->json(['banner_movie' => $movie]);
    }

    public function changeOrder(Request $request)
    {
        $this->movieService->changeOrder($request);

        return response()->json(['newOrder' => $request->order]);
    }

    public function changeHot(Request $request)
    {
        $item = $this->movieService->changeHot($request);

        return response()->json(['newHot' => $item->hot]);
    }

    public function changeActive(Request $request)
    {
        $item = $this->movieService->changeActive($request);

        return response()->json(['newStatus' => $item->active]);
    }

    public function deleteItemMultipleChecked(Request $request)
    {
        try {
            DB::beginTransaction();
            if (empty($request->selectedIds)) {
                return response()->json(['message' => 'Vui lòng chọn ít nhất 1 bản ghi'], 400);
            }
            $this->movieService->deleteMultipleChecked($request);

            DB::commit();
            return response()->json(['message' => 'Xóa thành công!'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra!',
            ], 500);
        }
    }
    public function getAreaByCity(Request $request)
    {
        $data['areas'] = $this->areaService->getByCityId($request->city_id);

        return response()->json([
            'areas' => $data['areas'],
        ]);
    }

    public function getCinemaByArea(Request $request)
    {
        $data['cinemas'] = $this->cinemaService->getCinemaByArea($request->area_id);

        return response()->json([
            'cinemas' => $data['cinemas'],
        ]);
    }
}

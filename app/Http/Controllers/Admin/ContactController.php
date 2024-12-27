<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\Contacts\Interfaces\ContactServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(
        ContactServiceInterface $contactService
    ){
        $this->contactService = $contactService;
    }

    public function index(Request $request)
    {
        $data = $this->contactService->filter($request);
        return view('admin.pages.contacts.index', compact('data'));
    }

    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            if (!$this->contactService->delete($id)) {
                return redirect()->route('admin.contacts.index')->with(['status_failed' => 'Không tìm thấy!']);
            }
            DB::commit();
            return redirect()->route('admin.contacts.index')->with([
                'status_succeed' => 'Xóa liên hệ thành công'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with([
                'status_failed' => 'Đã xảy ra lỗi khi xóa'
            ], 500);
        }
    }
}

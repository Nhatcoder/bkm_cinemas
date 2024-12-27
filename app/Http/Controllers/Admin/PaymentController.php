<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\PaymentRequest;
use App\Models\Payment;
use App\Services\Admin\Payments\Interfaces\PaymentServiceInterface;
use Illuminate\Http\Request;
use App\Traits\RemoveImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    use RemoveImageTrait;
    protected $paymentService;

    public function __construct(PaymentServiceInterface $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $payments = $this->paymentService->filter($request);
        return view('admin.pages.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.payments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {
        $data = $request->payment;

        DB::beginTransaction();
        try {
            $this->paymentService->create($data);
            DB::commit();
            return redirect()->route('admin.payments.index')->with('status_succeed', 'Thêm phương thức thanh toán thành công');
        } catch (\Exception $e) {
            if (!empty($data['image'])) {
                $path = "public/payments/" . basename($data['image']);
                if (Storage::exists($path)) {
                    Storage::delete($path);
                }
            }

            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return redirect()->route('admin.payments.create')->with('status_failed', 'Không thể tạo phương thức thanh toán.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = $this->paymentService->find($id);
        if (!$payment) {
            return redirect()->route('admin.payments.index')->with(['status_failed' => 'Không tìm thấy!']);
        }
        return view('admin.pages.payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentRequest $request, $id)
    {
        $data = $request->payment;

        DB::beginTransaction();
        try {
            $this->paymentService->update($data, $id);
            DB::commit();
            return redirect()->route('admin.payments.index')->with('status_succeed', 'Phương thức thanh toán đã được cập nhật thành công.');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return redirect()->route('admin.payments.edit', $id)->with('status_failed', 'Cập nhật phương thức thanh toán không thành công.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        DB::beginTransaction();
        try {
            if (!$this->paymentService->delete($id)) {
                return redirect()->route('admin.payments.index')->with(['status_failed' => 'Không tìm thấy!']);
            }
            DB::commit();
            return redirect()->route('admin.payments.index')->with('status_succeed', 'Phương thức thành toán đã được xóa thành công.');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return redirect()->route('admin.payments.index')->with('status_failed', 'Xóa phương thức thành toán không thành công.');
        }
    }

    public function removeAvatarImage(Request $request)
    {
        $payment = $this->removeImage($request, new Payment, 'image', 'payments');

        return response()->json(['avatar' => $payment], 200);
    }

    public function changeActive(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $this->paymentService->changeActive($request);
            DB::commit();
            if (!$data) {
                return response()->json([
                    'success' => false,
                    'message' => 'Có lỗi xảy ra!'
                ], 400);
            }
            return response()->json(['newStatus' => $data->active]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra!',
            ], 500);
        }
    }
}

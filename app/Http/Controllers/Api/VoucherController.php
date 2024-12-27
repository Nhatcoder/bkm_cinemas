<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Voucher::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getVoucherByCode(string $code)
    {
        DB::beginTransaction();
        try {
            $voucher = Voucher::where('code', $code)->first();
            if (!$voucher) {
                throw ValidationException::withMessages(['Voucher này không còn sử dụng được']);
            }
            if ($voucher->quantity <= 0) {
                throw ValidationException::withMessages(['Voucher này đã được sử dụng hết']);
            }
            $deletedVoucher = auth()->user()->vouchersTrashed()->wherePivotNotNull('deleted_at')->first();
            if ($deletedVoucher) {
                DB::rollBack();
                throw ValidationException::withMessages(['Voucher này không còn sử dụng được']);
            }
            $userVoucher = auth()->user()->vouchers()->where('code', $code)->first();
            
            if (!$userVoucher) {
                $voucher->update([
                    'quantity' => $voucher->quantity - 1
                ]);
                auth()->user()->vouchers()->attach($voucher->id);
            }
            DB::commit();
            return response()->json($voucher);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function getUserVouchers()
    {
        $user = auth()->user();

        $vouchers = $user->vouchers()
            ->where('active', 1)
            ->where(function ($query) {
                $query->where('start_date', '<=', Carbon::now())
                    ->where('end_date', '>=', Carbon::now())
                    ->orWhere(function ($subQuery) {
                        $subQuery->whereNull('start_date')
                                ->whereNull('end_date');
                    });
            })
            ->get();

        return response()->json($vouchers);
    }
}

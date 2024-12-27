<?php

namespace App\Repositories\Client\Transactions\Repositories;

use App\Models\Transaction;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Client\Transactions\Interfaces\TransactionInterface;
use Illuminate\Support\Facades\Auth;

class TransactionRepository extends BaseRepository implements TransactionInterface
{
    public function getModel()
    {
        return Transaction::class;
    }

    public function getTransactionByUser($userId)
    {
        return $this->model->where('user_id', $userId)->orderBy('id', 'DESC')->get();
    }
 

    public function getTotalMoneyByYear($request)
    {
        $year = $request->year;

        $totalMoneyRefund = $this->model
            ->where('type', 'refund')
            ->where('status', 'completed')
            ->whereYear('created_at', $year)
            ->where('user_id', Auth::user()->id)
            ->sum('amount');

        $totalMoney = $this->model
            ->where('type', 'booking')
            ->where('status', 'completed')
            ->whereYear('created_at', $year)
            ->where('user_id', Auth::user()->id)
            ->sum('amount');

        return response()->json([
            'totalMoney' => $totalMoney - $totalMoneyRefund,
            'totalMoneyFormatted' => number_format($totalMoney - $totalMoneyRefund, 0, ',', '.')
        ], 200);
    }

    public function getTotalMoneyByMonth($request)
    {
        $month = $request->month;
    
        [$selectedMonth, $selectedYear] = explode('/', $month);
        
        $totalMoneyRefund = $this->model
        ->where('type', 'refund')
        ->where('status', 'completed')
        ->whereYear('created_at', $selectedYear) 
        ->whereMonth('created_at', $selectedMonth) 
        ->where('user_id', Auth::user()->id)
        ->sum('amount');

        $totalMoney = $this->model
            ->where('type', 'booking')
            ->where('status', 'completed')
            ->whereYear('created_at', $selectedYear) 
            ->whereMonth('created_at', $selectedMonth) 
            ->where('user_id', Auth::user()->id)
            ->sum('amount');
    
        return response()->json([
            'totalMoney' => $totalMoney - $totalMoneyRefund,
            'totalMoneyFormatted' => number_format($totalMoney - $totalMoneyRefund, 0, ',', '.')
        ], 200);
    }
    
}

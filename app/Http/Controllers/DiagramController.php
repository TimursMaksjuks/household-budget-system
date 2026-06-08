<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\FinancialRecord;
use App\Models\Budget;

class DiagramController extends Controller
{
    public function index(){

    $totalIncome = FinancialRecord::where('user_id',Auth::id())
    ->where('record_type', 'income')
    ->sum('amount');

    $totalExpenses = FinancialRecord::where('user_id',Auth::id())
    ->where('record_type', 'expense')
    ->sum('amount');

    $balance = $totalIncome - $totalExpenses;

    $recordsCount = FinancialRecord::where('user_id', Auth::id())
    ->count();

    $budgetsCount = Budget::where('user_id', Auth::id())
    ->count();

    return view('dashboard', compact( 'totalIncome', 'totalExpenses', 'balance', 'recordsCount', 'budgetsCount'));

}

public function expensesByCategory(){

    $expenses = FinancialRecord::where('user_id', Auth::id())
    ->where('record_type', 'expense')
    ->selectRaw('category_id, SUM(amount) as total')
    ->groupBy('category_id')
    ->with('category')
    ->get();

    return view('diagrams.expenses-by-category', compact('expenses'));
    
}

public function monthlyIncomeExpenses(){

    $incomeData = FinancialRecord::where('user_id', Auth::id())
        ->where('record_type', 'income')
        ->selectRaw("DATE_FORMAT(date, '%Y-%m') as month, SUM(amount) as total")
        ->groupBy('month')
        ->get();

    $expenseData = FinancialRecord::where('user_id', Auth::id())
        ->where('record_type', 'expense')
        ->selectRaw("DATE_FORMAT(date, '%Y-%m') as month, SUM(amount) as total")
        ->groupBy('month')
        ->get();

    $months = collect(
        $incomeData->pluck('month')
            ->merge($expenseData->pluck('month'))
            ->unique()
            ->sort()
            ->values()
    );

    $incomeValues = [];
    $expenseValues = [];

    foreach ($months as $month) {

        $incomeValues[] = optional(
            $incomeData->firstWhere('month', $month)
        )->total ?? 0;

        $expenseValues[] = optional(
            $expenseData->firstWhere('month', $month)
        )->total ?? 0;
    }

    return view(
        'diagrams.monthly-income-expenses',
        compact(
            'months',
            'incomeValues',
            'expenseValues'
        )
    );
}

}
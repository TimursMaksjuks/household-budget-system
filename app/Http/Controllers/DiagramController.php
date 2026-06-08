<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
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

}
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\Category;
use App\Models\FinancialRecord;
use Carbon\Carbon;


class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $budgets = Budget::where('user_id', Auth::id())
        ->with('category')
        ->get();

    foreach ($budgets as $budget) {

        $periodDate = Carbon::createFromFormat('F Y', $budget->period);

        $spent = FinancialRecord::where('user_id', Auth::id())
            ->where('record_type', 'expense')
            ->where('category_id', $budget->category_id)
            ->whereYear('date', $periodDate->year)
            ->whereMonth('date', $periodDate->month)
            ->sum('amount');

        $budget->spent = $spent;

        $budget->remaining = $budget->limit_amount - $spent;
    }

    return view('budgets.index', compact('budgets'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $categories = Category::all();

    return view('budgets.create', compact('categories'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'limit_amount' => 'required|numeric|min:0.01',
        'period' => 'required|string|max:255',
    'category_id' => 'required|exists:categories,id',
    ]);

    Budget::create([
        'limit_amount' => $request->limit_amount,
        'period' => $request->period,
        'category_id' => $request->category_id,
        'user_id' => Auth::id()
    ]);

    return redirect()->route('budgets.index')->with('success', __('messages.budget_created'));
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Budget $budget)
{
    if ($budget->user_id !== Auth::id()) {
        abort(403);
    }

    $categories = Category::all();

    return view('budgets.edit', compact('budget', 'categories'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Budget $budget)
{
    if ($budget->user_id !== Auth::id()) {
        abort(403);
    }

    $request->validate([
    'limit_amount' => 'required|numeric|min:0.01',
    'period' => 'required|string|max:255',
    'category_id' => 'required|exists:categories,id',
]);

    $budget->update([
        'limit_amount' => $request->limit_amount,
        'period' => $request->period,
        'category_id' => $request->category_id
    ]);

    return redirect()->route('budgets.index')->with('success', __('messages.budget_updated'));
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Budget $budget)
{
    if ($budget->user_id !== Auth::id()) {
        abort(403);
    }

    $budget->delete();

    return redirect()->route('budgets.index')->with('success', __('messages.budget_deleted'));
}

}
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\Category;


class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $budgets = Budget::where('user_id', Auth::id())->get();

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
        'period' => 'required',
        'category_id' => 'required'
    ]);

    Budget::create([
        'limit_amount' => $request->limit_amount,
        'period' => $request->period,
        'category_id' => $request->category_id,
        'user_id' => Auth::id()
    ]);

    return redirect()->route('budgets.index');
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
    public function edit(string $id)
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
}

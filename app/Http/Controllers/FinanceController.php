<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FinancialRecord;
use App\Models\Category;


class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $records = FinancialRecord::where('user_id', Auth::id())->get();

    return view('financial-records.index', compact('records'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $categories = Category::all();

    return view('financial-records.create', compact('categories'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric',
        'date' => 'required|date',
        'description' => 'required|max:255',
        'record_type' => 'required',
        'category_id' => 'required'
    ]);

    FinancialRecord::create([
        'amount' => $request->amount,
        'date' => $request->date,
        'description' => $request->description,
        'record_type' => $request->record_type,
        'category_id' => $request->category_id,
        'user_id' => Auth::id()
    ]);

    return redirect()->route('financial-records.index');
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
    public function edit(FinancialRecord $financialRecord)
{
    if ($financialRecord->user_id !== Auth::id()) {
    abort(403);
}
    $categories = Category::all();

    return view('financial-records.edit', compact('financialRecord', 'categories'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FinancialRecord $financialRecord)
{
    if ($financialRecord->user_id !== Auth::id()) {
    abort(403);
}

    $request->validate([
        'amount' => 'required|numeric|min:0.01',
        'date' => 'required|date',
        'description' => 'required|max:255',
        'record_type' => 'required',
        'category_id' => 'required'
    ]);

    $financialRecord->update([
        'amount' => $request->amount,
        'date' => $request->date,
        'description' => $request->description,
        'record_type' => $request->record_type,
        'category_id' => $request->category_id
    ]);

    return redirect()->route('financial-records.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinancialRecord $financialRecord)
{
    if ($financialRecord->user_id !== Auth::id()) {
    abort(403);
}

    $financialRecord->delete();

    return redirect()->route('financial-records.index');
}

}
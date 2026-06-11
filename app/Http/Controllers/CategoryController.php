<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $categories = Category::where('user_id', Auth::id())->get();

    return view('categories.index', compact('categories'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        
        Category::create([
    'name' => $request->name,
    'user_id' => Auth::id(),
]);
        return redirect()->route('categories.index')->with('success', __('messages.category_created'));

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
    public function edit(Category $category)
{
    if ($category->user_id !== Auth::id()) {
        abort(403);
    }

    return view('categories.edit', compact('category'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

     if ($category->user_id !== Auth::id()) {
        abort(403);
    }
        $request->validate([ 'name' => 'required|string|max:255' ]);

        $category->update([ 'name' => $request->name ]);
        
        return redirect()->route('categories.index')->with('success', __('messages.category_updated'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
{
    if ($category->user_id !== Auth::id()) {
        abort(403);
    }

    $category->delete();

    return redirect()->route('categories.index')
        ->with('success', __('messages.category_deleted'));
}
}

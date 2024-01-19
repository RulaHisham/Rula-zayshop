<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mainCategories = Category::with(['childrens'])
            ->whereNull('parent_id')->get();
       return view('dashboard.category.index',compact('mainCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mainCategories=Category::whereNull('parent_id')->get();
        return view('dashboard.category.create',compact('mainCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $mainCategories = Category::whereNull('parent_id')->get();
        Category::create ($request->only(['name', 'status', 'parent_id']));
        return redirect()->route('dashboard.categories.index')->with('success','Category created successfully');
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
        $category = Category::find($id);
        $mainCategories = Category::whereNull('parent_id')->get();
        return view('dashboard.category.edit', compact('mainCategories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {

        $category = Category::find($id);
        $category->update($request->only(['name', 'status', 'parent_id']));
        return redirect()->route('dashboard.categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category->childrens->count() > 0) {
            return redirect()->route('dashboard.categories.index')->with('error', 'Can not delete this category because it has childrens');
        }


        $category->delete();
        return redirect()->route('dashboard.categories.index')->with('success', 'Category deleted successfully');
    }
    }


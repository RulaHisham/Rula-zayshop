<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Categories(){
        $categories = Category::all();
        return response()->json(['categories' => $categories]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);

        $data =[
            'message' => 'Category created successfully',
        ];

        return response()->json($data);
    }
}

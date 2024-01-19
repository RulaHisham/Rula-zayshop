<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function index()
    {
       return view('dashboard.index');
    }
    public function shop(Request $request)
    {
        $mainCategories = Category::with(['childrens'])->whereNull('parent_id')->where('status', true)->get();



        $queryParams = $request->query();
        // Product Filteration
        $productsQuery = Product::query();
        // ------ category -------------
        if (isset($queryParams['category'])) {
            $productsQuery->where('category_id', $queryParams['category']);
        }


        $products = $productsQuery->where('status', true)
            ->paginate(4);
        return view('frontend.shop', compact('mainCategories', 'products'));
    }
    public function showProduct($id)
    {
        $product = Product::find($id);
        if(!$product) {
            return redirect()->route('shop')->with('error', 'Product Not Found');
        }
        return view('frontend.single-product', compact('product'));
    }


    public function create()
    {
        //
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

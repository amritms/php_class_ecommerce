<?php

namespace App\Http\Controllers\admin;

use App\Product;
use App\Category;
use App\Tag;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
// session(['message' => 'This is message']);
// session('message');
// session('message', 'this is default message');


        $tags = Tag::orderBy('name', 'asc')->get();

        $categories = Category::orderBy('name', 'asc')->get();

        return view('products.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required'
        ]);

        $product = Product::create($request->all());
        $product->tags()->sync($request->tag);
        
        session()->flash('message', 'Product created successfully.');
        
        
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
     
        $product = $product->with('tags')->where('id', $product->id)->first();
        $categories = Category::all();
        $tags = Tag::all();

        return view('products.edit', compact('product', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // $request = $request->all();
        
        // $product->name = $request->name;
        // $product->category = $request->category;
        // $product->price = $request->price;


        $product->fill($request->all());
        $product->save();
        
        $product->tags()->sync($request->tag);
        
        session()->flash('message', 'Product updated successfully.');


        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        session()->flash('message', 'Product deleted successfully.');


        return redirect('products');
    }
}

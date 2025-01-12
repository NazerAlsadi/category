<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $products = Product::all();
        $products = Product::with('category')->get();
       // dd($products);
        return view('products.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);
        

        // Handle the file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('product_img'), $imageName);

            // Save category to database
            Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'image' => 'product_img/' . $imageName
            ]);

            return redirect()->route('products.index')->with('success', 'Product created successfully.');
        }

        return back()->with('error', 'Failed to upload image.');

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
        $product = Product::find($id);
        return view('products.edit' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);
        
        $product = Product::find($id);

        // Handle the file upload
        if ($request->hasFile('image')) {
            // del old file
            if (file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('product_img'), $imageName);
        }

        // Save product to database
            
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
            
        $product->save();
        
        return redirect()->route('products.index')->with('success', 'Product Updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if (file_exists(public_path($product ->image))) {
            unlink(public_path($product ->image));
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
   

    }
}

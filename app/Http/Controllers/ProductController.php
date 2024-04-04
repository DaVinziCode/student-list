<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {

        $data = array("products" => DB::table('products')->orderBy('id', 'desc')->simplePaginate(10));
        // $products = Product::all();
        // return view('products.index', ['products' => $products]);
        return view('products.index', $data);
    }

    public function create(){

        return view('products.create');

    }

    public function store(Request $request){

        $data = $request->validate([
            'product_name'=> 'required',
            'qty'=> 'required|numeric',
            'price'=> 'required|decimal:2',
            'description'=> 'nullable',
        ]);

        $newProduct = Product::create($data);
        return redirect()->route('product.index')->with('success','Product Created Successful!');
    }

    public function edit(Product $product){
        // dd($product);
        return view('products.edit', ['product'=> $product]);
    }

    public function update(Request $request, Product $product){
        $data = $request->validate([
            'product_name'=> 'required',
            'qty'=> 'required|numeric',
            'price'=> 'required|decimal:2',
            'description'=> 'nullable',
        ]);

        $product->update($data);
        return redirect()->route('product.index')->with('success','Product Updated Successfuly!');

    }
}

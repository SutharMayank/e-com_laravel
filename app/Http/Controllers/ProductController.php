<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data=Product::all();
        return view('product',['products'=>$data]);

    }
    public function detail($id)
    {
        $product = Product::find($id);
        return view('detail', ['product' => $product]);
    }

    public function search(Request $request)
    {
        $data = Product::where('name', 'like', '%'.$request->input('query'). '%')->get();
        return view('search', ['product' => $data]);
    }
}

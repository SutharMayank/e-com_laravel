<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;



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
    public function addToCart(Request $request)
    {
        if($request->session()->has('user'))
        {
            $cart = new Cart;
            $cart->user_id=$request->session()->get('user')['id'];
            $cart->product_id=$request->product_id;
            $cart->save();
           return redirect('/');
        }else{
             return redirect('/login');
        }

    }

    static function cartItem()
    {
     $userId=Session::get('user')['id'];
     return Cart::where('user_id',$userId)->count();
    // $userId = $request->session()->get('user')['id'];
    // return Cart::where('user_id', $userId)->count();
    }
    // function cartList()
    // {
    //     $userId=Session::get('user')['id'];
    //    $products= DB::table('cart')
    //     ->join('products','cart.product_id','=','products.id')
    //     ->where('cart.user_id',$userId)
    //     ->select('products.*','cart.id as cart_id')
    //     ->get();

    //     return view('cartlist',['products'=>$products]);
    // }

    
}

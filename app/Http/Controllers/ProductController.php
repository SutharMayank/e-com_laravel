<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
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
    public function cartList()
    {
        $userId=Session::get('user')['id'];
        $products= DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();

        return view('cartlist',['products'=>$products]);
    }

    public function removecart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }

    public function orderNow()
    {
        $userId=Session::get('user')['id'];
        $total = $products= DB::table('cart')
         ->join('products','cart.product_id','=','products.id')
         ->where('cart.user_id',$userId)
         ->sum('products.price');
 
         return view('ordernow',['total'=>$total]);
    }

    public function orderPlace(Request $request)
    {
        $userId=Session::get('user')['id'];
        $allCart= Cart::where('user_id',$userId)->get();
        foreach($allCart as $cart)
        {
             $order= new Order();
             $order->product_id=$cart['product_id'];
             $order->user_id=$cart['user_id'];
             $order->status="pending";
             $order->payment_method=$request->payment;
             $order->payment_status="pending";
             $order->address=$request->address;
             $order->save();
             Cart::where('user_id',$userId)->delete(); 
         }
         $request->input();
         return redirect('/');
    }

    function myOrders()
    {
        $userId=Session::get('user')['id'];
        $orders= DB::table('orders')
         ->join('products','orders.product_id','=','products.id')
         ->where('orders.user_id',$userId)
         ->get();
 
         return view('myorders',['orders'=>$orders]);
    }

    public function store(){
        return view('myproduct');

    }

    public function myproduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category' => 'required', // Assuming this is the correct field name
            'gallery' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);
        
        // Create a new Product instance
        $product = new Product();
        // Assign values to the Product model attributes
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category; // Corrected field name
        $product->description = $request->description;
        $product->gallery = $request->gallery; // This line seems incorrect, it should be $product->gallery = $request->gallery;
        
        // Handle image upload
        if ($request->hasFile('gallery')) {
            $gallery = $request->file('gallery');
            $imageName = time().'.'.$gallery->getClientOriginalExtension();
            $gallery->move('product', $imageName);
            $product->gallery = $imageName;
        }
        // Save the Product instance
        $product->save(); 
        // Redirect back to the index route
        return redirect('/');
        
}
}
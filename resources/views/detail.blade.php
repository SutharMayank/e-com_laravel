@extends('master')
@section('content')
    {{-- <h1>Hello</h1>
    <button class="btn btn-primary">Click</button> --}}
<div class="container">
<div class="row">
    <div class="col-sm-6">
    <img src="{{$product['gallery']}}" class="detail-img" alt="">
    </div>
    <div class="col-sm-6">
        <a href="/">Go Back</a>
        <h2>Name : {{$product['name']}}</h2>
        <h4>Price : {{$product['price']}}</h4>
        <h4>Category : {{$product['catergory']}}</h4>
        <h4>Description : {{$product['description']}}</h4>
        <br></br>
        <button class="btn btn-success">Add to Cart</button>
        <br><br>
        <button class="btn btn-primary">Buy Now</button>
    </div>
</div>
</div>
@endsection
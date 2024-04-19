@extends('master')
@section('content')
    {{-- <h1>Hello</h1>
    <button class="btn btn-primary">Click</button> --}}
<div class="custom-product">
          <div class="tranding-wrapper">
            <h3>Result For Products</h3>
            <div class="">
              @foreach ($product as $item)
              <div class="search-items">
                <a href="detail/{{$item['id']}}">
                <img class="tranding-img" src="{{$item['gallery']}}"  alt="">
                <div class="">
                <h2>{{$item['name']}}</h3>
                <h2>{{$item['description']}}</h3>

            </div>
                </a>
              </div>
              @endforeach
            </div>
          </div>
</div>
@endsection
@extends('master')
@section('content')
    {{-- <h1>Hello</h1>
    <button class="btn btn-primary">Click</button> --}}
<div class="custom-product">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            @csrf
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
          
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              @foreach ($products as $item)
              <div class="item {{$item['id']==1 ?'active':''}}">
                <a href="detail/{{$item['id']}}">
                  <img class="slider-img" src="{{$item['gallery']}}" alt="Chania">
                <div class="carousel-caption slider-text">
                <h3>{{$item['name']}}</h3>
                <p>{{$item['description']}}</p>
            </div>
                </a>
              </div>
          
              @endforeach
            </div>
          
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <div class="tranding-wrapper">
            <h1>Tranding Products</h1>
            <div class="">
              @foreach ($products as $item)
              <div class="tranding-items">
                <a href="detail/{{$item['id']}}">
                <img class="tranding-img" src="{{$item['gallery']}}"  alt="">
                <div class="">
                <h3>{{$item['name']}}</h3>
            </div>
                </a>
              </div>
              @endforeach
            </div>
          </div>
</div>
@endsection
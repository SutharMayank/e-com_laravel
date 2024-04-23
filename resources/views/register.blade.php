@extends('master')
@section('content')
    {{-- <h1>Hello</h1>
    <button class="btn btn-primary">Click</button> --}}
<div class="contanier custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4" >
            <form action="register" method="POST">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">User Name</label>
                <input type="text" class="form-control" name="name" placeholder="User Name">
              </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
              </form>
        </div>
    </div>
</div>
@endsection
@extends('layouts.main')
@section('body')
    <form action="/login" method="POST" class="login-body">
        @csrf
        <h1>Login</h1>
        @if (session()->has('success'))
        <div class="row d-flex justify-content-center product-detail-message">
            <div class="alert alert-success col-lg-8 d-flex justify-content-center" role="alert">
                {{ session('success') }}
            </div>
        </div>    
        @endif
        @if (session()->has('error'))
        <div class="row d-flex justify-content-center product-detail-message">
            <div class="alert alert-danger col-lg-8" role="alert">
                {{ session('error') }}
            </div>
        </div>    
        @endif
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <p>Dont have account yet ? <a href="/signup">Signup</a> here</p>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
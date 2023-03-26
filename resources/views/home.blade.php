@extends('layouts.main')
@section('body')
    @if (session()->has('success'))
    <div class="row d-flex justify-content-center product-detail-message">
        <div class="alert alert-success col-lg-8 d-flex justify-content-center" role="alert">
            {{ session('success') }}
        </div>
    </div>    
    @endif
    <div class="product-container">
        @foreach ($products as $product)
        <div class="card m-2" style="width: 18rem;">
            <img src="{{ $product->imgurl }}" style="width: auto" class="card-img-top" alt="...">
            <form action="/cart" method="POST">
              @csrf
              <div class="card-body pt-0 pb-0 m-0">
                <h5 class="card-title-home">{{ $product->name }}</h5>
                <p class="card-text pb-0">Rp {{ $product->price }} ,-</p>
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="btn btn-primary p-2 m-0">Add to cart</button>
              </div>
            </form>
        </div>
            
        @endforeach

    </div>
@endsection
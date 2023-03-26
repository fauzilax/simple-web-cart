@extends('layouts.main')
@section('body')
@if (session()->has('success'))
<div class="row d-flex justify-content-center product-detail-message">
    <div class="alert alert-success col-lg-8 d-flex justify-content-center" role="alert">
        {{ session('success') }}
    </div>
</div>    
@endif
    <div class="card mt-3">
            <div class="row">
                <div class=" cart pb-0">
                    <div class="title">
                        <div class="title-row">
                            <div class="col"><h4><b>Cart</b></h4></div>
                            <div class="col align-self-center text-right text-muted">{{ sizeof($carts) }} items</div>
                        </div><hr>
                    </div>
                    <form action="" method="post">
                        @foreach ($carts as $cart)                            
                            <div class="cart-product">
                                <div class="row main align-items-center">
                                    <div class="col-2"><img class="img-fluid" src="{{ $cart->product->imgurl }}"></div>
                                    <div class="col">
                                        <div class="row text-muted">Rp {{ floatval($cart->product->price) }}/pcs</div>
                                        <div class="row">{{ $cart->product->name }}</div>
                                    </div>
                                    <div class="col">
                                        <p>{{ $cart->quantity }}</p>
                                    </div>
                                    <div class="col">Rp {{ floatval($cart->product->price)*$cart->quantity }},-<span class="close delete-cart-item"><a href="/delete-cart/{{ $cart->id }}" onclick="return confirm('Hapus Produk dari Cart ?')"> &#10005;</a></span></div>
                                </div>
                            </div><hr>
                        @endforeach
    
                        
                        <div class="back-to-shop">
                            <a href="/">&leftarrow; <span class="text-muted">Back to shop</span></a>
                            <a href="/summary"  class="checkout-button" >Checkout</a>
                            
                        </div>
                    </form>
                </div>
                
            </div>
            
        </div>
@endsection
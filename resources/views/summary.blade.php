@extends('layouts.main')
@section('body')
    <div class="card mt-3">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col"><h4><b>Summary</b></h4></div>
                        <div class="col align-self-center text-right text-muted">{{ sizeof($carts) }} items</div><hr>
                    </div>
                </div>  
                @foreach ($carts as $cart)
                <div class="row">
                    <div class="row main align-items-center">
                        <div class="col-2"><img class="img-fluid" src="{{ $cart->product->imgurl }}"></div>
                        <div class="col">
                            <div class="row text-muted">{{ $cart->quantity }} pcs</div>
                            <div class="row">{{ $cart->product->name }}</div>   
                        </div>
                        <div class="col d-flex justify-content-end">Rp {{ floatval($cart->product->price)*$cart->quantity }},-</div>
                    </div>
                </div>
                    
                @endforeach  
                
            </div>
            <div class="col-md-4 summary">

                <div class="row">
                    <div class="col" style="padding-left:3;">ITEMS {{ sizeof($carts) }}</div>
                    <div class="col text-right">&euro; 132.00</div>
                </div>
                <div class="row mt-2">
                    <div class="col" style="padding-left:3;">Coupon</div>
                    <div class="col text-right">3 pcs</div>
                </div>
                <select class="mb-4 mt-2">
                    <option class="text-muted">Standard-Delivery- &euro;5.00</option>
                    <option class="text-muted">Standard-Delivery- &euro;5.00</option>
                    <option class="text-muted">Standard-Delivery- &euro;5.00</option>
                </select>
                <div class="row">
                    <div class="col" style="border-top: 1px solid rgba(0,0,0,.1);  padding-left:3;">Total Item</div>
                    <div class="col text-right">20 pcs</div>
                </div>
                <div class="row" style="padding: 2vh 0;">
                    <div class="col">TOTAL PRICE</div>
                    <div class="col text-right">&euro; 137.00</div>
                </div>
                <button class="btn btn-primary">Confirm</button>
            </div>
        </div>
        
    </div>
@endsection
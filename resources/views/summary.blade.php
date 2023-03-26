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
                <?php 
                    $prcTotal = 0;
                    $qtyTotal = 0;
                ?>
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
                <?php 
                    $prcTotal = $prcTotal + ((floatval($cart->product->price)*$cart->quantity));
                    $qtyTotal = $qtyTotal + $cart->quantity
                ?>
                @endforeach  
                
            </div>
            <div class="col-md-4 summary">
               
                <?php 
                    $couponSum = $prcTotal/100000;
                    if ($couponSum >= 0.5 && $couponSum < 1  ){
                        $couponSum = 1;
                    }else if ($couponSum < 0.5){
                        $couponSum = 0;
                    }
                
                ?>
                <div class="row mt-2">
                    <div class="col" style="padding-left:3;">Coupon</div>
                    <div class="col text-right">{{ floor($couponSum) }} pcs</div>
                </div>
                <form action="/confirm-checkout">
                    @csrf
                    <select class="mb-4 mt-2" name="coupon_id">
                        <option class="text-muted" value="" >Select Coupon here</option> 
                        <?php $cnt = 1 ?>
                        @foreach ($coupons as $coupon)
                            <?php 
                                if ($cnt>($couponSum)){
                                    break;
                                } 
                            ?>
                            <option class="text-muted" value="{{ $coupon->id }}">{{ $coupon->name }}</option>   
                            <?php $cnt++; ?>             
                        @endforeach
                    </select>
                    <hr>
                    <div class="row">
                        <div class="col" style="padding-left:3;">Total Item</div>
                        <div class="col text-right">{{ $qtyTotal }} pcs</div>
                    </div>
                    <div class="row" style="padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right">Rp {{ $prcTotal }},-</div>
                    </div>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="total" value="{{ $prcTotal }}">
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
        
    </div>
@endsection
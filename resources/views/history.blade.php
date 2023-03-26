@extends('layouts.main')
@section('body')
<div class="title-history" style="width: 100%; text-align:center;">
    <h1>Order History</h1>
</div>
<div class="history-body">
    @if ($histories->count())
        @foreach ($histories as $history)
            <div class="card">
                <div class="card-header d-flex ">
                    <div class="col pl-1 ">Belanja</div>
                    <?php 
                        $dateTimestamp = strtotime($history->order_date);
                        $nowTimestamp = time();
                        $diffInSeconds = $dateTimestamp - $nowTimestamp;
                        $diffInHours = floor($diffInSeconds / 3600);
                        if ($diffInHours <= -3) {
                            $state = 'Closed';
                        } else {
                            $state = 'Open';
                        }
                    ?>
                    {{ $history->order_date }}
                    <div class="col text-right pr-1">{{ $state }}</div>
                </div>
                <div class="card-body">
                <p class="card-text">Total Amount</p>
                <h5 class="card-title">Rp {{ floatval($history->total) }} ,-</h5>
                </div>
            </div>
            
        @endforeach
        
    @else
        <div class="empty-stat" style="width: 100%; text-align:center;">
            <h2>You Dont have order list yet</h2>
        </div>
    @endif
</div>
@endsection
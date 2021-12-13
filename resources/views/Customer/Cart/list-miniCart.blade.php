<?php

use Illuminate\Support\Facades\DB;

$count = 0;
$quanti_render=0; ?>
@foreach($data['cl_page'] as $item)
<li>
<?php $count += $item->price * $item->quantity;$quanti_render+=1; ?>
    <?php
    $size = DB::table('sizes')->where('id', $item->size_id)->first()->name;
    $color = DB::table('colors')->where('id', $item->color_id)->first()->name;
    ?>
    @if($quanti_render<=2)
    <div class="cart-img f-left">
        <a href="product-details.html">
            <img src="{{url('uploads')}}/{{$item->image}}" alt="" />
        </a>
    </div>
    <div class="cart-content f-left text-left">
        <h5>
            <a href="product-details.html">{!! Str::limit($item['name'],20 ) !!}</a>
        </h5>
        <div class="cart-price">
            <span class="ammount">{{$size}},</span>
            <span class="price">{{$color}}</span>
        </div>
        <div class="cart-price">
            <span class="ammount">{{$item->quantity}} <i class="fal fa-times"></i></span>
            <span class="price">$ {{$item->price}}</span>
        </div>
    </div>
    <div class="del-icon f-right mt-30">
        <a onclick="cart_remove_mini(<?= $item->id ?>)">
            <i class="fal fa-times"></i>
        </a>
    </div>
    @endif
    
</li>
@endforeach
<li>
    <div class="total-price">
        <span class="f-left">Tổng cộng:</span>
        <span class="f-right">$<?= $count; ?></span>
    </div>
</li>
<li>
    <div class="checkout-link">
        <a href="{{route('cartproduct')}}" class="os-btn">view Cart</a>
        <a class="os-btn os-btn-black" href="{{route('checkout')}}">Checkout</a>
    </div>
</li>
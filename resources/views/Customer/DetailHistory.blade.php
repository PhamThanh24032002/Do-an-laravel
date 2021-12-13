@extends('Customer.master.master')
@section('main')
<main>


    <!-- page title area start -->
    @if(($banner_page) != [])
    <section class="page__title p-relative d-flex align-items-center" data-background="{{url('imageBanner')}}/{{$banner_page->image}}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-inner text-center">
                        <h1>{{$banner_page->content}}</h1>
                        <div class="page__title-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Order History</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <section class="page__title p-relative d-flex align-items-center" data-background="http://thegioidohoacom.s3.ap-southeast-1.amazonaws.com/wp-content/uploads/2018/12/12020604/thi%E1%BA%BFt-k%E1%BA%BF-banner-m%E1%BB%B9-ph%E1%BA%A9m-61.png">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-inner text-center">
                        <h1>Your Order History</h1>
                        <div class="page__title-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Order History</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- page title area end -->

    <!-- Cart Area Strat-->
    <section class="cart-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="">#</th>
                                        <th class="product-thumbnail">Images</th>
                                        <th class="cart-product-name">Product</th>

                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">OK</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $totalprice = 0; ?>
                                    @foreach($orderDetail as $od)
                                    <tr>
                                        <td class="product-price">{{$loop->index+1}}</td>
                                        <td class="product-thumbnail"><a href="{{route('shop.detail',$od->product_id)}}"><img src="{{asset('uploads')}}/{{$od->image}}" alt=""></a></td>
                                        <td class="product-name"><a href="product-details.html">{{$od->name}}</a></td>

                                        <td class="product-quantity">
                                            {{$od->quantity}}
                                            <!-- <div class="cart-plus-minus"><input type="text" value="1" /></div> -->
                                        </td>
                                        <td class="product-subtotal"><span class="amount">${{($od->quantity)*($od->total_price)}}</span></td>
                                        <?php
                                        $totalprice = $totalprice + ($od->quantity * $od->total_price);
                                        ?>
                                        <td class="product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                        <button class="os-btn os-btn-black" name="apply_coupon" type="submit">Apply
                                            coupon</button>
                                    </div>
                                    <div class="coupon2">
                                        <a href="{{route('home')}}" class="os-btn os-btn-black" name="" type="submit">Go home</a href="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2> totals</h2>
                                    <ul class="mb-20">
                                        <li>Subtotal <span>$<?php echo "$totalprice" ?> </span></li>
                                        <li>Total <span>$<?php echo "$totalprice" ?></span></li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Area End-->
</main>
@stop
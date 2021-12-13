@extends('Customer.master.master')
@section('favorite','activesss')
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
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> favorite</li>
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
                    <h1>Favorite</h1>
                        <div class="page__title-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Favorite</li>
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
                                            <th class="product-thumbnail">Images</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="product-price">Unit Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="product-thumbnail"><a href="product-details.html"><img src="assets/img/shop/product/product-1.jpg" alt=""></a></td>
                                            <td class="product-name"><a href="product-details.html">Bakix Furniture</a></td>
                                            <td class="product-price"><span class="amount">$130.00</span></td>
                                            <td class="product-quantity">
                                                <button class="os-btn os-btn-black" type="submit">Add TO Cart</button>
                                            </td>
                                            <td class="product-subtotal"><span class="amount">$130.00</span></td>
                                            <td class="product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="product-thumbnail"><a href="product-details.html"><img src="assets/img/shop/product/product-10.jpg" alt=""></a></td>
                                            <td class="product-name"><a href="product-details.html">Sujon Chair Set</a></td>
                                            <td class="product-price"><span class="amount">$120.50</span></td>
                                            <td class="product-quantity">
                                                <button class="os-btn os-btn-black" type="submit">Add TO Cart</button>
                                            </td>
                                            <td class="product-subtotal"><span class="amount">$120.50</span></td>
                                            <td class="product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Cart Area End-->
    </main>

@stop
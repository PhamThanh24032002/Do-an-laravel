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
    @else
    <section class="page__title p-relative d-flex align-items-center" data-background="http://thegioidohoacom.s3.ap-southeast-1.amazonaws.com/wp-content/uploads/2018/12/12020604/thi%E1%BA%BFt-k%E1%BA%BF-banner-m%E1%BB%B9-ph%E1%BA%A9m-61.png">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-inner text-center">
                        <h1>Order History</h1>
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
    <!-- Order History Area Strat-->
    <section class="cart-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">#</th>
                                        <th class="cart-product-name">Order Code</th>
                                        <th class="product-price">Order Date</th>
                                        <th class="product-quantity">Order Status</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Optional</th>
                                        <th class="product-remove">Cancel Order</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getOrder as $go)
                                    <tr>
                                        <td class="product-thumbnail">{{$loop->index+1}}</td>
                                        <td class="product-name">{{$go->id}}</a></td>
                                        <td class="product-price">{{date('d/m/Y H:i',strtotime($go->created_at))}}</td>
                                        <td class="product-quantity">
                                            @switch($go->status)
                                            @case(0)
                                            <span class="text-secondary">Not yet process</span>
                                            @break
                                            @case(1)
                                            <span class="text-dark"> In process</span>
                                            @break
                                            @case(2)
                                            <span class="text-primary"> Transporting</span>
                                            @break
                                            @case(3)
                                            <span class="text-success"> Completed</span>
                                            @break
                                            @case(4)
                                            <span class="text-danger"> Canceled</span>
                                            @break

                                            @default
                                            <span>We do have some error here. Please reload the page.</span>
                                            @endswitch
                                        </td>
                                        <td class="product-subtotal"><span class="amount">${{$go->total_price}}</span></td>
                                        <td class="product-remove"><a href="{{route('detail_history',$go->id)}}">Take a look <i class="fas fa-play text-dark"></i></a></td>
                                        @if($go->status <= 2) <td class="product-remove"><a href="{{route('cancel_order',$go->id)}}"><i class="fas fa-times text-dark"></i></a></td>
                                            @else
                                            <td class="product-remove">Can't cancel this order</td>
                                            @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <a href="{{route('home')}}" class="os-btn os-btn-black" name="update_cart" type="submit">Back to home</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Total Moneys</h2>
                                    <ul class="mb-20">
                                        <li>Subtotal <span>${{$sum}}</span></li>
                                        <li>Total <span>${{$sum}}</span></li>
                                    </ul>
                                    <a class="os-btn" href="checkout.html">Respond and Comment</a>
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
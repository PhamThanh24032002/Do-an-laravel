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
                                    <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Checkout</li>
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
                    <h1>CONTACT US</h1>
                        <div class="page__title-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> checkout</li>
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

    <!-- coupon-area start -->
    <section class="coupon-area pt-100 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="coupon-accordion">
                        <!-- ACCORDION START -->
                        <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                        <div id="checkout-login" class="coupon-content">
                            <div class="coupon-info">
                                <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est
                                    sit amet ipsum luctus.</p>
                                <form action="#">
                                    <p class="form-row-first">
                                        <label>Username or email <span class="required">*</span></label>
                                        <input type="text" />
                                    </p>
                                    <p class="form-row-last">
                                        <label>Password <span class="required">*</span></label>
                                        <input type="text" />
                                    </p>
                                    <p class="form-row">
                                        <button class="os-btn os-btn-black" type="submit">Login</button>
                                        <label>
                                            <input type="checkbox" />
                                            Remember me
                                        </label>
                                    </p>
                                    <p class="lost-password">
                                        <a href="#">Lost your password?</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                        <!-- ACCORDION END -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="coupon-accordion">
                        <!-- ACCORDION START -->
                        <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                        <div id="checkout_coupon" class="coupon-checkout-content">
                            <div class="coupon-info">
                                <form action="#">
                                    <p class="checkout-coupon">
                                        <input type="text" placeholder="Coupon Code" />
                                        <button class="os-btn os-btn-black" type="submit">Apply Coupon</button>
                                    </p>
                                </form>
                            </div>
                        </div>
                        <!-- ACCORDION END -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- coupon-area end -->
    <!-- checkout-area start -->
    <section class="checkout-area pb-70">
        <div class="container">
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Name <span class="required">*</span></label>
                                        <input name="name" type="text" value="{{Auth::user()->name}}" placeholder="" />
                                        @if($errors->has('name'))
                                        <div>
                                            <p style="color: red">{{$errors->first('name')}}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input name="address" type="text" value="{{Auth::user()->address}}" placeholder="" />
                                        @if($errors->has('address'))
                                        <div>
                                            <p style="color: red">{{$errors->first('address')}}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input name="email" type="email" value="{{Auth::user()->email}}" placeholder="" />
                                        @if($errors->has('email'))
                                        <div>
                                            <p style="color: red">{{$errors->first('email')}}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input name="phone" type="text" value="{{Auth::user()->phone}}" placeholder="" />
                                        @if($errors->has('phone'))
                                        <div>
                                            <p style="color: red">{{$errors->first('phone')}}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="order-notes">
                                        <div class="checkout-form-list">
                                            <label>Order Notes</label>
                                            <textarea name="note" id="checkout-mess" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="your-order mb-30 ">
                            <h3>Your order</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Size</th>
                                            <th class="product-total">Color</th>
                                            <th class="product-total">Quantity</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $all_total = 0 ?>
                                        @foreach($cart as $value)
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                <strong class="product-quantity">{!! Str::limit($value->name,20 ) !!}</strong>
                                            </td>
                                            <td class="product-total">
                                                <span class="amount">{{$value->size_name}}</span>
                                            </td>
                                            <td class="product-total">
                                                <span class="amount">
                                                @if($value->size_name!="none")
                                                    {{$value->size_name}}
                                                @endif
                                                </span>
                                            </td>
                                            <td class="product-total">
                                                <span class="amount">
                                                @if($value->color_name!="none")    
                                                {{$value->color_name}}</span>
                                                @endif
                                            </td>
                                            <td class="product-total">
                                                 $ <span class="amount">{{$value->price*$value->quantity}}</span>
                                            </td>
                                        </tr>
                                        <?php $all_total += $value->price *  $value->quantity; ?>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <input name="total" value="<?= $all_total; ?>" type="hidden">
                                            <td><strong><span class="amount">$ <?= $all_total; ?></span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="payment-method">
                                <div class="accordion" id="accordionExample">
                                    
                                    
                                </div>
                                <div class="order-button-payment mt-20">
                                    <button type="submit" class="os-btn os-btn-black">Place order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- checkout-area end -->
</main>

@stop
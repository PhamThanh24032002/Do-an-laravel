<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from themepure.net/template/outstock-prv/outstock/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Sep 2021 07:28:38 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('assetsCustomer')}}/img/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/preloader.css">
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/slick.css">
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/metisMenu.css">
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/animate.min.css">
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/fontAwesome5Pro.css">
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/ionicons.min.css">
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/default.css">
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <style>
        .activesss a {
            color: red !important;
        }
    </style>
    <style type="text/css">
        .login_area {
            text-align: center;
            margin: 0 auto;
            width: 650px;
            font-family: work-Sans, sans-serif;
            background-color: #f6f7fb;
            display: block;
        }

        .login_area ul {
            margin: 0;
            padding: 0;
        }

        .login_area li {
            display: inline-block;
            text-decoration: unset;
        }

        .login_area a {
            text-decoration: none;
        }

        .login_area p {
            margin: 15px 0;
        }

        .login_area h5 {
            color: #444;
            text-align: left;
            font-weight: 400;
        }

        .login_area .text-center {
            text-align: center
        }

        .login_area .main-bg-light {
            background-color: #fafafa;
            box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);
        }

        .login_area .title {
            color: #444444;
            font-size: 22px;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 10px;
            padding-bottom: 0;
            text-transform: uppercase;
            display: inline-block;
            line-height: 1;
        }

        .login_area table {
            margin-top: 30px
        }

        .login_area table.top-0 {
            margin-top: 0;
        }

        .login_area table.order-detail,
        .order-detail th,
        .order-detail td {
            border: 1px solid #ddd;
            border-collapse: collapse;
        }

        .login_area .order-detail th {
            font-size: 16px;
            padding: 15px;
            text-align: center;
        }

        .login_area .footer-social-icon tr td img {
            margin-left: 5px;
            margin-right: 5px;
        }
    </style>
</head>

<body>

    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

        <!-- prealoder area start -->
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="first_object"></div>
                    <div class="object" id="second_object"></div>
                    <div class="object" id="third_object"></div>
                </div>
            </div>
        </div>
        <!-- prealoder area end -->

        <!-- header area start -->
        <header>
            <div id="header-sticky" class="header__area grey-bg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-1 col-lg-1 col-md-2 col-sm-2">
                            @if(($logo) != [])
                            <div class="logo">
                                <a href="{{route('home')}}"><img width="100px" height="50px" src="{{url('imagelogo')}}/{{$logo->image}}" alt="logo"></a>
                            </div>
                            @else
                            <div class="logo">
                                <a href="{{route('home')}}"><img width="100px" height="50px" src="https://abaha.link/images/abaha-logo.png" alt="logo"></a>
                            </div>
                            @endif



                        </div>
                        <div class="col-xl-11 col-lg-11 col-md-10 col-sm-10">
                            <div class="header__right p-relative d-flex justify-content-between align-items-center">
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul>
                                            <li class="@yield('home')"><a href="{{route('home')}}">Home</a>

                                            </li>
                                            <li class="@yield('shop')"><a href="{{route('shop.list')}}">Shop</a>

                                            </li>
                                            <li class="@yield('blog')"><a href="{{route('blog')}}">Blog</a>

                                            </li>
                                            <li class="@yield('pages')"><a href="shop.html">Pages</a>
                                                <ul class="submenu transition-3 ">
                                                    <li class="@yield('favorite')"><a href="{{route('favorite')}}">Wishlist</a></li>
                                                    <li><a href="{{route('cartproduct')}}">Shopping Cart</a></li>
                                                    <li class="@yield('checkout')"><a href="{{route('checkout')}}">Checkout</a></li>
                                                    <li class="@yield('registercus')"><a href="{{route('registercus')}}">Register</a></li>
                                                    <li class="@yield('logincus')"><a href="{{route('logincus')}}">Login</a></li>

                                                </ul>
                                            </li>
                                            <li class="@yield('contact')"><a href="{{route('contact')}}">Contact</a></li>
                                            @if(Auth::check())
                                            <li class="@yield('order_history')"><a href="{{route('order_history')}}">Order History</a></li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                                <div class="mobile-menu-btn d-lg-none">
                                    <a href="javascript:void(0);" class="mobile-menu-toggle"><i class="fas fa-bars"></i></a>
                                </div>
                                <div class="header__action">
                                    <ul>
                                        <li><a href="#" class="search-toggle"><i class="ion-ios-search-strong"></i> Search</a></li>
                                        @if(Auth::check())
                                        <li><a href="javascript:void(0);" class="cart" id="quantity-cart"><i class="ion-bag"></i> Cart <span>(<?= count($data['cl_page']) ?>)</span></a>
                                            <ul class="mini-cart" id="list-mini-body">
                                                <?php $count = 0; ?>
                                                @foreach($data['cl_page'] as $item)
                                                <li>
                                                    <?php
                                                    $size = DB::table('sizes')->where('id', $item['size_id'])->first()->name;
                                                    $color = DB::table('colors')->where('id', $item['color_id'])->first()->name;
                                                    ?>
                                                    <div class="cart-img f-left">
                                                        <a href="product-details.html">
                                                            <img src="{{url('uploads')}}/{{$item['image']}}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="cart-content f-left text-left">
                                                        <h5>
                                                            <a href="product-details.html">{{$item['name']}}</a>
                                                        </h5>
                                                        <div class="cart-price">
                                                            <span class="ammount">{{$size}},</span>
                                                            <span class="price">{{$color}}</span>
                                                        </div>
                                                        <div class="cart-price">
                                                            <span class="ammount">{{$item['quantity']}} <i class="fal fa-times"></i></span>
                                                            <span class="price">$ {{$item['price']}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="del-icon f-right mt-30">
                                                        <a onclick="cart_remove_mini(<?= $item['id'] ?>)">
                                                            <i class="fal fa-times"></i>
                                                        </a>
                                                    </div>
                                                    <?php $count += $item['price'] * $item['quantity']; ?>
                                                </li>
                                                @endforeach
                                                <li>
                                                    <div class="total-price">
                                                        <span class="f-left">Tổng cộng:</span>
                                                        <span class="f-right"><?= $count; ?> VND</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkout-link">
                                                        <a href="{{route('cartproduct')}}" class="os-btn">view Cart</a>
                                                        <a class="os-btn os-btn-black" href="{{route('checkout')}}">Checkout</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        @else
                                        <li><a href="javascript:void(0);" class="cart" id="quantity-cart"><i class="ion-bag"></i> Cart <span>0</span></a>
                                            <ul class="mini-cart" id="list-mini-body">
                                                <?php $count = 0; ?>

                                                <li>
                                                    <div class="total-price">
                                                        <span class="f-left">Tổng cộng:</span>
                                                        <span class="f-right">$ <?= $count; ?></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkout-link">
                                                        <a href="{{route('cartproduct')}}" class="os-btn">view Cart</a>
                                                        <a class="os-btn os-btn-black" href="{{route('checkout')}}">Checkout</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>

                                        @endif
                                        <li> <a href="javascript:void(0);" class="cart">
                                                @if(Auth::check())
                                                <img style="height: 40px;width:40px;border-radius:50%" src="{{url('uploads')}}/{{Auth::user()->image}}" alt="">
                                                @else
                                                <a href="{{route('logincus')}}"><i class="fas fa-sign-in-alt"></i>Login</a>
                                                @endif
                                            </a>
                                            @if(Auth::check())
                                            <ul class="extra-info">
                                                <li>
                                                    <div class="my-account">
                                                        <ul>
                                                            <li><a href="{{route('myaccount')}}">My Account</a></li>
                                                            <li><a href="{{route('changepasscus')}}">Change Password</a></li>
                                                            <li><a href="{{route('favorite')}}">Wishlist</a></li>
                                                            <li><a href="{{route('logout')}}">Logout</a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- scroll up area start -->
        <div class="scroll-up" id="scroll" style="display: none;">
            <a href="javascript:void(0);"><i class="fas fa-level-up-alt"></i></a>
        </div>
        <!-- scroll up area end -->

        <!-- search area start -->
        <section class="header__search white-bg transition-3">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="header__search-inner text-center">
                            <form action="#">
                                <div class="header__search-btn">
                                    <a href="javascript:void(0);" class="header__search-btn-close"><i class="fal fa-times"></i></a>
                                </div>
                                <div class="header__search-header">
                                    <h3>Search</h3>
                                </div>
                                <div class="header__search-categories">
                                    <ul class="search-category">
                                        <li><a href="shop.html">All Categories</a></li>
                                        <li><a href="shop.html">Accessories</a></li>
                                        <li><a href="shop.html">Chair</a></li>
                                        <li><a href="shop.html">Tablet</a></li>
                                        <li><a href="shop.html">Men</a></li>
                                        <li><a href="shop.html">Women</a></li>

                                    </ul>
                                </div>
                                <div class="header__search-input p-relative">
                                    <input type="text" placeholder="Search for products... ">
                                    <button type="submit"><i class="far fa-search"></i></button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="body-overlay transition-3"></div>
        <!-- search area end -->

        <!-- extra info area start -->
        <section class="extra__info transition-3">
            <div class="extra__info-inner">
                <div class="extra__info-close text-right">
                    <a href="javascript:void(0);" class="extra__info-close-btn"><i class="fal fa-times"></i></a>
                </div>
                <!-- side-mobile-menu start -->
                <nav class="side-mobile-menu d-block d-lg-none">
                    <ul id="mobile-menu-active">
                        <li class="activesss"><a href="{{route('home')}}">Home</a>

                        </li>
                        <li class="mega-menu "><a href="{{route('shop.list')}}">Shop</a>

                        </li>
                        <li class=""><a href="{{route('blog')}}">Blog</a>

                        </li>
                        <li class="has-dropdown"><a href="shop.html">Pages</a>
                            <ul class="submenu transition-3">
                                <li><a href="{{route('favorite')}}">Wishlist</a></li>
                                <li><a href="{{route('cartproduct')}}">Shopping Cart</a></li>
                                <li><a href="{{route('checkout')}}">Checkout</a></li>
                                <li><a href="{{route('registercus')}}">Register</a></li>
                                <li><a href="{{route('logincus')}}">Login</a></li>

                            </ul>
                        </li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                    </ul>
                </nav>
                <!-- side-mobile-menu end -->
            </div>
        </section>
        <div class="body-overlay transition-3"></div>
        <!-- extra info area end -->


        <main>


            <!-- page title area start -->
            <section class="page__title p-relative d-flex align-items-center" data-background="{{url('assetsCustomer')}}/img/page-title/page-title-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="page__title-inner text-center">
                                <h1>Complete Checkout</h1>
                                <div class="page__title-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center">
                                            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"> Complete Checkout</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- page title area end -->

            <!-- login Area Strat-->
            <section class="login-area text-center pt-100 pb-100">
                <div class="container">

                    <body class="" style="margin: 20px auto;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" style="padding: 0 30px;background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%;">
                            <tbody>
                                <tr>
                                    <td>
                                        <table style="width: 100%;" align="center" border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td><img src="../assets/images/email-template/delivery.png" alt="" style="margin-bottom: 30px;"></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="../assets/images/email-template/success.png" alt=""></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h2 class="title">thank you</h2>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Payment Is Successfully Processsed And Your Order Is On The Way</p>
                                                        <p>Order ID:{{$complete_checkout->id}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div style="border-top:1px solid #777;height:1px;margin-top: 30px;"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><img src="../assets/images/email-template/order-success.png" alt="" style="margin-top: 30px;"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table style="width: 100%" border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h2 class="title">YOUR ORDER DETAILS</h2>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table style="width: 100%" class="order-detail" border="0" cellpadding="0" cellspacing="0" align="left">
                                            <tbody>
                                                <tr align="left">
                                                    <th style="text-align: center;">PRODUCT</th>
                                                    <th style="text-align: center;">Name</th>
                                                    <th style="text-align: center;">SIZE</th>
                                                    <th style="text-align: center;">COLOR</th>
                                                    <th style="text-align: center;">QUANTITY</th>
                                                    <th style="text-align: center;">PRICE </th>
                                                </tr>
                                                <?php $count = 0; ?>
                                                @foreach($detail_checkout as $value)
                                                <tr>
                                                    <td><img src="{{url('uploads')}}/{{$value->image}}" alt="" width="130"></td>
                                                    <td valign="top">
                                                        <h5 style="font-size: 14px; color:#444;margin-top:15px"><b>{!! Str::limit($value->name,20 ) !!}</b></h5>
                                                    </td>
                                                    <td valign="top" style="text-align: center;">
                                                        <h5 style="font-size: 14px; color:#444;margin-top:15px"><b>
                                                            @if($value->size_name!="none")
                                                            {{$value->size_name}}
                                                            @endif
                                                        </b></h5>
                                                    </td>
                                                    <td valign="top" style="text-align: center;">
                                                        <h5 style="font-size: 14px; color:#444;margin-top:15px"><b>
                                                        @if($value->color_name!="none")
                                                            {{$value->color_name}}
                                                            @endif
                                                    </td>
                                                    <td valign="top" style="text-align: center;">
                                                        <h5 style="font-size: 14px; color:#444;margin-top:15px"><b>{{$value->quantity}}</b></h5>
                                                    </td>
                                                    <td valign="top" style="text-align: center;">
                                                        <h5 style="font-size: 14px; color:#444;margin-top:15px"><b>{{$value->price}}</b></h5>
                                                    </td>
                                                </tr>
                                                <?php $count += $value->price ?>
                                                @endforeach
                                                <tr>
                                                    <td colspan="2" style="line-height: 49px;font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">Total</td>
                                                    <td class="price" colspan="4" style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;"><b>$<?= $count ?></b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table style="width: 100%" cellpadding="0" cellspacing="0" border="0" align="left" style="width: 100%;margin-top: 30px;    margin-bottom: 30px;">
                                            <tbody>
                                                <tr>
                                                    <td style="font-size: 13px; font-weight: 400; color: #444444; letter-spacing: 0.2px;width: 50%;">
                                                        <h5 style="font-size: 16px; font-weight: 500;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">DILIVERY ADDRESS</h5>
                                                        <p style="text-align: center;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">{{$complete_checkout->address}}</p>
                                                    </td>
                                                    <td class="user-info" width="57" height="25"><img src="../assets/images/email-template/space.jpg" alt=" " height="25" width="57"></td>
                                                    <td class="user-info" style="font-size: 13px; font-weight: 400; color: #444444; letter-spacing: 0.2px;width: 50%;">
                                                        <h5 style="font-size: 16px;font-weight: 500;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">Phone</h5>
                                                        <p style="text-align: center;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">{{$complete_checkout->phone}}</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </body>
                </div>
            </section>
            <!-- login Area End-->
        </main>

        <section class="footer__area footer-bg">
            <div class="footer__top pt-100 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="footer__widget mb-30">
                                <div class="footer__widget-title mb-25">
                                    <a href="index-2.html"><img src="{{url('assetsCustomer')}}/img/logo/logo-2.png" alt="logo"></a>
                                </div>
                                <div class="footer__widget-content">
                                    <p>Outstock is a premium Templates theme with advanced admin module. It’s extremely customizable, easy to use and fully responsive and retina ready.</p>
                                    <div class="footer__contact">
                                        <ul>
                                            <li>
                                                <div class="icon">
                                                    <i class="fal fa-map-marker-alt"></i>
                                                </div>
                                                <div class="text">
                                                    <span>Add: 1234 Heaven Stress, Beverly Hill, Melbourne, USA.</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <i class="fal fa-envelope-open-text"></i>
                                                </div>
                                                <div class="text">
                                                    <span>Email: <a href="https://themepure.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e1a28e8f95808295a183809288829589848c84cf828e8c">[email&#160;protected]</a></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <i class="fal fa-phone-alt"></i>
                                                </div>
                                                <div class="text">
                                                    <span>Phone Number: (800) 123 456 789</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                            <div class="footer__widget mb-30">
                                <div class="footer__widget-title">
                                    <h5>information</h5>
                                </div>
                                <div class="footer__widget-content">
                                    <div class="footer__links">
                                        <ul>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Careers</a></li>
                                            <li><a href="#">Delivery Inforamtion</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                            <li><a href="#">Terms & Condition</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                            <div class="footer__widget mb-30">
                                <div class="footer__widget-title mb-25">
                                    <h5>Customer Service</h5>
                                </div>
                                <div class="footer__widget-content">
                                    <div class="footer__links">
                                        <ul>
                                            <li><a href="#">Shipping Policy</a></li>
                                            <li><a href="#">Help & Contact Us</a></li>
                                            <li><a href="#">Returns & Refunds</a></li>
                                            <li><a href="#">Online Stores</a></li>
                                            <li><a href="#">Terms & Conditions</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7">
                            <div class="footer__copyright">
                                <p>Copyright © <a href="index-2.html">Outstock</a> all rights reserved. Powered by <a href="index-2.html">basictheme</a></p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5">
                            <div class="footer__social f-right">
                                <ul>
                                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="#"><i class="fas fa-share-alt"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- footer area end -->

        <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="{{url('assetsCustomer')}}/js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="{{url('assetsCustomer')}}/js/vendor/jquery-3.5.1.min.js"></script>
        <script src="{{url('assetsCustomer')}}/js/vendor/waypoints.min.js"></script>
        <script src="{{url('assetsCustomer')}}/js/bootstrap.bundle.min.js"></script>
        <script src="{{url('assetsCustomer')}}/js/metisMenu.min.js"></script>
        <script src="{{url('assetsCustomer')}}/js/slick.min.js"></script>
        <script src="{{url('assetsCustomer')}}/js/jquery.fancybox.min.js"></script>
        <script src="{{url('assetsCustomer')}}/js/isotope.pkgd.min.js"></script>
        <script src="{{url('assetsCustomer')}}/js/owl.carousel.min.js"></script>
        <script src="{{url('assetsCustomer')}}/js/jquery-ui-slider-range.js"></script>
        <script src="{{url('assetsCustomer')}}/js/ajax-form.js"></script>
        <script src="{{url('assetsCustomer')}}/js/wow.min.js"></script>
        <script src="{{url('assetsCustomer')}}/js/imagesloaded.pkgd.min.js"></script>
        <script src="{{url('assetsCustomer')}}/js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
        @yield('js')
        @yield('djtme_js')
        <script>
            $('.ajax_wishlist').click(function(event) {
                let _id = this.id;
                // alert(_id);
                let css = (".ajax_wishlist_" + _id);
                // alert(css);
                $.ajax({
                    type: 'GET',
                    url: "{{route('ajax_wishlist')}}",
                    data: {
                        id_pro: _id
                    },
                    success: function(data) {
                        // alert("hehe");
                        // $('.test_nha').html(data);
                        if (data == "create") {
                            $(css).css("color", "yellow");
                        } else {
                            $(css).css("color", "black");
                        }

                    }
                })
            });

            function product_remove(id) {
                let _id = id;
                $.ajax({
                    type: 'GET',
                    url: "{{route('product_remove')}}",
                    data: {
                        id_pro: _id
                    },
                    success: function(data) {
                        $('#wishlist-body').html(data);
                    }
                })
            };

            $('.show-detail-quick').click(function(event) {
                let _id = this.id;
                // alert(_id);
                // alert("hehe");
                $.ajax({
                    type: 'GET',
                    url: "{{route('ajax_quick_cart')}}",
                    data: {
                        id_pro: _id
                    },
                    success: function(data) {
                        $('.product__modal-inner').html(data);
                    }
                })
            });

            function ajax_add_cart_mini(id, quantity = null) {
                // alert(id);

                price = parseFloat($("#n_price").text());
                if (quantity != null && quantity > 0 && $('#size').val() != 0) {

                    $.ajax({
                        type: 'GET',
                        url: "{{route('ajax_add_cart_mini')}}",
                        data: {
                            id_pro: id,
                            quantity_pro: quantity,
                            size_id: $('#size').val(),
                            color_id: $('#color').val(),
                            price: price
                        },
                        success: function(data) {
                            render_cart_mini();
                        }
                    })

                } else {
                    let temp = parseInt($("#quantity-product").val());
                    ajax_add_cart_mini(id, temp);
                }
                $('#productModalId').modal('toggle');
            }

            function change_detail_cart(id, quantity) {
                // alert("hhee");
                var price ="$"+ $("#size_" + id + " option:selected").attr("price") * (100 - $("#size_" + id + " option:selected").attr("sale")) / 100;
                // alert($('#size_' + id).val());
                if ($('#size_' + id).val() != 0) {
                    $.ajax({
                        type: 'GET',
                        url: "{{route('change_detail_cart')}}",
                        data: {
                            id_pro: id,
                            quantity_pro: quantity,
                            size_id: $('#size_' + id).val(),
                            color_id: $('#color_' + id).val(),
                            price_pro: parseFloat(price)
                        },
                        success: function(data) {
                            render_cart();
                            render_cart_mini();
                        }
                    })
                }
            }

            function cart_remove(id) {
                let _id = id;
                $.ajax({
                    type: 'GET',
                    url: "{{route('cart_remove')}}",
                    data: {
                        id: _id
                    },
                    success: function(data) {
                        render_cart();
                        render_cart_mini();
                    }
                })
            };

            function cart_remove_mini(id) {
                let _id = id;
                $.ajax({
                    type: 'GET',
                    url: "{{route('cart_remove_mini')}}",
                    data: {
                        id: _id
                    },
                    success: function() {
                        render_cart();
                        render_cart_mini();
                    }
                })
            };

            function render_cart_mini() {
                $.ajax({
                    type: 'GET',
                    url: "{{route('render_cart_mini')}}",
                    success: function(data) {
                        $('#list-mini-body').html(data.html);
                        $('#quantity-cart').text("Cart (" + data.quantity + ")");
                    }
                })
            }

            function render_cart() {
                $.ajax({
                    type: 'GET',
                    url: "{{route('render_cart')}}",
                    success: function(data) {
                        $('#listcart-body').html(data);
                    }
                })
            }

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imgUpload').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </body>

    <!-- Mirrored from themepure.net/template/outstock-prv/outstock/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Sep 2021 07:28:38 GMT -->

</html>
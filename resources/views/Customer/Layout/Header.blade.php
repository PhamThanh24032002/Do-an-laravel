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
                        <div class="logo">
                            @if(($logo) != [])
                            <a href="{{route('home')}}"><img width="100px" height="50px" src="{{url('imagelogo')}}/{{$logo->image}}" alt="logo"></a>
                            @else
                            <a href="{{route('home')}}"><img width="100px" height="50px" src="https://abaha.link/images/abaha-logo.png" alt="logo"></a>
                            @endif
                            
                        </div>
                    </div>
                    <div class="col-xl-11 col-lg-11 col-md-10 col-sm-10">
                        <div class="header__right p-relative d-flex justify-content-between align-items-center">
                            <div class="main-menu d-none d-lg-block" style="margin: 0 auto;padding-left: 51px;">
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
                                        <?php
                                            $quanti=0;
                                            $count = 0; ?>
                                            @foreach($data['cl_page'] as $item)
                                            <li>
                                            <?php $count += $item['price'] * $item['quantity']; 
                                            $quanti+=1;
                                            ?>
                                                <?php
                                                $size = DB::table('sizes')->where('id', $item['size_id'])->first()->name;
                                                $color = DB::table('colors')->where('id', $item['color_id'])->first()->name;
                                                ?>
                                                @if($quanti<=2)
                                                <div class="cart-img f-left">
                                                    <a href="product-details.html">
                                                        <img src="{{url('uploads')}}/{{$item['image']}}" alt="" />
                                                    </a>
                                                </div>
                                                <div class="cart-content f-left text-left">
                                                    <h5>
                                                        <a href="">{!! Str::limit($item['name'],20 ) !!}</a>
                                                    </h5>
                                                    <div class="cart-price">
                                                        @if($size!="none")
                                                        <span class="ammount">{{$size}}.</span>
                                                        @endif
                                                        @if($color!="none")
                                                        <span class="price">{{$color}}</span>
                                                        @endif
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
                                                @endif
                                                
                                            </li>
                                            @endforeach
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
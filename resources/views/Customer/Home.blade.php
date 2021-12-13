@extends('Customer.master.master') @section('main')
@section('tiêu đề','Home')
@section('home','activesss')


<main>
    <!-- slider area start -->
    @if(count($slider) != 0)
    <section class="slider__area p-relative">
        <div class="slider-active">
            @foreach ($slider as $Value)
            <div class="single-slider slider__height d-flex align-items-center" style="width: 1520px;" data-background="{{url('imageslider')}}/{{$Value->image}}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 col-12">
                            <div class="slider__content">
                                <h2 data-animation="fadeInUp" data-delay=".2s">{{$Value->name}}<br> </h2>
                                <p data-animation="fadeInUp" data-delay=".4s">{{$Value->name}}</p>
                                <a href="{{$Value->link}}" class="os-btn os-btn-2" data-animation="fadeInUp" data-delay=".6s">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @else
    <section class="slider__area p-relative">
        <div class="slider-active">

            <div class="single-slider slider__height d-flex align-items-center" style="width: 1520px;" data-background="https://adsplus.vn/wp-content/uploads/2018/12/nguyen-tac-thiet-ke-banner-pham-dep-ngat-ngay-07-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 col-12">
                            <div class="slider__content">
                                <h2 data-animation="fadeInUp" data-delay=".2s">Skincare Vô Địch<br> </h2>
                                <p data-animation="fadeInUp" data-delay=".4s">Không Có Phụ Nữ Xấu,Chỉ Có Phụ Nữ Không Skincare</p>
                                <a href="{{route('shop.list')}}" class="os-btn os-btn-2" data-animation="fadeInUp" data-delay=".6s">Go To Shop</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    @endif
    <!-- slider area end -->

    <!-- banner area start -->
    <div class="banner__area">
        <div class="container">
            <div class="banner__inner p-relative mt--95">
                <div class="row">
                    @if(count($topbanner) != 0)
                    @foreach($topbanner as $value)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="banner__item mb-30 p-relative">
                            <div class="banner__thumb fix">
                                <a href="{{$value->link}}" class="w-img"><img height="250px" style="object-fit: cover;" src="{{url('imageBanner')}}/{{$value->image}}" alt="banner"></a>
                            </div>
                            <div class="banner__content p-absolute transition-3">
                                <h5><a href="{{$value->links}}">{{$value->name}} </a></h5>
                                <a href="{{$value->links}}" class="link-btn">Discover now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="banner__item mb-30 p-relative">
                            <div class="banner__thumb fix">
                                <a href="" class="w-img"><img height="250px" style="object-fit: cover;" src="https://web5s.com.vn/baner-my-pham/imager_5_63329_700.jpg" alt="banner"></a>
                            </div>
                            <div class="banner__content p-absolute transition-3">
                                <h5><a href="">Sản Phẩm Da Mặt </a></h5>
                                <a href="{{route('shop.list')}}" class="link-btn">Đi Tới Sản Phẩm</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="banner__item mb-30 p-relative">
                            <div class="banner__thumb fix">
                                <a href="" class="w-img"><img height="250px" style="object-fit: cover;" src="https://web5s.com.vn/baner-my-pham/imager_5_63329_700.jpg" alt="banner"></a>
                            </div>
                            <div class="banner__content p-absolute transition-3">
                                <h5><a href="">Sản Phẩm Da Mặt </a></h5>
                                <a href="{{route('shop.list')}}" class="link-btn">Đi Tới Sản Phẩm</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="banner__item mb-30 p-relative">
                            <div class="banner__thumb fix">
                                <a href="" class="w-img"><img height="250px" style="object-fit: cover;" src="https://web5s.com.vn/baner-my-pham/imager_5_63329_700.jpg" alt="banner"></a>
                            </div>
                            <div class="banner__content p-absolute transition-3">
                                <h5><a href="">Sản Phẩm Da Mặt </a></h5>
                                <a href="{{route('shop.list')}}" class="link-btn">Đi Tới Sản Phẩm</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- banner area end -->

    <!-- product area start -->
    <section class="product__area pt-60 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section__title-wrapper text-center mb-55">
                        <div class="section__title mb-10">
                            <h2>New Products</h2>
                        </div>
                        <div class="section__sub-title">
                            <p>Mirum est notare quam littera gothica quam nunc putamus parum claram!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($new_product as $value)
                <div class="col-xl-3">
                    <div class="product__wrapper mb-60">
                        <div class="product__thumb">
                            <a class="w-img" href="{{route('shop.detail',$value->id)}}">
                                <img style="width: 250px; height: 250px; object-fit: cover; " src="{{url('uploads')}}/{{$value->image}}" alt="product-img">
                                @if($anh_phu[$value->id] !=null)
                                <img class="product__thumb-2" style="width: 250px; height: 250px; object-fit: cover; " src="{{url('uploads')}}/{{$anh_phu[$value->id]->image}}" alt="product-img">
                                @endif
                            </a>
                            <div class="product__action transition-3">
                                <?php $tmp = false; ?>
                                @if(Auth::check())
                                @foreach($data['listFavorite'] as $item)
                                @if($item->product_id==$value->id)
                                <a class="ajax_wishlist ajax_wishlist_{{$value->id}}" style="color: yellow;" data-toggle="tooltip" id="{{$value->id}}" data-placement="top" title="Add to Wishlist">
                                    <i class="fas fa-heart icon_heart{{$value->id}}"></i>
                                </a>
                                <?php $tmp = true; ?>
                                @break;
                                @endif
                                @endforeach
                                @if($tmp==false)
                                <a class="ajax_wishlist ajax_wishlist_{{$value->id}}" data-toggle="tooltip" id="{{$value->id}}" data-placement="top" title="Add to Wishlist">
                                    <i class="fal fa-heart icon_heart{{$value->id}}"></i>
                                </a>
                                @endif
                                @else
                                <a href="{{route('logincus')}}" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                    <i class="fal fa-heart"></i>
                                </a>
                                @endif
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Compare">
                                    <i class="fal fa-sliders-h"></i>
                                </a>
                                <!-- Button trigger modal -->
                                @if(Auth::check())
                                <a href="#" class="show-detail-quick" data-toggle="modal" data-target="#productModalId" id="{{$value->id}}">
                                    <i class="fal fa-search"></i>
                                </a>
                                @else
                                <a href="{{route('logincus')}}">
                                    <i class="fal fa-search"></i>
                                </a>
                                @endif

                            </div>
                        </div>
                        <div class="product__content p-relative">
                            <div class="product__content-inner">
                                <h4><a href="{{route('shop.detail',$value->id)}}">{{$value->name}}</a></h4>
                                <div class="product__price transition-3">
                                    @if(($value->sale_price) > 0)
                                    <span>${{$value->sale_price}}</span>
                                    @endif
                                    <span class="old-price">${{$value->price}}</span>
                                </div>
                            </div>
                            <!-- <div class="add-cart p-absolute transition-3">
                                <a href="{{route('shop.detail',$value->id)}}">+ Add to Cart</a>
                            </div> -->
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="product__load-btn text-center mt-25">
                    <a href="{{route('shop.list')}}" class="os-btn os-btn-3">Go To Shop</a>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- product area end -->

    <!-- banner area start -->
    <div class="banner__area-2 pb-60">
        <div class="container-fluid p-0">
            @if(count($banner) != 0)
            <div class="row no-gutters">
                @foreach ($banner as $value)
                <div class="col-xl-6 col-lg-6">
                    <div class="banner__item-2 banner-right p-relative mb-30 pr-15">
                        <div class="banner__thumb fix">
                            <a href="product-details.html" class="w-img"><img height="330px" style="object-fit: cover;" src="{{url('imageBanner')}}/{{$value->image}}" alt="banner"></a>
                        </div>
                        <div class="banner__content-2 p-absolute transition-3">
                            <span>Products Essentials</span>
                            <h4><a href="chu_nho.html">{{$value->name}}</a></h4>
                            <p>Mirum est notare quam littera gothica, quam nunc putamus <br> parum claram, anteposuerit litterarum formas.</p>
                            <a href="{{$value->links}}" class="os-btn os-btn-2">buy now </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="row no-gutters">
                <div class="col-xl-6 col-lg-6">
                    <div class="banner__item-2 banner-right p-relative mb-30 pr-15">
                        <div class="banner__thumb fix">
                            <a href="product-details.html" class="w-img"><img height="330px" style="object-fit: cover;" src="https://rubicmarketing.com/wp-content/uploads/2021/08/thiet-ke-banner-my-pham-2.jpg" alt="banner"></a>
                        </div>
                        <div class="banner__content-2 p-absolute transition-3">
                            <span>Products Essentials</span>
                            <h4><a href="{{route('shop.list')}}">Danh Mục Skincare</a></h4>
                            <p>Mirum est notare quam littera gothica, quam nunc putamus <br> parum claram, anteposuerit litterarum formas.</p>
                            <a href="{{route('shop.list')}}" class="os-btn os-btn-2">buy now </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="banner__item-2 banner-right p-relative mb-30 pr-15">
                        <div class="banner__thumb fix">
                            <a href="product-details.html" class="w-img"><img height="330px" style="object-fit: cover;" src="https://intphcm.com/data/upload/banner-my-pham-nam.jpg" alt="banner"></a>
                        </div>
                        <div class="banner__content-2 p-absolute transition-3">
                            <span>Products Essentials</span>
                            <h4><a href="{{route('shop.list')}}">Danh Mục Skincare</a></h4>
                            <p>Mirum est notare quam littera gothica, quam nunc putamus <br> parum claram, anteposuerit litterarum formas.</p>
                            <a href="{{route('shop.list')}}" class="os-btn os-btn-2">buy now </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- banner area end -->

    <!-- sale off area start -->
    <section class="sale__area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section__title-wrapper text-center mb-55">
                        <div class="section__title mb-10">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="section__sub-title">
                            <p>Mirum est notare quam littera gothica quam nunc putamus parum claram!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="sale__area-slider owl-carousel">
                        @foreach ($sale_product as $sale)

                        <div class="sale__item">
                            <div class="product__wrapper mb-60">
                                <div class="product__thumb">
                                    <a class="w-img" href="{{route('shop.detail',$sale->id)}}">
                                        <img style=" height: 250px; object-fit: cover; " src="{{url('uploads')}}/{{$sale->image}}" alt="product-img">

                                    </a>
                                    <div class="product__action transition-3">
                                        <?php $tmp = false; ?>
                                        @if(Auth::check())
                                        @foreach($data['listFavorite'] as $item)
                                        @if($item->product_id==$sale->id)
                                        <a class="ajax_wishlist ajax_wishlist_{{$sale->id}}" style="color: yellow;" data-toggle="tooltip" id="{{$sale->id}}" data-placement="top" title="Add to Wishlist">
                                            <i class="fas fa-heart icon_heart{{$sale->id}}"></i>
                                        </a>
                                        <?php $tmp = true; ?>
                                        @break;
                                        @endif
                                        @endforeach
                                        @if($tmp==false)
                                        <a class="ajax_wishlist ajax_wishlist_{{$sale->id}}" data-toggle="tooltip" id="{{$sale->id}}" data-placement="top" title="Add to Wishlist">
                                            <i class="fal fa-heart icon_heart{{$sale->id}}"></i>
                                        </a>
                                        @endif
                                        @else
                                        <a href="{{route('logincus')}}" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                            <i class="fal fa-heart"></i>
                                        </a>
                                        @endif
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare">
                                            <i class="fal fa-sliders-h"></i>
                                        </a>
                                        <!-- Button trigger modal -->
                                        @if(Auth::check())
                                        <a href="#" class="show-detail-quick" data-toggle="modal" data-target="#productModalId" id="{{$sale->id}}">
                                            <i class="fal fa-search"></i>
                                        </a>
                                        @else
                                        <a href="{{route('logincus')}}">
                                            <i class="fal fa-search"></i>
                                        </a>
                                        @endif

                                    </div>
                                    <div class="product__sale">
                                        @if ($sale->id == $sale->id)
                                        <span class="new">new</span>
                                        @endif
                                        @if($sale->id == $sale->id || $sale->sale_price >0)
                                        <span class="new">sale</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="product__content p-relative">
                                    <div class="product__content-inner">
                                        <h4><a href="{{route('shop.detail',$sale->id)}}">{{$sale->name}}</a></h4>
                                        <div class="product__price transition-3">
                                            @if(($sale->sale_price) > 0)
                                            <span>${{$sale->sale_price}}</span>
                                            @endif
                                            <span class="old-price">${{$sale->price}}</span>
                                        </div>
                                    </div>
                                    <!-- <div class="add-cart p-absolute transition-3">
                                        <a href="{{route('shop.detail',$sale->id)}}">+ Add to Cart</a>
                                      
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sale off area end -->

    <!-- client slider area start -->
    <section class="client__area pt-15 pb-140">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="client__slider owl-carousel text-center">
                        <div class="client__thumb">
                            <a href="#"><img src="{{url('assetsCustomer')}}/img/client/client-1.jpg" alt="client"></a>
                        </div>
                        <div class="client__thumb">
                            <a href="#"><img src="{{url('assetsCustomer')}}/img/client/client-2.jpg" alt="client"></a>
                        </div>
                        <div class="client__thumb">
                            <a href="#"><img src="{{url('assetsCustomer')}}/img/client/client-3.jpg" alt="client"></a>
                        </div>
                        <div class="client__thumb">
                            <a href="#"><img src="{{url('assetsCustomer')}}/img/client/client-4.jpg" alt="client"></a>
                        </div>
                        <div class="client__thumb">
                            <a href="#"><img src="{{url('assetsCustomer')}}/img/client/client-5.jpg" alt="client"></a>
                        </div>
                        <div class="client__thumb">
                            <a href="#"><img src="{{url('assetsCustomer')}}/img/client/client-4.jpg" alt="client"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- client slider area end -->

    <!-- blog area start -->
    <section class="blog__area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section__title-wrapper text-center mb-55">
                        <div class="section__title mb-10">
                            <h2>Our Blog Posts</h2>
                        </div>
                        <div class="section__sub-title">
                            <p>Mirum est notare quam littera gothica quam nunc putamus parum claram!</p>
                        </div>
                    </div>
                </div>
            </div>
            @if(count($Latest) != 0)
            <div class="row">
                <div class="col-xl-12">
                    <div class="blog__slider owl-carousel">
                        @foreach ($Latest as $value )


                        <div class="blog__item mb-30">
                            <div class="blog__thumb fix">
                                <a href="{{route('blog_detail',$value->id)}}" class="w-img"><img src="{{url('assetsCustomer')}}/img/blog/blog-1.jpg" alt="blog"></a>
                            </div>
                            <div class="blog__content">
                                <h4><a href="{{route('blog_detail',$value->id)}}">{!! Str::limit($value->title, 25) !!}</a></h4>
                                <div class="blog__meta">
                                    <span>By <a href="#">Shahnewaz Sakil</a></span>
                                    <span>/ September 14, 2017</span>
                                </div>
                                <p>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d F Y');}}</p>
                                <a href="{{route('blog_detail',$value->id)}}" class="os-btn">read more</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-xl-12">
                    <div class="blog__slider owl-carousel">
                        <div class="blog__item mb-30">
                            <div class="blog__thumb fix">
                                <a href="{{route('blog')}}" class="w-img"><img src="https://hali.vn/wp-content/uploads/2020/07/thiet-ke-banner-my-pham38.jpg" alt="blog"></a>
                            </div>
                            <div class="blog__content">
                                <h4><a href="{{route('blog')}}">Son Dưỡng Ban Đêm Cho Phái Nữ</a></h4>
                                <div class="blog__meta">
                                    <span>By <a href="#">Shahnewaz Sakil</a></span>
                                    <span>/ September 14, 2017</span>
                                </div>
                                <p></p>
                                <a href="{{route('blog')}}" class="os-btn">Go To Blog</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="blog__slider owl-carousel">
                        <div class="blog__item mb-30">
                            <div class="blog__thumb fix">
                                <a href="{{route('blog')}}" class="w-img"><img src="https://hali.vn/wp-content/uploads/2020/07/thiet-ke-banner-my-pham38.jpg" alt="blog"></a>
                            </div>
                            <div class="blog__content">
                                <h4><a href="{{route('blog')}}">Son Dưỡng Ban Đêm Cho Phái Nữ</a></h4>
                                <div class="blog__meta">
                                    <span>By <a href="#">Shahnewaz Sakil</a></span>
                                    <span>/ September 14, 2017</span>
                                </div>
                                <p></p>
                                <a href="{{route('blog')}}" class="os-btn">Go To Blog</a>
                            </div>
                        </div>

                    </div>

                </div>
                @endif
            </div>
    </section>
    <!-- blog area end -->

    <!-- subscribe area start -->
    <section class="subscribe__area pb-100">
        <div class="container">
            <div class="subscribe__inner pt-95">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2">
                        <div class="subscribe__content text-center">
                            <h2>Get Discount Info</h2>
                            <p>Subscribe to the Outstock mailing list to receive updates on new arrivals, special offers and other discount information.</p>
                            <div class="subscribe__form">
                                <form action="#">
                                    <input type="email" placeholder="Subscribe to our newsletter...">
                                    <button class="os-btn os-btn-2 os-btn-3">subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe area end -->

    <!-- shop modal start -->
    <!-- Modal -->
    <div class="modal fade" id="productModalId" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered product-modal" role="document">
            <div class="modal-content">
                <div class="product__modal-wrapper p-relative">
                    <div class="product__modal-close p-absolute">
                        <button data-dismiss="modal"><i class="fal fa-times"></i></button>
                    </div>
                    <div class="product__modal-inner">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop modal end -->
</main>

<!-- footer area start -->

<!-- footer area end -->

<!-- JS here -->

@stop
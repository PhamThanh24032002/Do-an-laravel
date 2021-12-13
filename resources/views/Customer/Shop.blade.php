@extends('Customer.master.master')
@section('main')
@section('shop','activesss')
<main>

    <!-- page title area start -->
    @if(($banner_page) != [])
    <section class="page__title p-relative d-flex align-items-center" data-background="{{url('imageBanner')}}/{{$banner_page->image}}"
        data-background="{{url('assetsCustomer')}}/img/page-title/page-title-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-inner text-center">
                        <h1>{{$banner_page->content}}</h1>
                        <div class="page__title-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> shop</li>
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
                    <h1>Shop </h1>
                        <div class="page__title-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Shop </li>
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

    <!-- shop area start -->
    <section class="shop__area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-4">
                    <div class="shop__sidebar">
                        <div class="sidebar__widget mb-55">
                            <div class="sidebar__widget-title mb-25">
                                <h3>Product Categories</h3>
                            </div>
                      
                            <!-- <ul>
                                <li><a href="">aaaa</a></li>
                                <li><a href="">aaaa</a></li>
                                <li><a href="">aaaa</a></li>
                            </ul> -->


                            <div class="sidebar__widget-content">
                                <form action="{{route('shop.list')}}" method="get" id="frmCateFilter">
                                    <div class="categories sort-wrapper">
                                        <select class="col-12" id="cateFilter" name="cateFilter">
                                            <option value="" class="text-center">---------filter---------</option>
                                            <?php showCCategories($Cate) ?>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- price filter -->
                        <form action="{{route('shop.list')}}" method="get" id="frmFilter">
                            <!-- @csrf -->
                            <div class="sidebar__widget mb-55">
                                <div class="sidebar__widget-title mb-30">
                                    <h3>Filter By Price</h3>
                                </div>
                                <div class="sidebar__widget-content">
                                    <div class="price__slider">
                                        <div id="slider-range"></div>
                                        <div>

                                            <label for="amount">Price :</label>
                                            <input type="text" id="amount" name="priceFilter" readonly>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Filter size  -->
                            <div class="sidebar__widget mb-55">
                                <div class="sidebar__widget-title mb-30">
                                    <h3>Any Size</h3>
                                </div>
                                <div class="sidebar__widget-content">
                                    <div class="size">
                                        <ul>
                                            @foreach($size as $s)
                                            <li class="m-0"><label class="container1">
                                                    <input type="checkbox" name="sizeFilter[]" value="{{$s->id}}"
                                                        id="sizeFilter"><span
                                                        class="checkmark text-dark">{{$s->name}}</span></label></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Filter color  -->
                            <div class="sidebar__widget mb-60">
                                <div class="sidebar__widget-title mb-20">
                                    <h3>Choose Color</h3>
                                </div>
                                <div class="sidebar__widget-content">
                                    <div class="color__pick">
                                        <form action="#">
                                            <ul>
                                                @foreach($color as $c)
                                                <li class="m-0"><label class="container1"
                                                        style="background: {{$c->values}};">
                                                        <input type="checkbox" name="colorFilter[]" class="colorFilter"
                                                            value="{{$c->id}}">
                                                        <span style="background: {{$c->values}};"
                                                            class="checkmark text-dark colorFilterBtn"
                                                            id=""></span></label></li>

                                                @endforeach
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-dark" type="submit" id="btnFilter">Submit</button>
                        </form>

                        <div class="sidebar__widget">
                            <div class="sidebar__widget-title mb-30 mt-30">
                                <h3>Featured Products</h3>
                            </div>
                            <div class="sidebar__widget-content">
                                <div class="features__product">
                                    <ul>
                                        @foreach($proFeature as $pF)
                                        <li class="mb-20">
                                            <div class="featires__product-wrapper d-flex">
                                                <div class="features__product-thumb mr-15">
                                                    <a href="{{route('shop.detail',$pF->id)}}"><img
                                                            src="{{asset('uploads')}}/{{$pF->image}}" width="86px"
                                                            height="110px" alt="pro-sm-1"></a>
                                                </div>
                                                <div class="features__product-content">
                                                    <h5><a href="{{route('shop.detail',$pF->id)}}">{{$pF->name}}</a>
                                                    </h5>
                                                    <div class="price">
                                                        <span>{{$pF->price}}$</span>
                                                        <!-- <span class="price-old">$128</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-8">
                    <div class="shop__content-area">
                        <div class="shop__header d-sm-flex justify-content-between align-items-center mb-40">
                            <div class="shop__header-left">
                                <div class="show-text">
                                    <span id="demo">Hiển thị {{$countPro}} trong tổng số {{$quantityAllProduct}} sản
                                        phẩm</span>
                                </div>
                            </div>
                            <div
                                class="shop__header-right d-flex align-items-center justify-content-between justify-content-sm-end">
                                <form action="{{route('shop.list')}}" method="GET" id="Sort">
                                    <div class="sort-wrapper mr-30 pr-25 p-relative">
                                        <button type="submit" class="btn">Sắp xếp theo: </button>
                                        <select name="orderBy" wire:model="sorting">
                                            <option value="default" selected>Mặc định</option>
                                            <option value="name">Tên</option>
                                            <!-- <option value="priceAsc">Giá: Thấp đến cao</option>
                                            <option value="priceDesc">Giá: Cao đến thấp</option> -->
                                            <option value="new">Mới nhất</option>
                                            <option value="sale">Đang hạ giá</option>
                                        </select>
                                    </div>
                                </form>
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-grid-tab" data-toggle="pill"
                                            href="#pills-grid" role="tab" aria-controls="pills-grid"
                                            aria-selected="true"><i class="fas fa-th"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-list-tab" data-toggle="pill" href="#pills-list"
                                            role="tab" aria-controls="pills-list" aria-selected="false"><i
                                                class="fas fa-list-ul"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- main content  -->
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-grid" role="tabpanel"
                                aria-labelledby="pills-grid-tab">
                                <div class="row custom-row-10">
                                    @if(count($product)>0)
                                    @foreach($product as $p)
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 custom-col-10">
                                        <div class="product__wrapper mb-60">
                                            <div class="product__thumb">
                                                <a href="{{route('shop.detail',$p->id)}}" class="w-img">
                                                    <img style="width: 250px; height: 250px; object-fit: cover; " src="{{asset('uploads')}}/{{$p->image}}" alt="product-img">
                                                    <img style="width: 250px; height: 250px; object-fit: cover; " class="product__thumb-2"
                                                        src="{{asset('uploads')}}/{{$sub_img[$p->id]}}"
                                                        alt="product-img">
                                                </a>
                                                <div class="product__action transition-3">
                                                    <?php $tmp = false; ?>
                                                    @if(Auth::check())
                                                    @foreach($data['listFavorite'] as $item)
                                                    @if($item->product_id==10)
                                                    <a class="ajax_wishlist ajax_wishlist_{{$p->id}}"
                                                        style="color: yellow;" data-toggle="tooltip" id="{{$p->id}}"
                                                        data-placement="top" title="Add to Wishlist">
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <?php $tmp = true; ?>
                                                    @break;
                                                    @endif
                                                    @endforeach
                                                    @if($tmp==false)
                                                    <a class="ajax_wishlist ajax_wishlist_{{$p->id}}"
                                                        data-toggle="tooltip" id="{{$p->id}}" data-placement="top"
                                                        title="Add to Wishlist">
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    @endif
                                                    @else
                                                    <a href="{{route('logincus')}}" data-toggle="tooltip"
                                                        data-placement="top" title="Add to Wishlist">
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    @endif
                                                    <a href="#" data-toggle="tooltip" data-placement="top"
                                                        title="Compare">
                                                        <i class="fal fa-sliders-h"></i>
                                                    </a>
                                                    <!-- Button trigger modal -->
                                                    <a href="#" class="show-detail-quick" data-toggle="modal"
                                                        data-target="#productModalId" id="{{$p->id}}">
                                                        <i class="fal fa-search"></i>
                                                    </a>

                                                </div>
                                                <div class="product__sale">
                                                    @if($p->created_at > $a)
                                                        <span class="new">new</span>
                                                    @else
                                                    @endif

                                                    @if($p->sale_price)
                                                    <span class="percent">{{$p->sale_price}}%</span>
                                                    @else
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product__content p-relative">
                                                <div class="product__content-inner">
                                                    <h4><a href="{{route('cartproduct',$p->id)}}">{{$p->name}}</a></h4>
                                                    <div class="product__price transition-3">
                                                        <span>${{$p->price}}</span>
                                                        <!-- <span class="old-price">$96.00</span> -->
                                                    </div>
                                                </div>
                                                <!-- <div class="add-cart p-absolute transition-3">
                                                    <a href="{{route('cartproduct',$p->id)}}">+ Add to Cart</a>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <h3 class="m-auto">Không tồn tại sản phẩm, hãy thử tìm kiếm lại</h3>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-list" role="tabpanel" aria-labelledby="pills-list-tab">
                                @if(count($product)>0)
                                @foreach($product as $p)
                                <div class="product__wrapper mb-40">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="product__thumb">
                                                <a href="product-details.html" class="w-img">
                                                    <img src="{{asset('uploads')}}/{{$p->image}}" alt="product-img">
                                                    <img class="product__thumb-2"
                                                        src="{{asset('uploads')}}/{{$sub_img[$p->id]}}"
                                                        alt="product-img">
                                                </a>
                                                <div class="product__sale ">
                                                    <span class="new">new</span>
                                                    <span class="percent">-16%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-8">
                                            <div class="product__content p-relative">
                                                <div class="product__content-inner list">
                                                    <h4><a href="#">{{$p->name}}</a></h4>
                                                    <div class="product__price-2 mb-10">
                                                        <span>${{$p->price}}</span>
                                                        <!-- <span class="old-price">$96.00</span> -->
                                                    </div>
                                                    {!!$p->desscription!!}
                                                </div>
                                                <div class="add-cart-list d-sm-flex align-items-center">
                                                   
                                                    <div class="product__action transition-3">
                                                        <?php $tmp = false; ?>
                                                        @if(Auth::check())
                                                        @foreach($data['listFavorite'] as $item)
                                                        @if($item->product_id==10)
                                                        <a class="ajax_wishlist ajax_wishlist_{{$p->id}}"
                                                            style="color: yellow;" data-toggle="tooltip" id="{{$p->id}}"
                                                            data-placement="top" title="Add to Wishlist">
                                                            <i class="fal fa-heart"></i>
                                                        </a>
                                                        <?php $tmp = true; ?>
                                                        @break;
                                                        @endif
                                                        @endforeach
                                                        @if($tmp==false)
                                                        <a class="ajax_wishlist ajax_wishlist_{{$p->id}}"
                                                            data-toggle="tooltip" id="{{$p->id}}" data-placement="top"
                                                            title="Add to Wishlist">
                                                            <i class="fal fa-heart"></i>
                                                        </a>
                                                        @endif
                                                        @else
                                                        <a href="{{route('logincus')}}" data-toggle="tooltip"
                                                            data-placement="top" title="Add to Wishlist">
                                                            <i class="fal fa-heart"></i>
                                                        </a>
                                                        @endif
                                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                                            title="Compare">
                                                            <i class="fal fa-sliders-h"></i>
                                                        </a>
                                                        <!-- Button trigger modal -->
                                                        <a href="#" class="show-detail-quick" data-toggle="modal"
                                                            data-target="#productModalId" id="{{$p->id}}">
                                                            <i class="fal fa-search"></i>
                                                        </a>

                                                    </div>
                                                </div>
                                                <!-- shop modal start -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- shop modal end -->
                                @endforeach
                                @else
                                <h3 class="m-auto">Không tồn tại sản phẩm, hãy thử tìm kiếm lại</h3>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-40">
                            <div class="col-xl-12">
                                <div
                                    class="shop-pagination-wrapper d-md-flex justify-content-between align-items-center">
                                    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                                        @if($hasFilter==0)
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="{{($product->currentPage() == 1)? 'page-link d-none' : 'page-link'}}"
                                                    href="{{$product->previousPageUrl()}}" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            @for($i = 1; $i <= $product->lastPage() ;$i++ )
                                                <li
                                                    class="{{($product->currentPage() == $i)? 'page-item active' : 'page-item'}}">
                                                    <a class="page-link" href="{{$product->url($i)}}">{{$i}}</a>
                                                </li>
                                                @endfor
                                                <li class="page-item">
                                                    <a class="{{($product->currentPage() == $product->lastPage())? 'page-link d-none' : 'page-link'}}"
                                                        href="{{$product->nextPageUrl()}}" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                        </ul>
                                        @else()
                                        @endif
                                    </nav>

                                    <div class="shop__header-left">
                                        <div class="show-text bottom">
                                            <span>Hiển thị {{$countPro}} trong tổng số {{$quantityAllProduct}} sản
                                                phẩm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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


<style>
/* The container1 */
.container1 {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 12px;
    /* border-radius: 25px; */
    text-align: center;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container1 input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container1:hover input~.checkmark {
    background-color: #bc8246;

}

/* When the checkbox is checked, add a blue background */
.container1 input:checked~.checkmark {
    background-color: #bc8246;
    border: 1px solid #000;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container1 input:checked~.checkmark:after {
    display: none;
}

/* Style the checkmark/indicator */
.container1 .checkmark:after {
    width: 0px;
    height: 0px;
}

#cateFilter{
    border: none;
    padding: 8px;
}
</style>
@stop


<?php

// BƯỚC 2: HÀM ĐỆ QUY HIỂN THỊ CATEGORIES
function showCCategories($Cate, $parent_id=0 , $char = '')
{
    foreach ($Cate as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item->parent_id == $parent_id)
        {
            echo'<option value="'.$item->id.'">'.$char.$item->name.'</option>';
            unset($Cate[$key]);
             
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCCategories($Cate, $item->id, $char.' -- ');
        }
    }
}


?>
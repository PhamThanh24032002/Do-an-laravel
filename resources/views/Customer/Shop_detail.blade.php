@extends('Customer.master.master')
@section('main')
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
                                    <li class="breadcrumb-item active" aria-current="page"> Product details</li>
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
                    <h1>Shop Detail</h1>
                        <div class="page__title-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Shop Detail</li>
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


    <!-- shop details area start -->
    <section class="shop__area pb-65">
        <div class="shop__top grey-bg-6 pt-100 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 row">
                        <div class="product__modal-box d-flex">
                            <div class="product__modal-nav col-3">
                                <nav>
                                    <div class="nav nav-tabs" id="product-details" role="tablist">
                                        <a class="nav-item nav-link active" id="pro-one-tab" data-toggle="tab"
                                            href="#pro-one" role="tab" aria-controls="pro-one" aria-selected="true">
                                            <div class="product__nav-img w-img">
                                                <img src="{{asset('uploads')}}/{{$sub_img->image}}" alt="">
                                            </div>
                                        </a>
                                        <a class="nav-item nav-link" id="pro-two-tab" data-toggle="tab" href="#pro-two"
                                            role="tab" aria-controls="pro-two" aria-selected="false">
                                            <div class="product__nav-img w-img">
                                                <img src="{{asset('uploads')}}/{{$sub_img_2->image}}" alt="">
                                            </div>
                                        </a>
                                        <a class="nav-item nav-link" id="pro-three-tab" data-toggle="tab"
                                            href="#pro-three" role="tab" aria-controls="pro-three"
                                            aria-selected="false">
                                            <div class="product__nav-img w-img">
                                                <img src="{{asset('uploads')}}/{{$sub_img_3->image}}" alt="">
                                            </div>
                                        </a>
                                    </div>
                                </nav>
                            </div>
                            <div class="tab-content mb-20 col-9" id="product-detailsContent">
                                <div class="tab-pane fade show active" id="pro-one" role="tabpanel"
                                    aria-labelledby="pro-one-tab">
                                    <div class="product__modal-img product__thumb w-img">
                                        <img src="{{asset('uploads')}}/{{$sub_img->image}}" alt="">
                                        <div class="product__sale ">
                                            <span class="new">new</span>
                                            <span class="percent">-16%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pro-two" role="tabpanel" aria-labelledby="pro-two-tab">
                                    <div class="product__modal-img product__thumb w-img">
                                        <img src="{{asset('uploads')}}/{{$sub_img_2->image}}" alt="">
                                        <div class="product__sale ">
                                            <span class="new">new</span>
                                            <span class="percent">-16%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pro-three" role="tabpanel"
                                    aria-labelledby="pro-three-tab">
                                    <div class="product__modal-img product__thumb w-img">
                                        <img src="{{asset('uploads')}}/{{$sub_img_3->image}}" alt="">
                                        <div class="product__sale ">
                                            <span class="new">new</span>
                                            <span class="percent">-16%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="product__modal-content product__modal-content-2">
                            <h4 class="mb-1"><a href="#">{{$product->name}}</a></h4>
                            <div class="rating rating-shop mb-15 row">
                                <div class="ml-3 user-rating">
                                    <ul>
                                        <li><a href="#"><i
                                                    class="@if(round($Mrating) >=1)fas @else fal @endif fa-star"></i></a>
                                        </li>
                                        <li><a href="#"><i
                                                    class="@if(round($Mrating) >=2)fas @else fal @endif fa-star"></i></a>
                                        </li>
                                        <li><a href="#"><i
                                                    class="@if(round($Mrating) >=3)fas @else fal @endif fa-star"></i></a>
                                        </li>
                                        <li><a href="#"><i
                                                    class="@if(round($Mrating) >=4)fas @else fal @endif fa-star"></i></a>
                                        </li>
                                        <li><a href="#"><i
                                                    class="@if(round($Mrating) >=5)fas @else fal @endif fa-star"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <span class="rating-no ml-10 col-4 rating-left text-center">
                                    {{$Crating}} rating(s)
                                </span>
                                <!-- <span class="review rating-left"><a href="#">Add your Review</a></span> -->
                            </div>
                            <div class="product__price-2 mb-25">
                                <span id="m_price">${{$product->price}}</span>
                                <!-- <span class="old-price">$96.00</span> -->
                            </div>
                            <div class="product__modal-des mb-30">
                                <p>{{$product->desscription}}</p>
                            </div>
                            <div class="product__modal-form mb-30">
                            <form action="#">
                                    <?php
                                    $flagS = true;
                                    $valueS = [];
                                    foreach ($size as $s) {
                                        if ($s->name == "none") {
                                            $flagS = false;
                                            $valueS[0] = $s->id;
                                            $valueS[1] = $s->price;
                                            $valueS[2] = $product->sale_price;
                                        }
                                    }
                                    ?>
                                    @if($flagS == true)
                                    <div class="product__modal-input size mb-20">
                                        <label>Size <i class="fas fa-star-of-life"></i></label>
                                        <select id="m_size">
                                            <option>- Please select -</option>
                                            @foreach($size as $s)
                                            <option value="{{$s->id}}" price="{{$s->price}}" sale="{{$product->sale_price}}">{{$s->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @else
                                    <input hidden id="m_size" value="<?= $valueS[0] ?>" price="<?= $valueS[1] ?>" sale=<?= $valueS[2] ?>>
                                    @endif
                                    <?php
                                    $flagC = true;
                                    $valueC = null;
                                    foreach ($color as $c) {
                                        if ($c->name == "none") {
                                            $flagC = false;
                                            $valueC = $c->id;
                                        }
                                    }
                                    ?>
                                    @if($flagC == true)
                                    <div class="product__modal-input color mb-20">
                                        <label>Color <i class="fas fa-star-of-life"></i></label>
                                        <select id="m_color">
                                            <option>- Please select -</option>
                                            @foreach($color as $c)
                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @else
                                    <input type="hidden" id="m_color" value="{{$valueC}}">
                                    @endif
                                    <div class="product__modal-required mb-5">
                                        <span>Repuired Fiields *</span>
                                    </div>
                                    <div class="pro-quan-area d-sm-flex align-items-center">
                                        <div class="product-quantity-title">
                                            <label>Quantity</label>
                                        </div>
                                        <div class="product-quantity mr-20 mb-20">
                                            <div class="cart-plus-minus"><input type="text" id="m_quantity-product" value="1" /></div>
                                        </div>
                                        <div class="pro-cart-btn">
                                            <a onclick="ajax_add_cart_mini(<?= $product->id ?>,null,'m_price')" class="add-cart-btn mb-20">+ Add to Cart</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="product__tag mb-25">
                                <span>Category:</span>
                                @foreach($CatePro as $c)
                                <span><a href="#">{{$c->name}} </a></span>  
                                @endforeach                              
                            </div>
                            <div class="product__share">
                                <span>Share :</span>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop__bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="product__details-tab">
                            <div class="product__details-tab-nav text-center mb-45">
                                <nav>
                                    <div class="nav nav-tabs justify-content-start justify-content-sm-center"
                                        id="pro-details" role="tablist">
                                        <a class="nav-item nav-link active" id="des-tab" data-toggle="tab" href="#des"
                                            role="tab" aria-controls="des" aria-selected="true">Description</a>
                                       
                                        <a class="nav-item nav-link" id="review-tab" data-toggle="tab" href="#review"
                                            role="tab" aria-controls="review" aria-selected="false">Reviews (4)</a>
                                    </div>
                                </nav>
                            </div>
                            <div class="tab-content" id="pro-detailsContent">
                                <div class="tab-pane fade show active" id="des" role="tabpanel">
                                    <div class="product__details-des">
                                        {{$product->desscription}}
                                    </div>
                                </div>
                              
                                <div class="tab-pane fade" id="review" role="tabpanel">
                                    <div class="product__details-review">
                                        <div class="postbox__comments">
                                            <div class="postbox__comment-title mb-30">
                                                <h3>Reviews </h3>
                                            </div>
                                            <div class="latest-comments mb-30">
                                                <ul>
                                                   

                                                    @foreach($showCmt as $cmt)
                                                    <li>
                                                        <div class="comments-box">
                                                            <div class="comments-avatar">
                                                                <img width="80px" height="80px"
                                                                    src="{{asset('uploads')}}/{{$cmt->image}}" alt="">
                                                            </div>
                                                            <div class="comments-text">
                                                                <div class="avatar-name">
                                                                    <h5>{{$cmt->name}}</h5>
                                                                    <span>
                                                                        {{date('d/m/Y H:i',strtotime($cmt->created_at))}}
                                                                    </span>
                                                                    <a class="reply" href="#">Leave Reply</a>
                                                                </div>
                                                                @foreach($userRating as $r)
                                                                @if($cmt->product_id == $r->product_id && $cmt->user_id
                                                                == $r->user_id)
                                                                <div class="user-rating">
                                                                    <ul>
                                                                        <li><a href="#"><i
                                                                                    class="@if(round($r->number) >=1)fas @else fal @endif fa-star"></i></a>
                                                                        </li>
                                                                        <li><a href="#"><i
                                                                                    class="@if(round($r->number) >=2)fas @else fal @endif fa-star"></i></a>
                                                                        </li>
                                                                        <li><a href="#"><i
                                                                                    class="@if(round($r->number) >=3)fas @else fal @endif fa-star"></i></a>
                                                                        </li>
                                                                        <li><a href="#"><i
                                                                                    class="@if(round($r->number) >=4)fas @else fal @endif fa-star"></i></a>
                                                                        </li>
                                                                        <li><a href="#"><i
                                                                                    class="@if(round($r->number) >=5)fas @else fal @endif fa-star"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                @endif
                                                                @endforeach
                                                                <p>{{$cmt->content}}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>


                                        <div class="post-comments-form mb-100">
                                            <div class="post-comments-title mb-30">
                                                <h3>Your Review</h3>
                                                @if($getOrder <> [])
                                                <div class="post-rating">
                                                    <span>Your Rating :</span>
                                                    <!-- sao  -->
                                                    <div id="rateYo"></div>
                                                </div>
                                                @else
                                                @endif
                                            </div>
                                            <form id="contacts-form" class="conatct-post-form"
                                                action="{{route('customer.comment')}}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                        <div class="contact-icon p-relative contacts-name">
                                                            <input type="text" placeholder="Name"
                                                                value="{{$UserInfor->name}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                        <div class="contact-icon p-relative contacts-name">
                                                            <input type="email" placeholder="Email"
                                                                value="{{$UserInfor->email}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12" hidden>
                                                        <div class="contact-icon p-relative contacts-email">
                                                            <input type="text" placeholder="hidden" name="user_id"
                                                                value="{{$user}}">
                                                            <!-- <input type="text" placeholder="hidden" name="blog_id" value="0"> -->
                                                            <input type="text" placeholder="hidden" name="product_id"
                                                                value="{{$product->id}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <div class="contact-icon p-relative contacts-message">
                                                            @if($getOrder <> [])
                                                            <textarea id="content" name="content" cols="30" rows="10"
                                                                placeholder="Bình luận"></textarea>
                                                            @else
                                                            <textarea id="content" name="content" cols="30" rows="10"
                                                                placeholder="Bạn phải mua sản phẩm mới được bình luận và đánh giá" value="" readonly></textarea>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <button class="os-btn os-btn-black" type="submit">Post
                                                            comment</button>
                                                    </div>
                                                </div>
                                            </form>
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
    <!-- shop details area end -->

    <!-- related products area start -->
    <section class="related__product pb-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section__title-wrapper text-center mb-55">
                        <div class="section__title mb-10">
                            <h2>Trending Products</h2>
                        </div>
                        <div class="section__sub-title">
                            <p>Mirum est notare quam littera gothica quam nunc putamus parum claram!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- loop  -->
                @foreach($relatePro as $rp)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="product__wrapper mb-60">
                        <div class="product__thumb">
                            <a href="" class="w-img">
                                <img src="{{asset('uploads')}}/{{$rp->image}}">
                                <img class="product__thumb-2" src="{{asset('uploads')}}/{{$Rsub_img[$rp->id]}}"
                                    alt="product-img">
                            </a>
                            <div class="product__action transition-3">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                    <i class="fal fa-heart"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Compare">
                                    <i class="fal fa-sliders-h"></i>
                                </a>
                                <!-- Button trigger modal -->
                                <a href="javascript:void(0);" class="show-detail-quick" id="{{$rp->id}}" data-toggle="modal"
                                    data-target="#productModalId{{$rp->id}}">
                                    <i class="fal fa-search"></i>
                                </a>

                            </div>
                            <div class="product__sale">
                                <span class="new">new</span>
                                <span class="percent">-16%</span>
                            </div>
                        </div>
                        <div class="product__content p-relative">
                            <div class="product__content-inner">
                                <h4><a href="">{{$rp->name}}</a></h4>
                                <div class="product__price transition-3">
                                    <span>${{$rp->price}}</span>
                                    <!-- <span class="old-price">$96.00</span> -->
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- shop modal start -->
                <!-- Modal -->
                <div class="modal fade" id="productModalId{{$rp->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                
                <!-- endloop  -->
            </div>
        </div>
    </section>
    <!-- related products area end -->
    <form action="{{route('customer.rating')}}" method="POST" id="frmRating" hidden>
        @csrf
        <input type="text" name="product_id" value="{{$product->id}}">
        <input type="text" name="user_id" value="{{$user}}">
        <input type="text" name="number" id="number">
    </form>

</main>
@stop

@section('js')
<script>
//danh gia sao	
$(function() {
    var rating = '{{$Mrating}}';
    // alert(rating);
    $("#rateYo").rateYo({
        starWidth: "30px",
        rating: rating,
        fullStar: true,
        multiColor: {
            "startColor": "#FF0000", //RED
            "endColor": "#00FF00" //GREEN
        }
    }).on("rateyo.set", function(e, data) {
        $('#number').val(data.rating);
        $('#frmRating').submit();
        // alert("The rating is set to " + data.rating + "!");
    });

    $("#rateYu").rateYo({
        starWidth: "20px",
        rating: rating,
        readOnly: true
    });
})(jQuery);
</script>

<script type="text/javascript">
    $('#size').on('change',function() {
        // alert('a');
        $("#n_price").text($("#size option:selected").attr("price") * (100 - $("#size option:selected").attr("sale")) / 100 + " VND");
    });
    $('#m_size').on('change',function() {
        // alert('a');
        $("#m_price").text($("#m_size option:selected").attr("price") * (100 - $("#m_size option:selected").attr("sale")) / 100 + " VND");
    });
</script>
@stop
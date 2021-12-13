<div class="row">
    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12">
        <div class="product__modal-box">
            <div class="tab-content mb-20" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="product__modal-img w-img">
                        <img src="{{asset('uploads')}}/{{$product->image}}" alt="">
                    </div>
                </div>
                @foreach($proImg as $item_img)
                <div class="tab-pane fade" id="nav-profile{{$item_img->id}}" role="tabpanel" aria-labelledby="nav-profile{{$item_img->id}}-tab">
                    <div class="product__modal-img w-img">
                        <img src="{{asset('uploads')}}/{{$item_img->image}}" alt="">
                    </div>
                </div>
                @endforeach
            </div>
            <nav>
                <div class="row">
                    <div class="nav nav-tabs justify-content-between" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active col-md-4" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                            <div class="product__nav-img w-img">
                                <img src="{{asset('uploads')}}/{{$product->image}}" alt="">
                            </div>
                        </a>
                        @foreach($proImg as $item_img)
                        <a class="nav-item nav-link col-md-4" id="nav-profile{{$item_img->id}}-tab" data-toggle="tab" href="#nav-profile{{$item_img->id}}" role="tab" aria-controls="nav-profile{{$item_img->id}}" aria-selected="false">
                            <div class="product__nav-img w-img">
                                <img src="{{asset('uploads')}}/{{$item_img->image}}" alt="">
                            </div>
                        </a>
                        @endforeach

                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 col-12">
        <div class="product__modal-content">
            <h4><a href="product-details.html">{{$product->name}}</a></h4>
            <div class="rating rating-shop mb-15">
                <ul>
                    <li><span><i class="fas fa-star"></i></span></li>
                    <li><span><i class="fas fa-star"></i></span></li>
                    <li><span><i class="fas fa-star"></i></span></li>
                    <li><span><i class="fas fa-star"></i></span></li>
                    <li><span><i class="fal fa-star"></i></span></li>
                </ul>
                <span class="rating-no ml-10">
                    3 rating(s)
                </span>
            </div>
            <div class="product__price-2 mb-25">
                <?php
                $price = $product->price;
                $prices = explode(" - ", $price);
                $prices[0] =(float) $prices[0] * (100 - $product->sale_price) / 100;
                if (count($prices) == 2) {
                    $prices[1] = (float) $prices[1] * (100 - $product->sale_price) / 100;
                    $price = $prices[0] . " - " . $prices[1];
                } else {
                    $price = $prices[0];
                }
                ?>
                $<span id="n_price">{{$price}}</span>
                @if($product->sale_price > 0)
                <span class="old-price">{{$product->price}}</span>
                @endif
            </div>
            <div class="product__modal-des mb-30">
                <p>{{$product->desscription}}</p>
            </div>
            <div class="product__modal-form">
                <form action="#">
                    <?php
                    $flagS = true;
                    $valueS = [];
                    foreach ($product_size as $item) {
                        if ($item->name == "none") {
                            $flagS = false;
                            $valueS[0] = $item->id;
                            $valueS[1] = $item->price;
                            $valueS[2] = $product->sale_price;
                        }
                    }
                    ?>
                    @if($flagS == true)
                    <div class="product__modal-input size mb-20">
                        <label>Size <i class="fas fa-star-of-life"></i></label>
                        <select id="size">
                            <option value="0" price="{{$product->price}}">Chọn size</option>
                            @foreach($product_size as $item)
                            <option value="{{$item->id}}" price="{{$item->price}}" sale="{{$product->sale_price}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @else
                    <input type="hidden" id="size" value="{{$valueS[0]}}" price="{{$valueS[1]}}" sale="{{$valueS[2]}}">
                    @endif
                    <?php
                    $flagC = true;
                    $valueC = null;
                    foreach ($product_color as $c) {
                        if ($c->name == "none") {
                            $flagC = false;
                            $valueC = $c->id;
                        }
                    }
                    ?>
                    @if($flagC == true)
                    <div class="product__modal-input color mb-20">
                        <label>Color <i class="fas fa-star-of-life"></i></label>
                        <select id="color">
                            @foreach($product_color as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @else
                    <input type="hidden" id="color" value="{{$valueC}}">
                    @endif
                    <div class="product__modal-required mb-5">
                        <span>Repuired Fiields *</span>
                    </div>
                    <div class="pro-quan-area d-lg-flex align-items-center">
                        <div class="product-quantity-title">
                            <label>Quantity</label>
                        </div>
                        <div class="product-quantity">
                            <div class="cart-plus-minus"><input type="text" id="quantity-product" value="1" /></div>
                        </div>
                        <div class="pro-cart-btn ml-20">
                            <a class="os-btn os-btn-black os-btn-3 mr-10" onclick="ajax_add_cart_mini(<?= $product->id ?>)">+ Add to Cart</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(".cart-plus-minus").append('<div class="dec qtybutton">-</div><div class="inc qtybutton">+</div>');
    $(".qtybutton").on("click", function() {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find("input").val(newVal);
    });

    $('#size').change(function(event) {
        $('#size option').first().prop('disabled', 'disabled');
        $("#n_price").text($("#size option:selected").attr("price") * (100 - $("#size option:selected").attr("sale")) / 100 );
    });
</script>
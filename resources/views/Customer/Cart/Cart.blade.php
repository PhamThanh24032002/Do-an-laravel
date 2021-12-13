@extends('Customer.master.master')
@section('main')
<main>
    <!-- page title area start -->
    @if(($banner_page) != [])
    <section class="page__title p-relative d-flex align-items-center" data-background="{{url('imageBanner')}}/{{$banner_page->image}}" data-background="{{url('assetsCustomer')}}/img/page-title/page-title-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-inner text-center">
                        <h1>{{$banner_page->content}}</h1>
                        <div class="page__title-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index-2.html">Cart</a></li>
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
                        <h1>Cart</h1>
                        <div class="page__title-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Cart</li>
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
                                        <th class="product-thumbnail"></th>
                                        <th class="cart-product-name">Tên sản phẩm</th>
                                        <th class="product-price">Loại sản phẩm</th>
                                        <th class="product-price">Đơn giá</th>
                                        <th class="product-quantity">Số lượng</th>
                                        <th class="product-subtotal">Tổng</th>
                                        <th class="product-remove">Xoá</th>
                                    </tr>
                                </thead>
                                <tbody id="listcart-body">
                                    <?php $count = 0;
                                    $check = false; ?>
                                    @foreach($data['cl_page'] as $item)
                                    <tr>
                                        <?php
                                        $listProduct = DB::table('carts')->pluck('product_id')->toArray();
                                        $listSize = DB::table('carts')->pluck('size_id')->toArray();
                                        $listColor = DB::table('carts')->get('color_id');
                                        ?>
                                        <td class="product-thumbnail"><a href="product-details.html"><img src="{{url('uploads')}}/{{$item['image']}}" alt=""></a></td>
                                        <td class="product-name"><a href="product-details.html">{{$item['name']}}</a></td>
                                        <?php
                                        $flagS = true;
                                        foreach ($sizes as $value) {
                                            if(($value->product_id == $item['product_id'])){
                                                if ($value->name == "none") {
                                                    $flagS = false;
                                                }
                                            }
                                           
                                        }
                                        ?>
                                        <?php
                                        $flagC = true;
                                        foreach ($colors as $value) {
                                            if(($value->product_id == $item['product_id'])){
                                                if ($value->name == "none") {
                                                    $flagC = false;
                                                }
                                            }
                                           
                                        }
                                        ?>
                                        <td class="product-price">
                                            <div class="product__modal-input size mb-20"  style="display: <?= ($flagS==false) ? "none" : "" ?>;">
                                                <label>Dung tích <i class="fas fa-star-of-life"></i></label>
                                                <select id="size_{{ $item['id']}}" onchange="change_detail_cart(<?= $item['id'] ?>, 0)">
                                                    @foreach($sizes as $value)
                                                    @if($value->product_id == $item['product_id'])
                                                    <option <?= ($value->size_id == $item['size_id']) ? "selected" : "" ?> <?php
                                                        $check_repeat = DB::table('carts')->where('product_id', $item['product_id'])->get();
                                                        $flag = 0;
                                                        // var_dump($check_repeat);
                                                        foreach ($check_repeat as $check_rp) {
                                                            if ($check_rp->size_id == $value->size_id && $value->size_id != $item['size_id']) {
                                                                $flag = 1;
                                                            }
                                                        };
                                                        if ($flag == 1) {
                                                            echo "disabled";
                                                        }
                                                        ?> value="{{$value->id}}" price="{{$value->price}}" sale="{{$item['sale_price']}}">{{$value->name}} </option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="product__modal-input color mb-20" style="display: <?= ($flagS==false) ? "none" : "" ?>;">
                                                <label>Màu <i class="fas fa-star-of-life"></i></label>
                                                <select id="color_{{$item['id']}}" onchange="change_detail_cart(<?= $item['id'] ?>, 0)">
                                                    @foreach($colors as $value)
                                                    @if($value->product_id == $item['product_id'])
                                                    <option <?= ($value->color_id == $item['color_id']) ? "selected" : "" ?> <?php
                                                    $check_repeat = DB::table('carts')->where('product_id', $item['product_id'])->get();
                                                    $flag = 0;
                                                    // var_dump($check_repeat);
                                                    foreach ($check_repeat as $check_rp) {
                                                        if ($check_rp->color_id == $value->color_id && $value->color_id != $item['color_id']) {
                                                            $flag = 1;
                                                        }
                                                    };
                                                    if ($flag == 1) {
                                                        echo "disabled";
                                                    }
                                                    ?> value="{{$value->id}}">{{$value->name}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td class="product-price">$ <span class="amount">{{$item['price']}}</span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus"><input type="text" value="{{$item['quantity']}}" />
                                                <div class="dec qtybutton" onclick="change_detail_cart(<?= $item['id'] ?>, -1)">-</div>
                                                <div class="inc qtybutton" onclick="change_detail_cart(<?= $item['id'] ?>, 1)">+</div>
                                                <!-- <div onclick="change_detail_carts()">fsdfds</div> -->
                                            </div>
                                        </td>
                                        <td class="product-subtotal" id="subtotal_{{$item['id']}}">$ <span class="amount">{{$item['price'] *$item['quantity']}}</span></td>
                                        <td class="product-remove" onclick="cart_remove(<?= $item['id'] ?>)"><a style="cursor: pointer;"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                    <?php $count += $item['price'] * $item['quantity']; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul class="mb-20">
                                        <li>Tổng tiền <span>$ <?= $count; ?></span></li>
                                    </ul>
                                    <a class="os-btn" href="{{route('checkout')}}">Proceed to checkout</a>
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
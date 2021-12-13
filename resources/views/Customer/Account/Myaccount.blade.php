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
                                    <li class="breadcrumb-item active" aria-current="page"> Login</li>
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
                    <h1>My Account</h1>
                        <div class="page__title-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> My Account</li>
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

    <!-- login Area Strat-->
    <section class="checkout-area pb-70 pt-30">
        <div class="container">
            <form action="" method="post" enctype='multipart/form-data'>
                @csrf
                <div class="row">

                    <div class="col-lg-4">
                        <div class="col-md-12" style="margin-top: 10%;">
                            <img id="imgUpload" style="width: 100%;" src="{{url('uploads')}}/{{Auth::user()->image}}" alt="">
                        </div>
                        <div class="col-md-12">
                            <!-- <input style="width: 50%;" type="file" class="form-control" id="" placeholder="" name="avt"> -->
                            <input id="fileInput" name="fileInput" type="file" style="display:none;" onchange="readURL(this);" />

                            <div class="row" style="margin-top: 20px;">
                                <!-- <div class="col-2"></div> -->
                                <div class="col-12">
                                    <p style="display: block; margin:0 auto; cursor:pointer" class="os-btn w-100" value="Đổi ảnh đại diện" onclick="document.getElementById('fileInput').click();" />Đổi ảnh đại diện</p>
                                </div>
                                <!-- <div class="col-2"></div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="checkbox-form">
                            <h3>Thông tin tài khoản</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>First Name <span class="required">*</span></label>
                                        <input type="text" name="name" value="{{Auth::user()->name}}" placeholder="" />
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
                                        <input type="text" name="address" value="{{Auth::user()->address}}" placeholder="" />
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
                                        <!-- <input type="text" value="hehe"> -->
                                        <input type="text" disabled style="color:black" value="{{Auth::user()->email}}" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text" name="phone" value="{{Auth::user()->phone}}" placeholder="" />
                                        @if($errors->has('phone'))
                                        <div>
                                            <p style="color: red">{{$errors->first('phone')}}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <button type="submit" class="os-btn" style="width: 100%;">Lưu thay đổi</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- login Area End-->
</main>
@stop
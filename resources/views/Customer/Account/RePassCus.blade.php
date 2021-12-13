@extends('Customer.master.master')
@section('main')
<main>


    <!-- page title area start -->
    @if(($banner_page) != [])
    <section class="page__title p-relative d-flex align-items-center" data-background="{{url('imageBanner')}}/{{$banner_page->image}}" style="object-fit: cover;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-inner text-center">
                        <h1>{{$banner_page->content}}</h1>
                        <div class="page__title-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Đổi mật khẩu</li>
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
                    <h1>Reset Password US</h1>
                        <div class="page__title-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Reset Password US</li>
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
    <section class="login-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="basic-login">
                        <h3 class="text-center mb-60">Đổi mật khẩu</h3>
                        <form action="" method="post">
                            @csrf
                            <label for="pass">Nhập mật khẩu mới <span>**</span></label>
                            <input id="pass" name="password" type="password" placeholder="Enter password..." />
                            @if($errors->has('password'))
                            <div>
                                <p style="color: red">{{$errors->first('password')}}</p>
                            </div>
                            @endif
                            <label for="pass">Xác nhận mật khẩu <span>**</span></label>
                            <input id="pass" name="confirm_password" type="password" placeholder="Enter password..." />
                            @if($errors->has('confirm_password'))
                            <div>
                                <p style="color: red">{{$errors->first('confirm_password')}}</p>
                            </div>
                            @endif
                            <div class="login-action mb-20 fix">
                                <span class="forgot-login f-right">
                                    <a href="#">Quên mật khẩu?</a>
                                </span>
                            </div>
                            <button type="submit" class="os-btn os-btn-black w-100">Xác nhận</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login Area End-->
</main>
@stop
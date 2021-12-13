@extends('Admin.master.master')
@section('main')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Sửa Banner</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Form Layout</li>
                        <li class="breadcrumb-item active"> Default Forms</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <form action="{{route('banner_page.update', $banner->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-xl-6">
                    <div class="row">
                        @csrf
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Sửa Banner</h5>
                                </div>
                                <div class="card-body">
                                    <form class="theme-form">
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0" for="exampleInputEmail1">Tên</label>
                                            <input class="form-control" value="{{$banner->content}}" name="content" type="text" placeholder="Tiêu Đề">
                                            @if ($errors->has('content'))
                                            <small style="color: red">{{ $errors->first('content') }}</small>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label col-sm-3 pt-0">Trạng Thái</label>
                                            <div class="col-sm-9">
                                                <div class="form-check radio radio-primary">
                                                    <input class="form-check-input" id="radio11" type="radio" name="status" value="1" {{($banner->status == 1)?'checked':''}}>
                                                    <label class="form-check-label" for="radio11">Hiển Thị</label>
                                                </div>
                                                <div class="form-check radio radio-primary">
                                                    <input class="form-check-input" id="radio22" type="radio" name="status" value="0" {{($banner->status == 0)?'checked':''}}>
                                                    <label class="form-check-label" for="radio22"> Ẩn</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label col-sm-3 pt-0"> banner pages</label>
                                            <select name="page" id="input" class="form-control" required="required">
                                                <option value="blog" {{$banner->page=='blog'?'selected':''}}>blog</option>
                                                <option value="shop" {{$banner->page=='shop'?'selected':''}}>shop</option>
                                                <option value="contact" {{$banner->page=='contact'?'selected':''}}>contact</option>
                                                <option value="shop_detail" {{$banner->page=='shop_detail'?'selected':''}}>shop_detail</option>
                                                <option value="view_cart" {{$banner->page=='view_cart'?'selected':''}}>view_cart</option>
                                                <option value="Order_History" {{$banner->page=='Order_History'?'selected':''}}>Order_History</option>
                                                <option value="Order_History_detail" {{$banner->page=='Order_History_detail'?'selected':''}}>Order_History_detail</option>
                                                <option value="Wishlist" {{$banner->page=='Wishlist'?'selected':''}}>Wishlist</option>
                                                <option value="Checkout" {{$banner->page=='Checkout'?'selected':''}}>Checkout</option>
                                                <option value="Login" {{$banner->page=='Login'?'selected':''}}>Login</option>
                                                <option value="Register" {{$banner->page=='Register'?'selected':''}}>Register</option>
                                                <option value="myaccount" {{$banner->page=='myaccount'?'selected':''}}>myaccount</option>
                                                <option value="check_password" {{$banner->page=='check_password'?'selected':''}}>check_password</option>
                                            </select>

                                            @if ($errors->has('page'))
                                            <small style="color: red">{{ $errors->first('page') }}</small>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <button class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">

                </div>
                <div class="col-sm-12 col-xl-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">


                                <div class="card-header">
                                    <h5> Ảnh Bài Viết </h5>
                                    <img src="{{url('imageBanner')}}/{{$banner->image}}" width="100%" alt="{{$banner->image}}">

                                </div>
                                <div class="input-group">
                                    <span class="btn btn-success col fileinput-button">
                                        <i class="fas fa-plus"></i>
                                        <span>Chọn Ảnh</span>
                                    </span>
                                    <img src="https://rpfinancelk.com/wp-content/uploads/2020/12/no-image-available-icon-photo-camera-flat-vector-illustration-132483097.jpg" id="show_img" width="100%">
                                    <input type="file" name="other_image" id="select_file" value="{{old('image')}}" style="display:none">

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </form>
</div>
<!-- ner-fluid Ends-->

@stop
@section('js')
<script>
    $('.fileinput-button').click(function() {
        $('#select_file').click();
    })
    $('#select_file').change(function() {
        var file = $(this)[0].files[0];
        var reader = new FileReader();
        reader.onload = function(ev) {
            $('img#show_img').attr('src', ev.target.result);
        }
        reader.readAsDataURL(file);
    })
    $('.fileinput-orther').click(function() {
        $('#orther_image').click();
    })
    $('#orther_image').change(function() {
        var files = $(this)[0].files;
        if (files && files.length) {
            for (let i = 0; i < files.length; i++) {
                const fi = files[i];
                var reader = new FileReader();
                reader.onload = function(ev) {
                    var _image = '<div class="col-md-3">';
                    _image += '<img src="' + ev.target.result + '" width="100%">';
                    _image += '</div>';
                    $('#show_other_image').append(_image);
                }
                reader.readAsDataURL(fi);
            }
        }
    })
</script>

@stop
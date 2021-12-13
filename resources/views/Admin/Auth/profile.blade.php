@extends('Admin.master.master') @section('main')
<!-- Page Sidebar Ends-->
<div class="page-body">
<div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Thông tin tài khoản</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html" data-bs-original-title="" title=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg></a></li>
                        <li class="breadcrumb-item">Admin</li>
                        <li class="breadcrumb-item active">Thông tin tài khoản</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="second-chart-list third-news-update">
            <form method="POST" role="form" enctype='multipart/form-data'>
                @csrf
                <div class="row" style="margin-left: 20%;">
                    <div class="card col-md-3" style="margin-right: 20px;">
                        <div class="col-md-12" style="margin-top: 10%;">
                            <img id="imgUpload" style="width: 100%;" src="{{url('uploads')}}/{{auth('admin')->user()->image}}" alt="">
                        </div>
                        <div class="col-md-12">
                            <!-- <input style="width: 50%;" type="file" class="form-control" id="" placeholder="" name="avt"> -->
                            <input id="fileInput" name="fileInput" type="file" style="display:none;" onchange="readURL(this);" />
                            <div class="row" style="margin-top: 20px;">
                                <!-- <div class="col-2"></div> -->
                                <div class="col-12"><input style="display: block; margin:0 auto;" class="btn btn-primary btn-sm" value="Đổi ảnh đại diện" onclick="document.getElementById('fileInput').click();" /></div>
                                <!-- <div class="col-2"></div> -->
                            </div>
                        </div>
                    </div>
                    <div class="card col-md-6 p-2">
                        <div class="form-group">
                            <label for="" style="font-weight: bold; margin-top:15px">ID tài khoản:</label>
                            <div class="div form-control">{{ auth('admin')->user()->id }}</div>
                        </div>
                        <div class="form-group">
                            <label for="" style="font-weight: bold; margin-top:15px">Tên tài khoản:</label>
                            <input name="name" type="text" class="form-control" id="" placeholder="" value="{{ auth('admin')->user()->name }} ">
                            @if($errors->has('name'))
                            <div>
                                <p style="color: red">{{$errors->first('name')}}</p>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="" style="font-weight: bold; margin-top:15px">Email tài khoản:</label>
                            <input name="email" type="text" class="form-control" id="" placeholder="" value="{{ auth('admin')->user()->email }} ">
                            @if($errors->has('email'))
                            <div>
                                <p style="color: red">{{$errors->first('email')}}</p>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="" style="font-weight: bold; margin-top:15px">Quyền hạn tài khoản:</label>
                            <div class="div form-control">
                                @if(auth('admin')->user()->role==0)
                                ADMIN
                                @elseif(auth('admin')->user()->role==1)
                                CENSOR
                                @elseif(auth('admin')->user()->role==2)
                                CONTENT CREATORS
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 50px;">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <button style="width: 100%;" type="submit" class="btn btn-primary">Cập nhật thông tin tài khoản</button>
                    </div>
                    <div class="col-4"></div>
                </div>
            </form>

        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

<!-- footer start-->
@stop
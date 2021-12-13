@extends('Admin.master.master') @section('main')
<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12" style="text-align: center;">
                    <h3 style="color: blueviolet;">Thông tin tài khoản</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row second-chart-list third-news-update">

            <form action="" method="POST" role="form">
                @csrf
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" style="font-weight: bold; margin-top:15px">Tên tài khoản:</label>
                            <input name="name" type="text" class="form-control" id="" placeholder="" value="">
                            @if($errors->has('name'))
                            <div>
                                <p style="color: red">{{$errors->first('name')}}</p>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="" style="font-weight: bold; margin-top:15px">Email tài khoản:</label>
                            <input name="email" type="text" class="form-control" id="" placeholder="" value="">
                            @if($errors->has('email'))
                            <div>
                                <p style="color: red">{{$errors->first('email')}}</p>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="" style="font-weight: bold; margin-top:15px">Mật khẩu:</label>
                            <input name="password" type="password" class="form-control" id="" placeholder="" value="">
                            @if($errors->has('password'))
                            <div>
                                <p style="color: red">{{$errors->first('password')}}</p>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="" style="font-weight: bold; margin-top:15px">Nhập lại mật khẩu:</label>
                            <input name="confirm_password" type="password" class="form-control" id="" placeholder="" value="">
                            @if($errors->has('confirm_password'))
                            <div>
                                <p style="color: red">{{$errors->first('confirm_password')}}</p>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="" style="font-weight: bold; margin-top:15px">Quyền hạn tài khoản:</label>
                            <select name="role" class="form-control btn-square">
                                <option value="0" selected>Admin</option>
                                <option value="1">Censor</option>
                                <option value="2">Content Creators</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row" style="margin-top: 50px;">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <button style="width: 100%;" type="submit" class="btn btn-primary">Tạo tài khoản</button>
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
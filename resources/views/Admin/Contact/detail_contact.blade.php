@extends('Admin.master.master') @section('main')
<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12" style="text-align: center;">
                    <h3 style="color: blueviolet;">Thông tin liên hệ</h3>
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
                            <label for="" style="font-weight: bold; margin-top:15px">Số điện thoại:</label>
                            <input name="phone" type="text" class="form-control" id="" placeholder="" value="{{$contact->phone}}">
                            @if($errors->has('phone'))
                            <div>
                                <p style="color: red">{{$errors->first('phone')}}</p>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="" style="font-weight: bold; margin-top:15px">Email:</label>
                            <input name="email" type="text" class="form-control" id="" placeholder="" value="{{$contact->email}}">
                            @if($errors->has('email'))
                            <div>
                                <p style="color: red">{{$errors->first('email')}}</p>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="" style="font-weight: bold; margin-top:15px">Địa chỉ:</label>
                            <input name="address" type="text" class="form-control" id="" placeholder="" value="{{$contact->address}}">
                            @if($errors->has('address'))
                            <div>
                                <p style="color: red">{{$errors->first('address')}}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row" style="margin-top: 50px;">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <button style="width: 100%;" type="submit" class="btn btn-primary">Cập nhật liên hệ</button>
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
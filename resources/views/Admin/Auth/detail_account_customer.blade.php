@extends('Admin.master.master') @section('main')
<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Thông tin người dùng</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html" data-bs-original-title="" title=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg></a></li>
                        <li class="breadcrumb-item">Admin</li>
                        <li class="breadcrumb-item active">Thông tin người dùng</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Thông tin người dùng</h4>
                    <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse" data-bs-original-title="" title=""><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove" data-bs-original-title="" title=""><i class="fe fe-x"></i></a></div>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="profile-title">
                            <div class="media" style="align-items: center;">
                                <img class="img-70 rounded-circle" alt="" src="{{url('uploads')}}/{{auth('admin')->user()->image}}">
                                <div class="media-body" style="margin-left: 25px;">
                                    <h5 class="mb-1">{{$detail_customer->name}}</h5>
                                    <p>@if($detail_customer->role==0)
                                        ADMIN
                                        @elseif($detail_customer->role==1)
                                        CENSOR
                                        @elseif($detail_customer->role==2)
                                        CONTENT CREATORS
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="form-label" style="font-weight: bold; margin-top:15px">Địa chỉ email: </label>
                        <div class="form-control" value="" placeholder="your-email@domain.com" data-bs-original-title="" title="">{{$detail_customer->email}}</div>
                    </div>
                    <div>
                        <label class="form-label" style="font-weight: bold; margin-top:15px">Mật khẩu: </label>
                        <div class="form-control" type="password" data-bs-original-title="" title="">******</div>
                    </div>
                    
                </div>

            </div>
            <div class="col-xl-8">
                <form class="card" method="POST">
                    @csrf
                    <div class="col-xl-12">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Chỉnh sửa thông tin</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse" data-bs-original-title="" title=""><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove" data-bs-original-title="" title=""><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" style="font-weight: bold; margin-top:15px">Tên người dùng: </label>
                                    <div class="form-control" type="text" data-bs-original-title="" title="">{{$detail_customer->name}}</div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" style="font-weight: bold; margin-top:15px">Địa chỉ email: </label>
                                    <div class="form-control" type="email" data-bs-original-title="" title="">{{$detail_customer->email}}</div>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label" style="font-weight: bold; margin-top:15px">Trạng thái: </label>
                                    <select name="status" class="form-control btn-square">
                                        <option {{($detail_customer->status==0) ? "selected" :""}} value="0"> Mở</option>
                                        <option {{($detail_customer->status==1) ? "selected" :""}} value="1">Khóa</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" style="font-weight: bold; margin-top:15px">Phone</label>
                                    <div class="form-control" type="email" data-bs-original-title="" title="">{{$detail_customer->phone}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Container-fluid Ends-->
</div>

<!-- footer start-->
@stop
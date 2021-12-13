@extends('Admin.master.master') @section('main')
<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Danh sách tài khoản admin</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html" data-bs-original-title="" title=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg></a></li>
                        <li class="breadcrumb-item">Admin</li>
                        <li class="breadcrumb-item active">Tài khoản admin</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
   
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row second-chart-list third-news-update">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title mb-0">Danh sách Admin</h4>
                            </div>
                            <div class="col-md-6" style="position: relative;"><a style="position: absolute;right:0;" class="btn btn-success btn-sm" href="{{route('register.account.admin')}}" data-bs-original-title="" title=""><i class="fa fa-plus"></i> Tạo tài khoản</a></div>
                        </div>
                    </div>
                    <div class="table-responsive add-project">
                        <table class="table card-table table-vcenter
                            text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Admin</th>
                                    <th>Địa chỉ email</th>
                                    <th>Trạng thái</th>
                                    <th>Quyền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list_admin as $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td><a class="text-inherit" href="#" data-bs-original-title="" title="">{{$value->name}}</a></td>

                                    <td><span class="status-icon bg-success"></span> {{$value->email}}
                                    </td>
                                    <td>{{($value->status==0) ? "Mở" : "Khóa"}}</td>
                                    <td>
                                        @if($value->role==0)
                                        ADMIN
                                        @elseif($value->role==1)
                                        CENSOR
                                        @elseif($value->role==2)
                                        CONTENT CREATORS
                                        @endif
                                    </td>
                                    <td class="text-end">

                                        <a class="btn btn-primary btn-sm" href="{{route('show.detail.account.admin',$value->id)}}" data-bs-original-title="" title=""><i class="fa fa-pencil"></i> Sửa</a>
                                        <a class="icon" href="javascript:void(0)" data-bs-original-title="" title=""></a><a class="btn btn-danger btn-sm" href="{{route('delete.account.admin',$value->id)}}" data-bs-original-title="" title=""><i class="fa fa-trash"></i> Xóa</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid Ends-->
</div>

<!-- footer start-->
@stop
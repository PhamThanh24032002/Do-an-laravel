@extends('Admin.master.master')

@section('main')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Recent Orders</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Ecommerce</li>
                        <li class="breadcrumb-item active"> Recent Orders</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header" style="padding: 0px !important;">
                    <div class="row" style="padding-top: 15px;" >
                            <div class="col-5">
                                <h5> Chưa Xử Lý</h5>
                            </div>
                            <div class="col-5">
                                <div class="sreach" style="margin:0 auto;">
                                    <form action="{{route('orders')}}" method="GET">
                                        <div class="input-group row">
                                            <input class="form-control col-2" id="s" type="text" placeholder="Nhập tên cần tìm..." name="s" value="">
                                            <button type="submit" class="col-4 btn btn-primary">Tìm kiếm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if(($orders0)->items() != [])
                            @foreach (($orders0) as $value )
                            <div class="col-xxl-4 col-md-6">
                                <div class="prooduct-details-box">
                                    <div class="media"><img class="align-self-center img-fluid img-60" style="height: 80px;padding-left: 5px;object-fit: cover;" src="{{url('uploads')}}/{{$value->avata}}" alt="#">
                                        <div class="media-body ms-3">
                                            <div class="product-name">
                                                <h6><a href="{{route('orders_detail',$value->id)}}">{{$value->name}}</a></h6>
                                            </div>
                                            <div>Quantity : {{$value->quantity}}</div>
                                            <div class="price d-flex">
                                                <div class="text-muted me-2">Total_Price</div>: {{$value->total_price}} $
                                            </div>
                                            <div class="avaiabilty">
                                                <div class="text-success">Call : {{$value->phone}}</div>
                                            </div>
                                            @if($value->status==0)
                                            <a class="btn btn-primary btn-xs" href="#">Chưa Xử Lý </a><i class="close" data-feather="x"></i>
                                            @elseif($value->status==1)
                                            <a class="btn btn-primary btn-xs" href="#">Đang Xử Ly </a><i class="close" data-feather="x"></i>
                                            @elseif($value->status==2)
                                            <a class="btn btn-primary btn-xs" href="#">Đang Giao Hàng </a><i class="close" data-feather="x"></i>
                                            @elseif($value->status==3)
                                            <a class="btn btn-primary btn-xs" href="#">Đã Giao Hàng </a><i class="close" data-feather="x"></i>
                                            @else
                                            <a class="btn btn-primary btn-xs" href="#">Đã Hủy </a><i class="close" data-feather="x"></i>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{$orders0->links()}}
                            @else
                            <h5 style="color: red;">Hiện Tại Chưa Có Sản Phẩm Nào</h5>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                    <div class="row" style="padding-top: 15px;" >
                            <div class="col-5">
                                <h5> Đang Xử Lý</h5>
                            </div>
                            <div class="col-5">
                                <div class="sreach" style="margin:0 auto;">
                                    <form action="{{route('orders')}}" method="GET">
                                        <div class="input-group row">
                                            <input class="form-control col-2" id="s1" type="text" placeholder="Nhập tên cần tìm..." name="s1" value="">
                                            <button type="submit" class="col-4 btn btn-primary">Tìm kiếm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if($orders1->items() != [])
                            @foreach ($orders1 as $value )
                            <div class="col-xxl-4 col-md-6">
                                <div class="prooduct-details-box">
                                    <div class="media"><img class="align-self-center img-fluid img-60" style="height: 80px;padding-left: 5px;object-fit: cover;" src="{{url('uploads')}}/{{$value->avata}}" alt="#">
                                        <div class="media-body ms-3">
                                            <div class="product-name">
                                                <h6><a href="{{route('orders_detail',$value->id)}}">{{$value->name}}</a></h6>
                                            </div>
                                            <div class="price d-flex">
                                                <div class="text-muted me-2">Total_Price</div>: {{$value->total_price}} $
                                            </div>
                                            <div class="avaiabilty">
                                                <div class="text-success">Call : {{$value->phone}}</div>
                                            </div>
                                            @if($value->status==0)
                                            <a class="btn btn-primary btn-xs" href="#">Chưa Xử Lý </a><i class="close" data-feather="x"></i>
                                            @elseif($value->status==1)
                                            <a class="btn btn-primary btn-xs" href="#">Đang Xử Ly </a><i class="close" data-feather="x"></i>
                                            @elseif($value->status==2)
                                            <a class="btn btn-primary btn-xs" href="#">Đang Giao Hàng </a><i class="close" data-feather="x"></i>
                                            @elseif($value->status==3)
                                            <a class="btn btn-primary btn-xs" href="#">Đã Giao Hàng </a><i class="close" data-feather="x"></i>
                                            @else
                                            <a class="btn btn-primary btn-xs" href="#">Đã Hủy </a><i class="close" data-feather="x"></i>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <h5 style="color: red;">Hiện Tại Chưa Có Sản Phẩm Nào</h5>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                    <div class="row" style="padding-top: 15px;" >
                            <div class="col-5">
                                <h5> Đang Vận Chuyển</h5>
                            </div>
                            <div class="col-5">
                                <div class="sreach" style="margin:0 auto;">
                                    <form action="{{route('orders')}}" method="GET">
                                        <div class="input-group row">
                                            <input class="form-control col-2" id="s2" type="text" placeholder="Nhập tên cần tìm..." name="s2" value="">
                                            <button type="submit" class="col-4 btn btn-primary">Tìm kiếm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if($orders2->items() != [])
                            @foreach ($orders2 as $value )
                            <div class="col-xxl-4 col-md-6">
                                <div class="prooduct-details-box">
                                    <div class="media"><img class="align-self-center img-fluid img-60" style="height: 80px;padding-left: 5px;object-fit: cover;" src="{{url('uploads')}}/{{$value->avata}}" alt="#">
                                        <div class="media-body ms-3">
                                            <div class="product-name">
                                                <h6><a href="{{route('orders_detail',$value->id)}}">{{$value->name}}</a></h6>
                                            </div>
                                            <div>Quantity : {{$value->quantity}}</div>
                                            <div class="price d-flex">
                                                <div class="text-muted me-2">Total_Price</div>: {{$value->total_price}} $
                                            </div>
                                            <div class="avaiabilty">
                                                <div class="text-success">Call : {{$value->phone}}</div>
                                            </div>
                                            @if($value->status==0)
                                            <a class="btn btn-primary btn-xs" href="#">Chưa Xử Lý </a><i class="close" data-feather="x"></i>
                                            @elseif($value->status==1)
                                            <a class="btn btn-primary btn-xs" href="#">Đang Xử Ly </a><i class="close" data-feather="x"></i>
                                            @elseif($value->status==2)
                                            <a class="btn btn-primary btn-xs" href="#">Đang Giao Hàng </a><i class="close" data-feather="x"></i>
                                            @elseif($value->status==3)
                                            <a class="btn btn-primary btn-xs" href="#">Đã Giao Hàng </a><i class="close" data-feather="x"></i>
                                            @else
                                            <a class="btn btn-primary btn-xs" href="#">Đã Hủy </a><i class="close" data-feather="x"></i>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <h5 style="color: red;">Hiện Tại Chưa Có Sản Phẩm Nào</h5>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                    <div class="row" style="padding-top: 15px;" >
                            <div class="col-5">
                                <h5> Đã Giao Hàng</h5>
                            </div>
                            <div class="col-5">
                                <div class="sreach" style="margin:0 auto;">
                                    <form action="{{route('orders')}}" method="GET">
                                        <div class="input-group row">
                                            <input class="form-control col-2" id="s3" type="text" placeholder="Nhập tên cần tìm..." name="s3" value="">
                                            <button type="submit" class="col-4 btn btn-primary">Tìm kiếm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if($orders3->items() != [])
                            @foreach ($orders3 as $value )
                            <div class="col-xxl-4 col-md-6">
                                <div class="prooduct-details-box">
                                    <div class="media"><img class="align-self-center img-fluid img-60" style="height: 80px;padding-left: 5px;object-fit: cover;" src="{{url('uploads')}}/{{$value->avata}}" alt="#">
                                        <div class="media-body ms-3">
                                            <div class="product-name">
                                                <h6><a href="{{route('orders_detail',$value->id)}}">{{$value->name}}</a></h6>
                                            </div>
                                            <div>Quantity : {{$value->quantity}}</div>
                                            <div class="price d-flex">
                                                <div class="text-muted me-2">Total_Price</div>: {{$value->total_price}} $
                                            </div>
                                            <div class="avaiabilty">
                                                <div class="text-success">Call : {{$value->phone}}</div>
                                            </div>
                                            @if($value->status==0)
                                            <a class="btn btn-primary btn-xs" href="#">Chưa Xử Lý </a><i class="close" data-feather="x"></i>
                                            @elseif($value->status==1)
                                            <a class="btn btn-primary btn-xs" href="#">Đang Xử Ly </a><i class="close" data-feather="x"></i>
                                            @elseif($value->status==2)
                                            <a class="btn btn-primary btn-xs" href="#">Đang Giao Hàng </a><i class="close" data-feather="x"></i>
                                            @elseif($value->status==3)
                                            <a class="btn btn-primary btn-xs" href="#">Đã Giao Hàng </a><i class="close" data-feather="x"></i>
                                            @else
                                            <a class="btn btn-primary btn-xs" href="#">Đã Hủy </a><i class="close" data-feather="x"></i>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <h5 style="color: red;">Hiện Tại Chưa Có Sản Phẩm Nào</h5>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                    <div class="row" style="padding-top: 15px;" >
                            <div class="col-5">
                                <h5> Đơn Hàng Đã Bị Hủy</h5>
                            </div>
                            <div class="col-5">
                                <div class="sreach" style="margin:0 auto;">
                                    <form action="{{route('orders')}}" method="GET">
                                        <div class="input-group row">
                                            <input class="form-control col-2" id="s4" type="text" placeholder="Nhập tên cần tìm..." name="s4" value="">
                                            <button type="submit" class="col-4 btn btn-primary">Tìm kiếm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if($orders4->items() != [])
                            @foreach ($orders4 as $value )
                            <div class="col-xxl-4 col-md-6">
                                <div class="prooduct-details-box">
                                    <div class="media"><img class="align-self-center img-fluid img-60" style="height: 80px;padding-left: 5px;object-fit: cover;" src="{{url('uploads')}}/{{$value->avata}}" alt="#">
                                        <div class="media-body ms-3">
                                            <div class="product-name">
                                                <h6><a href="{{route('orders_detail',$value->id)}}">{{$value->name}}</a></h6>
                                            </div>
                                            <div>Quantity : {{$value->quantity}}</div>
                                            <div class="price d-flex">
                                                <div class="text-muted me-2">Total_Price</div>: {{$value->total_price}} $
                                            </div>
                                            <div class="avaiabilty">
                                                <div class="text-success">Call : {{$value->phone}}</div>
                                            </div>
                                            @if($value->status==0)
                                            <a class="btn btn-primary btn-xs" href="#">Chưa Xử Lý </a><i class="close" data-feather="x"></i>
                                            @elseif($value->status==1)
                                            <a class="btn btn-primary btn-xs" href="#">Đang Xử Ly </a><i class="close" data-feather="x"></i>
                                            @elseif($value->status==2)
                                            <a class="btn btn-primary btn-xs" href="#">Đang Giao Hàng </a><i class="close" data-feather="x"></i>
                                            @elseif($value->status==3)
                                            <a class="btn btn-primary btn-xs" href="#">Đã Giao Hàng </a><i class="close" data-feather="x"></i>
                                            @else
                                            <a class="btn btn-primary btn-xs" href="#">Đã Hủy </a><i class="close" data-feather="x"></i>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <h5 style="color: red;">Hiện Tại Chưa Có Sản Phẩm Nào</h5>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@stop
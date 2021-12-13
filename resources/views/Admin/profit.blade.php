@extends('Admin.master.master');
@section('main')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Thống kê</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Admin</li>
                        <li class="breadcrumb-item active">Thống kê</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="database"></i></div>
                            <div class="media-body"><span class="m-0">Tất cả lợi nhuận</span>
                                <h5 class="mb-0 counter">{{number_format($TotalProfitAllTime)}} VND</h5><i class="icon-bg"
                                    data-feather="database"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                    <div class="bg-secondary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
                            <div class="media-body"><span class="m-0">Tổng số sản phẩm</span>
                                <h4 class="mb-0 counter">{{$ProductCount}}</h4><i class="icon-bg"
                                    data-feather="shopping-bag"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                            <div class="media-body"><span class="m-0">Thông báo</span>
                                <h4 class="mb-0 counter">0</h4><i class="icon-bg" data-feather="message-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
                            <div class="media-body"><span class="m-0">Người dùng</span>
                                <h4 class="mb-0 counter">{{$UserCount}}</h4><i class="icon-bg"
                                    data-feather="user-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 xl-100 box-col-12">
                <h5 class="text-center mt-2">Bảng khái quát doanh số bán hàng</h5>
                <div class="widget-joins card widget-arrow">
                    <div class="row">
                        <div class="col-sm-6 pe-0">
                            <div class="media border-after-xs">
                                <div class="align-self-center me-3 text-start"><span class="mb-1">Doanh số</span>
                                    <h5 class="mb-0">Hôm nay</h5>
                                </div>
                                <div class="media-body align-self-center">
                                    @if($DiffToday<0) <i class="font-primary" data-feather="arrow-down"></i>
                                        @elseif($DiffToday>0)
                                        <i class="font-primary" data-feather="arrow-up"></i>
                                        @else
                                        <i class="font-primary" data-feather="copy"></i>
                                        @endif
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0"><span class="counter">{{number_format($TotalProfitToday)}}</span> VND</h5><span
                                        class="mb-1">{{number_format($DiffToday,0)}}VND ({{$PercentToday}}%)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 ps-0">
                            <div class="media">
                                <div class="align-self-center me-3 text-start"><span class="mb-1">Doanh số</span>
                                    <h5 class="mb-0">Tháng </h5>
                                </div>
                                <div class="media-body align-self-center">
                                    @if($Diff7Day<0) <i class="font-primary" data-feather="arrow-down"></i>
                                        @elseif($Diff7Day>0)
                                        <i class="font-primary" data-feather="arrow-up"></i>
                                        @else
                                        <i class="font-primary" data-feather="copy"></i>
                                        @endif
                                </div>
                                <div class="media-body ps-2">
                                    <h5 class="mb-0"><span class="counter">{{number_format($TotalProfit30Day)}}</span> VND</h5><span
                                        class="mb-1">{{number_format($Diff7Day,0)}}VND ({{$Percent7Day}}%)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 pe-0">
                            <div class="media border-after-xs">
                                <div class="align-self-center me-3 text-start"><span class="mb-1">Doanh số</span>
                                    <h5 class="mb-0">Tuần</h5>
                                </div>
                                <div class="media-body align-self-center">
                                    @if($Diff30Day<0) <i class="font-primary" data-feather="arrow-down"></i>
                                        @elseif($Diff30Day>0)
                                        <i class="font-primary" data-feather="arrow-up"></i>
                                        @else
                                        <i class="font-primary" data-feather="copy"></i>
                                        @endif
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0"><span class="counter">{{number_format($TotalProfit7Day)}}</span> VND</h5><span
                                        class="mb-1">{{number_format($Diff30Day,0)}}VND ({{$Percent30Day}}%)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 ps-0">
                            <div class="media">
                                <div class="align-self-center me-3 text-start"><span class="mb-1">Doanh số</span>
                                    <h5 class="mb-0">Năm</h5>
                                </div>
                                <div class="media-body align-self-center ps-3">
                                    @if($Diff365Day<0) <i class="font-primary" data-feather="arrow-down"></i>
                                        @elseif($Diff365Day>0)
                                        <i class="font-primary" data-feather="arrow-up"></i>
                                        @else
                                        <i class="font-primary" data-feather="copy"></i>
                                        @endif
                                </div>
                                <div class="media-body ps-2">
                                    <h5 class="mb-0"><span class="counter">{{number_format($TotalProfit365Day)}}</span> VND</h5><span
                                        class="mb-1">{{number_format($Diff365Day,0)}}VND ({{$Percent365Day}}%)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <h5 class="text-center mt-2">Đồ thị thống kê doanh số theo thời gian</h5>
        <form action="POST" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-md-2">
                    <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
                </div>
                <div class="col-md-2">
                    <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
                </div>
                <div class="col-md-2">
                    <p>Lọc theo:
                        <select name="" id="dashboard-filter" class="dashboard-filter form-control">
                            <option class="text-center">--chọn--</option>
                            <option value="7ngay">7 ngày qua</option>
                            <option value="thangtruoc">tháng trước</option>
                            <option value="thangnay">tháng này</option>
                            <option value="365ngay">365 ngày qua</option>
                        </select>
                    </p>
                </div>
                <div class="col-md-2">
                    <p>lọc<input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm form-control"
                            value="filter"></p>
                </div>

            </div>
        </form>
        <div class="col-md-12">
            <div id="myfirstchart" style="height: 250px;"></div>
        </div>
    </div>


    <div class="container-fluid mt-2">
        <h5 class="text-center">Tình trạng đơn hàng</h5>
        <div class="col-xl-12 xl-100 box-col-12">
            <div class="widget-joins card">
                <div class="row">
                    <div class="col-sm-6 pe-0">
                        <div class="media border-after-xs">
                            <div class="align-self-center me-3">
                                <h6>Đơn hàng</h6>
                            </div>
                            <div class="media-body details ps-3"><span class="mb-1">Mới</span>
                                <h5 class="mb-0 counter">{{$NewOrder}}</h5>
                            </div>
                            <div class="media-body align-self-center"><i class="font-primary float-end ms-2"
                                    data-feather="shopping-bag"></i></div>
                        </div>
                    </div>
                    <div class="col-sm-6 ps-0">
                        <div class="media">
                            <div class="align-self-center me-3">
                                <h6>Đơn hàng</h6>
                            </div>
                            <div class="media-body details ps-3"><span class="mb-1">Đang giải quyết</span>
                                <h5 class="mb-0 counter">{{$ProcessingOrder}}</h5>
                            </div>
                            <div class="media-body align-self-center"><i class="font-primary float-end ms-3"
                                    data-feather="layers"></i></div>
                        </div>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <div class="media border-after-xs">
                            <div class="align-self-center me-3">
                                <h6>Đơn hàng</h6>
                            </div>
                            <div class="media-body details ps-3 pt-0"><span class="mb-1">Hoàn thành</span>
                                <h5 class="mb-0 counter">{{$CompletedOrder}}</h5>
                            </div>
                            <div class="media-body align-self-center"><i class="font-primary float-end ms-2"
                                    data-feather="shopping-cart"></i></div>
                        </div>
                    </div>
                    <div class="col-sm-6 ps-0">
                        <div class="media">
                            <div class="align-self-center me-3">
                                <h6>Đơn hàng</h6>
                            </div>
                            <div class="media-body details ps-3 pt-0"><span class="mb-1">Đã Hủy</span>
                                <h5 class="mb-0 counter">{{$CancelledOrder}}</h5>
                            </div>
                            <div class="media-body align-self-center"><i class="font-primary float-end ms-2"
                                    data-feather="dollar-sign"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(function() {
    $("#datepicker").datepicker({
        prevText: "Tháng trước",
        nextText: "Tháng sau",
        dateFormat: "yy-mm-dd",
        dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật", ],
        duration: "slow"
    });
    $("#datepicker2").datepicker({
        prevText: "Tháng trước",
        nextText: "Tháng sau",
        dateFormat: "yy-mm-dd",
        dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật", ],
        duration: "slow"
    });
});



$('#btn-dashboard-filter').click(function() {
    var _token = $('input[name="_token"]').val();
    var from_date = $('#datepicker').val();
    var to_date = $('#datepicker2').val();
    $.ajax({
        url: "{{route('filter_by_date')}}",
        method: "POST",
        dataType: "JSON",
        data: {
            from_date: from_date,
            to_date: to_date,
            _token: _token
        },

        success: function(data) {
            chart.setData(data);
        }
    })
});

$('#dashboard-filter').on('change', function() {
    var _token = $('input[name="_token"]').val();
    var dashboard_value = $(this).val();
    $.ajax({
        url: "{{route('dashboard_filter')}}",
        method: "POST",
        dataType: "JSON",
        data: {
            dashboard_value: dashboard_value,
            _token: _token
        },

        success: function(data) {
            chart.setData(data);
        }
    })
});

function chart30daysorder() {
    var _token = $('input[name="_token"]').val();
    $.ajax({
        url: "{{route('days_order')}}",
        method: "POST",
        dataType: "JSON",
        data: {
            _token: _token
        },

        success: function(data) {
            chart.setData(data);
        }
    })
};
</script>


@stop
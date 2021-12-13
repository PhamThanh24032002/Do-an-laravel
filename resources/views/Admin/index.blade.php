@extends('Admin.master.master')

@section('main')


<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12" style="text-align: center;">
                    <h3 style="color: blueviolet;">Chào Mừng {{auth('admin')->user()->name}} Đến Với Trang Quản Trị Viên</h3>
                </div>
                <!-- <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Default      </li>
                  </ol>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row second-chart-list third-news-update">
            <div class="col-xl-6 col-lg-12 xl-50 morning-sec box-col-12">
                <div class="card o-hidden profile-greeting">
                    <div class="card-body">
                        <div class="media">
                            <div class="badge-groups w-100">
                                <div class="badge f-12"><i class="me-1" data-feather="clock"></i><span id="txt"></span>
                                </div>
                                <div class="badge f-12"><i class="fa fa-spin fa-cog f-14"></i></div>
                            </div>
                        </div>
                        <div class="greeting-user text-center">
                            <div class="profile-vector"><img class="img-fluid"
                                    src="../assets/images/dashboard/welcome.png" alt=""></div>
                            <h4 class="f-w-600"><span id="greeting">Good Morning</span> <span class="right-circle"><i
                                        class="fa fa-check-circle f-14 middle"></i></span></h4>
                            <p><span> Chúc Bạn Ngày Mới Vui Vẻ , Hạnh Phúc </span></p>
                            <p><span> Kẻ Thù Số Một Của Thành Công Là Sự Lười Biếng </span></p>
                            <div class="whatsnew-btn"><a class="btn btn-primary">Có Gì Mới !</a></div>
                            <div class="left-icon"><i class="fa fa-bell"> </i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 xl-50 calendar-sec box-col-6">
                <div class="card gradient-primary o-hidden">
                    <div class="card-body">
                        <div class="setting-dot">
                            <div class="setting-bg-primary date-picker-setting position-set pull-right"><i
                                    class="fa fa-spin fa-cog"></i></div>
                        </div>
                        <div class="default-datepicker">
                            <div class="datepicker-here" data-language="en"></div>
                        </div><span class="default-dots-stay overview-dots full-width-dots"><span
                                class="dots-group"><span class="dots dots1"></span><span
                                    class="dots dots2 dot-small"></span><span class="dots dots3 dot-small"></span><span
                                    class="dots dots4 dot-medium"></span><span class="dots dots5 dot-small"></span><span
                                    class="dots dots6 dot-small"></span><span
                                    class="dots dots7 dot-small-semi"></span><span
                                    class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">
                                </span></span></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 box-col-12 a">
                <div class="filler"></div>
                <svg width="200" height="200">

                    <filter id="innerShadow" x="-20%" y="-20%" width="140%" height="140%">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="3" result="blur" />
                        <feOffset in="blur" dx="2.5" dy="2.5" />
                    </filter>

                    <g>
                        <circle id="shadow" style="fill:rgba(0,0,0,0.1)" cx="97" cy="100" r="87"
                            filter="url(#innerShadow)"></circle>
                        <circle id="circle" style="stroke: #FFF; stroke-width: 12px; fill:#20B7AF" cx="100" cy="100"
                            r="80"></circle>
                    </g>
                    <g>
                        <line x1="100" y1="100" x2="100" y2="55" transform="rotate(80 100 100)"
                            style="stroke-width: 3px; stroke: #fffbf9;" id="hourhand">
                            <animatetransform attributeName="transform" attributeType="XML" type="rotate" dur="43200s"
                                repeatCount="indefinite" />
                        </line>
                        <line x1="100" y1="100" x2="100" y2="40" style="stroke-width: 4px; stroke: #fdfdfd;"
                            id="minutehand">
                            <animatetransform attributeName="transform" attributeType="XML" type="rotate" dur="3600s"
                                repeatCount="indefinite" />
                        </line>
                        <line x1="100" y1="100" x2="100" y2="30" style="stroke-width: 2px; stroke: #C1EFED;"
                            id="secondhand">
                            <animatetransform attributeName="transform" attributeType="XML" type="rotate" dur="60s"
                                repeatCount="indefinite" />
                        </line>
                    </g>
                    <circle id="center" style="fill:#128A86; stroke: #C1EFED; stroke-width: 2px;" cx="100" cy="100"
                        r="3"></circle>
                </svg>
            </div>

         
            <div class="col-xl-12 xl-100 dashboard-sec box-col-12">
                <div class="card earning-card">
                    <div class="card-body p-4">
                        <div class="row m-0">
                            <h5 class="text-center">Đồ thị thống kê doanh số 30 ngày qua</h5>
                            <form action="POST" autocomplete="off">
                                @csrf
                            </form>
                            <div class="col-md-12">
                                <div id="myfirstchart" style="height: 250px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
<!-- footer start-->
<style>
.a body {
    background: #eee;
}

.a svg {
    display: block;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.a{
  height: 300px;
}
.a .filler {
    background: #20B7AF;
    position: absolute;
    bottom: 50%;
    top: 0;
    left: 0;
    right: 0;
}
</style>

<script>
var hands = [];
hands.push(document.querySelector('#secondhand > *'));
hands.push(document.querySelector('#minutehand > *'));
hands.push(document.querySelector('#hourhand > *'));

var cx = 100;
var cy = 100;

function shifter(val) {
    return [val, cx, cy].join(' ');
}

var date = new Date();
var hoursAngle = 360 * date.getHours() / 12 + date.getMinutes() / 2;
var minuteAngle = 360 * date.getMinutes() / 60;
var secAngle = 360 * date.getSeconds() / 60;

hands[0].setAttribute('from', shifter(secAngle));
hands[0].setAttribute('to', shifter(secAngle + 360));
hands[1].setAttribute('from', shifter(minuteAngle));
hands[1].setAttribute('to', shifter(minuteAngle + 360));
hands[2].setAttribute('from', shifter(hoursAngle));
hands[2].setAttribute('to', shifter(hoursAngle + 360));

for (var i = 1; i <= 12; i++) {
    var el = document.createElementNS('http://www.w3.org/2000/svg', 'line');
    el.setAttribute('x1', '100');
    el.setAttribute('y1', '30');
    el.setAttribute('x2', '100');
    el.setAttribute('y2', '40');
    el.setAttribute('transform', 'rotate(' + (i * 360 / 12) + ' 100 100)');
    el.setAttribute('style', 'stroke: #ffffff;');
    document.querySelector('svg').appendChild(el);
}
</script>
@stop
@section('js')
<script>
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
@extends('Admin.master.master');
@section('main')
<script>
    function displaynone() {
        document.getElementById("demo").style.display = "none";

    }
</script>

<div class="page-body">
    <!-- popup -->
    <form action="">
        @csrf
        @if(Session::has('success'))
        <button class="card m-auto col-12" onclick="displaynone()">
            <h5 class="text-success m-auto">{{Session::get('success')}}</h5>
        </button>
        @endif
    </form>
    <!-- endpopup -->

    <!-- Default ordering (sorting) Starts-->
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h5>Danh sách kích cỡ</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display dataTable text-center" id="basic-3">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Trạng thái</th>
                                    <th> </th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($size as $value)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>@if($value->status===1) <div class=" text-primary">Hiển thị</div> @else <div class=" text-secondary">Ẩn</div> @endif</td>
                                    @if($value->name!="none")
                                    <td>
                                        <a href="{{route('size.edit',$value->id)}}" class="btn btn-primary ">Sửa</a>
                                    </td>
                                    <td>
                                        <form action="{{route('size.destroy',$value->id)}}" class="m-auto" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button href="{{route('size.destroy',$value->id)}}" type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
                                    </td>
                                    @endif

                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>

        <!-- thêm kích cỡ-->

        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h5>Thêm mới kích cỡ</h5>
                </div>

                <form action="{{route('size.store')}}" class="form theme-form" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Tên</label>
                                    <input class="form-control" name="name" id="name" type="text" placeholder="Nhập tên kích cỡ ở đây">
                                    <!-- validate name cate  -->
                                    @if($errors->has('name'))
                                    <span class="text-danger mt-1">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- <div class="row"> -->
                        <div class="animate-chk mb-1">
                            <div class="row">
                                <label class="form-label" for="">Trạng thái</label>
                                <div class="col">
                                    <label class="d-block" for="edo-ani">
                                        <input class="radio_animated" id="edo-ani" type="radio" value="1" name="status" checked> Hiện
                                    </label>
                                    <label class="d-block" for="edo-ani1">
                                        <input class="radio_animated" id="edo-ani1" type="radio" value="0" name="status"> Ẩn
                                    </label>

                                </div>
                            </div>
                        </div>
                        <!-- </div> -->


                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <input class="btn btn-light" href="" type="reset" value="Reset">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Plugins JS start-->
<!-- <script src="{{asset('assets/js/sidebar-menu.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
<script src="{{asset('assets/js/tooltip-init.js')}}"></script> -->

<!-- Plugins JS Ends-->

<!-- <script>
    $('#basic-3').DataTable({
        "order": [[ 3, "desc" ]]
    });
</script> -->
@stop
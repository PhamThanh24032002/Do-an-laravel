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
                    <h5>Danh sách màu</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display dataTable text-center" id="basic-3">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Giá trị</th>
                                    <th>Trạng thái</th>
                                    <th> </th>
                                    <th> </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($color as $value)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>
                                        <div class="btn p-3 m-1" style="background-color: <?= $value->values ?>; width: 250px;">
                                            {{$value->values}}
                                        </div>
                                    </td>
                                    <td>@if($value->status===1) <div class=" text-primary">Hiển thị</div> @else <div class=" text-secondary">Ẩn</div> @endif</td>
                                    @if($value->name!="none")
                                    <td>
                                        <a href="{{route('color.edit',$value->id)}}" class="btn btn-primary ">Sửa</a>
                                    </td>
                                    <td>
                                        <form action="{{route('color.destroy',$value->id)}}" class="m-auto" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button href="{{route('color.destroy',$value->id)}}" type="submit" class="btn btn-danger">Xóa</button>
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

        <!-- thêm màu-->

        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h5>Thêm mới màu</h5>
                </div>

                <form action="{{route('color.store')}}" class="form theme-form" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <div class="">
                                    <label class="form-label" for="name">Tên</label>
                                    <input class="form-control" name="name" id="name" type="text" placeholder="Nhập tên màu ở đây">
                                </div>
                            </div>
                            <!-- validate name cate  -->
                            @if($errors->has('name'))
                            <span class="text-danger mt-1">{{$errors->first('name')}}</span>
                            @endif
                        </div>


                        <div class="mt-3 row">
                            <label class="col-sm-3 col-form-label pt-0">Mã màu hex</label>
                            <div class="col-sm-9">
                                <input class="form-control form-control-color" name="values" style="height: fit-content;" type="color" value="">
                            </div>
                            <!-- validate values cate  -->
                            @if($errors->has('values'))
                            <span class="text-danger mt-1">{{$errors->first('values')}}</span>
                            @endif

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
                        <input class="btn btn-light" type="reset" value="Reset">
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
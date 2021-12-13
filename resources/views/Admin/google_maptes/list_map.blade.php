@extends('Admin.master.master');
@section('main')
<div class="page-body">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-header">
                            <h5>Danh Sách Maps</h5>
                        </div>
                        <div class="card-col-xl-3">

                            <a href="{{route('googlemap.create')}}" class="btn btn-danger"> Thêm</a>
                        </div>
                        <table class="table" style="text-align:center">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>link</th>
                                    <th>Trạng Thái</th>
                                    <th>Chức Năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($map as $cate)
                                <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>
                                        <div class="" style="width: 200px">{!! $cate->links !!}</div>
                                        <!-- <iframe src="" width="150px" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
                                    </td>
                                    <td>{!!($cate->status==0)?'<span style="color: rgb(56, 184, 223)">Ẩn</span>':'<span
                                            style="color: red">Hiện Thị</span>'!!}</td>
                                    <form action="{{route('googlemap.destroy',$cate->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <td>
                                            <a href="{{route('googlemap.edit',$cate->id)}}" class="btn btn-secondary">
                                                Sửa</a>
                                            <button class="btn btn-danger" type="submit"
                                                onclick="return confirm('Bạn có chắc muốn xóa danh mục này chứ')">Xóa</button>
                                        </td>
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@stop
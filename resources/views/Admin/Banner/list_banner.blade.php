@extends('Admin.master.master');
@section('main')
<div class="page-body">
    <div class="row">

        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-header">
                            <h5>Danh Sách Banner</h5>
                        </div>
                        <div class="card-col-xl-3">

                            <a href="{{route('banner.create')}}" class="btn btn-danger"> Thêm</a>
                        </div>
                        <table class="table" style="text-align:center">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên </th>
                                    <th>link</th>
                                    <th>image</th>
                                    <th>positon</th>
                                    <th>Trạng Thái</th>

                                    <th>Chức Năng</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($banner as $cate)
                                <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{{$cate->name}}</td>
                                    <td>{{$cate->links}}</td>
                                    <td>
                                        <img src="{{url('imageBanner')}}/{{$cate->image}}" width="150px"
                                            alt="{{$cate->image}}">
                                    </td>
                                    <td>{{$cate->position}}</td>
                                    <td>{!!($cate->status==0)?'<span style="color: rgb(56, 184, 223)">Ẩn</span>':'<span
                                            style="color: red">Hiện Thị</span>'!!}</td>
                                    <form action="{{route('banner.destroy',$cate->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <td>
                                            <a href="{{route('banner.edit',$cate->id)}}" class="btn btn-secondary">
                                                Sửa</a>
                                            <button class="btn btn-danger" type="submit"
                                                onclick="return confirm('Bạn có chắc muốn xóa danh mục này chứ')">Xóa</button>
                                        </td>
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="card-footer">
                            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="{{($banner->currentPage() == 1)? 'page-link d-none' : 'page-link'}}"
                                            href="{{$banner->previousPageUrl()}}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    @for($i = 1; $i <= $banner->lastPage() ;$i++ )
                                        <li
                                            class="{{($banner->currentPage() == $i)? 'page-item active' : 'page-item'}}">
                                            <a class="page-link" href="{{$banner->url($i)}}">{{$i}}</a></li>
                                        @endfor
                                        <li class="page-item">
                                            <a class="{{($banner->currentPage() == $banner->lastPage())? 'page-link d-none' : 'page-link'}}"
                                                href="{{$banner->nextPageUrl()}}" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>
@stop
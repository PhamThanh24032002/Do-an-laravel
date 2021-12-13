@extends('Admin.master.master');
@section('main')
<div class="page-body">
    <div class="row">


        <div class="col-xl-2">

        </div>
        <div class="col-sm-12 col-xl-8">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Danh Sách Danh Mục</h5>
                        </div>
                        <table class="table" style="text-align:center">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Trạng Thái</th>
                                    <th>Chức Năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list_cate_blog as $cate)
                                <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{{$cate->name}}</td>
                                    <td>{!!($cate->status==0)?'<span style="color: rgb(56, 184, 223)">Ẩn</span>':'<span style="color: red">Hiện Thị</span>'!!}</td>
                                    <form action="{{route('category_blog.destroy',$cate->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <td>
                                            <a href="{{route('category_blog.edit',$cate->id)}}" class="btn btn-secondary"> Sửa</a>
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Bạn có chắc muốn xóa danh mục này chứ')">Xóa</button>
                                        </td>
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="{{($list_cate_blog->currentPage() == 1)? 'page-link d-none' : 'page-link'}}" href="{{$list_cate_blog->previousPageUrl()}}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            @for($i = 1; $i <= $list_cate_blog->lastPage() ;$i++ )
                                <li class="{{($list_cate_blog->currentPage() == $i)? 'page-item active' : 'page-item'}}"><a class="page-link" href="{{$list_cate_blog->url($i)}}">{{$i}}</a></li>
                                @endfor
                                <li class="page-item">
                                    <a class="{{($list_cate_blog->currentPage() == $list_cate_blog->lastPage())? 'page-link d-none' : 'page-link'}}" href="{{$list_cate_blog->nextPageUrl()}}" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                        </ul>
                    </nav>
            </div>
        </div>
        <div class="col-xl-2">

        </div>
    </div>

</div>
@stop
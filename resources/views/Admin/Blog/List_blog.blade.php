@extends('Admin.master.master');
@section('main')
<div class="page-body">
    <div class="row">
        <div class="col-xl-1">
        </div>
        <div class="col-sm-12 col-xl-10">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Danh Sách Bài Viết</h5>
                        </div>
                        <table class="table" style="text-align:center">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tiêu Đề</th>
                                    <th>Danh Mục</th>
                                    <th>Trạng Thái</th>
                                    <th>Chi Tiết</th>
                                    <th>Chức Năng</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blog_query as $cate)
                                <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{!! Str::limit($cate->title,10) !!}</td>
                                    <td>{{$cate->cate_name}}</td>
                                    <td>{!!($cate->status==0)?'<span style="color: rgb(56, 184, 223)">Ẩn</span>':'<span
                                            style="color: red">Hiện Thị</span>'!!}</td>
                                    <td><a href="{{route('blog.show',$cate->id)}}" class="btn btn-secondary">Chi
                                            Tiết</a></td>
                                    <form action="{{route('blog.destroy',$cate->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <td>
                                            <a href="{{route('blog.edit',$cate->id)}}" class="btn btn-secondary">
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
                                        <a class="{{($blog_query->currentPage() == 1)? 'page-link d-none' : 'page-link'}}"
                                            href="{{$blog_query->previousPageUrl()}}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    @for($i = 1; $i <= $blog_query->lastPage() ;$i++ )
                                        <li
                                            class="{{($blog_query->currentPage() == $i)? 'page-item active' : 'page-item'}}">
                                            <a class="page-link" href="{{$blog_query->url($i)}}">{{$i}}</a></li>
                                        @endfor
                                        <li class="page-item">
                                            <a class="{{($blog_query->currentPage() == $blog_query->lastPage())? 'page-link d-none' : 'page-link'}}"
                                                href="{{$blog_query->nextPageUrl()}}" aria-label="Next">
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
        <div class="col-xl-1">

        </div>
    </div>

</div>
@stop
@extends('Admin.master.master');
@section('main')
<div class="page-body">
    <div class="sreach" style="width:30%;margin:0 auto;">
        <form action="{{route('category.index')}}" method="GET">
            <div class="input-group row">
                <input class="form-control col-2" id="s" type="text" placeholder="Nhập tên cần tìm..." name="s" value="">
                <button type="submit" class="col-4 btn btn-primary">Tìm kiếm</button>
            </div>
        </form>
    </div>
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
                            @if(count($list_cate)>0)
                            <tbody>
                                <?php
                                tableCategories($list_cate)
                                ?>
                            </tbody>
                            @else
                                <tr>
                                    <td></td>
                                    <td></td>
                                   
                                    <td>
                                        <h2 class="text-secondary m-auto">Không có kết quả. Hãy thử từ khóa khác</h2>
                                    </td>
                                    <td></td>
                                    <td></td>
                                   
                                </tr>
                                @endif
                        </table>
                        <div class="card-footer">
                            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="{{($list_cate->currentPage() == 1)? 'page-link d-none' : 'page-link'}}" href="{{$list_cate->previousPageUrl()}}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    @for($i = 1; $i <= $list_cate->lastPage() ;$i++ )
                                        <li class="{{($list_cate->currentPage() == $i)? 'page-item active' : 'page-item'}}">
                                            <a class="page-link" href="{{$list_cate->url($i)}}">{{$i}}</a>
                                        </li>
                                        @endfor
                                        <li class="page-item">
                                            <a class="{{($list_cate->currentPage() == $list_cate->lastPage())? 'page-link d-none' : 'page-link'}}" href="{{$list_cate->nextPageUrl()}}" aria-label="Next">
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
        <div class="col-xl-2">

        </div>
    </div>

</div>
@stop
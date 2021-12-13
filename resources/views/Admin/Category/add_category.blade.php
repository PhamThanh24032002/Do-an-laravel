@extends('Admin.master.master')
@section('main')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Danh Mục</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Form Layout</li>
                        <li class="breadcrumb-item active"> Default Forms</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xl-5">
                <div class="row">
                    <form action="{{route('category.store')}}" method="POST">
                        @csrf
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Thêm Mới Danh Mục</h5>
                                </div>
                                <div class="card-body">
                                    <form class="theme-form">
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0" for="exampleInputEmail1">Tên Danh
                                                Mục</label>
                                            <input class="form-control" name="name" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Tên Danh Mục">
                                            @if ($errors->has('name'))
                                            <small style="color: red">{{ $errors->first('name') }}</small>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label>Parent Category</label>
                                            <select name="parent_id" id="input" class="form-control" required="required">
                                                <option value="0">Parent</option>
                                                <?php showCategories($category) ?>

                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label col-sm-3 pt-0">Trạng Thái</label>
                                            <div class="col-sm-9">
                                                <div class="form-check radio radio-primary">
                                                    <input class="form-check-input" id="radio11" type="radio" name="status" value="1" checked>
                                                    <label class="form-check-label" for="radio11">Hiển Thị</label>
                                                </div>
                                                <div class="form-check radio radio-primary">
                                                    <input class="form-check-input" id="radio22" type="radio" name="status" value="0">
                                                    <label class="form-check-label" for="radio22"> Ẩn</label>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <button class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-7">
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
                            <?php
                               tableCategories($list_cate)
                               ?>
                            </tbody>
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
    </div>
</div>
</div>
<!-- Container-fluid Ends-->

@stop


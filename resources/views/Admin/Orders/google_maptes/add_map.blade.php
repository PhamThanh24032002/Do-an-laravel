@extends('Admin.master.master')
@section('main')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>google map</h3>
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
    <form action="{{route('googlemap.store')}}" method="POST" enctype="multipart/form-data">
        <!-- Container-fluid starts-->
        <div class="container-fluid">vv
            <div class="row">
                <div class="col-sm-12 col-xl-6">
                    <div class="row">
                        @csrf
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Thêm Mới maps</h5>
                                </div>
                                <div class="card-body">
                                    <form class="theme-form">
                               
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0" for="">links</label>
                                            <textarea class="form-control" value="{{old('links')}}" id="editor" name="links" type="text" placeholder=" Nội Dung" style="height: 150px;"></textarea>
                                            @if ($errors->has('links'))
                                            <small style="color: red">{{ $errors->first('links') }}</small>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label col-sm-3 pt-0">Trạng Thái</label>
                                            <div class="col-sm-9">
                                                <div class="form-check radio radio-primary">
                                                    <input class="form-check-input" id="radio11" type="radio" name="status" value="1" >
                                                    <label class="form-check-label" for="radio11">Hiển Thị</label>
                                                </div>
                                                <div class="form-check radio radio-primary">
                                                    <input class="form-check-input" id="radio22" type="radio" name="status" value="0" checked>
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
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">

                </div>
              

            </div>

        </div>
    </form>
</div>
<!-- ner-fluid Ends-->

@stop
@section('js')


@stop
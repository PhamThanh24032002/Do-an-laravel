@extends('Admin.master.master');
@section('main')
<div class="page-body">
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Thêm mới màu</h5>
                    </div>

                    <form action="{{route('color.store')}}" class="form theme-form" method="POST" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Tên</label>
                                        <input class="form-control" name="name" id="name" type="text"
                                            placeholder="Nhập tên sản phẩm ở đây">
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label pt-0">Mã màu hex</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-control-color" name="values" style="height: fit-content;" type="color" value="">
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
                            <input class="btn btn-light" type="reset" value="Cancel">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@stop
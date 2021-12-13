@extends('Admin.master.master')
@section('main')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Banner</h3>
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
    <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-xl-6">
                    <div class="row">
                        @csrf
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Thêm Mới Slider</h5>
                                </div>
                                <div class="card-body">
                                    <form class="theme-form">
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0">Chữ Giữa Ảnh</label>
                                            <input class="form-control" value="{{old('name')}}" name="name" type="text" placeholder="Tiêu Đề">
                                            @if ($errors->has('name'))
                                            <small style="color: red">{{ $errors->first('name') }}</small>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label col-sm-3 pt-0">Trạng Thái</label>
                                            <div class="col-sm-9">
                                                <div class="form-check radio radio-primary">
                                                    <input class="form-check-input" id="radio11" type="radio" name="status" value="1">
                                                    <label class="form-check-label" for="radio11">Hiển Thị</label>
                                                </div>
                                                <div class="form-check radio radio-primary">
                                                    <input class="form-check-input" id="radio22" type="radio" name="status" value="0" checked>
                                                    <label class="form-check-label" for="radio22"> Ẩn</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0" for="">links</label>
                                            <textarea class="form-control" name="link" type="text" placeholder=" Nội Dung">{{old('link')}}</textarea>
                                            @if ($errors->has('link'))
                                            <small style="color: red">{{ $errors->first('link') }}</small>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0" for="">Vị Trí Hiển Thị Ảnh</label>
                                            <input class="form-control" name="position" value="{{old('position')}}" type="text" placeholder="Nhập Từ 1-> 5, Tối đa là 5" style="width:50%">
                                            @if ($errors->has('position'))
                                            <small style="color: red">{{ $errors->first('position') }}</small>
                                            @endif
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
                <div class="col-sm-12 col-xl-4">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="card-header">
                                <h5> Ảnh Bài Viết </h5>
                            </div>
                            <div class="input-group">
                                <span class="btn btn-success col fileinput-button">
                                    <i class="fas fa-plus"></i>
                                    <span>Chọn Ảnh</span>
                                </span>
                                <img src="https://rpfinancelk.com/wp-content/uploads/2020/12/no-image-available-icon-photo-camera-flat-vector-illustration-132483097.jpg" id="show_img" width="100%">
                                <input type="file" name="other_image" value="{{old('other_image')}}" id="select_file" value="{{old('image')}}" style="display:none">
                                @if ($errors->has('other_image'))
                                <small style="color: red">{{ $errors->first('other_image') }}</small>
                                @endif
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>

</div>
</form>
</div>
<!-- ner-fluid Ends-->

@stop
@section('js')
<script>
    $('.fileinput-button').click(function() {
        $('#select_file').click();
    })
    $('#select_file').change(function() {
        var file = $(this)[0].files[0];
        var reader = new FileReader();
        reader.onload = function(ev) {
            $('img#show_img').attr('src', ev.target.result);
        }
        reader.readAsDataURL(file);
    })
    $('.fileinput-orther').click(function() {
        $('#orther_image').click();
    })
    $('#orther_image').change(function() {
        var files = $(this)[0].files;
        if (files && files.length) {
            for (let i = 0; i < files.length; i++) {
                const fi = files[i];
                var reader = new FileReader();
                reader.onload = function(ev) {
                    var _image = '<div class="col-md-3">';
                    _image += '<img src="' + ev.target.result + '" width="100%">';
                    _image += '</div>';
                    $('#show_other_image').append(_image);
                }
                reader.readAsDataURL(fi);
            }
        }
    })
</script>

@stop
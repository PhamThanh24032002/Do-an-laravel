@extends('Admin.master.master');
@section('main')
<div class="page-body container">
    <!-- <h1>Đây là add product</h1> -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Thêm mới sản phẩm</h5>
                    </div>

                    <form action="{{route('product.store')}}" class="form theme-form" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Tên</label>
                                        <input class="form-control" name="name" id="name" type="text"
                                            placeholder="Nhập tên sản phẩm ở đây">
                                        <!-- validate name cate  -->
                                        @if($errors->has('name'))
                                        <span class="text-danger mt-1">{{$errors->first('name')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3 draggable">
                                        <label for="image">Ảnh đại diện sản phẩm</label>
                                        <br>
                                        <input name="image" id="image" type="file" accept=".png, .jpg, .jpeg">
                                        <!-- validate image cate  -->
                                        @if($errors->has('image'))
                                        <span class="text-danger mt-1">{{$errors->first('image')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3 draggable">
                                        <label for="images">Ảnh chi tiết sản phẩm (Có thể chọn nhiều ảnh)</label>
                                        <br>
                                        <input name="images[]" id="images" type="file" accept=".png, .jpg, .jpeg" multiple>
                                        <!-- validate images cate  -->
                                        @if($errors->has('images'))
                                        <span class="text-danger mt-1">{{$errors->first('images')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="sale_price">Giá khuyến mãi(%)</label>
                                        <input class="form-control" name="sale_price" id="sale_price" type="number"
                                            placeholder="Nhập giá khuyến mãi ở đây">
                                        <!-- validate sale_price cate -->
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="price">Giá bán</label>
                                        <input class="form-control" name="price" readonly id="price" type="text"
                                            placeholder="Giá bán sẽ tự động cập nhật sau khi chọn size">
                                        <!-- validate price cate  -->
                                        @if($errors->has('price'))
                                        <span class="text-danger mt-1">{{$errors->first('price')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="mt-2" for="color">Màu sản phẩm: </label>
                                        @foreach($listColor as $color)
                                        <label class="form-label">
                                            <div class="p-2 shadow shadow-showcase"
                                                style="background-color:<?= $color->values ?>; border-radius: 5px;">
                                                <input type="checkbox" id="" class="checkbox"
                                                    style="background-color:{{$color->values}}" name="color[]"
                                                    value="{{$color->id}}" />
                                                <span class="text-dark">{{$color->name}}</span>
                                            </div>
                                        </label>
                                        @endforeach
                                        <!-- validate color cate  -->
                                        @if($errors->has('color'))
                                        <span class="text-danger mt-1">{{$errors->first('color')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="mt-2" for="color">Kích cỡ sản phẩm: </label>
                                        @foreach($listSize as $size)
                                        <label class="btn btn-light" for="{{$size->name}}">
                                            <div class="" style="display:block; margin:0 auto; width:80%">
                                                <input type="checkbox" id="checkbox"
                                                    onClick="showInputPrice(<?= $size->id ?>, this)" class="checkbox"
                                                    name="size[]" value="{{$size->id}}" />
                                                <span class="text-dark">{{$size->name}}</span>
                                            </div>
                                            <div class="input-price-size-{{$size->id}}" style="display: none;">
                                                <input type="number" placeholder="Giá nhập"
                                                    class="form-control importprice-input" name="">
                                                <input type="number" placeholder="Giá bán"
                                                    class="form-control price-input" name="">
                                            </div>
                                        </label>
                                        @endforeach
                                        <!-- validate size cate  -->
                                        @if($errors->has('size'))
                                        <span class="text-danger mt-1">{{$errors->first('size')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="category_id">Danh mục</label>
                                        <select class="form-select digits" name="category_id" id="category_id">
                                          <?php showCategories($listCate) ?>
                                        </select>
                                        <!-- validate category_id cate  -->
                                        @if($errors->has('category_id'))
                                        <span class="text-danger mt-1">{{$errors->first('category_id')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row"> -->
                            <div class="animate-chk mb-1">
                                <div class="row">
                                    <label class="form-label" for="">Trạng thái</label>
                                    <div class="col">
                                        <label class="d-block" for="edo-ani">
                                            <input class="radio_animated" id="edo-ani" type="radio" name="status"
                                                checked="" value="1"> Còn hàng
                                        </label>
                                        <label class="d-block" for="edo-ani1">
                                            <input class="radio_animated" id="edo-ani1" type="radio" name="status"
                                                value="0"> Hết
                                            hàng
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->

                            <div class="row">
                                <div class="col">
                                    <div>
                                        <label class="form-label" for="desscription">Mô tả</label>
                                        <textarea class="form-control" name="desscription" id="desscription"
                                            rows="3"></textarea>
                                        <!-- validate desscription cate  -->
                                        @if($errors->has('desscription'))
                                        <span class="text-danger mt-1">{{$errors->first('desscription')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" id="submit" type="submit">Submit</button>
                            <input class="btn btn-light" id="Cancel" type="reset" value="Cancel">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
<script>
$("#images").on("change", function() {
    // alert($("#images")[0].files.length);
    if ($("#images")[0].files.length < 3) {
        alert("Bạn cần nhập tối thiểu 3 ảnh");
        $("#submit").addClass('d-none');
    }else{
        $("#submit").removeClass('d-none');
    }
});
</script>
<script>
var price = document.querySelector('#price');
var min = 0;
var max = 0;

function showInputPrice(id, element) {
    var div = document.querySelector('.input-price-size-' + id);
    var display = div.style.display;
    div.style.display = display == "none" ? 'block' : "none";
    div.getElementsByTagName('INPUT')[0].name = "importprices[]";
    div.getElementsByTagName('INPUT')[1].name = "prices[]";
    if (element.checked == false) {
        div.getElementsByTagName('INPUT')[0].name = "";
        div.getElementsByTagName('INPUT')[1].name = "";
        div.getElementsByTagName('INPUT')[0].value = "";
        div.getElementsByTagName('INPUT')[1].value = "";
        var prices = $("input[name='prices[]']")
            .map(function() {
                return $(this).val();
            }).get();
        min = Math.min.apply(Math, prices);
        max = Math.max.apply(Math, prices);
        if(max!=min){
            price.value = min + " - " + max;
        }else{
            price.value = min ;
        }
        
    }
}

$('.price-input').change(function() {
    var prices = $("input[name='prices[]']")
        .map(function() {
            return $(this).val();
        }).get();
    max = Math.max.apply(Math, prices);
    min = Math.min.apply(Math, prices);
    if(max!=min){
            price.value = min + " - " + max;
        }else{
            price.value = min ;
        }
});
</script>
@stop
@extends('Admin.master.master');
@section('main')
<div class="page-body p-0">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Danh sách sản phẩm</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Sản phẩm</li>
                        <li class="breadcrumb-item active">Danh sách sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-5">
                                <div class="mb-3">
                                    <form action="{{route('product.index')}}" method="GET" id="Sort">
                                    
                                        <div class="input-group row text-center">
                                            <button type="submit" class="btn btn-primary col-4">Sắp xếp: </button>
                                            <select name="orderBy" class="form-select digits col-8"
                                                id="exampleFormControlSelect9" wire:model="sorting">
                                                <option value="default" selected>Mặc định</option>
                                                <option value="name">Tên</option>
                                                <option value="priceAsc">Giá: Thấp đến cao</option>
                                                <option value="priceDesc">Giá: Cao đến thấp</option>
                                                <option value="new">Mới nhất</option>
                                                <option value="sale">Đang hạ giá</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-5">
                                <form action="{{route('product.index')}}" method="GET">
                                    <div class="input-group row">
                                        <input class="form-control col-8" id="s" type="text"
                                            placeholder="Nhập tên sản phẩm cần tìm..." name="s" value="">
                                        <button type="submit" class="col-4 btn btn-primary">Tìm kiếm</button>
                                    </div>
                                </form>
                            </div>

                            <div class="col-2">
                                <a href="" class="btn btn-dark deleteAll col-12" style="display: none;">Xóa lựa chọn</a>
                                <a href="{{route('product.create')}}" class="btn btn-success addPro col-12 pr-0 pl-0">Thêm mới</a>
                            </div>
                        </div>
                    </div>

                    <form action="{{route('product.deleteAll')}}" method="post" id="formDeleteAll">
                        @method('DELETE')
                        @csrf
                        <table class="table table-hover table-light table-responsive text-center">
                            <thead class="thead-inverse">
                                <tr>
                                    <th style="border-right: 1px solid rgba(207, 207, 207, 0.89) ;">
                                        <input class="form-check-input m-auto" type="checkbox" value="" id="checkAll">
                                    </th>
                                    <th>STT</th>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá bán</th>
                                    <th>Giá sale</th>
                                    <th>Trạng thái</th>
                                    <th>Danh mục</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @if(count($listPro)>0)
                                @foreach($listPro as $value)
                                <tr>
                                    <th style="border-right: 1px solid rgba(207, 207, 207, 0.89) ;">
                                        <input class="form-check-input m-auto check_item" type="checkbox" name="id[]" value="{{$value->id}}" id="item-{{$value->id}}">
                                    </th>
                                    <td scope="row">{{$loop->index+1}}</td>
                                    <td><img src="{{asset('uploads')}}/{{$value->image}}" alt=""
                                            style="width:100px; height:100px;"></td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->price}}</td>
                                    <td>{{$value->sale_price}}</td>
                                    <td>@if($value->status===1) <div class="btn btn-success">Hiển thị</div> @else <div
                                            class="btn btn-secondary">Ẩn</div> @endif</td>
                                    <td>{{$value->category_id}}</td>


                                    <td>
                                        <a href="{{route('product.edit',$value->id)}}" class="btn btn-primary ">Sửa</a>
                                    </td>
                                    <td>
                                        <a href="{{route('product.destroy',$value->id)}}" class="btn btn-danger single-delete">Xóa</a>                                    
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h2 class="text-secondary m-auto">Không có kết quả. Hãy thử từ khóa khác</h2>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </form>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center">
                            {!! $listPro->appends($_GET) !!}
                        </div>

                        <!-- <div class="btn btn-primary d-flex justify-content-center">aaa</div> -->
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

<!-- vì có xóa nhiều (AKA 2 loại xóa một và xóa nhiều) nên phải vứt form ra ngoài, sau đó dùng js đẩy route vào trong action, từ đó submit thông qua form này -->
<form action=""  method="post" id="singleDelete">
    @method('DELETE')
    @csrf
    
</form>
@stop

@section('js')
<script>
    // check all product
    $('input#checkAll').click(function(){
        var isCheck = $(this).is(':checked');
        if(isCheck){
            $('input.check_item').prop('checked', true);
            $('.deleteAll').show(800);
            $('.addPro').hide(800);
        }else{
            $('input.check_item').prop('checked', false);
            $('.deleteAll').hide(800);
            $('.addPro').show(800);
        }
    })

    //single delete
    $('a.single-delete').click(function(ev){
        ev.preventDefault();
        var href = $(this).attr('href');
        $('form#singleDelete').attr('action',href);
        if(confirm('Bạn có chắc mình muốn xóa sản phẩm này?')){
            $('form#singleDelete').submit();
        }
    })

    $('input.check_item').click(function(){
        var isCheckLength = $('input.check_item:checked').length;
        if(isCheckLength > 0){
            $('.deleteAll').show(800);
            $('.addPro').hide(800);
        }else{
            $('.deleteAll').hide(800);
            $('.addPro').show(800);
        }
    })

    $('.deleteAll').click(function(ev){
        ev.preventDefault();
        if(confirm('Bạn có chắc mình muốn xóa những sản phẩm này chứ?')){
            $('form#formDeleteAll').submit();            
        }
    })

    $('form#Sort').change(function(){
        $('form#Sort').submit()
    })
    
</script>
@stop
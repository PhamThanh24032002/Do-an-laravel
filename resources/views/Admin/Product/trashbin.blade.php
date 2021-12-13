@extends('Admin.master.master');
@section('main')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Deleted Product</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">ECommerce</li>
                        <li class="breadcrumb-item active">Product list</li>
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
                                    <form action="{{route('trashbin.index')}}" method="GET">
                                        <div class="input-group row">
                                            <button type="submit" class="btn btn-primary col-4">Sắp xếp theo: </button>
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
                                <form action="{{route('trashbin.index')}}" method="GET">
                                    <div class="input-group row">
                                        <input class="form-control col-8" id="s" type="text"
                                            placeholder="Type Your Message..." name="s" value="">
                                        <button type="submit" class="col-4 btn btn-primary">Search</button>
                                    </div>
                                </form>
                            </div>

                            <div class="col-2">
                                <a href="" class="btn btn-dark recoverAll" style="display: none;">Khôi phục hết</a>
                            </div>
                        </div>
                    </div>

                    <form action="{{route('trashbin.recoverAll')}}" method="post" id="formrecoverAll">
                        @method('DELETE')
                        @csrf
                        <table class="table table-hover table-danger table-responsive text-center">
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
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @if(count($listPro)>0)
                                @foreach($listPro as $value)
                                <tr >
                                    <th style="border-right: 1px solid rgba(207, 207, 207, 0.89) ;">
                                        <input class="form-check-input m-auto check_item" type="checkbox" name="id[]" value="{{$value->id}}" id="item-{{$value->id}}">
                                    </th>
                                    <td scope="row">{{$loop->index+1}}</td>
                                    <td><img src="{{asset('uploads')}}/{{$value->image}}" alt=""
                                            style="width:100px; height:100px;"></td>
                                    <td>{{$value->name}}</td>
                                   
                                    <td>{{$value->price}}</td>
                                    <td>{{$value->sale_price}}</td>
                                    <td>@if($value->status===1) <div class="btn btn-success">Còn hàng</div> @else <div
                                            class="btn btn-secondary">Hết hàng</div> @endif</td>
                                    <td>{{$value->category_id}}</td>
                                    <td>
                                        <a href="{{route('trashbin.destroy',$value->id)}}" class="btn btn-primary single-recover">Khôi phục</a>                            
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
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </form>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center">
                            {!! $listPro->appends($_GET) !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

<form action="" method="post" id="singleRecover">
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
            $('.recoverAll').show(800);
        }else{
            $('input.check_item').prop('checked', false);
            $('.recoverAll').hide(800);
        }
    })

    //single delete
    $('a.single-recover').click(function(ev){
        ev.preventDefault();
        var href = $(this).attr('href');
        $('form#singleRecover').attr('action',href);
        if(confirm('Bạn có chắc mình muốn khôi phục sản phẩm này?')){
            $('form#singleRecover').submit();
        }
    })

    $('input.check_item').click(function(){
        var isCheckLength = $('input.check_item:checked').length;
        if(isCheckLength > 0){
            $('.recoverAll').show(800);
        }else{
            $('.recoverAll').hide(800);
        }
    })

    $('.recoverAll').click(function(ev){
        ev.preventDefault();
        if(confirm('Bạn có chắc mình muốn khôi phục lại những sản phẩm này chứ?')){
            $('form#formrecoverAll').submit();            
        }
    })
    
</script>
@stop
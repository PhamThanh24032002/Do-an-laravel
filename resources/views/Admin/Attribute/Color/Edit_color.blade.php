@extends('Admin.master.master');
@section('main')
<script>
function displaynone() {
    document.getElementById("demo").style.display = "none";
}
</script>
<div class="page-body">
    <!-- popup -->
    <form action="">
        @csrf
        @if(Session::has('success'))
        <button class="card m-auto col-12" onclick="displaynone()">
            <h5 class="text-success m-auto">{{Session::get('success')}}</h5>

        </button>
        @endif
    </form>
    <!-- endpopup -->


    <!-- main  -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Sửa lại màu</h5>
                    </div>

                    <form action="{{route('color.update',$color->id)}}" class="form theme-form" method="POST"
                        role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{$color->id}}">

                        <div class="card-body">

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Tên</label>
                                        <input class="form-control" name="name" id="name" type="text"
                                            value="{{$color->name}}">
                                        <!-- validate name -->
                                        @if($errors->has('name'))
                                        <span class="text-danger mt-1">{{$errors->first('name')}}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>


                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label pt-0">Mã màu hex</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-control-color" name="values"
                                        style="height: fit-content;" type="color" value="{{$color->values}}">
                                </div>
                                <!-- validate values -->
                                @if($errors->has('values'))
                                <span class="text-danger mt-1">{{$errors->first('values')}}</span>
                                @endif
                            </div>

                            <!-- <div class="row"> -->
                            <div class="animate-chk mb-1">
                                <div class="row">
                                    <label class="form-label" for="">Trạng thái</label>
                                    <div class="col">
                                        <label class="d-block" for="edo-ani">
                                            <input class="radio_animated" id="edo-ani" type="radio" value="1"
                                                name="status" @if($color->status===1) checked @else @endif> Hiện
                                        </label>
                                        <label class="d-block" for="edo-ani1">
                                            <input class="radio_animated" id="edo-ani1" type="radio" value="0"
                                                name="status" @if($color->status===0) checked @else @endif> Ẩn
                                        </label>

                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->


                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <input class="btn btn-light" type="reset" value="Reset">

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@stop
@extends('Admin.master.master')

@section('main')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3> Feedback Người Dùng</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Bonus Ui</li>
                        <li class="breadcrumb-item active">Creative Card</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            @foreach ($feedback as $value)
            <div class="col-sm-12 col-xl-6">
                <div class="card">
                    <div class="card-header ">
                        <h4>{{$value->name}}</h4>
                        <span>Email : {{$value->email}}</span>
                        <span>Call : {{$value->phone}}</span>
                        <span>Address : {{$value->address}}</span>
                        <span>Trạng Thái : {{$value->status==0?'Ẩn':'Hiển Thị'}}</span>
                        <td>
                            <form method="POST" id="form_submit{{$value->id}}">
                                @csrf
                                <input type="hidden" value="{{$value->id}}" name="id">
                                <div class="form-group">
                                    <select name="status" id="{{$value->id}}" onchange="update_status(this.id)">
                                        <option value="0" {{$value->status ==0?'selected':''}}>Ẩn</option>
                                        <option value="1" {{$value->status ==1?'selected':''}}>Hiển Thị </option>
                                    </select>
                                </div>
                            </form>
                        </td>

                        <td>
                    </div>
                    <div class="card-body" style="padding: 15px !important;">
                        <p>{{$value->desscription}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@stop
@section('jss')
<script>
  
    function update_status(id_selected) {
        console.log(id_selected);
        $('#form_submit' + id_selected).submit();
    }
</script>
@stop
@extends('Admin.master.master')
@section('main')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Invoice</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">ECommerce</li>
            <li class="breadcrumb-item active">Invoice</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="invoice">
              <div>
                <div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="media">
                        <div class="media-left"><img class="media-object img-60" style="object-fit: cover;" src="{{url('uploads')}}/{{auth('admin')->user()->image}}" alt=""></div>
                        <div class="media-body m-l-20 text-right">
                          <h4 class="media-heading">{{auth('admin')->user()->name}}</h4>
                          <p>Email : {{auth('admin')->user()->email}}n<br><span>ADMIN</span></p>
                        </div>
                      </div>
                      <!-- End Info-->
                    </div>
                    <div class="col-sm-6">
                      <div class="text-md-end text-xs-center">
                        <h3>Invoice #<span class="counter"><?= random_int(1, 1000000) ?></span></h3>
                        <p>Issued: May<span> 27, 2015</span><br> Payment Due: June <span>27, 2015</span></p>
                      </div>
                      <!-- End Title-->
                    </div>
                  </div>
                </div>
                <hr>
                <!-- End InvoiceTop-->
                <div class="row">
                  <div class="col-md-4">
                    <div class="media">
                   
                    <div class="media-left"><img class="media-object rounded-circle img-60" style="height: 80px;object-fit: cover;" src="{{url('uploads')}}/{{Auth::user()->image}}" alt=""></div>
 
                      <div class="media-body m-l-20">
                        <h4 class="media-heading">{{$order->name}}</h4>
                        <p>Email : {{$order->email}}<br><span>Call : {{$order->phone}}</span><br><span>Address : {{$order->address}}</span></p>

                      </div>
                    </div>
                  <div class="col-md-8">
                    <div class="text-md-end" id="project">
                      <h6>Ghi Chú Người Dùng</h6>
                      <p>{{$order->note}}</p>
                    </div>
                  </div>
                </div>
                <!-- End Invoice Mid-->
                <div>
                  <div class="table-responsive invoice-table" id="table">
                    <table class="table table-bordered table-striped">
                      <tbody>
                        <tr>
                          <td class="item">
                            <h6 class="p-2 mb-0">STT</h6>
                          </td>
                          <td class="item">
                            <h6 class="p-2 mb-0">Tên Sản Phẩm</h6>
                          </td>
                          <td class="item">
                            <h6 class="p-2 mb-0"> Ảnh</h6>
                          </td>
                          <td class="Hours">
                            <h6 class="p-2 mb-0">Số Lượng</h6>
                          </td>
                          <td class="Rate">
                            <h6 class="p-2 mb-0">Màu</h6>
                          </td>
                          <td class="subtotal">
                            <h6 class="p-2 mb-0">Size</h6>
                          </td>
                          <td class="subtotal">
                            <h6 class="p-2 mb-0">Giá</h6>
                          </td>
                          <td class="subtotal">
                            <h6 class="p-2 mb-0">Tổng Tiền</h6>
                          </td>
                        </tr>
                        @foreach ($orders_details as $value)
                        <tr>
                          <td>
                            <p class="itemtext">{{$loop->index+1}}</p>
                          </td>
                          <td>

                            <p class="m-0">{{$value->name}}</p>
                          </td>
                          <td>
                            <p class="itemtext">
                              <img width="70px" height="70px" style="object-fit: cover;" src="{{asset('uploads')}}/{{$value->image}}" alt="">
                            </p>
                          </td>
                          <td>
                            <p class="itemtext">{{$value->quantity}}</p>
                          </td>
                          <td>
                            <p class="itemtext">{{$value->colorname}}</p>
                          </td>
                          <td>
                            <p class="itemtext">{{$value->sizename}}</p>
                          </td>
                          <td>
                            <p class="itemtext">{{number_format($value->price)}}</p>
                          </td>
                          <td>
                            <p class="itemtext">{{number_format($value->price*$value->quantity)}}</p>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>

                    </table>
                  </div>
                  <!-- End Table-->
                  <div class="row">
                    <div class="col-md-8">
                      <div>
                        <p class="legal"><strong>Thank you for your business!</strong>  Payment is expected within 31 days; please process this invoice within that time. There will be a 5% interest charge per month on late invoices.</p>
                      </div>
                    </div>
                    <div class="col-md-4" style="text-align: center;">
                      <td>
                        <form action="" method="POST" id="form_submit{{$order->id}}">
                          @csrf
                          <div class="form-group">
                            <select name="status" id="{{$order->id}}" onchange="update_status(this.id)">
                              <option value="0" {{$order->status ==0?'selected':''}}>Chưa Xử Lý</option>
                              <option value="1" {{$order->status ==1?'selected':''}}>Đang Xử Lý</option>
                              <option value="2" {{$order->status ==2?'selected':''}}>Đang Vận Chuyển</option>
                              <option value="3" {{$order->status ==3?'selected':''}}>Đã Giao Hàng</option>
                            </select>
                          </div>
                        </form>
                      </td>

                      <td>
                    </div>
                  </div>
                </div>
                <!-- End InvoiceBot-->
              </div>
              <div class="col-sm-12 text-center mt-3">
                <button class="btn btn btn-primary me-2" type="button" onclick="print_dt()">Print</button>
                <button class="btn btn-secondary" type="button">Cancel</button>
              </div>
              <!-- End Invoice-->
              <!-- End Invoice Holder-->
              <!-- Container-fluid Ends-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
<script>
  function print_dt() {
    $('#print_dt').addClass('d-none');
    $('.update_order_dt').addClass('d-none');
    $('#update_order').addClass('d-none');
    $('#function_update').addClass('d-none');
    window.print();
  }
  window.onafterprint = function() {
    $('#print_dt').removeClass('d-none');
    $('.update_order_dt').removeClass('d-none');
    $('#update_order').removeClass('d-none');
    $('#function_update').removeClass('d-none');
  }
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   
    function update_status(id_selected) {
        $('#form_submit'+id_selected).submit();
    }
</script>
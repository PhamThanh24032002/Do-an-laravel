@extends('Admin.master.master') @section('main')
<!-- Page Sidebar Ends-->
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Đổi mật khẩu</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html" data-bs-original-title="" title=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                  <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                  <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg></a></li>
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item active">Đổi mật khẩu</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="edit-profile">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form method="POST">
                @csrf
                <div class="mb-3">
                  <label class="form-label" style="font-weight: bold; margin-top:15px">Nhập mật khẩu</label>
                  <input type="password" name="current_password" class="form-control" placeholder="" data-bs-original-title="" title="">
                  @if($errors->has('password'))
                  <div>
                    <p style="color: red">{{$errors->first('password')}}</p>
                  </div>
                  @elseif($errors->has('check'))
                  <div>
                    <p style="color: red">{{$errors->first('check')}}</p>
                  </div>
                  @endif
                </div>
                <div class="mb-3">
                  <label class="form-label" style="font-weight: bold; margin-top:15px">Nhập mật khẩu mới</label>
                  <input name="new_password" class="form-control" type="password" value="" data-bs-original-title="" title="">
                  @if($errors->has('new_password'))
                  <div>
                    <p style="color: red">{{$errors->first('new_password')}}</p>
                  </div>
                  @endif
                </div>
                <div class="mb-3">
                  <label class="form-label" style="font-weight: bold; margin-top:15px">Xác nhận mật khẩu</label>
                  <input type="password" name="confirm_password" class="form-control" data-bs-original-title="" title="">
                  @if($errors->has('confirm_password'))
                  <div>
                    <p style="color: red">{{$errors->first('confirm_password')}}</p>
                  </div>
                  @endif
                </div>
                <input type="hidden" name="check">
                <div class="form-footer">
                  <button type="submit" class="btn btn-primary btn-block" data-bs-original-title="" title="">Change</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
</div>

<!-- footer start-->
@stop
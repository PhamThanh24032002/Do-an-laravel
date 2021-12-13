<footer class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 footer-copyright text-center">
        <p class="mb-0">Copyright 2021 © Cuba theme by pixelstrap </p>
      </div>
    </div>
  </div>
</footer>
</div>
</div>
<!-- latest jquery-->
<!-- <script src="{{url('assets')}}/js/jquery-3.5.1.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap js-->
<script src="{{url('assets')}}/js/bootstrap/bootstrap.bundle.min.js"></script>
<!-- feather icon js-->
<script src="{{url('assets')}}/js/icons/feather-icon/feather.min.js"></script>
<script src="{{url('assets')}}/js/icons/feather-icon/feather-icon.js"></script>
<!-- scrollbar js-->
<script src="{{url('assets')}}/js/scrollbar/simplebar.js"></script>
<script src="{{url('assets')}}/js/scrollbar/custom.js"></script>
<!-- Sidebar jquery-->
<script src="{{url('assets')}}/js/config.js"></script>
<!-- Plugins JS start-->
<script src="{{url('assets')}}/js/sidebar-menu.js"></script>
<script src="{{url('assets')}}/js/chart/chartist/chartist.js"></script>
<script src="{{url('assets')}}/js/chart/chartist/chartist-plugin-tooltip.js"></script>
<script src="{{url('assets')}}/js/chart/knob/knob.min.js"></script>
<script src="{{url('assets')}}/js/chart/knob/knob-chart.js"></script>
<script src="{{url('assets')}}/js/chart/apex-chart/apex-chart.js"></script>
<script src="{{url('assets')}}/js/chart/apex-chart/stock-prices.js"></script>
<script src="{{url('assets')}}/js/notify/bootstrap-notify.min.js"></script>
<script src="{{url('assets')}}/js/dashboard/default.js"></script>
<script src="{{url('assets')}}/js/notify/index.js"></script>
<script src="{{url('assets')}}/js/datepicker/date-picker/datepicker.js"></script>
<script src="{{url('assets')}}/js/datepicker/date-picker/datepicker.en.js"></script>
<script src="{{url('assets')}}/js/datepicker/date-picker/datepicker.custom.js"></script>
<script src="{{url('assets')}}/js/typeahead/handlebars.js"></script>
<script src="{{url('assets')}}/js/typeahead/typeahead.bundle.js"></script>
<script src="{{url('assets')}}/js/typeahead/typeahead.custom.js"></script>
<script src="{{url('assets')}}/js/typeahead-search/handlebars.js"></script>
<script src="{{url('assets')}}/js/typeahead-search/typeahead-custom.js"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{url('assets')}}/js/script.js"></script>
<script src="{{url('assets')}}/js/theme-customizer/customizer.js"></script>
<!-- login js-->
<!-- Plugin used-->
@yield('js')
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#imgUpload').attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@yield('jss')
<script>
  var add_success = "{{ Session::has('add_success') ? Session::get('add_success') : '' }}";
  var edit_success = "{{ Session::has('edit_success') ? Session::get('edit_success') : '' }}";
  var delete_success = "{{ Session::has('delete_success') ? Session::get('delete_success') : '' }}";
  var error = "{{ Session::has('error') ? Session::get('error') : '' }}";
  var warning = "{{ Session::has('warning') ? Session::get('warning') : '' }}";
  if (add_success != '') {
    Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: add_success,
      showConfirmButton: false,
      timer: 1500
    })
  } else if (edit_success != '') {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    Toast.fire({
      icon: 'success',
      title: edit_success
    })
  } else if (delete_success != '') {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    Toast.fire({
      icon: 'success',
      title: delete_success
    })
  } else if (warning != '') {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    Toast.fire({
      icon: 'warning',
      title: warning
    })
  } else if (error != '') {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    Toast.fire({
      icon: 'error',
      title: error
    })
  }  
</script>
<!-- datepicker -->
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>



<script type="text/javascript">
  // $(document).ready(function(){
    chart30daysorder();
    var chart = new Morris.Bar({
        element: 'myfirstchart',
        lineColors: ['#E0BBE4','#957DAD','#D291BC','#FEC8D8','#FFDFD3'],
        pointFillColors: ['#FFF8E8'],
        pointStrokeColors: ['#B3CCE8'],
        fillOpacity: 0.6,
        hideHover: 'auto',
        parseTime: false,
        xkey: 'period',
        ykeys: ['order','sales','profit','quantity'],
        labels: ['đơn hàng','doanh số','lợi nhuận','số lượng']
      });
  // });
</script>
</body>

<!-- Mirrored from admin.pixelstrap.com/cuba/theme/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Sep 2021 10:42:30 GMT -->

</html>
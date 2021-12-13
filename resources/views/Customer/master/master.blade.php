<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from themepure.net/template/outstock-prv/outstock/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Sep 2021 07:28:38 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('tiêu đề')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('assetsCustomer')}}/img/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/preloader.css">
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/slick.css">
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/metisMenu.css">
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/animate.min.css">
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/fontAwesome5Pro.css">
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/ionicons.min.css">
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/default.css">
    <link rel="stylesheet" href="{{url('assetsCustomer')}}/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <style>
        .activesss a {
            color: red !important;
        }
    </style>
</head>

<body>

    @include('Customer.layout.header')
    @include('Customer.layout.menu')
    
    @yield('main')
    @include('sweetalert::alert')
    @include('Customer.layout.footer')
    
    <!-- JS here -->
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{url('assetsCustomer')}}/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="{{url('assetsCustomer')}}/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="{{url('assetsCustomer')}}/js/vendor/waypoints.min.js"></script>
    <script src="{{url('assetsCustomer')}}/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('assetsCustomer')}}/js/metisMenu.min.js"></script>
    <script src="{{url('assetsCustomer')}}/js/slick.min.js"></script>
    <script src="{{url('assetsCustomer')}}/js/jquery.fancybox.min.js"></script>
    <script src="{{url('assetsCustomer')}}/js/isotope.pkgd.min.js"></script>
    <script src="{{url('assetsCustomer')}}/js/owl.carousel.min.js"></script>
    <script src="{{url('assetsCustomer')}}/js/jquery-ui-slider-range.js"></script>
    <script src="{{url('assetsCustomer')}}/js/ajax-form.js"></script>
    <script src="{{url('assetsCustomer')}}/js/wow.min.js"></script>
    <script src="{{url('assetsCustomer')}}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{url('assetsCustomer')}}/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    @yield('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
    @yield('djtme_js')
    @yield('js')
    <script>
        $('.ajax_wishlist').click(function(event) {
            let _id = this.id;
            let css = (".ajax_wishlist_" + _id);
            $.ajax({
                type: 'GET',
                url: "{{route('ajax_wishlist')}}",
                data: {
                    id_pro: _id
                },
                success: function(data) {
                    let changewlic = (".icon_heart" + _id);
                    if (data == "create") {
                        $(changewlic).removeClass('fal').addClass('fas');
                        $(css).css("color", "yellow");
                    } else {
                        $(changewlic).removeClass('fas').addClass('fal');
                        $(css).css("color", "black");

                    }

                }
            })
        });

        function product_remove(id) {
            let _id = id;
            $.ajax({
                type: 'GET',
                url: "{{route('product_remove')}}",
                data: {
                    id_pro: _id
                },
                success: function(data) {
                    $('#wishlist-body').html(data);
                }
            })
        };

        $('.show-detail-quick').click(function(event) {
            let _id = this.id;
            $.ajax({
                type: 'GET',
                url: "{{route('ajax_quick_cart')}}",
                data: {
                    id_pro: _id
                },
                success: function(data) {
                    $('.product__modal-inner').html(data);
                }
            })
        });

        function ajax_add_cart_mini(id, quantity = null,s=null,price = null,size_id=null,color_id=null) {
            if(s=="m_price"){
                    price = parseFloat($("#m_price").text().replace("$", ""));
                    size_id=$('#m_size').val();
                    color_id=$('#m_color').val();
                }else{
                    price = parseFloat($("#n_price").text());
                    size_id=$('#size').val();
                    color_id=$('#color').val();
                }
            if (quantity != null && quantity > 0 && $('#size').val() != 0) {
                $.ajax({
                    type: 'GET',
                    url: "{{route('ajax_add_cart_mini')}}",
                    data: {
                        id_pro: id,
                        quantity_pro: quantity,
                        size_id: size_id,
                        color_id: color_id,
                        price: price
                    },
                    success: function(data) {
                        render_cart_mini();
                        Swal.fire("Thông báo","Thêm vào giỏ hàng thành công!","success");
                    }
                })

            } else {
                let temp;
                if(s=="m_price"){
                    temp = parseInt($("#m_quantity-product").val());
                }else{
                    temp = parseInt($("#quantity-product").val());
                }
                ajax_add_cart_mini(id, temp,s,price);
            }
            $('#productModalId').modal('toggle');
        }

        function change_detail_cart(id, quantity) {
            var price = $("#size_" + id + " option:selected").attr("price") * (100 - $("#size_" + id + " option:selected").attr("sale")) / 100 + " VND";
            if ($('#size_' + id).val() != 0) {
                $.ajax({
                    type: 'GET',
                    url: "{{route('change_detail_cart')}}",
                    data: {
                        id_pro: id,
                        quantity_pro: quantity,
                        size_id: $('#size_' + id).val(),
                        color_id: $('#color_' + id).val(),
                        price_pro: parseFloat(price)
                    },
                    success: function(data) {
                        render_cart();
                        render_cart_mini();
                    }
                })
            }
        }

        function cart_remove(id) {
            let _id = id;
            $.ajax({
                type: 'GET',
                url: "{{route('cart_remove')}}",
                data: {
                    id: _id
                },
                success: function(data) {
                    render_cart();
                    render_cart_mini();
                }
            })
        };

        function cart_remove_mini(id) {
            let _id = id;
            $.ajax({
                type: 'GET',
                url: "{{route('cart_remove_mini')}}",
                data: {
                    id: _id
                },
                success: function() {
                    render_cart();
                    render_cart_mini();
                }
            })
        };

        function render_cart_mini() {
            $.ajax({
                type: 'GET',
                url: "{{route('render_cart_mini')}}",
                success: function(data) {
                    $('#list-mini-body').html(data.html);
                    $('#quantity-cart').text("Cart (" + data.quantity + ")");
                }
            })
        }

        function render_cart() {
            $.ajax({
                type: 'GET',
                url: "{{route('render_cart')}}",
                success: function(data) {
                    $('#listcart-body').html(data);
                }
            })
        }

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
</body>

<!-- Mirrored from themepure.net/template/outstock-prv/outstock/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Sep 2021 07:28:38 GMT -->

</html>
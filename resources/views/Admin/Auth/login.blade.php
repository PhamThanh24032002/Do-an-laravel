<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from admin.pixelstrap.com/cuba/theme/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Sep 2021 10:40:28 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{url('assets')}}/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{url('assets')}}/images/favicon.png" type="image/x-icon">
    <title>CUBA ADMIN - LOGIN</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #17a2b8;
            height: 100vh;
        }

        #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            max-width: 600px;
            padding: 10px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }

        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }

        #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -85px;
        }
    </style>
</head>

<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form class="form" method="post">
                            @csrf
                            <h3 class="text-center text-info">Quản trị viên đăng nhập</h3>
                            <input type="hidden" name="check">
                            <div class="form-group">
                                <label for="username" class="text-info">Địa chỉ email:</label><br>
                                <input type="text" name="email" placeholder="Email Address" id="username" class="form-control">
                                @if($errors->has('email'))
                                <div>
                                    <p style="color: red">{{$errors->first('email')}}</p>
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Mật khẩu:</label><br>
                                <input type="password" name="password" placeholder="Password" id="password" class="form-control">
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
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Đăng nhập" style="display: block; margin: 0 auto;">
                            </div>
                            <div id="register-link" class="text-right">
                                Bạn quên mật khẩu? <a href="{{route('show.mail.to.repass')}}" class="text-info">Lấy lại mật khẩu</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
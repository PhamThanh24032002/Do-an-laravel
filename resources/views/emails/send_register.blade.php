<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .button {
            display: inline-block;
            padding: 15px 25px;
            font-size: 17px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            background-color: #4CAF50;
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
        }
        
        .button:hover {
            background-color: #3e8e41
        }
    </style>
</head>

<body>
    <div class="container" style="background-color: #DAF7A6;
            border-radius:12px; padding: 15px; font-size: 17px;">
        <div class="main" style="background-color: #fff; border-radius:12px;
                padding: 15px">
            <h3>Xin chào!</h3>
            <p style="color: darkgray;">Chúng tôi nhận được yêu cầu tạo tài khoản từ bạn. Đây là email để xác nhận yêu cầu của bạn!</p>
            <div style="margin: 0 0 20px 0;">
                <a href="{{route( 'check_regis',[ 'email'=>$email,'_token'=>$_token])}}" class="button" style="color: #fff; vertical-align:
                        middle; text-decoration: none;">Nhấn vào đây để xác nhận tài khoản!</a>
            </div>
            <p style="color: orange; font-weight: bold;">Cảm ơn bạn, <br> CUBA</p>
        </div>
    </div>

</body>

</html>
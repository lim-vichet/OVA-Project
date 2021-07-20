<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .login_box{
            width: 500px;
            height: 400px;
            background-color: #2B81AF;;
            margin: auto;
            padding: 30px;
            border-radius: 5px;
            position: relative;
        }
        label{
            width: 100%;
            height: 100%;
            color: white;
        }
        input{
            width: 95%;
            height: 100%;
            padding: 10px;
            margin: 5px;
        }
        .btn_login{
            width: 100px;
            cursor: pointer;
            background-color: greenyellow;
        }
        .picture-box{
            width: 200px;
            height: 200px;
            border-radius: 100%;
            background-color: #0b97c4;
            margin-left: 30%;
        }
        .picture-box img{
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="login_box col-sm-4 offset-4" style="">
            <form action="{{route('login.store')}}" method="post">
                {{csrf_field()}}
                <div class="picture-box">
                    <img src="{{asset('img/admin.png')}}" alt="">
                </div>
                <label for="">User Name</label><br>
                <input type="text" name="username" placeholder="Username"><br>
                <label for="">Password</label><br>
                <input type="text" name="password" placeholder="Password"><br> <br>
                <input type="submit" value="Login" class="btn_login">
            </form>
        </div>
    </div>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/now-ui-dashboard.css')}}">
    <title>Admin Login</title>
    <style>
        .container{
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            /* background: red; */
        }
        .container .box{
            width: 450px;
            height: 350px;
            border-radius: 15px;
            padding: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.25);
        }
        .loginHeader{
            text-align: center;
            padding: 5px;
            border-bottom: 3px solid lightgray;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box">
            <div class="loginHeader">
                <h2>Login</h2>
            </div>
            <form action="{{route('admin.auth')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="UserName">UserName</label>
                    <input type="email" name="email" class="form-control" placeholder="email" required>
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Sign In</button>
                <span class="text-danger">{{session('error')}}</span>
            </form>
        </div>
    </div>
</body>
</html>
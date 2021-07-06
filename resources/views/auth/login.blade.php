
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="{{asset('admin/css/bootstrap.min.cs')}}s" rel="stylesheet">
    <link href="{{asset('admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg pt-4">
    <br>
    <br>
    <div class="middle-box text-center loginscreen animated fadeInDown" >
        <div>
            <div>
                <img class="logo-name mt-4" src="{{asset('pemko.png')}}" alt="" width="100px">
            </div>
            </p>
            <h4 >Login in.</h4   >
            <form class="m-t" method="POST" action="{{Route('auth.loginStore')}}">
            @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" required="" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" name="password">
                </div>
                <div class="row">
                    <div class="col-md">
                        <a href="/" class="btn btn-secondary block full-width m-b">Halaman Depan</a>
                    </div>
                    <div class="col-md">
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                    </div>
                </div>
                <p class="mt text-muted text-center"><small>Developed By</small> <br> <small>Diskominfotik Kota Banjarmasin &copy; 2021</small></p>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('admin/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('admin/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.js')}}"></script>

</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>PhoneBook</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="/fonts/ionicons.min.css">
    <link rel="stylesheet" href="/fonts/material-icons.min.css">
    <link rel="stylesheet" href="/css/-Login-form-Page-BS4-.css">
    <link rel="stylesheet" href="/css/Footer-Dark.css">
    <link rel="stylesheet" href="/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="/css/Pretty-Footer.css">
    <link rel="stylesheet" href="/css/Pretty-Login-Form.css">
    <link rel="stylesheet" href="/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="/css/Pretty-Search-Form.css">
    <link rel="stylesheet" href="/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <style>
        span #icon{
            position: absolute;
            right: 43%;
            top: 51.5%;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md bg-info align-items-end align-content-end" style="background-color: #03A9F4;">
        <div class="container-fluid"><i class="material-icons">perm_contact_calendar</i><a class="navbar-brand" href="login">PhoneBook</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse text-right align-items-end align-content-end" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="login">Login</a></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="padding-right: 35px;">Register</a>
                        <div class="dropdown-menu"><a class="dropdown-item" href="RegOrg">As Organization</a><a class="dropdown-item" href="register">As Staff</a></div>
                    </li>

                </ul>
        </div>
        </div>
    </nav>
    <div class="login-clean">
        <form action="login" method="post">
            @csrf
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
                <h1 class="text-center">Login</h1>
            </div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" id="password">
                <span>
                    <i class="fa fa-eye" id='icon' aria-hidden="true" onclick="toggle()"></i>
                </span>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Log In</button>
            </div>
            {{-- <a class="forgot" href="#">Forgot your email or password?</a> --}}
        </form>
    </div>
    @include('footer')
    <script src="/js/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script>
        var state = false
        function toggle(){
            if (state) {
                document.getElementById('password').setAttribute('type', 'password');
                state = false;
            }
            else{
                document.getElementById('password').setAttribute('type', 'text');
                state = true;
            }
        }
    </script>
</body>

</html>

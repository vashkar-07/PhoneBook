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
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md bg-info align-items-end align-content-end" style="background-color: #03A9F4;">
        <div class="container-fluid"><i class="material-icons">perm_contact_calendar</i><a class="navbar-brand" href="login">PhoneBook</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse text-right align-items-end align-content-end" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Login</a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="padding-right: 35px;">Register</a>
                        <div class="dropdown-menu"><a class="dropdown-item" href="register.html">As Organization</a><a class="dropdown-item" href="#">As Staff</a></div>
                    </li>
                </ul>
        </div>
        </div>
    </nav>
    @if ($errors->any())
    <p>Hello</p>
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row register-form">
        <div class="col-md-8 offset-md-2">
            <form class="custom-form" method="POST" action="/regAdmin">
                @csrf
                <h1 class="text-center">Register</h1>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name">Name </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="name"></div><br><br>
                    @error('name')
                        <div class="text-red">
                            {{$message}}
                        </div>
                     {{-- <br><br> --}}
                    @enderror
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="email">Email </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="email" name="email"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="password">Password </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="password" name="password"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="password_confirmation">Repeat Password </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="password" name='password_confirmation'></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="organization">Organization Name</label></div>
                    <div class="col-sm-4 input-column"><input class="form-control" type="text" name="organization"></div>
                </div><button class="btn btn-light submit-button" type="submit">Register</a></form>
        </div>
    </div>
    <script src="/js/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

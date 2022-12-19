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
    @if($errors->any())
    <div>{{$errors->get('name')}}</div>
    @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
    @endforeach
    @endif

    <div class="row register-form">
        <div class="col-md-8 offset-md-2">
            <form class="custom-form" action="/regUser" method="POST">
                @csrf
                <h1 class="text-center">Register</h1>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name">Name </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="name"></div>
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
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="repeat-password">Repeat Password </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="password" name="password_confirmation"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="dropdown-input-field">Organization name</label></div>
                    {{-- <select name="">
                        <option> Select your option </option>
                        <option value="khulna University">Khulna University</option>
                        <option value="KUET">Kuet</option>
                        <option value="CU">Cu</option>


                    </select> --}}
                    <div class="col-sm-4 input-column">
                        <select class="form-control" name="organization">
                            @foreach ($data as $item)
                                <option value="{{$item['organization']}}">{{$item["organization"]}}</option>
                            @endforeach
                            </select></div>
                </div><button class="btn btn-light submit-button" type="submit">Register</button></form>
        </div>
    </div>
    <footer style="margin-top: 0px;">
        <div class="row">
            <div class="col-sm-6 col-md-4 footer-navigation">
                <h3><a href="#">Company<span>logo </span></a></h3>
                <p class="links"><a href="#">Home</a><strong> · </strong><a href="#">Blog</a><strong> · </strong><a href="#">Pricing</a><strong> · </strong><a href="#">About</a><strong> · </strong><a href="#">Faq</a><strong> · </strong><a href="#">Contact</a></p>
                <p class="company-name">Company Name © 2015 </p>
            </div>
            <div class="col-sm-6 col-md-4 footer-contacts">
                <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                    <p><span class="new-line-span">21 Revolution Street</span> Paris, France</p>
                </div>
                <div><i class="fa fa-phone footer-contacts-icon"></i>
                    <p class="footer-center-info email text-left"> +1 555 123456</p>
                </div>
                <div><i class="fa fa-envelope footer-contacts-icon"></i>
                    <p> <a href="#" target="_blank">support@company.com</a></p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-4 footer-about">
                <h4>About the company</h4>
                <p> Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet. </p>
                <div class="social-links social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-github"></i></a></div>
            </div>
        </div>
    </footer>
    <script src="/js/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

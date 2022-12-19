<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>menu</title>
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
    <nav class="navbar navbar-light navbar-expand-md bg-info">
        <div class="container-fluid"><i class="material-icons">perm_contact_calendar</i><a class="navbar-brand" href="userFirstPage.html">PhoneBook</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="/user/{{session('staff.id')}}"><i class="fa fa-user-circle-o"></i>&nbsp;
                        @if (session()->has('user'))
                            {{session('user.name')}}
                        @else
                            {{session('staff.name')}}
                        @endif
                        </a></li>
                        @if (session()->has('user'))
                        <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                        @else
                        <li class="nav-item"><a class="nav-link" href="/logoutStaff">Logout</a></li>
                        @endif
                </ul>
            </div>
            </div>
        </nav>
    <div class="container" id="selecProf" style="margin-top: 30px;padding-top: 15px;">
        <div class="row">
            <div class="col-lg-4"><img src={{"/".$data['imgDir']}} style="width: 180px;"></div>
            <div class="col">
                <h2 style="color: #fff;">{{$data['name']}}</h2>
                <p id="selecProf">{{$data['departmant']}}<br>{{$data['job title']}}</p>
            </div>
        </div>
    </div>
    <div class="container" id="selecProf" style="margin-bottom: 30px;">
        <div class="row">
            <div class="col-lg-4">
                <h2>About</h2>
                <p>{{$data['about']}}<br><br></p>
            </div>
            <div class="col">
                <h2 style="color: #fff;">Contact Information</h2>
                <p><span>Email:
                    {{$data['email']}}
                </span><br><br>Mobile: {{$data['mobile']}}<br><br></p>
                <div class="social-links social-icons" style="width: 400px;"><span>Social Links:&nbsp;</span><a href={{$data['facebook']}}><i class="fa fa-facebook"></i></a><a href={{$data['twitter']}}><i class="fa fa-twitter"></i></a><a href={{$data['linkedin']}}><i class="fa fa-linkedin"></i></a><a href={{$data['github']}}><i class="fa fa-github"></i></a></div>
            </div>
        </div>
    </div>

    @if (session()->has('staff') && session('staff.name') == $data['name'])
    <div class="text-center">
    <a class="btn btn-primary" role="button" style="margin: 0px 16px;background: #28a745;" href="/edit/{{session('staff.id')}}" >Edit Your Profile</a>
    </div>
    @endif
    @include('footer')
    <script src="/js/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

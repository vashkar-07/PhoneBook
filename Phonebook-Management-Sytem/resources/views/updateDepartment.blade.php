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
    <body>
        <nav class="navbar navbar-light navbar-expand-md bg-info">
            <div class="container-fluid"><i class="material-icons">perm_contact_calendar</i><a class="navbar-brand" href="login">PhoneBook</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"></li>
                        <li class="nav-item"></li>
                    </ul>
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item"></li>
                        <li class="nav-item"></li>
                        <li class="nav-item"></li>
                        <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-user-circle-o"></i>&nbsp;Username</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Logout</a></li>
                    </ul>
            </div>
            </div>
        </nav>
        <div class="login-clean">
            <form method="post" action="/updateDept">
            @csrf
            <input type="hidden" name="id" value="{{$data['id']}}">
            <div class="form-group"><input class="form-control" type="text" name="dept" value="{{$data['department']}}" placeholder="department name" ></div>
            <div class="form-group"><input class="form-control" type="number" name="hr" value="{{$data['hierarchy']}}" placeholder="hierarchy"></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Update</button></div>
            </form>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
</body>

</html>

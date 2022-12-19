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
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-user-circle-o"></i>&nbsp;{{session('staff.name')}}</a></li>
                    <li class="nav-item"><a class="nav-link" href="/logoutStaff">Logout</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="container" style="margin-bottom: 30px;">
        <h1 class="text-center">Profile</h1>
        <form action="/edit" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$user['id']}}" id="">
            <div class="row">
                <div class="col-md-12 col-lg-4 col-xl-4">
                    <p style="margin-top: 6px;">Name</p>
                    <input type="text" name="name" value="{{$user['name']}}" required>
                    <p id="apply" style="margin-top: 6px;">Job Title</p>
                    <div>
                        <select class="form-control" name="job_title">
                            @foreach ($jobs as $job)
                                <option value="{{$job['job_title']}}">{{$job["job_title"]}}</option>
                            @endforeach
                        </select>
                    </div>
                    <p id="apply-3" style="margin-top: 16px;">Department:</p>
                    <div>
                        <select class="form-control" name="department">
                            @foreach ($depts as $dept)
                                <option value="{{$dept['department']}}">{{$dept["department"]}}</option>
                            @endforeach
                        </select>
                    </div>
                    <p id="apply-2" style="margin-top: 16px;">Mobile</p>
                <input type="text" name="mobile" value="{{$user['mobile']}}" required>
                    <p id="apply" style="margin-top: 16px;">About Me:</p>
                <textarea name="about" id="" cols="30" rows="10" required></textarea>
                    </div>
                <div class="col">
                    <p id="apply-4"><strong>Social Links</strong></p>
                    <p id="apply-8">Facebook:</p><input type="text" name="facebook" value="{{$user['facebook']}}" style="margin-bottom: 16px;">
                    <p id="apply-7">Twitter:</p><input type="text" name="twitter" value="{{$user['twitter']}}" style="margin-bottom: 16px;">
                    <p id="apply-6">LinkedIn:</p><input type="text" name="linkedin" value="{{$user['linkedin']}}" style="margin-bottom: 16px;">
                    <p id="apply-5">Github:</p><input type="text" name="github" value="{{$user['github']}}" style="margin-left: 1px;margin-bottom: 16px;"></div>
            </div>
            <div class="row">
                <div class="col-xl-1 offset-xl-4"><button class="btn btn-primary" type="submit" style="margin-left: 0px;">Update</a></div>
            </div>
        </form>
    </div>
    <div class="footer-dark" style="padding-top: 20px;">
        <footer style="margin-top: 0px;padding-top: 25px;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>Company Name</h3>
                        <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo.</p>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">Company Name © 2017</p>
            </div>
        </footer>
    <script src="/js/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

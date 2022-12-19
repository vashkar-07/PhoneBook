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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

    <style>
        body {font-family: Arial;}

        /* Style the tab */
        .tab {
          overflow: hidden;
          border: 1px solid #ccc;
          background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
          background-color: inherit;
          display: inline-block;
          border: none;
          outline: none;
          cursor: pointer;
          padding: 14px 16px;
          transition: 0.3s;
          font-size: 17px;
          flex: 1 1 auto;

        }

        /* Change background color of buttons on hover */
        .tab button:hover {
          background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
          background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
          display: none;
          padding: 6px 12px;
          border: 1px solid #ccc;
          border-top: none;
        }

        .tablinks {
            flex: 1 1 auto;
            text-align: center;
        }

        </style>

</head>

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
                    <li class="nav-item"><a class="nav-link" href="user/{{$data['id']}}"><i class="fa fa-user-circle-o"></i>&nbsp;{{session('staff.name')}}</a></li>
                    <li class="nav-item"><a class="nav-link" href="/logoutStaff">Logout</a></li>
                </ul>
            </div>
        </div>
        </nav>
    <div class="row row-cols-2">
        <div class="col">
            <nav class="navbar navbar-light navbar-expand-md text-center" style="padding: 35px;">
                <div class="container-fluid"><a class="navbar-brand" href="#">Khulna University</a>
                </div>
            </nav>
        </div>
    </div>
    <div>
        <br><br>
        {{-- {{$domains}}
        {{$sub_domains}} --}}
        <div class="tab nav-fill row">
            @foreach ($domains as $domain)
            <?php
            $x = $domain['domain_name']
            ?>
            <div class="col text-center">
                <button class="tablinks" onclick="openCity(event, '{{$x}}')">{{$domain['domain_name']}}</button>
            </div>
            @endforeach
        </div>
          @foreach ($domains as $domain)
          <div id="{{$domain['domain_name']}}" class="tabcontent">

            @php
            $x = [];
            @endphp
            @foreach ($users as $user)
                @foreach ($sub_domains as $sub_domain)
                @if ($user['departmant'] == $dept && $user['job title'] == $sub_domain['sub_domain_name'] && $sub_domain['domain_name'] == $domain['domain_name'])
                @php
                    array_push($x, $user);
                @endphp
            @endif
                @endforeach
            @endforeach
            @if (count($x) == 0)
                    @php
                        continue;
                    @endphp
            @endif
            <div class="container">
                <h1 class="text-center">{{$dept}}</h1>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Job Title</th>
                                <th>Contact Info</th>
                            </tr>
                        </thead>
                            @foreach ($sub_domains as $sub_domain)
                                @foreach ($users as $user)
                                @if ($sub_domain['domain_name'] == $domain['domain_name'] && $user['departmant'] == $dept && $user['job title'] == $sub_domain['sub_domain_name'] && $user['verified'] == true)
                                    <tbody>
                                        <tr>
                                        <td><img src={{"/".$user['imgDir']}} style="width: 130px;height:142px;"><a href="user/{{$user['id']}}" style="margin-left: 20px;">{{$user["name"]}}</a></td>
                                        <td style="padding-top: 71px;"><span>{{$user['job title']}}</span></td>
                                        <td style="padding-top: 60px;"><span>{{$user['mobile']}}<br>{{$user['email']}}<br></span></td>
                                        </tr>
                                    </tbody>
                                    @endif
                                @endforeach
                            @endforeach
                    </table>
                </div>
            </div>
          </div>
            @endforeach
          </div>
          <br><br>

    {{-- <div class="container">
        <div>
            <ul class="nav nav-tabs nav-fill" role="tablist">
                @foreach ($domains as $domain)
                <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-toggle="tab" href="#{{$domain['domain_name']}}">{{$domain['domain_name']}}</a></li>
                @endforeach
            </ul>
            <div class="tab-content">
                @foreach ($domains as $domain)
                    <div class="tab-pane" role="tabpanel" id="{{$domain['domain_name']}}">
                        @foreach ($sub_domains as $sub_domain)
                        @if ($domain['domain_name'] == $sub_domain['sub_domain_name'])
                        <p class="text-center">{{$sub_domain['sub_domain_name']}}.</p>
                        @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
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
    <script>
        var x = <?php print($domains)?>;
        console.log(x[0]['domain_name']);
        document.getElementById(x[0]['domain_name']).style.display = "block";
        function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }
        </script>

</body>

</html>

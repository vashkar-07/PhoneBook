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
    <style>
       .tab {
          overflow: hidden;
          border: 1px solid #ccc;
          background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
          background-color: inherit;
          display: inline-block;
          margin: auto;
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
                    <li class="nav-item"><a class="nav-link" href="search_mail">Mail</a></li>
                    <li class="nav-item"><a class="nav-link" href="search_sms">SMS</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-user-circle-o"></i>&nbsp;{{session('user.name')}}</a></li>
                    <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="container">
        <h1>{{session('user.organization')}}</h1>
    </div>
    <div class="container" style="display: none">
        <h1 class="text-center">Job Title</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Job Title</th>
                        <th>Hierarchy</th>
                        <th>operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                    <tr>
                        <td>{{$job['job_title']}}</td>
                        <td>{{$job['hierarchy']}}</td>
                        <td><a href="updateJob/{{$job['id']}}">Update&nbsp;&nbsp;</a>
                            <a href="deleteJob/{{$job['id']}}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form action="addjob" method="post">
            @csrf
            <div class="form-group"><input type="text" name="job" placeholder="Job Title"></div>
            <div class="form-group"><input type="text" name='hr' placeholder="Hierarchy"><button class="btn btn-primary" type="submit" style="padding-left: 12px;margin-left: 10px;">Add</button></div>
        </form>
    </div>
    <div class="tab nav-fill row">
        <div class="col text-center">
            <button class="tablinks" onclick="openCity(event, 'Department')">Department</button>
        </div>
        <div class="col text-center">
            <button class="tablinks" onclick="openCity(event, 'Sub Section')">Sub Section</button>
        </div>
        <div class="col text-center">
            <button class="tablinks" onclick="openCity(event, 'Job Title')">Job Title</button>
        </div>
        <div class="col text-center">
            <button class="tablinks" onclick="openCity(event, 'Pending Approval')">Pending Approval</button>
        </div>
    </div>
    <div class="container tabcontent" id="Department">
        <h1 class="text-center">Department</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Department</th>
                        <th>Hierarchy</th>
                        <th>operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($depts as $dept)
                    <tr>
                        <td>{{$dept['department']}}</td>
                        <td>{{$dept['hierarchy']}}</td>
                        <td><a href="updateDept/{{$dept['id']}}">Update&nbsp;&nbsp;</a>
                            <a href="deleteDept/{{$dept['id']}}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form action="adddepartment" method="post">
            @csrf
            <div class="form-group"><input type="text" name="dept" placeholder="Department Name"></div>
            <div class="form-group"><input type="text" name="hierarchy" placeholder="Hierarchy"><button class="btn btn-primary" type="submit" style="padding-left: 12px;margin-left: 10px;">Add</button></div>
        </form>
    </div>
    <div class="container tabcontent" id="Sub Section">
        <h1 class="text-center">Sub Domain</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sub Domains</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($domains as $domain)
                    <tr>
                        <td>{{$domain['domain_name']}}</td>
                        <td><a href="updateDomain/{{$domain['id']}}">Update&nbsp;&nbsp;</a>
                            <a href="deleteDomain/{{$domain['id']}}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form action="addDomain" method="post">
            @csrf
            <div class="form-group"><input type="text" name="domain" placeholder="Add Sub Domain"></div>
            <div class="form-group"><button class="btn btn-primary" type="submit" style="padding-left: 12px;margin-left: 10px;">Add Sub Domain</button></div>
        </form>
    </div>
    <div class="container tabcontent" id="Job Title">
        <h1 class="text-center">Job Title</h1>
        <div class="table-responsive">
            <table class="table">
                @foreach ($domains as $domain)
                <thead>
                    <tr>
                        <th colspan="3" class="text-center">{{$domain['domain_name']}}</th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th>Job Title</th>
                        <th>Hierarchy</th>
                        <th>operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sub_domains as $sub_domain)
                    @if ($domain['domain_name'] == $sub_domain['domain_name'])
                    <tr>
                        <td>{{$sub_domain['sub_domain_name']}}</td>
                        <td>{{$sub_domain['hierarchy']}}</td>
                        <td><a href="updateSubDomain/{{$sub_domain['id']}}">Update&nbsp;&nbsp;</a>
                            <a href="deleteSubDomain/{{$sub_domain['id']}}">Delete</a></td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
                @endforeach
            </table>
        </div>
        <form action="addSubDomain" method="post">
            @csrf
            <div class="form-group">
                <select class="form-control" name="domain">
                    @foreach ($domains as $domain)
                        <option value="{{$domain['domain_name']}}">{{$domain['domain_name']}}</option>
                    @endforeach
                </select><br>
                <input type="text" name="sub_domain" placeholder="Job Title"><br><br>
                <input type="text" name="hr" placeholder="Hierarchy"><br><br>
                <button class="btn btn-primary" type="submit" style="padding-left: 12px;margin-left: 10px;">Add Job Title</button>
            </div>
        </form>
    </div>
    <div class="container tabcontent" id="Pending Approval">
        <div class="row">
            <div class="col">
                <h3>Pending Approval</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @if ($user['verified'] == false && $user["applied"] == true)
                                <tr>
                                <td>{{$user['name']}}</td>
                                    <td>
                                        <a class="btn btn-primary" role="button" style="margin: 0px 16px;background: #28a745;" href="accept/{{$user['id']}}" >Accept</a>
                                        <a class="btn btn-primary" style="margin: 0px 16px;background: #dc3545;" href="reject/{{$user['id']}}">Reject</button>
                                        <a class="btn btn-primary" role="button" href="user/{{$user['id']}}" style="margin: 0px 16px;">View</a>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
    <script src="/js/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script>
        // var x = <?php print($domains)?>;
        // console.log(x[0]['domain_name']);
        document.getElementById('Department').style.display = "block";
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

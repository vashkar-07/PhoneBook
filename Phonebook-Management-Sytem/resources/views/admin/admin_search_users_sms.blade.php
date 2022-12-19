<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <div class="container text-center">
        @if(session('message'))
                    <div class="alert alert-success">
                        {{Session::pull('message')}}
                    </div>
                @endif
        <form action="search_sms" method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="dept" placeholder="Department" required><br><br>
                <input type="text" name="sub_section" placeholder="Sub Section" required><br><br>
                <input type="text" name="job" placeholder="Job Title" required><br><br>
                <button type="submit">Search</button>
            </div>
        </form>
    </div>
    @if (isset($data))
        <div class="container">
            <form action="send_sms" method="post">
                @csrf
                <div class="text-center">
                    <textarea class='form-group' name="message" id="" cols="30" rows="5" placeholder="Message" required>
                    </textarea><br>
                    <button type="submit" class="btn btn-primary">Send</button><br><br>
                    <input type="checkbox" name="" id="selectAll" onclick="openCity()">
                    <label for="">Select all</label><br><br>

                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Job Title</th>
                                <th>Mobile</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach ($data as $item)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input"  name="users[]" value="{{$item['mobile']}}">
                                      </td>
                                      <td>{{$item['name']}}</td>
                                      <td>{{$item['departmant']}}</td>
                                      <td>{{$item['job title']}}</td>
                                      <td>{{$item['mobile']}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    @endif

    @include('footer')
    <script src="/js/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script>
        function openCity() {
            console.log('hi');
              var emails = document.getElementsByName('users[]');
              var checkbox = document.getElementById('selectAll');
              if(checkbox.checked == true){
                  for(var i = 0; i < emails.length; i++){
                      if(emails[i].type == 'checkbox'){
                          emails[i].checked = true;
                      }
                  }
              }
              else{
                for(var i = 0; i < emails.length; i++){
                      if(emails[i].type == 'checkbox'){
                          emails[i].checked = false;
                      }
                  }
              }
        }


        $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
    </script>
</body>

</html>

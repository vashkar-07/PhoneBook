<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
{{-- <link rel="stylesheet" href="/css/styles.css"> --}}
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    color: #000;
    background-color: url("background.jpg");
    font-family: "Roboto", sans-serif;
}
.contact-form {
    padding: 50px;
    margin: 30px auto;
}
.contact-form h1 {
    font-size: 42px;
    font-family: 'Pacifico', sans-serif;
    margin: 0 0 50px;
    text-align: center;
}
.contact-form .form-group {
    margin-bottom: 20px;
}
.contact-form .form-control, .contact-form .btn {
    min-height: 40px;
    border-radius: 2px;
}
.contact-form .form-control {
    border-color: #e2c705;
}
.contact-form .form-control:focus {
    border-color: #d8b012;
    box-shadow: 0 0 8px #dcae10;
}
.contact-form .btn-primary, .contact-form .btn-primary:active {
    min-width: 250px;
    color: #fcda2e;
    background: #000 !important;
    margin-top: 20px;
    border: none;
}
.contact-form .btn-primary:hover {
    color: #fff;
}
.contact-form .btn-primary i {
    margin-right: 5px;
}
.contact-form label {
    opacity: 0.9;
}
.contact-form textarea {
    resize: vertical;
}
.bs-example {
    margin: 20px;
}
</style>
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
<div class="container-lg">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class="contact-form">
                <h1>Send Mail</h1>
                @if(session('message'))
                    <div class="alert alert-success">
                        {{Session::pull('message')}}
                    </div>
                @endif
                <form action="/sendEmail" method="post">
                @csrf
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputName">Name</label>
								<input type="text" name="name" class="form-control" placeholder="Enter Name">
                                @error('name')
                                <span class="text-danger"> {{ $message }} </span>
                                @enderror
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputEmail">Email</label>
								<input type="email" name="email" class="form-control" value="{{$data['email']}}">
                                @error('email')
                                <span class="text-danger"> {{ $message }} </span>
                                @enderror
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputSubject">Subject</label>
                        <input type="text" name="subject" class="form-control" placeholder="Enter subject">
                        @error('subject')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
					</div>
					<div class="form-group">
						<label for="inputMessage">Message</label>
                        <textarea name="content" rows="5" class="form-control" placeholder="Enter Your Message"></textarea>
                        @error('content')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@include('footer')
</body>
</html>

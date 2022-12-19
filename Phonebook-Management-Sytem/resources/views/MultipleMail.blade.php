<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <br>
    <div class="container-box">
        <h3 class='text-center'>Send Mail</h3>
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                Search Customer Data
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data">
                </div>
                <div class="container text-center" id="mail_list">
                    @if(session('message'))
                    <div class="alert alert-success">
                        {{Session::pull('message')}}
                    </div>
                    @endif
                    <h3 class="text-center">Sending Mail To:</h3>
                </div>
                <div class="container text-center">
                    <button onclick="switchToEmailField()">Send</button>
                </div>
                <div class="table-reasponsive" id="user_data">
                    <h3 class="text-center">
                        Total Data:
                        <span id="total_records">
                        </span>
                    </h3>
                    <table class="table table-striped tabel-bordered" id="table-data">
                        <thead>
                            <tr>
                                <th>Name:</th>
                                <th>Email:</th>
                                <th>Job Title:</th>
                                <th>Department:</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="container text-center" id='email_field' style="display: none">
                    <br>

                    <input type="text" placeholder="Name" id='name'>
                    <br><br>
                    <input type="text" placeholder="SubJect" id='subject'>
                    <br><br>
                    <textarea name="" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                    <br><br>
                    {{-- <input type="textarea"   style="resize: vertical">
                    <br><br> --}}
                    <button onclick="sendData()">Send Mail</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        fetch_customer_data();

        function fetch_customer_data(query=''){
        $.ajax({
            url: "multipleMail/search",
            method: 'GET',
            data: {query:query},
            dataType:'json',
            success:function(data){
                // console.log(data.table_data);
                $('tbody').html(data.table_data);
                $('#total_records').text(data.total_data);
            },
            error:function(err){
                console.log(err['responseText']);
            }
        })
    }
            $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            // console.log(query);
            fetch_customer_data(query);
            });
            // $(document).on('onclick', '.ListOfUsers', function(){
            // console.log('hello')
            // var value = $(this).val();
            // console.log(value);
            // });
    });
    // var x = document.querySelectorAll('td');
    // console.log(x);
    var id_value = [];
    var user_data = [];

    function addUsers(id){
        var users = <?php echo json_encode($users);?>;
        if (id_value.indexOf(id)==-1 || id_value.length==0) {
            id_value.push(id);
            users.forEach(user => {
            if(user.id == id){
                user_data.push(user.email);
                addUserToHtml(user);
            }
        });
        }
        else {
            deleteUserFromHtml(user_data[id_value.indexOf(id)]);
            user_data.splice(id_value.indexOf(id), 1);
            id_value.splice(id_value.indexOf(id), 1);
            console.log(id_value);
            console.log(user_data);
        }

        // console.log(user_data);

    }
    function addUserToHtml(user){
        const div_val = document.querySelector('#mail_list');
        const paragraph = document.createElement('p');
        paragraph.setAttribute('class', 'username');
        paragraph.innerHTML = user.name;

        div_val.appendChild(paragraph);
    }

    function deleteUserFromHtml(user){
        const p_value = document.querySelectorAll('.username');
        for (let index = 0; index < p_value.length; index++) {
            if(p_value[index].innerHTML == user.name){
                p_value[index].remove();
            }

        }
    }

    function switchToEmailField(){
        if (user_data.length != 0) {
            // console.log(user_data);
            // $.ajax({
            //     url: 'multipleMail/send',
            //     type: 'POST',
            //     dataType: 'json',
            //     contentType: 'json',
            //     data: JSON.stringify(user_data),
            //     contentType: 'application/json; charset=utf-8',
            //     success:function(response){
            //         console.log(response.html);
            //         // window.location ="{{route('profile')}}";
            //     },
            //     error:function(err){
            //     console.log(err);
            // },
            // });
            // console.log(document.getElementById('user_data'));
            document.getElementById('user_data').style.display= "none";
            document.getElementById('email_field').style.display= "block";

        }
    }
    function sendData(){
            var name = document.getElementById('name').value;
            var subject = document.getElementById('subject').value;
            var message = document.getElementById('message').value;
            if(name && subject && message){
                var email = {
                    'email_list':user_data,
                    'subject':subject,
                    'content':message,
                    'name':name,
                }
                $.ajax({
                url: 'multipleMail/send',
                type: 'POST',
                dataType: 'json',
                contentType: 'json',
                data: JSON.stringify(email),
                contentType: 'application/json; charset=utf-8',
                success:function(response){
                    location.reload();
                    // window.location ="{{route('profile')}}";
                },
                error:function(err){
                console.log(err['responseText']);
            },
            });
                console.log(email);
            }
            else{
                console.log('not ok');
            }
        }
</script>
</html>

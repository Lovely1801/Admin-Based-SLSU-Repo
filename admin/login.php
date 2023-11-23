<?php
session_start();
include '../conn.php';
include 'admin_class.php';

$action = new Admin();

if (isset($_POST['submit'])) {
    $action->login();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SLSU Repo</title>
    <?php include 'header.php';?>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1 class="h1">Admin</h1>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in</p>
                <form method="post" id="loginForm">
                    <div class="input-group mb-2">
                        <div class='form-control' id="incorrect" style="color: white;background-color: #dc3545; display: none;">Incorrect Username or Password</div>
                    </div>
                    <div class="input-group mb-2">
                        <div class='form-control' id="notfound" style="color: white;background-color: #dc3545; display: none;">User not Found</div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" name='id_num' placeholder="ID Number">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="password" class="form-control" name='password' placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    </div>
                    <div class="d-flex justify-content-end">
                    <div class="col-4 px-0">
                        <button type="submit" id="submitBtn" name='submit' class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#submitBtn').on('click', function(e) {
                e.preventDefault();

                var formData = $('#loginForm').serialize();

                $.ajax({
                    type: 'POST',
                    url: 'jquery_admin.php',
                    data: formData,
                    success: function(response) {
                        if(response.trim() == 1){
                            toastr.success('Login successful!');
                            setTimeout(function() {
                                window.location.href = 'dashboard.php';
                            }, 2000);
                        }else if(response.trim() == 2){
                            $('#incorrect').show();
                            $('#notfound').hide();
                        }else if(response.trim() == 3){
                            $('#notfound').show();
                            $('#incorrect').hide();
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>
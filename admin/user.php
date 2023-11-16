<?php
session_start();
include 'admin_class.php';

if(!isset($_SESSION['admin_id'])){
    header('location: login.php');
    exit();
}

$user = new Admin();

if(isset($_POST['submit'])){
    $id = $_POST['idNum'];
    if($user->userExist($id) == true){
        echo "<script>alert('The {$id} ID Already Exists');</script>";
    }else{
        if($user->addUser()){
            echo "<script>alert('Register Successful!!');</script>";
        }
    }
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    echo "<script>
            const result = confirm('Are you sure you want to delete?');

            if(result){
                window.location.href='deleteData.php?id=$id';
            }else{
                window.location.href='user.php';
            }
        </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <?php include 'header.php'; ?>
</head>
<body>
<div class="wrapper">
        <?php include 'topbar.php';?>
        <?php include 'sidebar.php';?>
        <!-- Main Content of Repository -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 text-center">
                        <div class="col-sm-12">
                            <h1 class="m-0">
                                File Repository
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- Main content -->
            <div class="content">
            <div class="container-fluid">
                <button class="mb-3 btn bg-primary align-items-center" data-toggle="modal" data-target="#registrationModal">
                    <span class="info-box-text">Add User</span>
                </button>
                    <div class="row">
                    <!-- Modal -->
                    <div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">User Registration</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="username">ID Number</label>
                                                <input type="text" class="form-control" id="username" name="idNum" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" required>
                                            </div>
    
                                            <div class="col-6">
                                                <label for="number">Phone Number</label>
                                                <input type="text" class="form-control" id="number" name="phoneNumber" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="number">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="admin">Admin</option>
                                                    <option value="user">User</option>
                                                </select>
                                            </div>
    
                                            <div class="col-12">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" required>
                                            </div>
                                            <br><br><br><br>
                                            <button type="submit" name='submit' class="btn btn-primary col-12">Register</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>

                    
                    <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User Table</h3>

                            <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" id='searchInput' class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                <th>ID Number</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $getData = new Admin();
                                $data = $getData->getAllUser();

                                foreach($data as $user){
                                ?>
                                    <tr>
                                    <td><?= $user['id_num']?></td>
                                    <td><?= $user['name']?></td>
                                    <td><?= $user['phoneNumber']?></td>
                                    <td><?= $user['email']?></td>
                                    <td><?= $user['status']?></td>
                                    <td><?= date("F j, Y g:i A", strtotime($user['date']))?></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" onclick="window.location.href='updateData.php?id=<?= $user['id']?>';">Update</button>
                                        <button class="btn btn-danger btn-sm" onclick="window.location.href='user.php?id=<?= $user['id']?>'">Delete</button>
                                    </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php';?>
    </div>

    <script>
        $(document).ready(function() {
            // Add an input event listener to the search input field
            $('#searchInput').on('input', function() {
            const query = $(this).val();

            // Make an AJAX request to a PHP script passing the query as a parameter
                $.ajax({
                    type: 'GET',
                    url: 'search.php',
                    data: { q: query },
                    success: function(data) {
                    // Update the table with the search results
                    $('.table tbody').html(data);
                    }
                });
            });
        });
    </script>
</body>
</html>
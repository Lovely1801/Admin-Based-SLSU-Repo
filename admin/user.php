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
            <div class="container">
                <button class="mb-3 btn bg-primary btn-sm align-items-center" data-toggle="modal" data-target="#registrationModal">
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

                    
                    <div class="col-12 px-0">
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
                                        <button class="view_info btn btn-primary btn-sm" data-toggle='modal' data-target='#viewData' data-id='<?= $user['id']?>'>View</button>
                                        <button class="btn btn-danger btn-sm" onclick="window.location.href='user.php?id=<?= $user['id']?>'">Delete</button>
                                    </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            </table>
                        </div>
                        <!-- Load modal -->
                            <div class="modal fade" id="viewData">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">User</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id='modal-data'>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            
            $('.view_info').click(function(){
                const data = $(this).data('id');

                $.ajax({
                    type: 'GET',
                    url: 'jquery_admin.php',
                    data: { data_id: data },
                    success: function (response) {
                        var info_data = JSON.parse(response);
                        console.log(info_data);
                        var load_data = '';
                        var userLogs = '';
                        

                        info_data.logs.forEach(function(items) {
                            userLogs += '<tr>';
                            userLogs += '<td>' + items.logs + '</td>'; // Close the <td> tags
                            // Format the date
                            const formattedDate = new Date(items.date);
                            const options = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', hour12: true };
                            const formattedDateString = formattedDate.toLocaleDateString(undefined, options);
                            userLogs += '<td>' + formattedDateString + '</td>'; // Close the <td> tags
                            userLogs += '</tr>';
                        });
                        load_data += '<div class="card">' +
                                    '<div class="card-header d-flex">' +
                                    '<ul class="nav nav-pills">' +
                                    '<li class="nav-item"><a href="#profile" class="nav-link active" data-toggle="tab">Profile</a></li>' +
                                    '<li class="nav-item"><a href="#logs" class="nav-link" data-toggle="tab">Logs</a></li>' +
                                    '</ul>' +
                                    '<button data-toggle="modal" data-target="#edit_info">Edit</button>'
                                    '</div>' +
                                    '<div class="card-body">' +
                                    '<div class="tab-content">' +
                                    '<div class="tab-pane active" id="profile">' +
                                    '<div class="row">' +
                                    '<div class="col-12 col-md-4">' +
                                    '<div class="card card-primary card-outline">' +
                                    '<div class="card-body box-profile">' +
                                    '<div class="text-center">' +
                                    '<div>'+
                                    '<img class="profile-user-img img-fluid img-circle" id="userImage" src="' + (info_data.data[0].image_path ? info_data[0].image_path : '../assets/profile/default.png') + '" alt="User profile picture">' +
                                    '<form id="imageUploadForm" enctype="multipart/form-data">'+
                                    '<input type="file" id="fileInput" accept="image/*" name="image" style="display: none;">' +
                                    '<input type="hidden" id="userId" name="data_id" value="'+info_data.data[0].user_id+'" >' +
                                    '<button class="btn btn-primary btn-sm mt-2" onclick="uploadImage()">Upload Image</button>'+
                                    '</form>'+
                                    '</div>'+
                                    '</div>' +
                                    '<input type="hidden" id="person_id" data-id="'+info_data.data[0].user_id+'" >' +
                                    '<h3 class="profile-username text-center">' + info_data.data[0].name + '</h3>' +
                                    '<p class="text-muted text-center">'+info_data.data[0].email+'</p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="col-12 col-md-8">' +
                                    '<div class="card">'+
                                    '<div class="card-header">'+
                                    '<h4>Information</h4>'+
                                    '</div>'+
                                    '<div class="card-body">'+
                                    '<p><span>Id Number: </span><strong>'+info_data.data[0].id_num+'</strong></p>'+
                                    '<p><span>Phone Number: </span><strong>'+info_data.data[0].phoneNumber+'</strong></p>'+
                                    '<p><span>Course: </span><strong>'+info_data.data[0].course+'</strong></p>'+
                                    '<p><span>Year Level: </span><strong>'+info_data.data[0].yr_level+'</strong></p>'+
                                    '</div>'+
                                    '</div>'+
                                    '</div>' +
                                    '<div class="card">'+
                                    '<div class="card-header">'+
                                    '<h4>Information</h4>'+
                                    '</div>'+
                                    '<div class="card-body">'+
                                    '<p><span></span><strong>'+info_data.data[0].about+'</strong></p>'+
                                    '</div>'+
                                    '</div>'+
                                    '</div>' +
                                    '</div>' +
                                    '<div class="tab-pane" id="logs">' +
                                    '<table class="table table-responsive table-default" style="height: 200px">'+
                                    '<thead>'+
                                    '<tr>'+
                                    '<td>Logs</td>'+
                                    '<td>Date</td>'+
                                    '</tr>'+
                                    '</thead>'+
                                    '<tbody>'+
                                    '<div class="card">'+ userLogs +
                                    '</div>'+
                                    '</tbody>'+
                                    '</table>'+
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';

                        $('#modal-data').html(load_data);
                    }
                });
            });

            $(document).on('click', '#userImage', function() {
                $('#fileInput').click();
            });

            $(document).on('change', '#fileInput', function(e) {
                const file = e.target.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    $('#userImage').attr('src', e.target.result);
                }

                reader.readAsDataURL(file);
            });
        });
        function uploadImage() {
            const formData = new FormData(document.getElementById('imageUploadForm'));
            // const imageData = $('#userImage').attr('src');
            // const userId = $('#userId');
            // const user_id = userId.attr('data-id');

            // Send imageData to PHP for database update via AJAX

            console.log(user_id);
            $.ajax({
                type: 'POST',
                url: 'jquery_admin.php',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Handle success (if needed)
                    console.log(response);
                    toastr.success('Upload Profile Picture Successfully.');
                },
                error: function() {
                    // Handle error (if needed)
                    $(document).Toasts('create', {
                        class: 'bg-warning',
                        title: 'Toast Title',
                        subtitle: 'Subtitle',
                        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                    })
                }
            });
        }
    </script>
</body>
</html>
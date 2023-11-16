<?php
include 'admin_class.php';

$user = new Admin();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $getUser = $user->getUser($id);
    foreach($getUser as $User){
        $name = $User['name'];
        $phoneNumber = $User['phoneNumber'];
        $email = $User['email'];
        $password = $User['password'];
    }
}

if(isset($_POST['update'])){

    $result = $user->updateUser($id);
    if($result == true){
        echo "<script>alert('Update User Successfully!!'); window.location.href='user.php';</script>";
    }else{
        echo "<script>alert('Failed To Update User!!!'); window.location.href='user.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update User</title>
        <?php include 'header.php';?>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            Update User
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $name?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="number">Phone Number</label>
                                    <input type="text" class="form-control" id="number" name="phoneNumber" value="<?= $phoneNumber?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="emial">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" value="<?= $password ?>" required>
                                </div>

                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
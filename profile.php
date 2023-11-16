<?php
include 'conn.php';
session_start();

$user_id = $_SESSION['user_id'];
$qry = $conn->query("SELECT * FROM info WHERE id_num = '$user_id'");
if($qry){
    $row = $qry->fetch_assoc();
    
    $name = $row['name'];
    $phoneNumber = $row['phoneNumber'];
    $email = $row['email'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <?php include 'header.php'; ?>
</head>
<body>
    <div class="wrapper">
        <?php include 'navbar.php';?>
        <button class='btn btn-secondary' onclick='window.location.href="home.php"'>Return</button>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="#" alt="Profile Picture" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Name: <?= $name ?></h5><br><br>
                            <a href="edit_profile.php" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <h2>About Me</h2>
                    <p><?php ?></p>
                    <h2>Contact Information</h2>
                    <ul>
                        <li><strong>Email:</strong> <?= $email?></li>
                        <li><strong>Phone:</strong> <?= $phoneNumber?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
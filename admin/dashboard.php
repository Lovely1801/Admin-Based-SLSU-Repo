<?php
session_start();
include 'admin_class.php';

if(!$_SESSION['admin_id']){
    header('location: login.php');
    exit();
}

$action = new Admin();
$countUser = count($action->getAllUser());

$countFile = count($action->getAllDocument());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php include 'header.php'; ?>
</head>
<body>
    <div class="wrapper">
        <?php include 'topbar.php';?>
        <?php include 'sidebar.php';?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 text-center">
                        <div class="col-sm-12">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <div class="header border-0">
                                    <div class="info-box-content">
                                        <span class="info-box-text">Users</span>
                                        <span class="info-box-number"><?= $countUser ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <div class="header border-0">
                                    <div class="info-box-content">
                                        <span class="info-box-text">Files</span>
                                        <span class="info-box-number"><?= $countFile ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <div class="header border-0">
                                    <div class="info-box-content">
                                        <span class="info-box-text">Happy</span>
                                        <span class="info-box-number">Halloween</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <div class="header border-0">
                                    <div class="info-box-content">
                                        <span class="info-box-text">Happy</span>
                                        <span class="info-box-number">Halloween</span>
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
</body>
</html>

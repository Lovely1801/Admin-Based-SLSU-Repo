<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Logs</title>
    <?php include 'header.php'; ?>
    <style>
        .table-responsive { 
            overflow: auto;
            max-height: 300px; /* Adjust the maximum height as needed */
        }
    </style>
</head>
<body>
<div class="wrapper">
        <?php include 'topbar.php';?>
        <?php include 'sidebar.php';?>
        <div class="content-wrapper">
            <div class="content">
                <div class="container-fluid">
                    <div>
                        <button class='btn btn-primary btn-sm' onclick='window.location.href="admin_logs.php"'>Admin Logs</button>
                        <button class='btn btn-primary btn-sm' onclick='window.location.href="user_logs.php"'>User Logs</button>
                        <button class='btn btn-primary btn-sm' onclick='window.location.href="logs.php"'>All Logs</button>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="container mt-2">
                                <div class='table-responsive' style="height: 400px">
                                    <h2>Admin Logs</h2>
                                    <table class="table table-bordered mt-3">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Name</th>
                                                <th>Activity Logs</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            include 'admin_class.php';
                        
                                            $action = new Admin();
                                            $logs = $action->getAdminLogs($_SESSION['admin_id']);
                                            foreach($logs as $data){?>
                                                <tr>
                                                    <td><?= $data['name'] ?></td>
                                                    <td><?= $data['logs'] ?></td>
                                                    <td><?= date("F j, Y g:i A", strtotime($data['date']))?></td>
                                                </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
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
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
</head>
<body>
    <div class="wrapper">
        <div class="container mt-5">
            <h2>Admin Logs</h2>
            <table class="table-bordered mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>Activity Logs</th>
                        <th>User</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include 'admin_class.php';

                    $action = new Admin();
                    $logs = $action->getAllLogs();
                    foreach($logs as $data){?>
                        <tr>
                            <td><?= $data['logs'] ?></td>
                            <td><?= $data['status'] ?></td>
                            <td><?= date("F j, Y g:i A", strtotime($data['date']))?></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
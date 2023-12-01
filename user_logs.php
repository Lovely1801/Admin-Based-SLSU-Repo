<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | Logs</title>
    <?php include 'header.php'; ?>
    <style>
        .table-responsive {
            overflow: auto;
            max-height: 400px; /* Adjust the maximum height as needed */
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <?php include 'navbar.php';?>
        <div>
            <div class="container mt-5">
                <h2>User | Logs</h2>
                <div class="table-responsive rounded">
                    <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <th>Logs</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            include 'user_class.php';
                
                            $action = new User();
                            $logs = $action->getUserLogs();
                            foreach($logs as $data){ ?>
                                <tr>
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
</body>
</html>
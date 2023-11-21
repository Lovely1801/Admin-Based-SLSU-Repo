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

$countLike = count($action->totalLikes());

$countDownload = $action->totalDownloads();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php include 'header.php'; ?>
    <style>
        canvas {
            max-width: 100%;
            height: auto;
            margin: auto;
            display: block;
        }
    </style>
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
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-3">
                            <div class="info-box">
                                <div class="header border-0">
                                    <div class="info-box-content">
                                        <span class="info-box-text">Users</span>
                                        <span class="info-box-number"><?= $countUser ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-3">
                            <div class="info-box">
                                <div class="header border-0">
                                    <div class="info-box-content">
                                        <span class="info-box-text">Files</span>
                                        <span class="info-box-number"><?= $countFile ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-3">
                            <div class="info-box">
                                <div class="header border-0">
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Downloads</span>
                                        <span class="info-box-number"><?= $countDownload ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-3">
                            <div class="info-box">
                                <div class="header border-0">
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Likes</span>
                                        <span class="info-box-number"><?= $countLike ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-2">
                            <canvas id="downloadsChart"></canvas>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php';?>
    </div>

    <script>
        function createChart() {
            fetch('chart_dl.php')
                .then(response => response.json())
                .then(data => {
                    const dates = data.map(entry => entry.download_date);
                    const downloads = data.map(entry => entry.total_downloads);

                    const ctx = document.getElementById('downloadsChart').getContext('2d');
                    const myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: dates,
                            datasets: [{
                                label: 'Downloads',
                                data: downloads,
                                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    precision: 0,
                                    ticks: {
                                        stepSize: 1,
                                        precision: 0
                                    }
                                }
                            }
                        }
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function adjustChartSize() {
            const canvas = document.getElementById('downloadsChart');
            const parentWidth = canvas.parentElement.clientWidth;

            canvas.style.height = '300px'; // Set initial height
            canvas.style.width = parentWidth + 'px';
        }

        // Call the function to create the chart when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            createChart();
            adjustChartSize(); // Adjust chart size initially
        });

        // Adjust chart size when the window is resized
        window.addEventListener('resize', adjustChartSize);
    </script>
</body>
</html>

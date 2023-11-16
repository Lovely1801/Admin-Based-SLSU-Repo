<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header('location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SLSU Repo | Home</title>
    <?php include 'header.php';?>
    <style>
        .main-content{
            height: 500px;
            border: #dfdfdf solid 1px;
            border-radius: 10px;
            background: #ffffff;
        }
        /* .top-content{
            height: 100px;
            border-radius: 10px;
            background: #ffffff;
        } */
        /* .category{
            border-radius: 10px;
            background: #ffffff;
        } */
        .dl-button{
            border: solid 1px;
            border-radius: 5px;
            background: none;
        }
        .dl-button:hover{
            background: #333;
            color: #ffffff;
        }
        .like-normal {
            background: none;
            border: none;
            color: gray;
        }
        .like-normal:hover {
            background: none;
            border: none;
            color: blue;
        }

        .like-liked {
            background: none;
            border: none;
            color: blue;
        }
    </style>
</head>
<body>
    <div class="please-no wrapper">
        <?php include 'navbar.php';?>
        <div class="container-fluid pt-5">
            <div class="row px-4">
                <div class="main-content col-8 pb-5">
                    <div class='card-header'>
                        <h3 class="card-title">Recent Documents</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" id='searchFile' class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0" style='height: 420px'>
                            <table class='table table-thead table-striped'>
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Total Downloads</th>
                                        <th>Total Like</th>
                                        <th>Rating</th>
                                        <th>Thumbs Up</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <?php
                                    include 'user_class.php';
    
                                    $action = new User();
                                    $file = $action->getAllDocument();
                                    foreach($file as $data){
                                    ?>
                                    <tr>
                                        <td><?= $data['file_name']?></td>
                                        <td><?= date("F j, Y g:i A", strtotime($data['date']))?></td>
                                        <td><?= $data['download_count'] ?></td>
                                        <td><?= $action->countlike($data['id']) ?></td>
                                        <td><?= $action->getRate($data['id']) ?></td>
                                        <td> <?php if($action->getLikeVal($data['id']) == true){?>
                                            <form action="like.php" method='post'>
                                                <input type="hidden" name="file_id" value="<?= $data['id']?>">
                                                <button class='like-normal like-liked' name='toggle_like'><i class="fa fa-regular fa-thumbs-up"></i></button>
                                            </form>
                                            <?php }else {?>
                                            <form action="like.php" method='post'>
                                                <input type="hidden" name="file_id" value="<?= $data['id']?>">
                                                <button class='like-normal' name='toggle_like'><i class="fa fa-regular fa-thumbs-up"></i></button>
                                            </form>
                                            <?php }?>
                                        </td>
                                        <td class='d-flex'>
                                            <button class='dl-button' onclick="window.location.href='download.php?file=<?= $data['id'] ?>'"><i class="fa fa-solid fa-download"></i></button>&nbsp;
                                            <button class='btn btn-primary' onclick="window.location.href='rate.php?file=<?= $data['id'] ?>'">Rate</button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-4">
                    <div class="top-content mb-3">
                        Top Research
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Add an input event listener to the search input field
            $('#searchFile').on('input', function() {
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
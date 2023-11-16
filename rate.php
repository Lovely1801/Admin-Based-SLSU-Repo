<?php
session_start();
if(isset($_GET['file'])){
    $file_id = $_GET['file'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Document</title>
    <?php include 'header.php'; ?>
</head>
<body>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="container-sm col-md-6">
                <div class="card h-100 w-50">
                    <div class="card-header">Rate</div>
                    <div class="card-body">
                        <form action="rate_process.php" method='post'>
                            <div class="">
                                <input type="hidden" name="file_id" value="<?php echo $file_id ?>">
                            </div>
                            <div class="input-group mb-3">
                                <select name="rate" id="rate" class='form-control'>
                                    <option value="1.0">1</option>
                                    <option value="2.0">2</option>
                                    <option value="3.0">3</option>
                                    <option value="4.0">4</option>
                                    <option value="5.0">5</option>
                                </select>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" name="submit" class="btn btn-primary btn-block">Rate</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
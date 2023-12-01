<?php
include 'admin_class.php';

$user = new Admin();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $getUser = $user->getUser($id);

    foreach($getUser as $data){
        $about = $data['about'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'header.php';?>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        Update About
                    </div>
                    <div class="card-body">
                        <input type="hidden" id="id" value="<?= $id ?>">
                        <div class="form-group">
                            <label for="about">About</label>
                            <textarea rows="10" cols="30" class="form-control" id="about" name="about"><?= $about ?></textarea>
                        </div>

                       
                        <button type="submit" name="update" class="update btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
            $(document).ready(function(){
                $('.update').click(function(){
                    const id = $('#id').val();
                    const about = $('#about').val();

                    $.ajax({
                        type: 'POST',
                        url: 'jquery_admin.php',
                        dataType: 'json',
                        data: { person_id:id, about:about},
                        success: function(response){
                            if(response == true){
                                toastr.success('Update Successfully');

                                setTimeout(function() {
                                    window.location.href = "user.php";
                                }, 2000);
                            }
                        },
                        error: function(){
                            toastr.error('Update Error.');
                        }
                    });
                });
            });
        </script>
</body>
</html>
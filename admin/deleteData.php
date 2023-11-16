<?php
include 'admin_class.php';

$del = new Admin();
if(isset($_GET['id'])){
    $id = $_GET['id'];

    if($del->deleteUser($id)){
        echo "<script>
                alert('User Deleted Successfully');
                window.location.href='user.php';
            </script>";
    }else{
        echo "<script>
                alert('Error Deleting User');
                window.location.href='user.php';
            </script>";
    }
} 
if(isset($_GET['file_id'])){
    $id = $_GET['file_id'];

    if($del->deleteFile($id)){
        echo "<script>
                alert('File Deleted Successfully');
                window.location.href='repository.php';
            </script>";
    }else{
        echo "<script>
                alert('Error Deleting File');
                window.location.href='repository.php';
            </script>";
    }
} 

?>
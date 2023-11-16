<?php
session_start();
include 'conn.php';


if(isset($_POST['toggle_like'])){
    $file_id = $_POST['file_id'];
    $user_id = $_SESSION['user_id'];

    //Getting the information of the person
    $qry = "SELECT id, name FROM info WHERE id_num = '$user_id'";
    $res = $conn->query($qry);
    $row = $res->fetch_assoc();
    $data = $row['id'];
    $name = $row['name'];

    
    $qry = "SELECT file_name FROM uploaded_files WHERE id = '$file_id'";
    $res = $conn->query($qry);
    $row = $res->fetch_assoc();
    $file_name = $row['file_name'];


    $query = "SELECT liked FROM Likes WHERE user_id = '$data' AND file_id = '$file_id'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // If the user has already liked the post, remove the like
        $liked = $row['liked'];
        $new_like_state = $liked ? 0 : 1;
        $query = "UPDATE Likes SET liked = $new_like_state WHERE file_id = $file_id AND user_id = '$data'";
        if($conn->query($query)){
            $requery = $conn->query("SELECT liked FROM Likes WHERE user_id = '$data' and file_id = '$file_id' ");
            $like_row = $requery->fetch_assoc();
            if($like_row['liked'] == 1){
                $qry = $conn->query("INSERT INTO activity_logs (logs, user_id) VALUES ('".$name." liked the file ".$file_name."','$data')");
            }else{
                $qry = $conn->query("INSERT INTO activity_logs (logs, user_id) VALUES ('".$name." unliked the file ".$file_name."','$data')");
            }
        }
    } else {
        // If the user hasn't liked the post, add a new like
        $query = "INSERT INTO `Likes`(`user_id`, `file_id`, `liked`) VALUES ('$data','$file_id','1')";
        $result = $conn->query($query);
        if($result){
            $qry = $conn->query("INSERT INTO activity_logs (logs, user_id) VALUES ('".$name." liked the file ".$file_name."','$data')");
        }
    }
}

// Close the database connection
$conn->close();

header('location: home.php');
?>
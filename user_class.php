<?php 

class User{
    private $db;
    private $file_id;

    function __construct(){
        include 'conn.php';

        $this->db = $conn;
    }

    function __desctruct(){
        $this->db->close();
    }

    function login($id_num,$password){
        $qry = "SELECT * FROM `info` WHERE id_num = '$id_num' AND `status` = 'user'";
        $result = $this->db->query($qry);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            if($password == $row['password']){
                $_SESSION['user_id'] = $id_num;
                $query = $this->db->query("INSERT INTO activity_logs (logs, user_id) VALUES ('".$row['name']." is logging in','".$row['id']."')");
                if($query){
                    echo "<script>alert('Login Successfully!!'); window.location.href='index.php';</script>";
                    exit();
                }
            }else{
                echo "<script>alert('Password Incorrect!!');</script>";
            }
        }else{
            echo "<script>alert('User not Found!!');</script>";
        }
    }

    function getAllDocument(){
        $data = array();

        $sql = "SELECT * FROM uploaded_files ORDER BY date DESC";
        $result = $this->db->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
        }
        return $data;
    }

    function downloadFile($id){
        session_start();
        $user_id = $_SESSION['user_id'];
        
        $qry = "SELECT id,name FROM info WHERE id_num = '$user_id'";
        $res = $this->db->query($qry);
        $row = $res->fetch_assoc();
        $data = $row['id'];
        $name = $row['name'];

        $path ='assets/fileUpload/';
        $file_name = $this->db->query("SELECT `file_name` FROM `uploaded_files` WHERE `id` = $id")->fetch_array()['file_name'];
        $qry = $this->db->query("SELECT `file_path` FROM `uploaded_files` WHERE `id` = $id")->fetch_array()['file_path'];

        if(file_exists($path . $qry)){
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($path.$qry) . '"');
            header('Content-Length: ' . filesize($path.$qry));
            if(readfile($path.$qry)){
               $sql = $this->db->query("INSERT INTO `download` (download,user_id,file_id) VALUES(1,'$data','$id')");
               $sql = $this->db->query("UPDATE `uploaded_files` SET `download_count` = download_count + 1 WHERE id = $id");
               $qry2 = $this->db->query("INSERT INTO activity_logs (logs, user_id) VALUES ('$name is downloading $file_name','$data')");
            }
            exit;
        }else{
            echo "<script>alert('file not found')</script>";
        }
    }

    function rateFile($file_id){
        $user_id = $_SESSION['user_id'];
        extract($_POST);

        $qry = "SELECT id,name FROM info WHERE id_num = '$user_id'";
        $res = $this->db->query($qry);
        $row = $res->fetch_assoc();
        $data = $row['id'];
        $name = $row['name'];

        $file = $this->db->query("SELECT file_name FROM uploaded_files WHERE id = '$file_id'");
        $file_name = $file->fetch_array()['file_name'];

        $query = "SELECT * FROM rating WHERE user_id = '$data' AND file_id = '$file_id'";
        $result = $this->db->query($query);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $new_rate_state = $rate;
            $query = "UPDATE rating SET rate = $new_rate_state WHERE file_id = $file_id AND user_id = '$data'";
            if($this->db->query($query)){
                $log = $this->db->query("INSERT INTO activity_logs (logs, user_id) VALUES ('".$name." is updating the rating to ".number_format($rate,0)." of the file ".$file_name."', '$data')");
                echo "<script>window.location.href='home.php'; console.log('Success Rating');</script>";
            }else{
                echo "<script>window.location.href='home.php'; console.log('Failed Rating');</script>";
            }
        }else{
            $qry = $this->db->query("INSERT INTO rating (`user_id`, `file_id`, `rate`) VALUES ('$data','$file_id','$rate')");
            if($qry){
                $log = $this->db->query("INSERT INTO activity_logs (logs, user_id) VALUES ('".$name." is rating ".number_format($rate,0)." of the file ".$file_name."', '$data')");
                echo "<script>window.location.href='home.php'; console.log('Success Rating');</script>";
            }else{
                echo "<script>window.location.href='home.php'; console.log('Failed Rating');</script>";
            }
        }
    }

    function countLike($file_id){
        $qry = $this->db->query("SELECT COUNT(liked) as count FROM Likes WHERE file_id = '$file_id' AND liked = 1");
        $row = $qry->fetch_assoc();
        if($qry){
            return $row['count'];
        }else{
            return $row['count'];
        }
    }

    function getRate($file_id){
        $qry = $this->db->query("SELECT AVG(rate) as rate FROM rating WHERE file_id = '$file_id'");
        $row = $qry->fetch_assoc();
        if($qry){
            $formatted = round($row['rate'],1);
            return $formatted;
        }else{
            echo 'Error';
        }
    }

    function searchFile($search, $action){
        
        $sql ="SELECT * FROM uploaded_files WHERE CONCAT('',file_name,download_count,DATE_FORMAT(date, '%M %d, %Y %h:%i %p')) LIKE CONCAT('%','$search', '%') ORDER BY date DESC";
        $result = $this->db->query($sql);
        
        if($result->num_rows > 0){
            while($file = $result->fetch_assoc()){
                echo '<tr>';
                echo '<td>' . $file['file_name'] . '</td>';
                echo '<td>' . date("F j, Y g:i A", strtotime($file['date'])) . '</td>';
                echo '<td>' . $file['download_count'] . '</td>';
                echo '<td class="like-count" data-id='. $file['id'] .'>'. $action->countLike($file['id']) .'</td>';
                echo '<td>'. $action->getRate($file['id']) .'</td>'; ?>
                    <td> <?php if($action->getLikeVal($file['id']) == true){?>
                            <button class='like-normal like-liked' data-id="<?= $file['id']?>"><i class="fa fa-regular fa-thumbs-up"></i></button>
                        <?php }else {?>
                            <button class='like-normal' data-id="<?= $file['id']?>"><i class="fa fa-regular fa-thumbs-up"></i></button>
                    </td>
                    <?php }
                echo '<td class="d-flex">
                        <button class="dl-button" onclick="wind.ow.location.href=\'download.php?=file'. $file['id']. '\'"><i class="fa fa-solid fa-download"></i></button>&nbsp;
                        <button class="btn btn-primary" onclick="window.location.href=\'rate.php?file='.$file['id'].'\'">Rate</button>
                        </td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="7">No file found.</td></tr>';
        }
    }

    function getLikeVal($file_id){
        $user_id =$_SESSION['user_id'];
        
        $qry = "SELECT id FROM info WHERE id_num = '$user_id'";
        $res = $this->db->query($qry);
        $row = $res->fetch_assoc();
        $data = $row['id'];

        $qry = $this->db->query("SELECT * FROM Likes WHERE file_id = '$file_id' AND user_id = '$data'");
        if($qry->num_rows > 0){
            $row = $qry->fetch_assoc();
            if($row['liked'] == 1){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    function getUserLogs(){
        $data = array();
        $user_id = $_SESSION['user_id'];
        $user = $this->db->query("SELECT * FROM info WHERE id_num = '$user_id'")->fetch_array()['id'];

        $qry = $this->db->query("SELECT * FROM activity_logs WHERE user_id = '$user' ORDER BY date DESC");
        if($qry->num_rows > 0){
            while($row = $qry->fetch_assoc()){
                $data[] = $row;
            }
        }
        return $data;
    }

    function like($file_id){
        session_start();
        $user_id = $_SESSION['user_id'];

        $qry = $this->db->query("SELECT id, name FROM info WHERE id_num = '$user_id'")->fetch_assoc();
        $data = $qry['id'];
        $name = $qry['name'];

        $qry = "SELECT file_name FROM uploaded_files WHERE id = '$file_id'";
        $res = $this->db->query($qry);
        $row = $res->fetch_assoc();
        $file_name = $row['file_name'];

        $qry_like = $this->db->query("SELECT * FROM Likes WHERE file_id = '$file_id' AND user_id = '$data'");
        if($qry_like->num_rows > 0){
            $row = $qry_like->fetch_assoc();
            $liked = $row['liked'];
            $new_like_state = $liked ? 0 : 1;
            $query = "UPDATE Likes SET liked = $new_like_state WHERE file_id = $file_id AND user_id = '$data'";
            if($this->db->query($query)){
                $requery = $this->db->query("SELECT liked FROM Likes WHERE user_id = '$data' and file_id = '$file_id' ");
                $like_row = $requery->fetch_assoc();
                if($like_row['liked'] == 1){
                    $qry = $this->db->query("INSERT INTO activity_logs (logs, user_id) VALUES ('".$name." liked the file ".$file_name."','$data')");
                }else{
                    $qry = $this->db->query("INSERT INTO activity_logs (logs, user_id) VALUES ('".$name." unliked the file ".$file_name."','$data')");
                }
            }
        }else{
            $qry = $this->db->query("INSERT INTO Likes (file_id , user_id, liked) VALUES('$file_id','$data','1')");
            if($qry){
                $this->db->query("INSERT INTO activity_logs (logs, user_id) VALUES ('".$name." liked the file ".$file_name."','$data')");
            }
        }

    }

    function topDownload(){
        $data = array();

        $qry = $this->db->query("SELECT file_name ,download_count FROM `uploaded_files` WHERE date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE() ORDER BY download_count DESC LIMIT 3");
        if($qry->num_rows > 0){
            while($rows = $qry->fetch_assoc()){
                $data[] = $rows;
            }
        }
        return $data;
    }

    function topRated(){
        $data = array();

        $qry = $this->db->query("SELECT rating.file_id, uploaded_files.file_name, FORMAT(AVG(rate),1) AS avg_rating FROM rating INNER JOIN uploaded_files ON rating.file_id = uploaded_files.id GROUP BY rating.file_id ORDER BY avg_rating DESC LIMIT 3");
        if($qry->num_rows > 0){
            while($rows = $qry->fetch_assoc()){
                $data[] = $rows;
            }
        }
        return $data;
    }
}

?>
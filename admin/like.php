<?php
include 'admin_class.php';

$action = new Admin();
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $bool = false;

    $action->like($id);
    $like_count = $action->countLike($id);
    if($count_like = $action->getLikeVal($id) == true){
        $bool = true;
    }

    $response = array(
        'like_count' => $like_count,
        'bool_like' => $bool
    );
    echo json_encode($response);


}


?>
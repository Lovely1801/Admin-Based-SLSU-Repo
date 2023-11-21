<?php
session_start();
include 'user_class.php';

$action = new User();

if(isset($_GET['loadBody'])){
    $loadBody = $_GET['loadBody'];

    if($loadBody == 'getData'){
        $file = $action->getAllDocument();

        $contentBody = '';
        foreach ($file as $data) {
            $contentBody .= "<tr>";
            $contentBody .= "<td>" . $data['file_name'] . "</td>";
            $contentBody .= "<td>" . date("F j, Y g:i A", strtotime($data['date'])) . "</td>";
            $contentBody .= "<td>" . $data['download_count'] . "</td>";
            $contentBody .= "<td class='like-count' data-id=". $data['id'] .">" . $action->countlike($data['id']) . "</td>";
            $contentBody .= "<td>" . $action->getRate($data['id']) . "</td>";
            $contentBody .= "<td>";
            if ($action->getLikeVal($data['id']) == true) {
                $contentBody .= "<button class='like-normal like-liked' data-id=". $data['id'] ."><i class='fa fa-regular fa-thumbs-up'></i></button>";
            } else {
                $contentBody .= "<button class='like-normal' data-id=". $data['id'] ."><i class='fa fa-regular fa-thumbs-up'></i></button>";
            }
            $contentBody .= "</td>";
            $contentBody .= "<td class='d-flex'>";
            $contentBody .= "<button class='dl-button' onclick=\"window.location.href='download.php?file=" . $data['id'] . "'\"><i class='fa fa-solid fa-download'></i></button>&nbsp;";
            $contentBody .= "<button class='btn btn-primary' onclick=\"window.location.href='rate.php?file=" . $data['id'] . "'\">Rate</button>";
            $contentBody .= "</td>";
            $contentBody .= "</tr>";
        }

       echo $contentBody;
    }
}

if(isset($_POST['file_id'])){
    $id = $_POST['file_id'];
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

if(isset($_GET['mostDl'])){
    $mostDl = $_GET['mostDl'];
    if($mostDl == 'getDl'){
        $data = $action->topDownload();
    }
    
    header('Content-Type: application/json');

    echo json_encode($data);
}

if(isset($_GET['mostRate'])){
    $mostRate = $_GET['mostRate'];
    if($mostRate == 'getRate'){
        $data = $action->topRated();
    }

    header('Content-Type: application/json');

    echo json_encode($data);
}

?>
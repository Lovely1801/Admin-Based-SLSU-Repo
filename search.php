<?php
session_start();
include 'user_class.php';

$action = new User();
if(isset($_GET['q'])){
    $search = $_GET['q'];

    $action->searchFile($search, $action);
}
?>
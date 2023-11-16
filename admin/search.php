<?php
include 'admin_class.php';

$search = new Admin();
if (isset($_GET['q'])) {
    $query = $_GET['q'];
    
    $search->searchUser($query);
}

if (isset($_GET['file'])) {
    $query = $_GET['file'];
    
    $search->searchDoc($query,$search);
}

?>
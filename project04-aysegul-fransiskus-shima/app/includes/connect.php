<?php
$host = "";
$db = "";
$user = "";
$pass = ";

$link = mysqli_connect($host, $user, $pass, $db);

$db_response = []; 
$db_response['success'] = 'not set'; 
if (!$link) {
    $db_response['success'] = 'false';
} else {
    $db_response['success'] = 'true';
}

//echo json_encode($db_response);

?>
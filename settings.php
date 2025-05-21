<?php
$host = 'localhost';
$db = 'project_two'; //Eventually, this should become the merged database
$user = 'root';
$pwd = '';

$dbconn = mysqli_connect($host, $user, $pwd, $db);
if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
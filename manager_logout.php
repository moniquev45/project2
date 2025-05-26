<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php");
exit();
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <!--Charset Declaration-->
        <meta charset="utf-8">
        <!--Page Description for File-->
        <meta name="description" content="Logout page for managers to exit the system.">
        <!--Key Words for File-->
        <meta name="keywords" content="Logout, Manager, Access, System">
        <!--Author Information-->
        <meta name="author" content="Riley Tuckett">
    </head>
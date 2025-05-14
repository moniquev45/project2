<!DOCTYPE html>
<html lang = "en">
    <head>
        <!--Charset Declaration-->
        <meta charset="utf-8">
        <!--Page Description for File-->
        <meta name="description" content="">
        <!--Key Words for File-->
        <meta name="keywords" content="">
        <!--Author Information-->
        <meta name="author" content="">

        <title>Manager Page</title>
        <!--Icon for the browser-->
        <link rel="icon" href="images/Pear_Logo_Backgroundless.png" type="image/png">
        <!-- Logo Link: https://www.shutterstock.com/image-vector/green-pear-vector-icon-logo-design-2308212369 -->

        <link rel="stylesheet" href="styles/styles.css">
        
    </head>
    <body>
        <!-- Including the navigation links (nav.inc) file -->
        <?php include 'nav.inc'; ?>

        <!-- Inserting the Header -->
        <?php include 'header.inc'; ?>
        <main>

        </main>
        <!-- Including footer file -->
        <?php include 'footer.inc'; ?>
        
    </body>
</html>

<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once("settings.php");
    session_start();
    
?>
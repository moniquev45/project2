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
    if ($dbconn) {
        $query = "SELECT * FROM EOI";
        $result = mysqli_query($dbconn, $query);
        if ($result) {
            echo "<table>";
            echo "<tr><th>????</th><th>????</th><th>????</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['eoi_id'] . "</td>";
                echo "<td>" . $row['eoi_name'] . "</td>";
                echo "<td>" . $row['eoi_description'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Query failed: " . mysqli_error($dbconn);
        }
        mysqli_close($dbconn);
    } else {
        echo "Connection failed";
    }
?>
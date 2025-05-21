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
        <?php
            require_once("settings.php");
            session_start();
            if ($dbconn) {
                $query = "SELECT * FROM eoi";
                $result = mysqli_query($dbconn, $query);
                if ($result) {
                    echo "<table border='1' cellpadding='5' justify='center' align='center'>";
                    echo "<tr><th>EOI Number</th><th>Status</th><th>Job Reference</th><th>Name</th><th>Date of Birth</th><th>Gender</th><th>Address</th><th>Email</th>
                    <th>Mobile</th><th>Skills</th><th>Other Skills</th><th>Requirements</th><th>Salary</th><th>Hours</th><th>Submission Time</th></tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Concatenate the first and last name
                        $fullName = $row['first_name'] . " " . $row['last_name'];
                        // Concatenate the address
                        $address = $row['street'] . ", " . $row['suburb'] . ", " . $row['state'] . ", " . $row['postcode'];
                        // Concatenate the hours
                        $hours = $row['hours'] . " " . $row['hours_type'];
                        // Concatenate submission time
                        $submissionTime = date("Y-m-d H:i:s", strtotime($row['submission_time']));
                        echo "<tr>";
                        echo "<td>" . $row['eoi_number'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>" . $row['job_reference'] . "</td>";
                        echo "<td>" . $fullName . "</td>";
                        echo "<td>" . $row['dob'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "<td>" . $address . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['mobile'] . "</td>";
                        echo "<td>" . $row['skills'] . "</td>";
                        echo "<td>" . $row['other_skills'] . "</td>";
                        echo "<td>" . $row['requirements'] . "</td>";
                        echo "<td>" . $row['salary'] . "</td>";
                        echo "<td>" . $hours . "</td>";
                        echo "<td>" . $submissionTime . "</td>";

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
        </main>
        <!-- Including footer file -->
        <?php include 'footer.inc'; ?>
    </body>
</html>
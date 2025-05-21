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
                    echo "<div class='table-responsive'>";
                    echo "<table class='table-eoi'>";
                    // Table header
                    // Using 'nohover' class to prevent hover effect on header
                    echo "<thead><tr class='nohover'>
                        <th>EOI Number</th>
                        <th>Status</th>
                        <th>Job Reference</th>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Skills</th>
                        <th>Other Skills</th>
                        <th>Requirements</th>
                        <th>Salary</th>
                        <th>Hours</th>
                        <th>Submission Time</th>
                    </tr></thead><tbody>";
                    // Fetching and displaying data
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Concatenate name safely
                        $fullName = trim($row['first_name'] . ' ' . $row['family_name']);

                        // Concatenate address safely, skipping empty parts
                        $addressParts = array_filter([
                            $row['street_address'],
                            $row['suburb'],
                            $row['state'],
                            $row['postcode']
                        ]);
                        $address = implode(', ', $addressParts);

                        // Format the hours
                        // Concatenates the start and end times, removing seconds and trailing zeros
                        $hours = '';
                        if (!empty($row['hours_start']) && !empty($row['hours_end'])) {
                            // Adjusting the regex to remove seconds and trailing zeros
                            $start = preg_replace('/(:00|\.00)$/', '', $row['hours_start']);
                            $end = preg_replace('/(:00|\.00)$/', '', $row['hours_end']);
                            $hours = $start . ' - ' . $end;
                        } 
                        // Format the submission time
                        $submissionTime = date("Y-m-d H:i:s", strtotime($row['submission_time']));
                        // Displaying each row of data
                        // Using htmlspecialchars to prevent XSS attacks
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['eoi_number']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['job_reference']) . "</td>";
                        echo "<td>" . htmlspecialchars($fullName) . "</td>";
                        echo "<td>" . htmlspecialchars($row['dob']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                        echo "<td>" . htmlspecialchars($address) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email_apply']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['mobile']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['skills']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['skills_other']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['requirements']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['salary_scale']) . "</td>";
                        echo "<td>" . htmlspecialchars($hours) . "</td>";
                        echo "<td>" . htmlspecialchars($submissionTime) . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody></table>";
                    echo "</div>";
                } else {
                    // Errors in the query
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
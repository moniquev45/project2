<!DOCTYPE html>
<html lang = "en">
    <head>
        <!--Charset Declaration-->
        <meta charset="utf-8">
        <!--Page Description for File-->
        <meta name="description" content="Displays All job listings.">
        <!--Key Words for File-->
        <meta name="keywords" content="HTML, Tags, Table, Lists, Heading, Body, Navigation, Body, Main, Footer">
        <!--Author Information-->
        <meta name="author" content="Monique Vilardo" >

        <title>IT Job Listings</title>
        <!--Icon for the browser-->
        <link rel="icon" href="images/Pear_Logo_Backgroundless.png" type="image/png">
        <!-- Logo Link: https://www.shutterstock.com/image-vector/green-pear-vector-icon-logo-design-2308212369 -->

        <!--Linking the style CSS sheet to the document.-->
        <link rel="stylesheet" href="styles/styles.css">

    </head>
    <body>
        <!-- Inserting the Header -->
        <?php include 'header.inc'; ?>

        <main>
                             
            <?php
                require_once "settings.php";
                $dbconn = mysqli_connect($host, $user, $pwd, $db);
                echo "<p>HELPPPPPP</p>";
                echo "<p>Test 1</p>";
                if ($dbconn) {
                    $query = "SELECT * FROM jobs";
                    $result = mysqli_query($dbconn, $query);
                    echo "<p>Test 2</p>";
                    echo "<table>";
                    echo "<tbody>";
                    for ($i = 0; $i < mysqli_num_rows($result); $i++){
                        $row = mysqli_fetch_assoc($result);
                        echo "<tr class='Jobs_Table_Row'>";
                            echo "<td class='Jobs_Table_Data'>";
                                echo "<section>";
                                    echo "<hr>";
                                    echo "<div class='Job_Position_And_Logo'>";
                                    # Job Info
                                    echo "<h2 class='Job_Title' id='Data_Anaylst_Job_Title'>". $row['job_title'] ."</h2>";
                                    # Logo From https://www.facebook.com/photo.php?fbid=276912169616293&id=276912036282973&set=a.276912066282970&locale=th_TH
                                    echo "<figure>";
                                        echo "<a href= 'https://icarly.fandom.com/wiki/Pear_Company' target='_blank'><img src='images/Pear_Logo.png' alt='Pear Company Logo' class='Companies_Logo_Image'/></a>";
                                    echo "</figure>";
                                    echo "</div>";
                                    echo "<div class='Random_Company_Names'>". $row['job_company'] . "</div>";
                                    echo "<div class='Company_Location'>". $row['job_location'] . "</div>";
                                    echo "<br><br>";
                                    echo "<hr>";
                                    echo "<div>";
                                    $job_salary_min = (string)$row['job_salary_min'];
                                    $formatted_job_salary_min = "$ ". $job_salary_min;
                                    $job_salary_max = (string)$row['job_salary_max'];
                                    $formatted_job_salary_max = "$ ". $job_salary_max;
                                    $formatted_total_salary = "Salary: " . $formatted_job_salary_min . " - " . $formatted_job_salary_max;
                                    echo "<h4 class='Job_Salary_Job_Page'>" . $formatted_total_salary . "</h4>";
                                    $job_id = $row['job_id'];
                                    $formatted_job_id = "Job Reference Number: #" . str_pad($job_id, 5, "0", STR_PAD_LEFT);
                                    echo "<h4 class='Job_Reference_Number_Job_Page'>" . $formatted_job_id . "</h4>";
                                    echo "</div>";
                                    echo "<br><br><br>";
                                    echo "<p>The daily duties and responsibilities include:</p>";
                                echo "</section>";
                            echo "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";

                } else echo "<p> Unable to connect to the db.</p>";

            ?>
        </main>
            <!-- Including footer file -->
            <?php include 'footer.inc'; ?>
    </body>
</html>
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
                if ($dbconn) {
                    $query = "SELECT * FROM jobs";
                    $result = mysqli_query($dbconn, $query);
                    if (isset($_GET['job_id'])){
                        $main_job_id = $_GET["job_id"];
                        $searched_job = null;

                        for ($i = 0; $i < mysqli_num_rows($result); $i++){
                            $row = mysqli_fetch_assoc($result);

                            if ($row['job_id'] == $main_job_id) {
                                $searched_job = $row;
                                break;
                            }
                        }

                        echo "<main>";
                        echo "<figure>";
                            echo "<img src='styles/images/Office_People.jpg' alt='People Working' id='Job_Discription_Image_Background'/>";
                            #Link: https://www.google.com/search?vsrid=CNCPsbvgxpG9NxACGAEiJDgyM2YyZmI3LTQzNWItNDc0Yi04OGM0LTBiOGFjYzc4MDY2Mw&gsessionid=r7G_iOIHqvPCke7rTfiTYwYqEN2lcGfisdj_PeWX98yyJWL3ILRbDA&lsessionid=7IuduqD-ns7X9cfKggASLH8id-WmTKsEhVLKTIt4l4m_kU4q66bMUg&vsdim=1000,416&vsint=CAIqDAoCCAcSAggKGAEgATojChYNAAAAPxUAAAA_HQAAgD8lAACAPzABEOgHGKADJQAAgD8&lns_mode=un&source=lns.web.gisbubb&udm=26&lns_surface=26&lns_vfs=e&qsubts=1744556620873&biw=829&bih=646&hl=en-AU#vhid=6S08ssutfThiCM&vssid=mosaic -->
                        echo "</figure>";
                        #This is the job heading, with the job title.
                        echo "<h1 class='Job_Headers_Other_Page'>Data Analyst</h1>";
                        echo "<br>";
                        #This table contains main employment details and the employment summary and is used because it
                        #makes it easier to format things side by side with each other.
                        echo "<table>";
                            echo "<tbody>";
                                echo "<tr>";
                                    #Main Employment Details Information
                                    echo "<td class='Main_Employment_Details_Background'>";
                                        echo "<hr>";
                                        #Company Logo
                                        echo "<div>";
                                            echo "<h3 class='Random_Company_Names'>Company: Pear </h3>";
                                            #Logo From https://www.facebook.com/photo.php?fbid=276912169616293&id=276912036282973&set=a.276912066282970&locale=th_TH
                                            echo "<figure>";
                                                $logo = $row['job_logo'];
                                                $logo_link = $row['job_logo_link'];
                                                echo "<a href= '$logo_link' target='_blank'><img src='$logo' alt='Company Logo' class='Companies_Logo_Image'/></a>";
                                            echo "</figure>";
                                        echo "</div>";
                                        echo "<br><br><br>";
                                        echo "<hr>";

                                        $location = "Location: " . $row['job_location'];
                                        $department = "Department: " . $row['job_department'];
                                        $employment_type = "Employment Type: " . $row['job_employment_type'];
                                        $job_salary_min = (string)$row['job_salary_min'];
                                        $formatted_job_salary_min = "$ $job_salary_min";
                                        $job_salary_max = (string)$row['job_salary_max'];
                                        $formatted_job_salary_max = "$ $job_salary_max";
                                        $formatted_total_salary = "Salary: $formatted_job_salary_min  -  $formatted_job_salary_max";
                                        $manager_email = $row['job_manager_email'];
                                        $manager = $row['job_manager'];
                                        $job_id = $row['job_id'];
                                        $formatted_job_id = "Job Reference Number: #" . str_pad($job_id, 5, "0", STR_PAD_LEFT);

                                        echo "<p class='Main_Employment_Details'>$location</p>";
                                        echo "<p class='Main_Employment_Details'>$department</p>";
                                        echo "<p class='Main_Employment_Details'>$employment_type</p>";
                                        echo "<p class='Main_Employment_Details'>$formatted_total_salary</p>";
                                        echo "<p class='Main_Employment_Details'>Reports To: <a class='Reporting_To_Jobs_Specific' href='mailto: $manager_email'> $manager </a></p>";
                                        echo "<p class='Main_Employment_Details'>$formatted_job_id</p>";
                                        echo "<br>";
                                    echo "</td>";
                                    echo "<td class='Employment_Summary'>";
                                        echo "<h2>Summary:</h2>";
                                        $summary = $row['job_summary'];
                                        echo "<p> $summary </p>";
                                        #Data From Chatgpt When I inputted prompts, Can you give me a job description for a data analyst, 
                                        #link: https://chatgpt.com/
                                    echo "</td>";
                                echo "</tr>";
                            echo "</tbody>";
                        echo "</table>";
                    echo "<br>";
                    echo "</main>";
                    } else echo "Information lost.";
                } else echo "<p> Unable to connect to the db.</p>";

            ?>
        </main>
            <!-- Including footer file -->
            <?php include 'footer.inc'; ?>
    </body>
</html>
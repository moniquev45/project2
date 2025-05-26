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
                    echo "<p>Find and explore a world filled with oportunities in the tech field. While finding out what qualifiacations you need to succeed.</p>";
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
                                        $logo_link = $row['job_logo_link'];
                                        $logo = $row['job_logo'];
                                        echo "<a href= '$logo_link' target='_blank'><img src='$logo' alt='Pear Company Logo' class='Companies_Logo_Image'/></a>";
                                    echo "</figure>";
                                    echo "</div>";
                                    echo "<div class='Random_Company_Names'>". $row['job_company'] . "</div>";
                                    echo "<div class='Company_Location'>". $row['job_location'] . "</div>";
                                    echo "<br><br>";
                                    echo "<hr>";
                                    echo "<div>";
                                    $job_salary_min = (string)$row['job_salary_min'];
                                    $formatted_job_salary_min = "$ $job_salary_min";
                                    $job_salary_max = (string)$row['job_salary_max'];
                                    $formatted_job_salary_max = "$ $job_salary_max";
                                    $formatted_total_salary = "Salary: $formatted_job_salary_min  -  $formatted_job_salary_max";
                                    echo "<h4 class='Job_Salary_Job_Page'> $formatted_total_salary </h4>";
                                    $job_id = $row['job_id'];
                                    $formatted_job_id = "Job Reference Number: #" . str_pad($job_id, 5, "0", STR_PAD_LEFT);
                                    echo "<h4 class='Job_Reference_Number_Job_Page'> $formatted_job_id </h4>";
                                    echo "</div>";
                                    echo "<br><br><br>";
                                    echo "<p>The daily duties and responsibilities include:</p>";
                                    #Next section chatgpt was used to aid in the understanding of the code. 
                                    #Prompt used: how to make a block of information in php like In need apples. Pears are good. Potatoes are nice. and have it so that it turns this into a list.
                                    #Trim removes any white space, explode splits the string, at the asterics.
                                    #array_filter, removes any null, or empty peices in the array.
                                    #array_map, applies the trim onto every peice of this new array. 
                                    $job_info = array_filter(array_map('trim', explode('*', $row['job_information'])));
                                    echo "<ul>";
                                    foreach ($job_info as $job_info_line) {
                                        echo "<li>$job_info_line</li>"; 
                                    }
                                    echo "</ul>";
                                    $manager_email = $row['job_manager_email'];
                                    $manager = $row['job_manager'];
                                    echo "<p class='Reporting_To_Job'>If Successful You Will Be Reporting To: ";
                                    echo "<a class='Footer_Links' href='mailto: $manager_email '> $manager </a>";
                                    echo "</p>";
                                    echo "<br>";
                                    # This is the See More Button where you can press and it uses a hyperlink to send you to a whole big page
                                    # with all the job listing info.
                                    echo "<a href='extended_jobs.php?job_id=$job_id' target='_blank'
                                        title='Extended Job Description' class='See_More'>see more
                                    </a>";
                                    echo "<br><br><br>";
                                    
                                    echo "<hr>";
                                echo "</section>";
                            echo "</td>";
                            echo "<td class='Jobs_Table_Data'>";
                                echo "<aside>";
                                    #More Info
                                    echo "<br>";
                                    echo "<div id='qualifications_and_skills_short_list'>";
                                    echo "<h3>Required Qualifications/Skills:</h3>";
                                    echo "<p>(In order of importance)</p>";
                                    $job_qualifications_skills = array_filter(array_map('trim', explode('*', $row['job_qualifications_or_skills'])));
                                    echo "<ol>";
                                    foreach ($job_qualifications_skills as $job_singular_qualifications_skills) {
                                        echo "<li>$job_singular_qualifications_skills</li>"; 
                                    }
                                    echo "</ol>";
                                    echo "</div>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td colspan='2'>";
                                    echo "<div class='Apply_Here'>";
                                    #This sends the user to the apply page where they can fill out a job application.
                                    echo "<a href='apply.php' target='_blank' title='Go to Apply For Job Page'>Apply Here</a>";
                                    echo "</div>";
                                    echo "</td>";
                                    echo "</tr>";
                                echo "</aside>";
                            echo "</td>";
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
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

                        #This creates an index number ($i) and tests if it is less than the amount of rows in the database, if it isn't it will 
                        #run the code in the for loop while increasing the index number by one. It will stop once it the index number is equal to the
                        #number of rows in the jobs database table.
                        for ($i = 0; $i < mysqli_num_rows($result); $i++){
                            #This then gets the associated row for the specific index number, then
                            #if the job_id is the same as the rows job_id the code will stop and 
                            #that will be the job that the page will be printing out and the row
                            #data that will be used for the rest of the page.
                            #There is also no need for a condition where there is no row with the exact id,
                            #as the row data being given is from the prevouis page that only prints out a job if it exsits
                            #in the database and therfore a see more button with its associated job_id.
                            $row = mysqli_fetch_assoc($result);

                            if ($row['job_id'] == $main_job_id) {
                                $searched_job = $row;
                                break;
                            }
                        }

                        echo "<main>";
                        #This prints the hero image, which is the main top image shown across the screen.
                        echo "<figure>";
                            $hero_image = $row['job_hero_image'];
                            echo "<img src='$hero_image' alt='Hero_Image' id='job_discription_image_background'/>";
                            #Link: https://www.google.com/search?vsrid=CNCPsbvgxpG9NxACGAEiJDgyM2YyZmI3LTQzNWItNDc0Yi04OGM0LTBiOGFjYzc4MDY2Mw&gsessionid=r7G_iOIHqvPCke7rTfiTYwYqEN2lcGfisdj_PeWX98yyJWL3ILRbDA&lsessionid=7IuduqD-ns7X9cfKggASLH8id-WmTKsEhVLKTIt4l4m_kU4q66bMUg&vsdim=1000,416&vsint=CAIqDAoCCAcSAggKGAEgATojChYNAAAAPxUAAAA_HQAAgD8lAACAPzABEOgHGKADJQAAgD8&lns_mode=un&source=lns.web.gisbubb&udm=26&lns_surface=26&lns_vfs=e&qsubts=1744556620873&biw=829&bih=646&hl=en-AU#vhid=6S08ssutfThiCM&vssid=mosaic -->
                        echo "</figure>";
                        #This is the job heading, with the job title.
                        $job_title = $row['job_title'];
                        echo "<h1 class='job_headers_other_page'>$job_title</h1>";
                        #This table contains main employment details and the employment summary and is used because it
                        #makes it easier to format things side by side with each other.
                        echo "<table>";
                            echo "<tbody>";
                                echo "<tr>";
                                    #Main Employment Details Information
                                    echo "<td class='main_employment_details_background'>";
                                        echo "<hr>";
                                        #Company Logo
                                        echo "<div id='company_and_logo_extended'>";
                                            $company = $row['job_company'];
                                            $company_styled = "Company: " . $company;
                                            echo "<h3 class='random_company_names'>$company_styled</h3>";
                                            #Logo From https://www.facebook.com/photo.php?fbid=276912169616293&id=276912036282973&set=a.276912066282970&locale=th_TH
                                            echo "<figure>";
                                                $logo = $row['job_logo'];
                                                $logo_link = $row['job_logo_link'];
                                                echo "<a href= '$logo_link' target='_blank'><img src='$logo' alt='Company Logo' class='companies_logo_image'/></a>";
                                            echo "</figure>";
                                        echo "</div>";
                                        echo "<div class = 'line_break'>";
                                            echo "<hr>";
                                        echo "</div>";

                                        #These are the defined varables with the added styling to the string to be properly printed.
                                        $location = "Location: " . $row['job_location'];
                                        $department = "Department: " . $row['job_department'];
                                        $employment_type = "Employment Type: " . $row['job_employment_type'];
                                        #This styles and max and min salary in the salary range and prints it out in a easy to read format, that has 2 decimal places.
                                        $job_salary_min = number_format($row['job_salary_min'], 2);
                                        $formatted_job_salary_min = "$ $job_salary_min";
                                        $job_salary_max = number_format($row['job_salary_max'], 2);
                                        $formatted_job_salary_max = "$ $job_salary_max";
                                        $formatted_total_salary = "Salary: $formatted_job_salary_min  -  $formatted_job_salary_max";
                                        $manager_email = $row['job_manager_email'];
                                        $manager = $row['job_manager'];
                                        $job_id = $row['job_id'];
                                        #This gets the job reference number and adds padding to it so that it displays to the length of 5
                                        #The string that is used for the padding is 0 and the STR_PAD_LEFT means that the padding comes
                                        #from the left side of the job id so that is prints 00001 or 01234 instead of just 1 or 1234.
                                        #It also places into a string that has a # infront of it.
                                        $formatted_job_id = "Job Reference Number: #" . str_pad($job_id, 5, "0", STR_PAD_LEFT);

                                        echo "<p class='main_employment_details'>$location</p>";
                                        echo "<p class='main_employment_details'>$department</p>";
                                        echo "<p class='main_employment_details'>$employment_type</p>";
                                        echo "<p class='main_employment_details'>$formatted_total_salary</p>";
                                        echo "<p class='main_employment_details'>Reports To: <a class='reporting_to_jobs_specific' href='mailto: $manager_email'> $manager </a></p>";
                                        echo "<p class='main_employment_details'>$formatted_job_id</p>";
                                        echo "<hr>";
                                    echo "</td>";

                                    #This prints and styles the summary.
                                    echo "<td class='employment_summary'>";
                                        echo "<h2>Summary:</h2>";
                                        $summary = $row['job_summary'];
                                        echo "<p> $summary </p>";
                                        #Data From Chatgpt When I inputted prompts, Can you give me a job description for a data analyst, 
                                        #link: https://chatgpt.com/
                                    echo "</td>";
                                echo "</tr>";
                            echo "</tbody>";
                        echo "</table>";

                        #This is the qualifiactions table
                        echo "<h2 class='job_headers_other_page'>Required Qualifications:</h2>";

                        #Next section chatgpt was used to aid in the code. 
                        #Prompt used: how to make a block of information in php like In need apples. Pears are good. Potatoes are nice. and have it so that it turns this into a list.
                        
                        #Trim removes any white space, explode splits the string, at the asterics.
                        #array_filter, removes any null, or empty peices in the array.
                        #array_map, applies the trim onto every peice of this new array. 
                        $job_qualifications_skills = array_filter(array_map('trim', explode('*', $row['job_full_qualifications_or_skills'])));
                        $job_essential_or_preferred = array_filter(array_map('trim', explode('*', $row['job_essential_or_preferred'])));
                        #CHATGPT ASSISTED CODE FINISHES HERE.

                        echo "<table class='qualifications_whole_table'>";
                            echo "<tbody>";
                                echo "<tr class='qualifications_table_row'>";
                                echo "<th class='qualifications_table_header'>Qualifications</th>";
                                echo "<th class='qualifications_table_header'>Essential or Preffered</th>";
                                echo "</tr>";

                                #Index is just a random variable used to help count.
                                $index = 0;
                                #This is a while loop and states while the index is less than the count it will get the
                                #job qualifications
                                while ($index < count($job_qualifications_skills)){
                                    $row_job_qualifications_skills = $job_qualifications_skills[$index];
                                    $row_job_essential_or_preferred = $job_essential_or_preferred[$index];
                                    echo "<tr class='qualifications_table_row'>";
                                        echo "<td class='qualifications_table'> ";
                                            echo "<p>$row_job_qualifications_skills</p>";
                                        echo "</td>";
                                        echo "<td class='qualifications_table_essential_preffered'>";
                                            echo "<p>$row_job_essential_or_preferred</p>";
                                        echo "</td>";
                                    echo "</tr>";
                                    $index += 1;
                                }
                            echo "</tbody>";
                        echo "</table>";

                        #This is a list of benifits that I made up if the user was successful in getting the job.
                        echo "<h2 class='job_headers_other_page'>Benefits:</h2>";
                        echo "<div class='benifits_of_job'>";
                        $job_benifits = array_filter(array_map('trim', explode('*', $row['job_benifits'])));
                        echo "<ul>";
                        foreach ($job_benifits as $job_singular_benifits) {
                            echo "<li>$job_singular_benifits</li>"; 
                        }
                        echo "</ul>";
                        echo "</div>";

                        #This button allows the users to apply for the job.
                        echo "<div class='apply_here_extended_page'>";
                            echo "<a href='apply.php' target='_blank' title='Application of Jobs'>Apply Here</a>";
                        echo "</div>";
                        echo "<div class='back_button_job_page'>";
                        #This button sends the user back to the job listings page.
                            echo "<a href='jobs.php' title='Job Page'>Back</a>";
                        echo "</div>";

                    echo "</main>";
                    } else echo "Information lost.";
                } else echo "<p> Unable to connect to the db.</p>";

            ?>
        </main>
            <!-- Including footer file -->
            <?php include 'footer.inc'; ?>
    </body>
</html>
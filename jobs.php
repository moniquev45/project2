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
                #This connects the webpage to the database and if it does work it should print a line stateing unable to connect to database.
                require_once "settings.php";
                $dbconn = mysqli_connect($host, $user, $pwd, $db);
                if ($dbconn) {
                    #This gets a query from the jobs data base then executes it and stores it into results.
                    $query = "SELECT * FROM jobs";
                    $result = mysqli_query($dbconn, $query);

                    #This is just a line of text explaining to the user the purpose of the page and what they can do with it.
                    echo "<p>**Find and explore a world filled with opportunities in the tech field. Scroll down and view 
                    various job listings with their daily duties and baseline qualifications. Press the see more button to view all aspects of what the job
                    entails, from job benefits to all the required skills necessary for you to perform in your chosen field.</p>";

                    #This creates the table that the data will be stored in.
                    echo "<table>";
                    echo "<tbody>";

                    #This creates an index number ($i) and tests if it is less than the amount of rows in the database, if it isn't it will 
                    #run the code in the forloop while increasing the index number by one. It will stop once it the index number is equal to the
                    #number of rows in the jobs database table.
                    for ($i = 0; $i < mysqli_num_rows($result); $i++){
                        $row = mysqli_fetch_assoc($result);

                        #Most of the specific information for the job here and varaibles to make it easier to reference later.
                        $logo_link = $row['job_logo_link'];
                        $logo = $row['job_logo'];
                        $job_title = $row['job_title'];
                        $company = $row['job_company'];
                        $location = $row['job_location'];
                        $job_salary_min = (string)$row['job_salary_min'];
                        $job_salary_max = (string)$row['job_salary_max'];
                        $job_id = $row['job_id'];
                        $manager_email = $row['job_manager_email'];
                        $manager = $row['job_manager'];
                        
                        echo "<tr class='jobs_table_row'>";
                            echo "<td class='jobs_table_data'>";
                                echo "<section>";
                                    echo "<hr>";
                                    echo "<div id = 'job_main_information'>";
                                        echo "<div class ='job_position_and_logo'>";

                                            # --Job Info---
                                            #This is specifically gets the job title and logo of one specific job and prints it into the table.
                                            echo "<h2 class='job_title' id='data_anaylst_job_title'>". $job_title ."</h2>";

                                            echo "<figure>";
                                                echo "<a href= '$logo_link' target='_blank'><img src='$logo' alt='Company Logo' class='companies_logo_image'/></a>";
                                            echo "</figure>";
                                        echo "</div>";
                                        echo "<div class='random_company_names'>". $company . "</div>";
                                        echo "<div class='company_location'>". $location . "</div>";

                                    #This styles the line break so that it won't collapse into the other job information.
                                    echo "</div>";
                                    echo "<div class = 'line_break'>";
                                        echo "<hr>";
                                    echo "</div>";


                                    echo "<div id = 'salary_and_job_number'>";
                                        #This styles and max and min salary in the salary range and prints it out in a easy to read format.
                                        $formatted_job_salary_min = "$ $job_salary_min";
                                        $formatted_job_salary_max = "$ $job_salary_max";
                                        $formatted_total_salary = "Salary: $formatted_job_salary_min  -  $formatted_job_salary_max";
                                        echo "<h4 class='job_salary_job_page'> $formatted_total_salary </h4>";
                                        #This gets the job reference number and adds padding to it so that it displays to the length of 5
                                        #The string that is used for the padding is 0 and the STR_PAD_LEFT means that the padding comes
                                        #from the left side of the job id so that is prints 00001 or 01234 instead of just 1 or 1234.
                                        #It also places into a string that has a # infront of it.
                                        $formatted_job_id = "Job Reference Number: #" . str_pad($job_id, 5, "0", STR_PAD_LEFT);
                                        echo "<h4 class='job_reference_number_job_page'> $formatted_job_id </h4>";
                                    echo "</div>";

                                    echo "<div id = 'job_responsibilities'>";
                                        echo "<p>The daily duties and responsibilities include:</p>";

                                        #Next section chatgpt was used to aid in the code. 
                                        #Prompt used: how to make a block of information in php like In need apples. Pears are good. Potatoes are nice. and have it so that it turns this into a list.
                                        
                                        #Trim removes any white space, explode splits the string, at the asterics.
                                        #array_filter, removes any null, or empty peices in the array.
                                        #array_map, applies the trim onto every peice of this new array. 
                                        $job_info = array_filter(array_map('trim', explode('*', $row['job_information'])));
                                        #CHATGPT ASSISTED CODE FINISHES HERE.
                                        echo "<ul>";
                                        #This states for each peice of job info in the job info array it prints it out as a list.
                                        foreach ($job_info as $job_info_line) {
                                            echo "<li>$job_info_line</li>"; 
                                        }
                                        echo "</ul>";
                                    echo "</div>";

                                    echo "<div id = 'manager_and_see_more'>";
                                        #This gets the manager information for this specific job and prints it out.
                                        echo "<div class ='job_manager'>";
                                            echo "<p class='reporting_to_job'>If Successful You Will Be Reporting To: ";
                                            echo "<a class = 'job_manager' href='mailto: $manager_email '> $manager </a>";
                                            echo "</p>";
                                        echo "</div>";
                                        # This is the See More Button where you can press and it uses a hyperlink to send you to a whole big page
                                        # with all the specific job listing info, it also sends the job specific job_id so that the new page
                                        #can search the database print out the jobs information. It is much more effecient then sending all of the data
                                        #at once as it uses a lot more space then it needs to by just giving the id and searching it.
                                        echo "<a href='extended_jobs.php?job_id=$job_id' target='_blank'
                                            title='Extended Job Description' class='see_more'>see more
                                        </a>";
                                    echo "</div>";

                                    #This styles the line break so that it won't collapse into the other job information.
                                    echo "<div class = 'line_break'>";
                                        echo "<hr>";
                                    echo "</div>";
                                echo "</section>";
                            echo "</td>";

                            echo "<td class='jobs_table_data'>";
                                echo "<aside>";
                                    #This is a shortened list of the top 5 job qualifications needed.
                                    echo "<div id='qualifications_and_skills_short_list'>";
                                        echo "<h3>Required Qualifications/Skills:</h3>";
                                        echo "<p>(In order of importance)</p>";
                                        #Next section chatgpt was used to aid in the code. 
                                        #Prompt used: how to make a block of information in php like In need apples. Pears are good. Potatoes are nice. and have it so that it turns this into a list.
                                        
                                        #Trim removes any white space, explode splits the string, at the asterics.
                                        #array_filter, removes any null, or empty peices in the array.
                                        #array_map, applies the trim onto every peice of this new array. 
                                        $job_qualifications_skills = array_filter(array_map('trim', explode('*', $row['job_full_qualifications_or_skills'])));
                                        #CHATGPT ASSISTED CODE FINISHES HERE.

                                        #This states that if there are no job qualifications in the array it prints a message to the user, but if there is it prints a list.
                                        if (count($job_qualifications_skills) == 0){
                                            echo "<p>There are no qualifications or skills necessary for this job.</p>";
                                        } else {
                                            echo "<ol>";
                                            $index = 0;
                                            if (count($job_qualifications_skills) < 5){
                                                #This states while the index number is less than the number of qualifications in the array it prints out a job qualification or skill.
                                                while ($index < count($job_qualifications_skills)){
                                                    $job_singlar_qualifications_skills = $job_qualifications_skills[$index];
                                                    echo "<li>$job_singlar_qualifications_skills</li>"; 
                                                    $index += 1;
                                                }
                                            } else {
                                                #This states while the index number is less than 5 it prints out a job qualification or skill.
                                                while ($index < 5){
                                                    $job_singlar_qualifications_skills = $job_qualifications_skills[$index];
                                                    echo "<li>$job_singlar_qualifications_skills</li>"; 
                                                    $index += 1;
                                                }
                                            }
                                            echo "</ol>";
                                        }
                                    echo "</div>";
                                echo "</aside>";
                        echo "</tr>";
                        echo "<tr>";
                            #colspan = 2 allows for the apply button go underneath the job information and span the whole page.
                            echo "<td colspan='2'>";
                                echo "<div class='apply_here'>";
                                    #This sends the user to the apply page where they can fill out a job application.
                                    echo "<a href='apply.php' target='_blank' title='Go to Apply For Job Page'>Apply Here</a>";
                                    echo "</div>";
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
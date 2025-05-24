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
                        $main_job_id = $_POST["job_id"];
                        $searched_job = null;

                        for ($i = 0; $i < mysqli_num_rows($result); $i++){
                            $row = = mysqli_fetch_assoc($result);

                            if $row['job_id'] == $main_job_id {
                                $row = $searched_job;
                                break;
                            }
                        }

                        echo "<main>";
                        echo "<figure>";
                            echo "<img src='styles/images/Office_People.jpg' alt='People Working' id='Job_Discription_Image_Background'/>"
                            #Link: https://www.google.com/search?vsrid=CNCPsbvgxpG9NxACGAEiJDgyM2YyZmI3LTQzNWItNDc0Yi04OGM0LTBiOGFjYzc4MDY2Mw&gsessionid=r7G_iOIHqvPCke7rTfiTYwYqEN2lcGfisdj_PeWX98yyJWL3ILRbDA&lsessionid=7IuduqD-ns7X9cfKggASLH8id-WmTKsEhVLKTIt4l4m_kU4q66bMUg&vsdim=1000,416&vsint=CAIqDAoCCAcSAggKGAEgATojChYNAAAAPxUAAAA_HQAAgD8lAACAPzABEOgHGKADJQAAgD8&lns_mode=un&source=lns.web.gisbubb&udm=26&lns_surface=26&lns_vfs=e&qsubts=1744556620873&biw=829&bih=646&hl=en-AU#vhid=6S08ssutfThiCM&vssid=mosaic -->
                        </figure>
                        <!-- This is the job heading, with the job title. -->
                        <h1 class="Job_Headers_Other_Page">Data Analyst</h1>
                        <br>
                        <!-- This table contains main employment details and the employment summary and is used because it
                        makes it easier to format things side by side with each other. -->
                        <table>
                            <tbody>
                                <tr>
                                    <!-- Main Employment Details Information -->
                                    <td class="Main_Employment_Details_Background">
                                        <hr>
                                        <!-- Company Logo -->
                                        <div>
                                            <h3 class="Random_Company_Names">Company: Pear </h3>
                                            <!--Logo From https://www.facebook.com/photo.php?fbid=276912169616293&id=276912036282973&set=a.276912066282970&locale=th_TH-->
                                            <figure>
                                                <a href= "https://icarly.fandom.com/wiki/Pear_Company" target="_blank"><img src="images/Pear_Logo.png" alt="Pear Company Logo" class="Companies_Logo_Image"/></a>
                                            </figure>
                                        </div>
                                        <br><br><br>
                                        <hr>
                                        <p class="Main_Employment_Details">Location: Sunshine, VIC, Australia, 3020</p>
                                        <p class="Main_Employment_Details">Department: IT</p>
                                        <p class="Main_Employment_Details">Employment Type: Full Time</p>
                                        <p class="Main_Employment_Details">Salary: $90,000 - $110,000 </p>
                                        <p class="Main_Employment_Details">Reports To: <a class="Reporting_To_Jobs_Specific" href="mailto:thebestbigbraingroup@gmail.com">Manager Billy Bob</a></p>
                                        <p class="Main_Employment_Details">Job Reference Number: #00001</p>
                                        <br>
                                    </td>
                                    <td class="Employment_Summary">
                                        <h2>Summary:</h2>
                                        <p>
                                            We are seeking a detail-oriented and analytical Data Analyst to join our team. 
                                            In this role, you will be responsible for collecting, analyzing, and interpreting 
                                            large datasets to help the company make informed business decisions. You will work 
                                            closely with various departments, leveraging your analytical skills to provide 
                                            actionable insights and recommendations that drive business growth.
                                        </p>
                                        <!-- Data From Chatgpt When I inputted prompts, Can you give me a job description for a data analyst, 
                                        link: https://chatgpt.com/-->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
            <br>
            echo "</main>";
                    } else echo "Information lost.";
                } else echo "<p> Unable to connect to the db.</p>";

            ?>
        </main>
            <!-- Including footer file -->
            <?php include 'footer.inc'; ?>
    </body>
</html>
<!DOCTYPE html>
<html lang = "en">
    <head>
        <!--Charset Declaration-->
        <meta charset="utf-8">
        <!--Page Description for File-->
        <meta name="description" content="Displays the data analyst job listing information.">
        <!--Key Words for File-->
        <meta name="keywords" content="HTML, Tags, Table, Lists, Heading, Body, Navigation, Body, Main, Footer">
        <!--Author Information-->
        <meta name="author" content="Monique Vilardo">

        <title>Data Analyst Job Description</title>
        <!--Icon for the browser-->
        <link rel="icon" href="images/Pear_Logo_Backgroundless.png" type="image/png">
        <!-- Logo Link: https://www.shutterstock.com/image-vector/green-pear-vector-icon-logo-design-2308212369 -->

        <link rel="stylesheet" href="styles/styles.css">
        
    </head>
    <body>
        <!-- Inserting the Header -->
        <?php include 'header.inc'; ?>

        <main>
            <figure>
                <img src="styles/images/Office_People.jpg" alt="People Working" id="Job_Discription_Image_Data_Analyst"/>
                <!-- Link: https://www.google.com/search?vsrid=CNCPsbvgxpG9NxACGAEiJDgyM2YyZmI3LTQzNWItNDc0Yi04OGM0LTBiOGFjYzc4MDY2Mw&gsessionid=r7G_iOIHqvPCke7rTfiTYwYqEN2lcGfisdj_PeWX98yyJWL3ILRbDA&lsessionid=7IuduqD-ns7X9cfKggASLH8id-WmTKsEhVLKTIt4l4m_kU4q66bMUg&vsdim=1000,416&vsint=CAIqDAoCCAcSAggKGAEgATojChYNAAAAPxUAAAA_HQAAgD8lAACAPzABEOgHGKADJQAAgD8&lns_mode=un&source=lns.web.gisbubb&udm=26&lns_surface=26&lns_vfs=e&qsubts=1744556620873&biw=829&bih=646&hl=en-AU#vhid=6S08ssutfThiCM&vssid=mosaic -->
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


            <!-- This section is the required qualifications table that contains all essential and preferred qualifications. -->
            <h2 class="Job_Headers_Other_Page">Required Qualifications:</h2>
            <!-- Data From Chatgpt When I inputted prompts, Can you give me a job description for a data analyst, 
             can you seperate the nessasary and perferred qualifications, give more required qualifications,
             shorten the list to the most essentail, link: https://chatgpt.com/-->

            <!-- Each row contains the qualification and next to it wether it is essential or preferred. -->
            <table class="Qualifications_Whole_Table">
                <tbody>
                    <tr class="Qualifications_Table_Row">
                        <th class="Qualifications_Table_Header">Qualifications</th>
                        <th class="Qualifications_Table_Header">Essential or Preffered</th>
                    </tr>
                    <tr class="Qualifications_Table_Row">
                        <td class="Qualifications_Table"> 
                            <p>Bachelor degree in Data Science, Statistics, Mathematics, Computer Science, Economics, or a related quantitative field.</p>
                        </td>
                        <td class="Qualifications_Table_Essential_Preffered">
                            <p>Essential</p>
                        </td>
                    </tr>
                    <tr class="Qualifications_Table_Row">
                        <td class="Qualifications_Table"> 
                            <p>2 years of professional experience in a data analyst or similar analytical role.</p>
                        </td>
                        <td class="Qualifications_Table_Essential_Preffered">
                            <p>Essential</p>
                        </td>
                    </tr>
                    <tr class="Qualifications_Table_Row">
                        <td class="Qualifications_Table">
                            <p>Advanced proficiency in SQL, including complex joins, subqueries, CTEs, and performance optimization.</p>
                        </td>
                        <td class="Qualifications_Table_Essential_Preffered">
                            <p>Essential</p>
                        </td>
                    </tr>
                    <tr class="Qualifications_Table_Row">
                        <td class="Qualifications_Table">
                            <p>Strong proficiency in Python or R for data analysis, automation, and scripting tasks.</p>
                        </td>
                        <td class="Qualifications_Table_Essential_Preffered">
                            <p>Essential</p>
                        </td>
                    </tr>
                    <tr class="Qualifications_Table_Row">
                        <td class="Qualifications_Table">
                            <p>Strong analytical and problem-solving skills with attention to detail.</p>
                        </td>
                        <td class="Qualifications_Table_Essential_Preffered">
                            <p>Essential</p>
                        </td>
                    </tr>
                    <tr class="Qualifications_Table_Row">
                        <td class="Qualifications_Table">
                            <p>Excellent communication skills, with the ability to present data insights clearly to non-technical stakeholders.</p>
                        </td>
                        <td class="Qualifications_Table_Essential_Preffered">
                            <p>Essential</p>
                        </td>
                    </tr>
                    <tr class="Qualifications_Table_Row">
                        <td class="Qualifications_Table">
                            <p>Experience with cloud-based data platforms (e.g., AWS, Google Cloud, Azure).</p>
                        </td>
                        <td class="Qualifications_Table_Essential_Preffered">
                            <p>Preferred</p>
                        </td>
                    </tr>
                    <tr class="Qualifications_Table_Row">
                        <td class="Qualifications_Table">
                            <p>Familiarity with big data tools and environments (e.g., Hadoop, Spark).</p>
                        </td>
                        <td class="Qualifications_Table_Essential_Preffered">
                            <p>Preferred</p>
                        </td>
                    </tr>
                    <tr class="Qualifications_Table_Row">
                        <td class="Qualifications_Table">
                            <p>Experience in the IT sector.</p>
                        </td>
                        <td  class="Qualifications_Table_Essential_Preffered">
                            <p>Preferred</p>
                        </td>
                    </tr>
                    <tr class="Qualifications_Table_Row">
                        <td class="Qualifications_Table">
                            <p>Experience working in an Agile environment or with cross-functional teams.</p>
                        </td>
                        <td class="Qualifications_Table_Essential_Preffered">
                            <p>Preferred</p>
                        </td>
                    </tr>
                    <tr class="Qualifications_Table_Row">
                        <td class="Qualifications_Table">
                            <p>Exposure to A/B testing, forecasting, or predictive modeling techniques.</p>
                        </td>
                        <td class="Qualifications_Table_Essential_Preffered">
                            <p>Preferred</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Data From Chatgpt When I inputted prompts, Can you give me a job description for a data analyst, 
             can you seperate the nessasary and perferred qualifications, give more required qualifications,
             shorten the list to the most essentail, link: https://chatgpt.com/-->
            <br>

            <!-- This is a list of benifits that I made up if the user was successful in getting the job. -->
            <h2 class="Job_Headers_Other_Page">Benefits:</h2>
            <div class="Benifits_Of_Job">
                <ul>
                    <li>Fully covered Private Health Insurance</li>
                    <li>2 months of anual leave per year.</li>
                    <li>Flexable Working.</li>
                    <li>Flexable Start.</li>
                </ul>
            </div>
            <br><br><br>
            <!-- This button allows the users to apply for the job. -->
            <a href="apply.html" target="_blank" title="Application of Jobs" class="Apply_Here">Apply Here</a>
            <!-- This button sends the user back to the job listings page. -->
            <a href="jobs.html" title="Job Page" class="Back_Button_Job_Page">Back</a>
            <br><br>
        </main>

         <!-- Including footer file -->
        <?php include 'footer.inc'; ?>
    </body>
</html>
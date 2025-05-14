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
        <header>
            <div class="Job_Position_And_Logo">
                <figure>
                <!--Change to company Logo-->  
                <a href="index.html"><img src="images/Pear_Company_Logo.png" alt="Pear Company Logo" class="Company_Logo"></a>
                <!-- Logo Link: https://www.shutterstock.com/image-vector/green-pear-vector-icon-logo-design-2308212369 -->
                </figure>
                <h1 class="Company_Name">The Best Big Brain Group</h1>
            </div>
            <!-- This is the navigation bar and sends users to different pages when they press it. -->
            <nav>
                <ul>
                    <li><a href="index.html">  Home  </a></li>
                    <li><a href="jobs.html">  Jobs Listings  </a></li>
                    <li><a href="apply.html">  Job Application  </a></li>
                    <li><a href="contact.html"> Contact </a></li>
                    <li><a href="about.html"> About Us </a></li>
                </ul>
            </nav>
            <hr>
        </header>

        <main>
            <p class="Number_Of_Job_Listings">2 jobs avaliable</p>
            <!-- This table contains all of the job listings and a shorten version of their information. A table is used here
             to assist with formatting as I have found it is much easier to put things side by side each other when the 
             system has already made it so you can, and helps get the content in the same row the same height.-->
            <table>
            <tbody>
                <tr class="Jobs_Table_Row">
                    <td class="Jobs_Table_Data">
                        <section>
                            <hr>
                            <div class="Job_Position_And_Logo">
                            <!-- Job Info -->
                            <h2 class="Job_Title" id="Data_Anaylst_Job_Title">Data Analyst</h2>
                            <!--Logo From https://www.facebook.com/photo.php?fbid=276912169616293&id=276912036282973&set=a.276912066282970&locale=th_TH-->
                            <figure>
                                <a href= "https://icarly.fandom.com/wiki/Pear_Company" target="_blank"><img src="images/Pear_Logo.png" alt="Pear Company Logo" class="Companies_Logo_Image"/></a>
                            </figure>
                            </div>
                            <div class="Random_Company_Names">Pear</div>
                            <div class="Company_Location">Sunshine, VIC, Australia, 3020</div>
                            <br><br>
                            <hr>
                            <div>
                            <h4 class="Job_Salary_Job_Page">Salary: $90,000 - $110,000</h4>
                            <h4 class="Job_Reference_Number_Job_Page">Job Reference Number: #00001</h4>
                            </div>
                            <br><br><br>
                            <p>The daily duties and responsibilities include:</p>
                            <ul>
                                <!--List Points-->
                                <li>Leverage advanced analytical techniques to extract, transform, and interpret complex data sets from diverse sources, ensuring data integrity and reliability.</li>
                                <li>Design and develop dynamic dashboards, visualizations, and executive-level reports that communicate insights and support strategic decision-making.</li>
                                <li>Collaborate cross-functionally with stakeholders to understand business objectives and translate them into impactful data-driven solutions.</li>
                                <li>Monitor key business metrics, proactively flag anomalies, and provide actionable recommendations based on data insights.</li>
                                <li>Champion best practices in data governance, documentation, and analytical methodology to drive consistency and scalability across the organization.</li>
                                <li>Contribute to the evolution of data infrastructure by partnering with data engineering and IT teams to enhance data accessibility and usability.</li>
                            </ul>
                            <!--The information on what a data analyst does comes from Chatgpt, with these prompts:
                            Can you give me a job description key responsibility for a data analyst, make it sound fancy,
                            Link: https://chatgpt.com/ -->
                            <div>
                            <!-- This is a hyperlink that allows the user to send an email to the manager if they press it. -->
                            <p class="Reporting_To_Job">If Successful You Will Be Reporting To:
                                <a class="Footer_Links" href="mailto:thebestbigbraingroup@gmail.com">Manager Billy Bob</a>
                            </p>
                            <br>
                            <!-- This is the See More Button where you can press and it uses a hyperlink to send you to a whole big page
                             with all the job listing info. -->
                            <a href="data_analyst_job_page.html" target="_blank"
                                title="Data Analyst Job Description" class="See_More">see more</a>
                            </div>
                            <br><br><br>
                            <hr>
                        </section>
                    </td>
                    <td class="Jobs_Table_Data">
                        <aside>
                            <!-- More Info -->
                            <br>
                            <h3>Required Qualifications/Skills:</h3>
                            <p>(In order of importance)</p>
                            <ol>
                                <li>Bachelors degree in Computer Science, Information Technology, Statistics or Business Analytics.</li>
                                <li>Minimum of 2 years of Industry Experience.</li>
                                <li>Proficiency in SQL, BigQuery, Tableau, Power Query, and Excel.</li>
                                <li>A keen eye for detail, problem-solving skills, and the ability to optimise data processes.</li>
                                <li>Excellent communication skills to translate data insights into business value.</li>
                            </ol>
                            <!-- This sends the user to the apply page where they can fill out a job application. -->
                            <a href="apply.html" target="_blank"
                            title="Go to Apply For Job Page" class="Apply_Here">Apply Here</a>
                        </aside>
                    </td>
                </tr>
                <tr class="Jobs_Table_Row">
                    <td class="Jobs_Table_Data">
                        <section>
                            <hr>
                            <div class="Job_Position_And_Logo">
                            <!-- Another Job Info -->
                            <h2 class="Job_Title" id="Junior_Software_Developer_Job_Title">Junior Software Developer</h2>
                            <!--Logo From https://www.wired.com/2015/09/googles-new-logo-trying-really-hard-look-friendly/-->
                            <figure>
                                <a href="https://about.google/" target="_blank"><img src="images/Google_Logo.png" alt="Google Company Logo" class="Companies_Logo_Image"/></a>
                            </figure>
                            </div>
                            <div class="Random_Company_Names">Google</div>
                            <div class="Company_Location">Melbourne, VIC, Australia, 3000</div>
                            <br><br>
                            <hr>
                            <div>
                            <h4 class="Job_Salary_Job_Page">Salary: 80,000 - $90,000</h4>
                            <h4 class="Job_Reference_Number_Job_Page">Job Reference Number: #00002</h4>
                            </div>
                            <br><br><br>
                            <p>The daily duties and responsibilities include:</p>
                            <ul>
                                <!--List Points-->
                                <li>Contribute to the design and development of robust, scalable software solutions under the mentorship of senior engineers.</li>
                                <li>Write clean, maintainable, and well-documented code aligned with industry best practices and internal standards.</li>
                                <li>Participate in peer code reviews, embracing feedback as an opportunity for continuous learning and improvement.</li>
                                <li>Assist in diagnosing and resolving technical issues, ensuring optimal performance and user experience.</li>
                                <li>Collaborate effectively with cross-functional teams to deliver high-quality features that align with project goals and timelines.</li>
                                <li>Engage in ongoing professional development by staying informed of emerging technologies and modern development methodologies.</li>
                            </ul>
                            <!--The information on what a junior software developer does comes from Chatgpt, with these prompts:
                            Can you give me a job description key responsibility for a junior software developer, only 6 dot points, make it fancy,
                            Link: https://chatgpt.com/ -->
                            <!-- This is a hyperlink that allows the user to send an email to the manager if they press it. -->
                            <p class="Reporting_To_Job">If Successful You Will Be Reporting To:
                                <a class="Footer_Links" href="mailto:thebestbigbraingroup@gmail.com">Seinor Software Developer Sally Sue</a>
                            </p>
                            <br>
                            <!-- This is the See More Button where you can press and it uses a hyperlink to send you to a whole big page
                             with all the job listing info. -->
                            <a href="junior_software_developer_job_page.html" target="_blank"
                                title="Data Analyst Job Description" class="See_More">see more
                            </a>
                            <br><br><br>
                            <hr>
                        </section>
                    </td>
                    <td class="Jobs_Table_Data">
                        <!-- This part covers 25% of the page and displays main qualifications and skills needed for the jobs. -->
                        <aside>
                            <!-- More Info -->
                            <br>
                            <h3>Required Qualifications/Skills:</h3>
                            <p>(In order of importance)</p>
                            <ol>
                                <li>Bachelors degree in Computer Science, Information Technology, Statistics or Business Analytics.</li>
                                <li>Minimum of 2 years of Industry Experience.</li>
                                <li>Proficiency in at least one programming language (e.g. Swift, Python, Java, C++, JavaScript).</li>
                                <li>A keen eye for detail, problem-solving skills, and the ability to optimise data processes.</li>
                                <li>Excellent communication skills to translate data insights into business value.</li>
                            </ol>
                            <!--The information on what a junior software developer does comes from Chatgpt, with these prompts:
                            Can you give me a job description key responsibility for a junior software developer, only 6 dot points, make it fancy,
                            Link: https://chatgpt.com/ -->
                            <a href="apply.html" target="_blank"
                            title="Go to Apply For Job Page" class="Apply_Here">Apply Here</a>
                        </aside>
                    </td>
                </tr>
            </tbody>
            </table>
        </main>
        <footer>
            <!--Horizontal Line that separtes the information above with the information below.-->
            <hr>
            <ul>
                <li><a href="index.html">  Home  </a></li>
                <li><a href="jobs.html">  Jobs Listings  </a></li>
                <li><a href="apply.html">  Job Application  </a></li>
                <li><a href="contact.html"> Contact </a></li>
                <li><a href="about.html">  About Us  </a></li>
            </ul>
            <!--Div, devides the paragraph so i can put the information on the same line but aligning it to either the left or the right.-->
            <br>
            <!--A Hyperlink to an external website.-->
            <div class="Jira_Link_Footer">
                <a class="Footer_Links" href= "https://thebestbigbraingroup.atlassian.net/jira/software/projects/SCRUM/summary"
                target="_blank"
                title="Go to The Best Big Brain Group Jira"
                hreflang="en">Go To The Company's Jira</a>
            </div>
            <!--A Hyperlink to send me the company an email.-->
            <div class="Company_Email">
            Email:
            <a class="Footer_Links" href="mailto:thebestbigbraingroup@gmail.com">info@thebestbigbraingroup.com.au</a></div>
            <!--Hyperlink to the website's github-->
            <div class="Github_Link_Footer">
                Github:
                <a class="Footer_Links" href="https://github.com/moniquev45/Group_Project" target="_blank">This website's github repository</a>
            </div>
            <!--Forces there to be a line break below to not squish all the the hyperlinks to the border of the page.-->
            <p class="Copyright_in_footer">
            &copy; <strong>
                2025 The Best Big Brain Group. All Rights Reserved.
                </strong>
             </p>
            <hr>
        </footer>
    </body>
</html>
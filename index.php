<!DOCTYPE html>
<html lang = "en">
    <head>
        <!--Charset Declaration-->
        <meta charset="utf-8">
        <!--Page Description for File-->
        <meta name="description" content="Homepage for the group project">
        <!--Key Words for File-->
        <meta name="keywords" content="Data analysis, group project, home page">
        <!--Author Information-->
        <meta name="author" content="Riley Tuckett" >

        <title>Homepage</title>
        <!--Icon for the browser-->
        <link rel="icon" href="images/Pear_Logo_Backgroundless.png" type="image/png">
        <!-- Logo Link: https://www.shutterstock.com/image-vector/green-pear-vector-icon-logo-design-2308212369 -->

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
                <h1 class="Company_Name">The Best Big Brain Group </h1>
            </div>
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
            <!--Main body of the page-->
            <h1 id="Home_Title">The Best Big Brain Group</h1>
            <p id="TitlePgraph">Delivering Software since 1988</p>

            <!--A paragraph that describes the company-->
            <div id="Who_we_are">
                <h2>Who we are:</h2>
                <p id="Light_Background_Text">
                    We are a dynamic organization dedicated to bridging the gap between talented individuals and 
                    job opportunities in the data analytics industry. We aim to empower job seekers to enhance their expertise 
                    and connect with leading companies in the tech world. Whether you're a fresh graduate looking to break into 
                    the industry or an experienced professional seeking your next challenge, the Best Big Brain Group provides 
                    the resources and support needed to succeed in the ever-evolving field of computer science.
                </p>
            </div>
            <!--The company graphic-->
            <figure id="Company_Graphic">
                <img src="images/Company_Graphic.png" alt="Company Graphic">
                <!-- Logo Link: https://www.shutterstock.com/image-vector/green-pear-vector-icon-logo-design-2308212369 -->
            </figure>

            <!--A paragraph that introduces the company-->
            <div id="What_we_do">
                <h2>What we do:</h2>
                <p>
                    We specialize in data analysis and job placement services. Our team of experts works tirelessly to 
                    identify the best job opportunities for our clients, ensuring that they are matched with positions that 
                    align with their skills and career goals. We also provide training and resources to help job seekers 
                    enhance their expertise and stay competitive in the fast-paced world of data analytics.
                </p>
            </div>
            <br><br><br><br>
            <!--A paragraph that describes the company mission-->
            <div id="Our_Mission">
                <h2>Our Mission:</h2>
                <p>
                    Our mission is to empower job seekers by providing them with the tools and resources they need to 
                    succeed in the data analytics industry. We strive to create a supportive and inclusive environment 
                    where individuals can thrive and reach their full potential. We are committed to helping our clients 
                    achieve their career goals and make a positive impact in the tech world.
                </p>
            </div>
            <br>
            <!--Short introduction to the group members-->
            <div id="Meet_Us">
                <h2>Meet Us:</h2>
                <h3>Riley Tuckett</h3>
                <p>
                    Riley is a passionate systems administrator with a strong background in computer science and robotics.
                    She is dedicated to helping job seekers find their dream positions and is always on the lookout for 
                    new opportunities to learn and grow in the field of data analytics.
                </p>
                <h3>Monique Vilardo</h3>
                <p>
                    Monique is a resourceful operations lead, containing a wide range of knowledge in the computer science and engineering fields. Whether it's optimizing workflows or supporting team logistics,
                    Monique brings an impressive eye for detail to every project and a passion for efficient systems.
                </p>
                <h3>Stacey Millers</h3>
                <p>
                    Stacey is a diligent support coordinator with a detailed orientated mind. Regardless of area, from supporting team logistics to internal tools, 
                    Stacey keeps everything on track with tech-first thinking.
                </p>
                <h3>Victoria Rogers</h3>
                <p>
                    Victoria is a highly intellignent project coordinator with a focus on user experience 
                    and collaborative work. With an all rounder ability, Victoria ensures that systems 
                    are structured, functional and intuitive.
                </p>
            </div>




            
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
            <!--A Hyperlink to send the company an email.-->
            <div class="Company_Email">
            Email:
            <a class="Footer_Links" href="mailto:thebestbigbraingroup@gmail.com">info@thebestbigbraingroup.com.au</a>
            </div>
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
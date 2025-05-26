<!DOCTYPE html>
<html lang = "en">
    <head>
        <!--Charset Declaration-->
        <meta charset="utf-8">
        <!--Page Description for File-->
        <meta name="description" content="A page containing each group member's enhancements to the project.">
        <!--Key Words for File-->
        <meta name="keywords" content="Enhancements, Project, Group Members, Data Analytics, Job Placement">
        <!--Author Information-->
        <meta name="author" content="Riley Tuckett">

        <title>Enhancements Page</title>
        <!--Icon for the browser-->
        <link rel="icon" href="images/Pear_Logo_Backgroundless.png" type="image/png">
        <!-- Logo Link: https://www.shutterstock.com/image-vector/green-pear-vector-icon-logo-design-2308212369 -->

        <link rel="stylesheet" href="styles/styles.css">
        
    </head>
    <body>
        <!-- Inserting the Header -->
        <?php include 'header.inc'; ?>
        <main>
            <div class="enhancements">
            <h1>Enhancements by Group Members</h1>
            <p>This page showcases the enhancements made by each group member to the project.</p>

            <section id="riley_tuckett">
                <h2>Riley Tuckett</h2>
                <p>Riley Tuckett has contributed to the enhancements by implementing the user authentication system, ensuring secure access for managers and users.</p>
                <li>Developed the initial project structure and implemented the user authentication system.</li>
                <li>Created the manager login and registration pages, ensuring secure password handling.</li>
                <li>Designed the database schema for user management and job placement data.</li>
            </section>

            <section id="victoria_rogers">
                <h2>Victoria Rogers</h2>
                <p>Victoria Rogers has contributed to the enhancements by implementing a login attempt counter that locks a user out after 3 failed password attempts</p>
                <li>Building from Riley's login process I created a counter system which passes people who enter the password correctly or returns the error message that its the wrong password</li>
                <li>Implemented a timer system which reads the current time from the browser and counts down 30 seconds</li>
                <li>If attempts are made before the time has reset, a reminder that you have to wait the timer pops up</li>
                <li>Once the user has processed the correct password after more than one attempt, or after waiting the 30 seconds, the counter resets to try again</li>
            </section>

            <section id="monique_vilardo">
                <h2>Monique Vilardo</h2>
                <p></p>
            </section>
        </div>
        </main>
        <!-- Including footer file -->
        <?php include 'footer.inc'; ?>
    </body>
</html>
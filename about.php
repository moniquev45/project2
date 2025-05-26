<!DOCTYPE html>
<html lang = "en">
    <head>
        <!--Charset Declaration-->
        <meta charset="utf-8">
        <!--Page Description for File-->
        <meta name="description" content="A page dedicated to introducing each member of the team and the team information as a whole">
        <!--Key Words for File-->
        <meta name="keywords" content="html, about, team">
        <!--Author Information-->
        <meta name="author" content="Victoria Rogers" >
        <title>About Page</title>
        <!--Icon for the browser-->
        <link rel="icon" href="images/Pear_Logo_Backgroundless.png" type="image/png">
        <!-- Logo Link: https://www.shutterstock.com/image-vector/green-pear-vector-icon-logo-design-2308212369 -->

        <link rel="stylesheet" href="styles/styles.css">
        
    </head>
    <body>
        <!-- Inserting the Header -->
        <?php include 'header.inc'; ?>

        <main id="About_Team">
            <!--This is the team photo-->
            <div class="Team_Photo">
                <figure>
                    <img id="Photo_Team" src="images/Team_Photo.png" alt="The team in front of Swinburne university. From left to right the order is Stacey, Vic, Riley and Monique">
                    <figcaption>The Best Big Brain Group (Left - Right) Stacey, Vic, Riley, Monique</figcaption>
                </figure>
            </div>

            <!--This is the individual team information blocks-->
            <div class="individual_profiles">
            <?php
            require_once "settings.php";
            $dbconn = mysqli_connect($host, $user, $pwd, $db);
            if ($dbconn) {
            $query = "SELECT * FROM about";
            $result = mysqli_query($dbconn, $query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    //Printing the team member name above the table in a h2 style
                    echo "<section class='individual_profile'>";
                    echo "<hr>";
                    echo "<div class='member_Nnme'>";
                    echo "<h2 id='" . htmlspecialchars($row['member_name']) . "'>" . htmlspecialchars($row['member_name']) . "</h2>";
                    echo "</div>";

                    // Beginning of table
                    echo "<table class='member_table'>";
                    echo "<thead> 
                            <tr>
                                <th>Contributions</th>
                                <th>Experience</th>
                                <th>Hobbies</th>
                                <th>Favourites</th>
                            </tr>
                        </thead>";
                    echo "<tbody>";


                    //Using a foreach function to run a test of "each * that is seen, explode the prior text, and then create the variable line to be printed
                    //This function is used for each part of the table as each part has multiple list items

                    echo "<tr class='member_table_row'>";
                    // Contributions 
                    echo "<td><ul>";
                    foreach (explode("*", $row['member_contribution']) as $line) {
                        echo "<li>" . htmlspecialchars(trim($line)) . "</li>";
                    }
                    echo "</ul></td>";

                    // Experience
                    echo "<td><ul>";
                    foreach (explode("*", $row['member_experience']) as $line) {
                        echo "<li>" . htmlspecialchars(trim($line)) . "</li>";
                    }
                    echo "</ul></td>";

                    // Hobbies
                    echo "<td><ul>";
                    foreach (explode("*", $row['member_hobby']) as $line) {
                        echo "<li>" . htmlspecialchars(trim($line)) . "</li>";
                    }
                    echo "</ul></td>";

                    // Favourites
                    echo "<td><ul>";
                    foreach (explode("*", $row['member_favourite']) as $line) {
                        echo "<li>" . htmlspecialchars(trim($line)) . "</li>";
                    }
                    echo "</ul></td>";

                    echo "</tr>";
                    echo "</tbody>";
                    echo "</table>";
                    echo "</section>";
                }
                } else {
                    echo "<p>Error fetching data.</p>";
                }
                mysqli_close($dbconn);
            } else {
                echo "<p>Database connection failed.</p>";
            }

        ?>

        <!-- This is the overall team information to be printed -->
        <div class="team_profile">
        <h2>The Best Big Brain Group</h2>
                    <p>Welcome to the best group you have ever seen</p>
                    <ul>
                        <li>Wednesday</li>
                        <li>10:30-12:30</li>
                        <li>Rahul Raghavan</li>
                    </ul>
                    <p><strong>Team Members</strong></p>
        <?php
        if ($result) {
            // Reset result pointer
            mysqli_data_seek($result, 0);

            echo "<table class='team_summary_table'>";
            echo "<thead><tr><th>Name</th><th>Student ID</th><th>Degree</th></tr></thead><tbody>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr class='team_profile'>";
                echo "<td class='team_member_name'><h3 class='team_member_identification'>" . htmlspecialchars($row['member_name']) . "</h3></td>";
                echo "<td class='team_member_id'>" . htmlspecialchars($row['member_student_id']) . "</td>";
                echo "<td class='member_degree'>" . htmlspecialchars($row['member_degree']) . "</td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p>Error fetching data.</p>";
        }
        ?>
        </div>
        <?php
        // Close DB connection
        if ($dbconn) {
            mysqli_close($dbconn);
        }
        ?>

        </main>
         <!-- Including footer file -->
        <?php include 'footer.inc'; ?>
    </body>
</html>
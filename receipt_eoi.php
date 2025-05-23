<?php
session_start();

// add time out function that destroys session after inactive too long? 
           // session_unset();     // deletes all variables
            //session_destroy();   // completely kills the session

// the redirection code for is the page was accessed by any method (i.e url) other than going from submitting your form on contact page ---> to being processed --> to here
 if (!isset ($_SESSION["receipt_eoi"])) {
    header('Location: apply.php'); // if the form has not been submitted, page is redirected to apply page
    exit(); // no more code is run after the redirection
 }

 $receipt = $_SESSION["receipt_eoi"]
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <!--Charset Declaration-->
        <meta charset="utf-8">
        <!--Page Description for File-->
        <meta name="description" content="This is the receipt of expression of interest job application being submitted.">
        <!--Key Words for File-->
        <meta name="keywords" content="enquiry, contact, email, complaints, feedback">
        <!--Author Information-->
        <meta name="author" content="Stacey Millers" >

        <title>Expression of Interest Form Submitted</title>
        <!--Icon for the browser-->
        <link rel="icon" href="images/Pear_Logo_Backgroundless.png" type="image/png">
        <!-- Logo Link: https://www.shutterstock.com/image-vector/green-pear-vector-icon-logo-design-2308212369 -->

        <link rel="stylesheet" href="styles/styles.css">
        
    </head>
    <body>
        <!-- Inserting the Header -->
        <?php include 'header.inc'; ?>
        <main id='eoi_receipt'>

        <?php

        // Receipt to confirm eoi submission and entered details.
        echo "<div id='submission_receipt'>";

             // Start of Receipt
            echo "<h1 id='submission_title'> THANK YOU FOR YOUR SUBMISSION </h1>";

            // Confirmation: Job Reference Number, Receipt (eoi_number), and timestamp
            echo "<p> Your Expression of Interest Form for Job Reference #".htmlspecialchars($receipt['job_reference'])." has been received. </p>";
            // The Application Form EOI record
            echo "<p><strong>Application Receipt:</strong> ".htmlspecialchars($receipt['eoi_number'])."</p>";
            // The Timestamp
            echo "<p><strong>Time submitted:</strong> ".htmlspecialchars($receipt['formatted_time'])."</p>";
                            
            // The form answers:
            echo "<p><em>Please find the confirmation of details entered below.</em></p>";
                // making the data into a table
                echo "<table id='receipt_table'>";
                // Personal Details
                    echo "<tr><td><strong>First Name:</strong></td> <td>".htmlspecialchars($receipt['first_name'])."</td></tr>";
                    echo "<tr><td><strong>Last Name:</strong></td> <td>".htmlspecialchars($receipt['family_name'])."</td></tr>";
                    echo "<tr><td><strong>Date of Birth:</strong></td> <td>".htmlspecialchars($receipt['dob'])."</td></tr>";
                    echo "<tr><td><strong>Gender:</strong></td> <td>".htmlspecialchars($receipt['gender'])."</td></tr>";
                // Address
                    echo "<tr><td><strong>Your Selected Skillset:</strong></td> <td>".nl2br(htmlspecialchars($receipt['formatted_address']))."</td></tr>";
                // Contact
                    echo "<tr><td><strong>Email Address:</strong></td> <td>".htmlspecialchars($receipt['email_apply'])."</td></tr>";
                    echo "<tr><td><strong>Phone Number:</strong></td> <td>".htmlspecialchars($receipt['mobile'])."</td></tr>";
                // Required Skills
                    echo "<tr><td><strong>Your Selected Skillset:</strong></td> <td>".nl2br(htmlspecialchars($receipt['skills']))."</td></tr>";
                // Other Skills
                    echo "<tr><td><strong>Your Self Described Skillset:</strong></td> <td>".htmlspecialchars($receipt['skills_other_textbox'])."</td></tr>";
                    echo "<tr><td><strong>Further Information Provided:</strong></td> <td>".htmlspecialchars($receipt['requirements'])."</td></tr>";
                    echo "<tr><td><strong>Salary Expectations:</strong></td> <td> $".htmlspecialchars($receipt['pay'])."</td></tr>";
                    echo "<tr><td><strong>Preferred Starting Time:</strong></td> <td>".htmlspecialchars($receipt['hours_start'])."</td></tr>";
                    echo "<tr><td><strong>Preferred Finish Time:</strong></td> <td>".htmlspecialchars($receipt['hours_end'])."</td></tr>";
                echo "</table>";
            echo "</div>";

            // Button to go back to apply.php and apply again.
            echo "<form action='apply.php' method='get'>
                        <p> If you would like to apply for another job listing, please click the button below: </p>
                        <input class='eoi_button' type='submit' value='Apply Again' title='Click here to go back to the job application form.'>
                    </form>";
        ?>
        </main>

        <!--Footer: from the include file-->
        <?php include 'footer.inc'; ?>
    </body>
</html>
<?php
session_start();

// the redirection code for is the page was accessed by any method (i.e url) other than going from submitting your form on contact page ---> to being processed --> to here
 if (!isset ($_SESSION["contact_receipt"])) {
    header('Location: contact.php'); // if the form has not been submitted, page is redirected to apply page
    exit(); // no more code is run after the redirection
 }

 $receipt = $_SESSION["contact_receipt"]
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <!--Charset Declaration-->
        <meta charset="utf-8">
        <!--Page Description for File-->
        <meta name="description" content="This is the receipt of contact enquiry being submitted.">
        <!--Key Words for File-->
        <meta name="keywords" content="enquiry, contact, email, complaints, feedback">
        <!--Author Information-->
        <meta name="author" content="Stacey Millers" >

        <title>Contact Enquiry Submitted</title>
        <!--Icon for the browser-->
        <link rel="icon" href="images/Pear_Logo_Backgroundless.png" type="image/png">
        <!-- Logo Link: https://www.shutterstock.com/image-vector/green-pear-vector-icon-logo-design-2308212369 -->

        <link rel="stylesheet" href="styles/styles.css">
        
    </head>
    <body id='the_receipt'>
        <!-- Inserting the Header -->
        <?php include 'header.inc'; ?>
        <main id='contact_receipt'>

        <?php

        // Receipt to confirm contact submission.
            echo "<div id='submission_receipt'>";

            // Start of Receipt
                echo "<h1 id='submission_title'> THANK YOU FOR YOUR ENQUIRY</h1>";

            // The Timestamp
                echo "<p id='contact_submission_time'> Submitted: ".htmlspecialchars($receipt['submission_time'])."</p>";

            // Confirmation of enquiry submitted and enquiry/reference number
                echo "<p> We will provide a reply in 3-5 business days.</p>";
                echo "<p><strong>Enquiry Reference ID:</strong> #ENQ".htmlspecialchars($receipt['enquiry_number'])."</p>";

                echo "</div>";
            ?>
        </main>

        <!--Footer: from the include file-->
        <?php include 'footer.inc'; ?>
    </body>
</html>

<?php
// session destroyed and unset if user refreshes or clicks away (on refresh your session will no longer be available and you will be taken to the contact page)
    session_unset();     // deletes all variables
    session_destroy();   // completely kills the session
?>
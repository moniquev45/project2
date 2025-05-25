<?php
 session_start();

// the redirection code for is the page was accessed by any method (i.e url) other than submitting a job application form
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('Location: contact.php'); // if the form has not been submitted, page is redirected to apply page
    exit(); // no more code is run after the redirection
}
?>

<?php
     // debugging error reporting turned on
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
?>

<?php
    // including database settings
    require_once("settings.php");

    // connection to database
    $dbconn = mysqli_connect($host, $user, $pwd, $db);
    if (!$dbconn) {
        error_log("Connection failed: ".mysqli_connect_error());
        die("Sorry, there has been an error, please be patient with us.");
    }

    // How the data from the form will be cleaned up
    function sanitise_input($data) {
        $data = htmlspecialchars($data);     // special characters become HTML
        $data = trim($data);                 // no more whitespace
        $data = stripslashes($data);         // no more backslashes
        return $data;
    }

    // checking database and creating contact table if it doesn't exist there
        $sql_create_contact = "CREATE TABLE IF NOT EXISTS contact (
            enquiry_number INT AUTO_INCREMENT PRIMARY KEY,
            status VARCHAR(10) NOT NULL,
            reason VARCHAR(10) NOT NULL,
            name VARCHAR(50) NOT NULL,
            email VARCHAR(50) NOT NULL,
            enquiry VARCHAR(500) NOT NULL,
            submission_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
            );";

            //line to run the above table creating code
            mysqli_query($dbconn,$sql_create_contact);

            // make sure form was submitted with POST
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // make sure the status for a new form is 'new'
                    $status = "New";
                    
                // get the form inputs and sanitise
                // job reference - drop down box required isset
                    $reason = isset($_POST['reason']) ? sanitise_input($_POST['reason']) : "";

                // personal details
                    // name
                    $contact_name = isset($_POST['contact_name']) ? sanitise_input($_POST['contact_name']) : "";
                    // email
                    $email_contact = isset($_POST['email_contact']) ? sanitise_input($_POST['email_contact']) : "";

                // enquiry textbox
                    $enquiry_box = isset($_POST['enquiry_box']) ? sanitise_input($_POST['enquiry_box']): "";

                // form validation - errors for if required inputs aren't there and if patterns aren't adhered to

                $errors = [];
                // job reference
                if (empty($reason)) $errors[] = "Please select a reason.";

                // personal details
                        // name
                if (empty($contact_name)) $errors[] = "Please provide a name.";

                // contact
                if (empty($email_contact)) $errors[] = "Please provide an email.";
                if (!preg_match("/[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$/", $email_contact)) 
                    $errors[] = "Email must be properly formulated, i.e example@emailaddress.com.";

                // Enquiry text box
                if (empty($enquiry_box)) $errors[] = "Please enter your enquiry in the textbox.";
                    
                //checking if there are errors
                if (!empty($errors)) {
                
                // if there are errors, it will display in the HTML section below and not insert
            
            } else {                        
                    // inserting code into the eoi table in database
                    $stmt = $dbconn->prepare ("INSERT INTO contact (
                            enquiry_number, status, reason, name, email, enquiry
                            )
                            VALUES (
                                NULL, ?, ?, ?, ?, ?
                            )");
                    
                    // if the above code doesn't work, error will be lodged in error log, and the sorry message will display.
                    if ($stmt === false) {
                        error_log("Error with database, couldn't prepare the insert statement: " . $dbconn->error);
                        $errors[] = "<p class='red_text'> Sorry, an unexpected error has occurred, please try again.</p>";
                        }

                    //if the inserting is all fine, it is safe to bind the paradigms
                    $stmt->bind_param("sssss", $status, $reason, $contact_name, $email_contact, $enquiry_box);

                        // getting the id for the row just inserted (i.e step 5) so that the eoi_number and timestamp can be echoed later
                     if (!$stmt->execute()) {
                        error_log("Couldn't execute the insert statement (contact): " . htmlspecialchars($stmt->error) .);
                        $errors[] = "<p class='red_text'> Sorry, an unexpected error has occurred, please try again.</p>";
                        } else {
                            // last id successfully retrieved
                            $last_id = $stmt->insert_id;

                            // getting the eoi_number and timestamp data from table
                            $id_stmt = $dbconn->prepare ("SELECT enquiry_number, submission_time FROM contact WHERE enquiry_number = $last_id");

                            if ($id_stmt === false) {
                                error_log("Error with database, couldn't prepare the select ID and submission time statement: " . $dbconn->error);
                                $errors[] = "<p class='red_text'> Sorry, an unexpected error has occurred, please try again.</p>";
                                } else {
                                    $id_stmt->bind_param("i", $last_id);
                                     if (!$id_stmt->execute()) {
                                            error_log("Error with database, couldn't execute the select ID and submission time statement: " . $dbconn->error);
                                            $errors[] = "<p class='red_text'> Sorry, an unexpected error has occurred, please try again.</p>";
                                        } else {
                                            $result = $select_stmt->get_result();
                                            $row = $result->fetch_assoc();

                                            $submission_time = $row['submission_time'];
                                            $formatted_time = date("h:i a d-m-Y", strtotime($submission_time));
                                        }
                                    $id_stmt->close();
                                }
                            }
                            $stmt->close();
                        }

                // Storing this data into a session receipt to then access on receipt page. Stops the data being resubmitted on refreshing the page.

                     $_SESSION['contact_receipt'] = [
                        'enquiry_number' => $last_id,
                        'status' => $status,
                        'reason' => $reason,
                        'name' => $contact_name,
                        'email' => $email_contact,
                        'enquiry' => $enquiry_box,
                        'submission_time' => $formatted_time
                     ];

                        // closing database connection
                        mysqli_close($dbconn);

                        //redirecting to receipt page
                        header("Location: contact_receipt.php");
                        exit();

                    } else {
                        echo "<p class='red_text'>Error: ".mysqli_error($dbconn)."</p>";
                    }
                }
            }
            ?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <!--Charset Declaration-->
        <meta charset="utf-8">
        <!--Page Description for File-->
        <meta name="description" content="This is the prcoessing of the contact form submission.">
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
    <body>
        <!-- Inserting the Header -->
        <?php include 'header.inc'; ?>
        <main id='contact_submission'>

            <?php
                // errors array will display in html form
            if (!empty($errors)) {
                // Display all error messages
                foreach ($errors as $error) {
                    echo "<p class='red_text'>".htmlspecialchars($error)."</p>";
                        }
                    echo "<p><strong>Please ensure to fill out all form details before submitting.</strong></p>";

                    // Back button to get to apply.php
                    echo "<form action='contact.php' method='get'>
                            <input class='contact_button' type='submit' value='Back' title='Click to go back to contact page.'>
                        </form>"; 
                    }
            ?>

        </main>

        <!--Footer: from the include file-->
        <?php include 'footer.inc'; ?>
    </body>
</html>
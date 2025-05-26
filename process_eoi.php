<?php
session_start();

// the redirection code for is the page was accessed by any method (i.e url) other than submitting a job application form
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('Location: apply.php'); // if the form has not been submitted, page is redirected to apply page
    exit(); // no more code is run after the redirection
}
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

 // intialising errors array to collect the errors to be echoed later in the html
    $errors = [];
        
 // How the data from the form will be cleaned up
    function sanitise_input($data) {
        $data = htmlspecialchars($data);     // special characters become HTML
        $data = trim($data);                 // no more whitespace
        $data = stripslashes($data);         // no more backslashes
        return $data;
    }

    // checking database and creating eoi table if it doesn't exist there
    $sql_create_eoi = "CREATE TABLE IF NOT EXISTS eoi (
        eoi_number INT AUTO_INCREMENT PRIMARY KEY,
        status VARCHAR(10) NOT NULL,
        job_reference VARCHAR(10) NOT NULL,
        first_name VARCHAR(50) NOT NULL,
        family_name VARCHAR(50) NOT NULL,
        dob DATE NOT NULL,
        gender VARCHAR(50) NOT NULL,
        street_address VARCHAR(50) NOT NULL,
        suburb VARCHAR(50) NOT NULL,
        state VARCHAR(3) NOT NULL,
        postcode CHAR(4) NOT NULL,
        email_apply VARCHAR(50) NOT NULL, 
        mobile VARCHAR(10) NOT NULL,
        skills TEXT NOT NULL,
        skills_other TEXT NULL,
        requirements TEXT NULL,
        salary_scale TINYINT NULL,
        hours_start TIME NULL,
        hours_end TIME NULL,
        submission_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
    );";

    //line to run the above table creating code
    mysqli_query($dbconn,$sql_create_eoi);

    // 1: make sure form was submitted with POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // hard coding in the status for a new form to always be 'new'
                    $status = "New";

            // 2: get the form inputs and sanitise
                // job reference - drop down box required isset
                    $job_reference = isset($_POST['job_reference']) ? sanitise_input($_POST['job_reference']) : "";

                // personal details
                    // name
                    $first_name = isset($_POST['first_name']) ? sanitise_input($_POST['first_name']) : "";
                    $family_name = isset($_POST['family_name']) ? sanitise_input($_POST['family_name']) : "";

                    // date of birth
                    $dob = isset($_POST['dob']) ? sanitise_input($_POST['dob']) : "";

                    // gender
                    $gender = isset($_POST['gender']) ? sanitise_input($_POST['gender']) : "";
                    // address
                    $street_address = isset($_POST['street_address']) ? sanitise_input($_POST['street_address']) : "";
                    $suburb = isset($_POST['suburb']) ? sanitise_input($_POST['suburb']) : "";
                    $state = isset($_POST['state']) ? sanitise_input($_POST['state']) : "";
                    $postcode = isset($_POST['postcode']) ? sanitise_input($_POST['postcode']) : "";
                    // contact
                    $email_apply = isset($_POST['email_apply']) ? sanitise_input($_POST['email_apply']) : "";
                    $mobile = isset($_POST['mobile']) ? sanitise_input($_POST['mobile']) : "";

                // skills field
                    //required technical is a checkbox, handled in its own section
                    // other skills / textboxes
                    $skills_other_textbox = isset($_POST['skills_other_textbox']) ? sanitise_input($_POST["skills_other_textbox"]): "";
                    $requirements = isset($_POST['requirements']) ? sanitise_input($_POST['requirements']): "";

                // job expectations
                    // salary
                    $salary_scale = isset($_POST['salary_scale']) ? sanitise_input($_POST['salary_scale']) : 0;
                    // calculating the output of salary estimate based on step selected
                    //lowest salary is $50,000 every notch is $10,000 higher.
                    $pay = number_format(($salary_scale * 10000) + 50000);

                    // working hours
                    $raw_hours_start = isset($_POST['hours_start']) ? sanitise_input($_POST['hours_start']): "";
                        // formatting time so it comes out with a pm or am 
                        if (!empty($raw_hours_start)) {
                            $time_string = strtotime($raw_hours_start);
                                if ($time_string !== false) {
                                    $hours_start = date("g:i A", $time_string); // g is for hour, i is for minutes, A is for AM or PM
                                } else {
                                    $errors[] = "Invalid start time format.";
                                }
                            }else {
                            $hours_start = " "; //data not provided
                        }

                    $raw_hours_end = isset($_POST['hours_end']) ? sanitise_input($_POST['hours_end']): "";
                        if (!empty($raw_hours_end)) {
                            $time_string_end = strtotime($raw_hours_end);
                                if ($time_string_end !== false) {
                                    $hours_end = date("g:i A", $time_string_end);
                                } else {
                                    $errors[] = "Invalid end time format.";
                                }
                            } else {
                            $hours_end = " "; //data not provided
                        }

                //Checkbox - sanitising and reformatting data
                // raw data from the form being put into an array and sanatised
                $raw_data_skills = isset($_POST["skills"]) ? array_map('sanitise_input', $_POST["skills"]) : [];
                    // formatting each skill in the array to have capitals, remove the underscore and put in a space instead
                    $formatting_skills = array_map(function($skill) { 
                        return ucwords(str_replace('_',' ',$skill));
                    }, $raw_data_skills);
                    // joins all the formatted skills together, and adds a break between
                    $skills = implode(",\n", $formatting_skills);

                //form validation - errors for if required inputs aren't there and if patterns aren't adhered to
                    // job reference
                    if (empty($job_reference)) $errors[] = "Job Reference is required.";

                    // personal details
                        // name
                    if (empty($first_name)) {
                        $errors[] = "First name is required."; 
                    } elseif (!preg_match("/[A-Za-z]+/", $first_name)) {
                        $errors[] = "First name can only be written in letters.";
                        }

                    if (empty($family_name)) {
                        $errors[] = "Family name is required.";
                    } elseif (!preg_match("/[A-Za-z]+/", $family_name)) {
                        $errors[] = "Family name can only be written in letters.";
                        }

                        // dob
                    if (empty($dob)) { $errors[] = "Date of birth is required.";
                    } elseif (!preg_match("/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/", $dob)) {
                        $errors[] = "Date of birth must be submitted in DD/MM/YYYY format.";
                    } else {
                        //SQL only accepts YYYY-MM-DD; formatting the data to insert in a way that can be received by SQL
                        // need to convert slashes into dashes
                        $converted_dob = strtotime(str_replace('/', '-', $dob));

                        // if string to time fails to recognise valid date it will put error in array
                        if ($converted_dob !== false) {
                            $sql_dob = date("Y-m-d", strtotime($dob));
                        } else {
                            $errors[] = "Error with date of birth conversion.";
                        }
                    }

                    // gender
                    if (empty($gender)) $errors[] = "Gender is required.";

                    // address
                    if (empty($street_address)) {
                         $errors[] = "Street address is required.";
                    } elseif (!preg_match("/^\d+\s[A-Za-z\s\.]+$/", $street_address)) {
                        $errors[] = "Street address has a max 40 characters; allows numbers, spaces and letters only.";
                        }

                    if (empty($suburb)) {
                        $errors[] = "Suburb is required.";
                    } elseif (!preg_match("/[A-Za-z\s]+/", $suburb)) {
                        $errors[] = "Suburb has a max 40 characters; allows letters and spaces only.";
                        }

                    if (empty($state)) $errors[] = "State is required.";
                    
                    if (empty($postcode)) {
                        $errors[] = "Postcode is required." ;
                    } elseif (!preg_match("/(0[289][0-9]{2})|([123456789][0-9]{3})/", $postcode)) {
                        $errors[] = "Must be an Australian postcode.";
                        }

                    // contact
                    if (empty($email_apply)) {
                         $errors[] = "Email address is required.";
                    } elseif (!preg_match("/[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$/", $email_apply)) {
                        $errors[] = "Email must be properly formulated, i.e example@emailaddress.com.";
                        }

                    if (empty($mobile)) {
                        $errors[] = "Phone number is required.";
                    } elseif (!preg_match("/[0-9\s]+/", $mobile)) {
                        $errors[] = "You are only allowed numbers and spaces in your phone number.";
                        }

                // skills field
                    //required technical skills
                    if (empty($skills)) $errors[] = "Skill(s) need to be selected.";

                    //if checkbox for 'yes other skills' is checked, the other skills needs to be filled in
                    if (in_array("other_skills", $raw_data_skills)) {
                        // if other skills textbox is empty an error will show
                        if (empty($skills_other_textbox)) $errors[] = "You selected 'Yes' to possessing other skills. Please ensure to write them in the textbox.";
                        } else {
                            // 'yes' to other skills checkbox has not been checked, can proceed as normal
                        }
                    // rest of form inputs aren't required or pattern based
                    
                    //checking if there are errors
                    if (!empty($errors)) {
                
                    // if there are errors, it will display in the HTML section below and not insert
                    } else {                       
                        // no errors and safe to proceed with inserting code into the eoi table in database
                        //$stmt used to prevent injection
                        $stmt = $dbconn->prepare ("INSERT INTO eoi 
                                    (status, job_reference, first_name, family_name, dob, gender, street_address, suburb, state, postcode, email_apply, mobile, skills, skills_other, requirements, salary_scale, hours_start, hours_end) 
                                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                        // if the above code doesn't work, error will be lodged in error log, and the sorry message will display.
                        if ($stmt === false) {
                            error_log("Error with database, couldn't prepare the insert statement: " . $dbconn->error);
                            $errors[] = "Sorry, an unexpected error has occurred, please try again.";
                        } else {

                            //if the inserting is all fine, it is safe to bind the paradigms
                            //eoi_number & time submission will be auto done in table, no uploading required
                            $stmt->bind_param("sssssssssssssssiss", 
                                                $status, 
                                                $job_reference, 
                                                $first_name, 
                                                $family_name, 
                                                $sql_dob, 
                                                $gender, 
                                                $street_address, 
                                                $suburb, 
                                                $state, 
                                                $postcode, 
                                                $email_apply, 
                                                $mobile, 
                                                $skills, 
                                                $skills_other_textbox, 
                                                $requirements, 
                                                $salary_scale,  // the notch selected will be uploaded - then seen on website as converted $pay
                                                $raw_hours_start, 
                                                $raw_hours_end
                                            );

                        // getting the id for the row just inserted (i.e step 5) so that the eoi_number and timestamp can be echoed later
                        if (!$stmt->execute()) {
                            error_log("Couldn't execute the insert statement (eoi): " . htmlspecialchars($stmt->error));
                            $errors[] = "Sorry, an unexpected error has occurred, please try again.";
                            } else {
                                // last id successfully retrieved
                                $last_id = $stmt->insert_id;

                                // getting the eoi_number and timestamp data from table
                                $id_stmt = $dbconn->prepare ("SELECT eoi_number, submission_time FROM eoi WHERE eoi_number = ?");

                                if ($id_stmt === false) {
                                    error_log("Error with database, couldn't prepare the select ID and submission time statement: " . $dbconn->error);
                                    $errors[] = "Sorry, an unexpected error has occurred, please try again.";
                                    } else {
                                        $id_stmt->bind_param("i", $last_id);

                                     if (!$id_stmt->execute()) {
                                            error_log("Error with database, couldn't execute the select ID and submission time statement: " . $dbconn->error);
                                            $errors[] = "Sorry, an unexpected error has occurred, please try again.";
                                        } else {
                                            $result = $id_stmt->get_result();
                                            $row = $result->fetch_assoc();

                                            // assigning that data to values
                                            $eoi_number = $row['eoi_number'];
                                            $submission_time = $row['submission_time'];
                                            // converting the time into hours:minutes am/pm DD-MM-YYYY
                                            $formatted_time = date("h:i a d-m-Y", strtotime($submission_time)); 
                                        }
                                    $id_stmt->close();
                                }
                            }
                            $stmt->close();
                        }

                    //SAVING THE DATA
                    // concatenating the address in preparation for display in receipt page
                    $formatted_address = $street_address . ", \n" . $suburb . ", " . $state . " " . $postcode;

                    // Storing this data into a session receipt to then access on the process receipt page. Stops the data being resubmitted when refreshing the page.

                     $_SESSION['receipt_eoi'] = [
                        'eoi_number' => $eoi_number,
                        'status' => $status,
                        'job_reference' => $job_reference,
                        'first_name' => $first_name,
                        'family_name' => $family_name,
                        'dob' => $dob,
                        'gender' => $gender,
                        'formatted_address' => $formatted_address,
                        'email_apply' => $email_apply,
                        'mobile' => $mobile,
                        'skills' => $skills,
                        'skills_other_textbox' => $skills_other_textbox,
                        'requirements' => $requirements,
                        'pay' => $pay,
                        'hours_start' => $hours_start,
                        'hours_end' => $hours_end,
                        'formatted_time' => $formatted_time,
                     ];

                        // closing database connection
                        mysqli_close($dbconn);

                        //redirecting to receipt page
                        header("Location: receipt_eoi.php");
                        exit();

                // closing database connection
                mysqli_close($dbconn);
                }
            }
            ?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <!--Charset Declaration-->
        <meta charset="utf-8">
        <!--Page Description for File-->
        <meta name="description" content="This is the Expression of Interest (EOI) Page that shows the user their submitted EOI results.">
        <!--Key Words for File-->
        <meta name="keywords" content="expression of interest, form, job, application, results, data check">
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
        <main id='eoi_submission'>
            <!-- The error code will display if any are available, otherwise the page will head to the eoi receipt page-->
            <?php

            //code to insert the input to the database or show the errors
                if (!empty($errors)) {
                // Display all error messages
                    echo "<p><strong>Please note that your form was unable to submit due to the following issues:</strong></p>";

                    foreach ($errors as $error) {
                        echo "<p class='red_text'>".htmlspecialchars($error)."</p>";
                    }

                    // Back button to get to apply.php
                    echo "<form action='apply.php' method='get'>
                            <input class='eoi_button' type='submit' value='Back' title='Click to go back to form.'>
                        </form>";
                }
            ?>

        </main>

        <!--Footer: from the include file-->
        <?php include 'footer.inc'; ?>
    </body>
</html>
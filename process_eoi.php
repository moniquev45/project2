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

        <title>Expression of Interest Form</title>
        <!--Icon for the browser-->
        <link rel="icon" href="images/Pear_Logo_Backgroundless.png" type="image/png">
        <!-- Logo Link: https://www.shutterstock.com/image-vector/green-pear-vector-icon-logo-design-2308212369 -->

        <link rel="stylesheet" href="styles/styles.css">
        
    </head>
    <body>
        <!-- Inserting the Header -->
        <?php include 'header.inc'; ?>
        <main id='eoi_submission'>
            <!-- Starting the eoi form and table code-->
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
                die("Connection failed: ".mysqli_connect_error());
            }

            // 1: make sure form was submitted with POST
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                // 2: get the form inputs and sanitise (FILL IN FOR EACH INPUT)
                // job reference - drop down box required isset
                    $job_reference = isset($_POST['job_reference']) ? sanitise_input($_POST['job_reference']) : '';

                // personal details
                    // name
                    $first_name = sanitise_input($_POST["first_name"]);
                    $family_name = sanitise_input($_POST["family_name"]);
                    // dob
                    $dob = sanitise_input($_POST["dob"]);
                    // gender
                    $gender = sanitise_input($_POST["gender"]);
                    // address
                    $street_address = sanitise_input($_POST["street_address"]);
                    $suburb = sanitise_input($_POST["suburb"]);
                    $state = sanitise_input($_POST["state"]);
                    $postcode = sanitise_input($_POST["postcode"]);
                    // contact
                    $email_apply = sanitise_input($_POST["email_apply"]);
                    $mobile = sanitise_input($_POST["mobile"]);

                // skills field
                    //required technical is a checkbox, handled in its own section
                    // other skills / textboxes
                    $skills_other_textbox = sanitise_input($_POST["skills_other_textbox"]);
                    $requirements = sanitise_input($_POST["requirements"]);

                // job expectations
                    // salary
                    $salary_scale = sanitise_input($_POST["salary_scale"]);
                    // working hours
                    $hours_start = sanitise_input($_POST["hours_start"]);
                    $hours_end = sanitise_input($_POST["hours_end"]);

                // 3: Checkboxes (arrays need to be converted)
                $skills = isset($_POST["skills"]) ? implode(", ", array_map('sanitise_input', $_POST["skills"])) : "";

                // 4: form validation - errors for if required inputs aren't there and if patterns aren't adhered to
                    $errors = [];
                    // job reference
                    if (empty($job_reference)) $errors[] = "Job Reference is required.";

                    // personal details
                        // name
                    if (empty($first_name)) $errors[] = "First name is required.";
                    if (!preg_match("/[A-Za-z]+/", $first_name)) 
                        $errors[] = "First name can only be written in letters.";

                    if (empty($family_name)) $errors[] = "Family name is required.";
                    if (!preg_match("/[A-Za-z]+/", $family_name)) 
                        $errors[] = "Familyname can only be written in letters.";
                
                        // dob
                    if (empty($dob)) $errors[] = "Date of birth is required.";
                    if (!preg_match("/^(0[1-9]|[12][0-9]|3[01])-(0[1-9]|1[0-2])-\d{4}$/", $dob)) 
                        $errors[] = "Date of birth must be in DD-MM-YYYY format.";
                    // gender
                    if (empty($gender)) $errors[] = "Gender is required.";

                    // address
                    if (empty($street_address)) $errors[] = "Street address is required.";
                    if (!preg_match("/^\d+\s[A-Za-z\s\.]+$/", $street_address)) 
                        $errors[] = "Street address has a max 40 characters; allows numbers, spaces and letters only.";

                    if (empty($suburb)) $errors[] = "Suburb is required.";
                    if (!preg_match("/[A-Za-z\s]+/", $suburb)) 
                        $errors[] = "Street address has a max 40 characters; allows letters and spaces only.";

                    if (empty($state)) $errors[] = "State is required.";
                    
                    if (empty($postcode)) $errors[] = "Postcode is required.";
                    if (!preg_match("/(0[289][0-9]{2})|([123456789][0-9]{3})/", $postcode)) 
                        $errors[] = "Must be an Australia postcode; in the range of from 0200 to 9944.";

                    // contact
                    if (empty($email_apply)) $errors[] = "Email address is required.";
                    if (!preg_match("/[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$/", $email_apply)) 
                        $errors[] = "Email must be properly formulated, i.e example@emailaddress.com.";

                    if (empty($mobile)) $errors[] = "Phone number is required.";
                    if (!preg_match("/[0-9\s]+/", $mobile)) 
                        $errors[] = "You are only allowed numbers and spaces in your phone number.";

                // skills field
                    //required technical skills
                    if (empty($skills)) $errors[] = "Skill(s) need to be selected.";

                // rest of form inputs aren't required or pattern based

                // 5: code to insert the input to the database or show the errors
                    if (!empty($errors)) {
                        // Display all error messages
                        foreach ($errors as $error) {
                            echo "<p>".htmlspecialchars($error)."</p>";
                        }
                        echo "<p><strong>Please ensure all errors are resolved before submitting.</strong></p>";

                        // Back button to get to apply.php
                        echo "<form action='apply.php' method='get'>
                                <input class='eoi_button' type='submit' value='Back' title='Click to go back to form.'>
                            </form>";
                    } else {
                        // the inserting code into the database
                        $sql_insert = "INSERT INTO eoi 
                                    (eoi_number, job_reference, first_name, family_name, dob, gender, street_address, suburb, state, postcode, email_apply, mobile, 
                                    skills, skills_other, requirements, salary_scale, hours_start, hours_end) 
                                VALUES (
                                    NULL, '$job_reference', '$first_name', '$family_name', '$dob', '$gender', '$street_address', 
                                    '$suburb', '$state', '$postcode', '$email_apply', '$mobile', '$skills', '$skills_other_textbox', 
                                    '$requirements', '$salary_scale', '$hours_start', '$hours_end'
                                )";

                        // 6: getting the id for the row just inserted (i.e step 5) so that the eoi_number and timestamp can be echoed later
                    if (mysqli_query($dbconn, $sql_insert)) {
                        $last_id = mysqli_insert_id($dbconn);

                        // getting the eoi_number and timestamp data from table
                        $query = "SELECT eoi_number, submission_time FROM eoi WHERE eoi_number = $last_id";
                        $result_table = mysqli_query($dbconn, $query);
                        $row = mysqli_fetch_assoc($result_table);

                // 7: echoing all the data proivided in the form in a confirmation notice
                        // Submission Receipt division
                        echo "<div id='submission_receipt'>";

                            // Start of Receipt
                            echo "<h1 id='submission_title'> THANK YOU FOR YOUR SUBMISSION </h1>";

                            // Confirmation: Job Reference Number, Receipt (eoi_number), and timestamp
                            echo "<p id='tester'> Your Expression of Interest Form for Job Reference ".htmlspecialchars($job_reference)." has been received. </p>";
                            // The Application Form EOI record
                            echo "<p><strong>Application Receipt:</strong> ".htmlspecialchars($row['eoi_number'])."</p>";
                            // The Timestamp
                            echo "<p><strong>The time submitted was:</strong> ".htmlspecialchars($row['submission_time'])."</p>";
                            
                            // The form answers:
                            echo "<p><em>Please find the confirmation of details entered below.</em></p>";
                            // Personal Details
                            echo "<p><strong>First Name:</strong> ".htmlspecialchars($first_name)."</p>";
                            echo "<p><strong>Last Name:</strong> ".htmlspecialchars($family_name)."</p>";
                            echo "<p><strong>Date of Birth:</strong> ".htmlspecialchars($dob)."</p>";
                            echo "<p><strong>Gender:</strong> ".htmlspecialchars($gender)."</p>";
                            // Address
                            echo "<p><strong>Street Address:</strong> ".htmlspecialchars($street_address)."</p>";
                            echo "<p><strong>Suburb/Town:</strong> ".htmlspecialchars($suburb)."</p>";
                            echo "<p><strong>State:</strong> ".htmlspecialchars($state)."</p>";
                            echo "<p><strong>Postcode:</strong> ".htmlspecialchars($postcode)."</p>";
                            // Contact
                            echo "<p><strong>Email Address:</strong> ".htmlspecialchars($email_apply)."</p>";
                            echo "<p><strong>Phone Number:</strong> ".htmlspecialchars($mobile)."</p>";
                            // Required Skills
                            echo "<p><strong>Your Selected Skillset:</strong> ".htmlspecialchars($skills)."</p>";
                            // Other Skills
                            echo "<p><strong>Your Self Described Skillset:</strong> ".htmlspecialchars($skills_other_textbox)."</p>";
                            echo "<p><strong>Further Information Provided:</strong> ".htmlspecialchars($requirements)."</p>";
                            echo "<p><strong>Salary Expectations:</strong> ".htmlspecialchars($salary_scale)."</p>";
                            echo "<p><strong>Preferred Starting Time:</strong> ".htmlspecialchars($hours_start)."</p>";
                            echo "<p><strong>Preferred Finish Time:</strong> ".htmlspecialchars($hours_end)."</p>";
                        echo "</div>";

                        // Button to go back to apply.php and apply again.
                        echo "<form action='apply.php' method='get'>
                                <p> If you would like to apply for another job listing, please click the button below: </p>
                                <input class='eoi_button' type='submit' value='Apply Again' title='Click here to go back to the job application form.'>
                            </form>";
                    } else {
                        echo "<p>Error: ".mysqli_error($dbconn)."</p>";
                    }

                // closing database connection
                mysqli_close($dbconn);
                }
            }

            // Clean up the input data
            function sanitise_input($data) {
                $data = trim($data);                 // Removing whitespace
                $data = stripslashes($data);         // Removing backslashes
                $data = htmlspecialchars($data);     // Converting special characters to HTML
                return $data;
            }
            ?>
        </main>

        <!--Footer: from the include file-->
        <?php include 'footer.inc'; ?>
    </body>
</html>
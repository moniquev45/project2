<?php
// debugging error reporting turned on
error_reporting(E_ALL);
ini_set('display_error', 1);
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
    // job reference
    $job_reference = sanitise_input($_POST["job_reference"]);

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
    $skills_other = sanitise_input($_POST["skills_other"]);
    $requirements = sanitise_input($_POST["requirements"]);

    // job expectations
        // salary
    $salary_scale = sanitise_input($_POST["salary_scale"]);
        // working hours
    $hours_start = sanitise_input($_POST["hours_start"]);
    $hours_end = sanitise_input($_POST["hours_end"]);

    // 3: Checkboxes (arrays need to be converted)
    $ = isset($_POST["skills"]) ? implode(", ", array_map('sanitise_input', $_POST["skills"])) : "";

    // 4: form validation
    $errors = [];
    if (empty($name)) $errors[] = "Name is required.";

    // 5: code to insert the input to the database or show the errors
    if (!empty($errors)) {
        // Display all error messages
        foreach ($errors as $error) {
            echo "<p>".htmlspecialchars($error)."</p>";
        }
        echo "<p><strong>Please go back and fix the errors.</strong></p>";
    } else {
        // the inserting code into the database
        $sql = "INSERT INTO eoi 
                () 
                VALUES (
                    '$', 
                )";

        // 6: do the above query and output the results
        if (mysqli_query($conn, $sql)) {
            echo "<h2>YOUR EXPRESSION OF INTEREST APPLICATION:</h2>";
            // The Application Form EOI record
            echo "<p><strong>Your Expression of Interest Form Receipt is:</strong> ".htmlspecialchars($)."</p>";
            // Job Reference Number
            echo "<p><strong>Job Reference:</strong> ".htmlspecialchars($job_reference)."</p>";
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
            echo "<p><strong>Your Self Described Skillset:</strong> ".htmlspecialchars($skills_other)."</p>";
            echo "<p><strong>Further Information Provided:</strong> ".htmlspecialchars($requirements)."</p>";
            echo "<p><strong>Salary Expectations:</strong> ".htmlspecialchars($salary_scale)."</p>";
            echo "<p><strong>Preferred Starting Time:</strong> ".htmlspecialchars($hours_start)."</p>";
            echo "<p><strong>Preferred Finish Time:</strong> ".htmlspecialchars($hours_end)."</p>";
        } else {
            echo "<p>Error: ".mysqli_error($conn)."</p>";
        }
    }

    // closing database connection
    mysqli_close($conn);
}

// Clean up the input data
function sanitise_input($data) {
    $data = trim($data);                 // Removing whitespace
    $data = stripslashes($data);         // Removing backslashes
    $data = htmlspecialchars($data);     // Converting special characters to HTML
    return $data;
}
?>

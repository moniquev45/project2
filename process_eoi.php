<?php
// debugging error reporting turned on
error_reporting(E_ALL);
ini_set('display_error', 1);
?>

<?php
// including database settings
require_once("settings.php");

// Connecting to the database - SETTINGS PAGE NOT SET UP YET, DOUBLE CHECK TO MAKE SURE IT MATCHES WHEN DONE
$conn = mysqli_connect($host, $username, $password, $database);

// connection check
if (!$conn) {
    echo "<p>Could not connect to database: ".mysqli_connect_error()."</p>";
}

// 1: make sure form was submitted with POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 2: get the form inputs and sanitise (FILL IN FOR EACH INPUT)
    $ = sanitise_input($_POST[" "]);


    // 3: Checkboxes (arrays need to be converted)
    $ = isset($_POST[""]) ? implode(", ", array_map('sanitise_input', $_POST[""])) : "";

    // 4: form validation?
    $errors = [];
    if (empty($name)) $errors[] = "Name is required.";

    // 5: push it to the database or give me an error
    if (!empty($errors)) {
        // Display all error messages
        foreach ($errors as $error) {
            echo "<p>" . htmlspecialchars($error) . "</p>";
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
            echo "<h2>YOUR EXPRESSION OF INTEREST TABLE:</h2>";
            echo "<p><strong>Job Reference:</strong> " . htmlspecialchars($job_ref) . "</p>";

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

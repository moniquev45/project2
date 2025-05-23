<!DOCTYPE html>
<html lang = "en">
    <head>
        <!--Charset Declaration-->
        <meta charset="utf-8">
        <!--Page Description for File-->
        <meta name="description" content="">
        <!--Key Words for File-->
        <meta name="keywords" content="">
        <!--Author Information-->
        <meta name="author" content="">

        <title>Manager Page</title>
        <!--Icon for the browser-->
        <link rel="icon" href="images/Pear_Logo_Backgroundless.png" type="image/png">
        <!-- Logo Link: https://www.shutterstock.com/image-vector/green-pear-vector-icon-logo-design-2308212369 -->

        <link rel="stylesheet" href="styles/styles.css">
        
    </head>
    <body>
        <!-- Inserting the Header -->
        <?php include 'header.inc'; ?>
        <main>
        <!-- After opening <main> or before the table, show the message if status was updated -->
        <?php if (isset($_GET['status_updated']) && $_GET['status_updated'] == 1): ?>
            <p style='color:green;'>Status updated successfully.</p>
        <?php endif; ?>
        <?php
            require_once("settings.php");
            session_start();
            // Check if the user is logged in
            if (!isset($_SESSION['manager_logged_in']) || $_SESSION['manager_logged_in'] !== true) {
                header("Location: manager_login.php");
                exit();
            }
            
            // Handle deletion
            if (isset($_POST['delete_eoi']) && !empty($_POST['delete_job_reference'])) {
                $deleteJobRef = mysqli_real_escape_string($dbconn, $_POST['delete_job_reference']);
                $deleteQuery = "DELETE FROM eoi WHERE job_reference = '$deleteJobRef'";
                $deleteResult = mysqli_query($dbconn, $deleteQuery);
                if ($deleteResult) {
                    echo "<p style='color:green;'>All EOIs for job reference <strong>" . htmlspecialchars($deleteJobRef) . "</strong> have been deleted.</p>";
                } else {
                    echo "<p style='color:red;'>Failed to delete EOIs: " . mysqli_error($dbconn) . "</p>";
                }
            }

            // Fetch all unique job references for the dropdown
            $jobRefOptions = [];
            if ($dbconn) {
                $jobRefQuery = "SELECT DISTINCT job_reference FROM eoi";
                $jobRefResult = mysqli_query($dbconn, $jobRefQuery);
                if ($jobRefResult) {
                    while ($row = mysqli_fetch_assoc($jobRefResult)) {
                        $jobRefOptions[] = $row['job_reference'];
                    }
                }
            }

            // Handle filter
            $selectedJobRef = isset($_GET['job_reference']) ? $_GET['job_reference'] : '';
            $firstName = isset($_GET['first_name']) ? trim($_GET['first_name']) : '';
            $familyName = isset($_GET['family_name']) ? trim($_GET['family_name']) : '';

            $whereParts = [];
            if (!empty($selectedJobRef)) {
                $safeJobRef = mysqli_real_escape_string($dbconn, $selectedJobRef);
                $whereParts[] = "job_reference = '$safeJobRef'";
            }
            if (!empty($firstName)) {
                $safeFirstName = mysqli_real_escape_string($dbconn, $firstName);
                $whereParts[] = "first_name LIKE '%$safeFirstName%'";
            }
            if (!empty($familyName)) {
                $safeFamilyName = mysqli_real_escape_string($dbconn, $familyName);
                $whereParts[] = "family_name LIKE '%$safeFamilyName%'";
            }

            $where = '';
            if (count($whereParts) > 0) {
                $where = "WHERE " . implode(' AND ', $whereParts);
            }

            // Main query
            $query = "SELECT * FROM eoi $where";
            $result = mysqli_query($dbconn, $query);

            // Change status handling
            $statusUpdateSuccess = false;
            if (isset($_POST['change_status'], $_POST['eoi_number'], $_POST['new_status'])) {
                $eoiNumber = mysqli_real_escape_string($dbconn, $_POST['eoi_number']);
                $newStatus = mysqli_real_escape_string($dbconn, $_POST['new_status']);
                $updateQuery = "UPDATE eoi SET status = '$newStatus' WHERE eoi_number = '$eoiNumber'";
                $updateResult = mysqli_query($dbconn, $updateQuery);
                if ($updateResult) {
                    // Redirect to the same page with only status_updated=1 (removes other query params)
                    header("Location: manage.php?status_updated=1");
                    exit();
                } else {
                    echo "<p style='color:red;'>Failed to update status: " . mysqli_error($dbconn) . "</p>";
                }
            }
        ?>

        <!-- Filter form -->
        <form method="get" style="margin-bottom:20px;">
            <label for="job_reference">Filter by Job Reference:</label>
            <select id="job_reference" name="job_reference">
                <option value="">-- Show All --</option>
                <?php foreach ($jobRefOptions as $jobRef): ?>
                    <option value="<?php echo htmlspecialchars($jobRef); ?>" <?php if ($selectedJobRef == $jobRef) echo 'selected'; ?>>
                        <?php echo htmlspecialchars($jobRef); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label for="first_name" style="margin-left:20px;">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo isset($_GET['first_name']) ? htmlspecialchars($_GET['first_name']) : ''; ?>">
            <label for="family_name" style="margin-left:10px;">Last Name:</label>
            <input type="text" id="family_name" name="family_name" value="<?php echo isset($_GET['family_name']) ? htmlspecialchars($_GET['family_name']) : ''; ?>">
            <button type="submit" style="margin-left:10px;">Filter</button>
            <?php if (!empty($selectedJobRef) || !empty($_GET['first_name']) || !empty($_GET['family_name'])): ?>
                <a href="manage.php" style="margin-left:10px;">Reset</a>
            <?php endif; ?>
        </form>

        <!-- Delete form -->
        <form method="post" style="margin-bottom:20px;">
            <label for="delete_job_reference">Delete all EOIs for Job Reference:</label>
            <select id="delete_job_reference" name="delete_job_reference" required>
                <option value="">-- Select Job Reference --</option>
                <?php foreach ($jobRefOptions as $jobRef): ?>
                    <option value="<?php echo htmlspecialchars($jobRef); ?>">
                        <?php echo htmlspecialchars($jobRef); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="delete_eoi" style="margin-left:10px;" onclick="return confirm('Are you sure you want to delete all EOIs for this job reference?');">Delete</button>
        </form>

        <?php
            if ($dbconn) {
                if ($result) {
                    echo "<div class='table-responsive'>";
                    echo "<table class='table-eoi'>";
                    // Table header
                    // Using 'nohover' class to prevent hover effect on header
                    echo "<thead><tr class='nohover'>
                        <th>EOI Number</th>
                        <th>Status</th>
                        <th>Job Reference</th>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Skills</th>
                        <th>Other Skills</th>
                        <th>Requirements</th>
                        <th>Salary</th>
                        <th>Hours</th>
                        <th>Submission Time</th>
                    </tr></thead><tbody>";
                    // Fetching and displaying data
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Concatenate name safely
                        $fullName = trim($row['first_name'] . ' ' . $row['family_name']);

                        // Concatenate address safely, skipping empty parts
                        $addressParts = array_filter([
                            $row['street_address'],
                            $row['suburb'],
                            $row['state'],
                            $row['postcode']
                        ]);
                        $address = implode(', ', $addressParts);

                        // Format the hours
                        // Concatenates the start and end times, removing seconds and trailing zeros
                        $hours = '';
                        if (!empty($row['hours_start']) && !empty($row['hours_end'])) {
                            // Adjusting the regex to remove seconds and trailing zeros
                            $start = preg_replace('/(:00|\.00)$/', '', $row['hours_start']);
                            $end = preg_replace('/(:00|\.00)$/', '', $row['hours_end']);
                            $hours = $start . ' - ' . $end;
                        } 
                        // Format the submission time
                        $submissionTime = date("Y-m-d H:i:s", strtotime($row['submission_time']));
                        // Displaying each row of data
                        // Using htmlspecialchars to prevent XSS attacks
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['eoi_number']) . "</td>";
                        // Replace the status column with the change status form:
                        echo "<td>
                            <form method='post' style='display:inline;'>
                                <input type='hidden' name='eoi_number' value='" . htmlspecialchars($row['eoi_number']) . "'>
                                <select name='new_status'>
                                    <option value='New'" . ($row['status'] == 'New' ? ' selected' : '') . ">New</option>
                                    <option value='Current'" . ($row['status'] == 'Current' ? ' selected' : '') . ">Current</option>
                                    <option value='Final'" . ($row['status'] == 'Final' ? ' selected' : '') . ">Final</option>
                                </select>
                                <button type='submit' name='change_status'>Change</button>
                            </form>
                        </td>";
                        echo "<td>" . htmlspecialchars($row['job_reference']) . "</td>";
                        echo "<td>" . htmlspecialchars($fullName) . "</td>";
                        echo "<td>" . htmlspecialchars($row['dob']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                        echo "<td>" . htmlspecialchars($address) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email_apply']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['mobile']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['skills']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['skills_other']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['requirements']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['salary_scale']) . "</td>";
                        echo "<td>" . htmlspecialchars($hours) . "</td>";
                        echo "<td>" . htmlspecialchars($submissionTime) . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody></table>";
                    echo "</div>";
                } else {
                    // Errors in the query
                    echo "Query failed: " . mysqli_error($dbconn);
                }
                mysqli_close($dbconn);
            } else {
                echo "Connection failed";
            } 
        ?>
        </main>
        <!-- Including footer file -->
        <?php include 'footer.inc'; ?>
    </body>
</html>
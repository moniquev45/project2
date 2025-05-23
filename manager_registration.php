

<?php
require_once("settings.php");

// Create table if not exists
$tableQuery = "CREATE TABLE IF NOT EXISTS managers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
mysqli_query($dbconn, $tableQuery);

$username = $password = $confirmPassword = "";
$errors = [];
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    // Username validation
    if (empty($username)) {
        $errors[] = "Username is required.";
    } else {
        // Check uniqueness
        $stmt = mysqli_prepare($dbconn, "SELECT id FROM managers WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) > 0) {
            $errors[] = "Username already exists.";
        }
        mysqli_stmt_close($stmt);
    }

    // Password validation (at least 8 chars, 1 uppercase, 1 lowercase, 1 digit)
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password)) {
        $errors[] = "Password must be at least 8 characters, include an uppercase letter, a lowercase letter, and a digit.";
    } elseif ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    // If no errors, insert manager
    if (empty($errors)) {
        // Hash the password for security
        // Use password_hash() for hashing the password
        // Use password_verify() for verifying the password during login
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($dbconn, "INSERT INTO managers (username, password_hash) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $username, $passwordHash);
        if (mysqli_stmt_execute($stmt)) {
            $success = true;
            header("Location: manager_login.php");
            exit();
        } else {
            $errors[] = "Registration failed. Please try again.";
        }
        mysqli_stmt_close($stmt);
    }
}
?>

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

        <title>Manager Registration</title>
        <!--Icon for the browser-->
        <link rel="icon" href="images/Pear_Logo_Backgroundless.png" type="image/png">
        <!-- Logo Link: https://www.shutterstock.com/image-vector/green-pear-vector-icon-logo-design-2308212369 -->

        <link rel="stylesheet" href="styles/styles.css">
        
    </head>
    <body>
        <!-- Including header file -->
        <?php include 'header.inc'; ?>
        <main>
        <h2>Manager Registration</h2>
        <?php if ($success): ?>
            <p style="color:green;">Registration successful! <a href="manager_login.php">Login here</a>.</p>
        <?php else: ?>
            <?php if (!empty($errors)): ?>
                <ul style="color:red;">
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <form method="post" action="">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username); ?>" required><br><br>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required><br>
                <small>Password must be at least 8 characters, include an uppercase letter, a lowercase letter, and a digit.</small><br><br>
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" id="confirm_password" required><br><br>
                <button type="submit">Register</button>
            </form>
        <?php endif; ?>
    </main>
    <!-- Including footer file -->
    <?php include 'footer.inc'; ?>
    </body>
</html>
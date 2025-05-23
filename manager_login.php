<?php
require_once("settings.php");
session_start();

$username = $password = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    // Username validation
    if (empty($username)) {
        $errors[] = "Username is required.";
    }
    // Password validation
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if (empty($errors)) {
        $query = mysqli_prepare($dbconn, "SELECT id, username, password_hash FROM managers WHERE username = ?");
        mysqli_stmt_bind_param($query, "s", $username);
        mysqli_stmt_execute($query);
        mysqli_stmt_store_result($query);

        if (mysqli_stmt_num_rows($query) == 1) {
            // Bind the result variables
            mysqli_stmt_bind_result($query, $id, $dbUsername, $dbPasswordHash);
            mysqli_stmt_fetch($query);
            if (password_verify($password, $dbPasswordHash)) {
                // Successful login
                $_SESSION['manager_logged_in'] = true;
                $_SESSION['manager_username'] = $dbUsername;
                header("Location: index.php");
                exit();
            } else {
                $errors[] = "Incorrect password.";
            }
        } else {
            $errors[] = "Username not found.";
        }
        mysqli_stmt_close($query);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!--Charset Declaration-->
        <meta charset="utf-8">
        <!--Page Description for File-->
        <meta name="description" content="">
        <!--Key Words for File-->
        <meta name="keywords" content="">
        <!--Author Information-->
        <meta name="author" content="">

        <title>Manager Login</title>
        <!--Icon for the browser-->
        <link rel="icon" href="images/Pear_Logo_Backgroundless.png" type="image/png">
        <!-- Logo Link: https://www.shutterstock.com/image-vector/green-pear-vector-icon-logo-design-2308212369 -->

        <link rel="stylesheet" href="styles/styles.css">
        
    </head>
    <body>
        <!-- Including header file -->
        <?php include 'header.inc'; ?>
        <main>
            <h2>Manager Login</h2>
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
                <input type="password" name="password" id="password" required><br><br>
                <button type="submit">Login</button>
            </form>
            <p>Don't have an account? <a href="manager_registration.php">Register here</a>.</p>
        </main>
        <!-- Including footer file -->
        <?php include 'footer.inc'; ?>
    </body>
</html>
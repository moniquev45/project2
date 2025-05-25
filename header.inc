<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header>
            <div class="Job_Position_And_Logo">
                <figure>
                <!--Change to company Logo-->  
                <a href="index.php"><img src="images/Pear_Company_Logo.png" alt="Pear Company Logo" class="Company_Logo"></a>
                <!-- Logo Link: https://www.shutterstock.com/image-vector/green-pear-vector-icon-logo-design-2308212369 -->
                </figure>
                <h1 class="Company_Name">The Best Big Brain Group </h1>
                <div class="manager-auth-block">
                    <?php if (empty($_SESSION['manager_logged_in'])): ?>
                        <div id = "manager_images">
                            <a href="manager_login.php" class="managerlogin"><img src="images/Manager_Icon.png" alt="Manager Login" class="manager_icon"><p class="manager_icon_text">Manager Login</p></a>
                        </div>
                    <?php else: ?>
                        <h3 class="managerlogin nohover">
                            Welcome, <?php echo isset($_SESSION['manager_username']) ? htmlspecialchars($_SESSION['manager_username']) : 'Manager'; ?>
                        </h3>
                        <a href="manage.php" class="managerwelcome">EOI table database</a>
                        <form method="post" action="manager_logout.php" style="margin-top:8px;">
                            <button type="submit" class="managerwelcome">Log out</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
            <?php include 'nav.inc'; ?>
</header>
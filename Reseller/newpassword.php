<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devide-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e0ee1df878.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Style/index.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="../Images/buildup.png">
    <title>BuildUp - New Password</title>
</head>
    <!--FORGOT PASSWORD RESELLER-->
<body class="bg-sign-in">

    <!-- NAVIGATION BAR -->
    <div class="navigation">
        <div class="sticky-signinup">
            <div class="logos">
                <a href="../"><img src="../Images/buildup.png" alt="BuildUp Logo" width="40px" height="40px"><b>&nbspBuildUp</b></a>
            </div>
        </div>
    </div>

    <!--FORM-->
    <div class="email-check">
        <div class="email-container">
            <form action="../Process/Reseller/new-password.php" method="post">
                <h2>Reset Password</h2>
                <?php
                    if(isset($_SESSION['message']))
                    {
                        ?>
                            <div class="verify">
                                <p><?php echo $_SESSION['message']; ?></p>
                            </div>
                        <?php
                    unset($_SESSION['message']);
                    }
                ?>
                <?php
                    if(isset($_SESSION['message_error']))
                    {
                        ?>
                            <div class="verify-error">
                                <p><?php echo $_SESSION['message_error']; ?></p>
                            </div>
                        <?php
                    unset($_SESSION['message_error']);
                    }
                ?>
                <div class="input-label">
                    <input type="password" name="password" id="pass" required>
                    <label for="pass">New password</label>
                </div>
                <div class="input-label">
                    <input type="password" name="passwordconfirm" id="conf" required>
                    <label for="conf">Confirm passwowrd</label>
                </div>
                <button type="submit" name="changepassword">Change Password</button>
            </form>
        </div>
    </div>
    
</body>
</html>
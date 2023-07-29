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
    <title>BuildUp - Forgot password</title>
</head>
    <!--FORGOT PASSWORD SMALL ENTREPRENEUR-->
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
            <form action="../Process/Small Entrepreneur/email-check.php" method="post">
                <h2>Email Check</h2>
                <p class="please" >Enter your email address.</p>
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
                    <input type="text" name="email" id="email" required>
                    <label for="email">Email</label>
                </div>
                <button type="submit" name="check">Check</button>
            </form>
        </div>
    </div>

    
</body>
</html>
<?php
session_start();
include ('../Process/server.php');
include ('../Process/active-reseller.php');
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
    <title>BuildUp - Change password</title>
</head>

<body class="bg-smallentrep">

    <!-- NAVIGATION BAR -->
    <div class="navigation">
        <div class="sticky-signinup">
            <div class="logos">
                <a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=All"><img src="../Images/buildup.png" alt="BuildUp Logo" width="40px" height="40px"><b>&nbspBuildUp</b></a>
            </div>
        </div>
    </div>
    <!-- Change password form -->
    <div class="upload-container">
        <form class="upload-form" action="../Process/Reseller/change-password.php" method="post">
            <div class="head">
                <h4>Change password</h4>
                <a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id']?>&&filter=All" title="Cancel">Cancel</a>
            </div>
            <div>
                <div class="body-forms">
                    <?php
                        if(isset($_SESSION['failed']))
                        {
                            ?>
                                <div class="wrong">
                                    <b><?php echo $_SESSION['failed']; ?></b>
                                </div>
                            <?php
                        unset($_SESSION['failed']);
                        }
                    ?>
                    <div class="body-input">
                        <input type="password" name="oldpass" id="oldpass" required>
                        <label for="oldpass">Old password</label>
                    </div>
                    <div class="body-input">
                        <input type="password" name="newpass" id="newpass" required>
                        <label for="newpass">New password</label>
                    </div>
                    <div class="body-input">
                        <input type="password" name="confirmpass" id="confirmpass" required>
                        <label for="confirmpass">Confirm password</label>
                    </div>
                <button type="submit" name="changepass">Change password</button>
                </div>
            </div>
        </form>
    </div>


</body>
</html>
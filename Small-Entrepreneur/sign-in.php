<?php
session_start();
if(isset($_SESSION['entrep_id'])){
    header("location:../Small-Entrepreneur/home.php?sign out first");
}
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
    <title>BuildUp - Sign in or Sign up</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
    <!--SIGN-IN-SMALL ENTREPRENEUR-->
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
    <div class="signbody">
        <div class="signcontainer">
            <div class="sign-left">
                <div class="sign-pad">
                    <form method="post" onkeydown="return event.key != 'Enter';">
                        <h2>Sign in</h2>
                        <div class="log-in">
                            <div>
                                <?php
                            if(isset($_SESSION['success'])){
                                        ?>
                            <div class="success">
                                <b><?php echo $_SESSION['success']; ?>&nbsp<i class="fa-solid fa-circle-check"></i></b>
                                    </div>
                                <?php
                                unset($_SESSION['success']);
                            }
                            ?>
                            <?php
                                if(isset($_SESSION['status']))
                                {
                                    ?>
                                        <div class="failed">
                                            <b><?php echo $_SESSION['status']; ?></b>
                                        </div>
                                    <?php
                                unset($_SESSION['status']);
                                }
                            ?>
                            <?php
                                if(isset($_SESSION['message']))
                                {
                                    ?>
                                        <div class="change">
                                            <b><?php echo $_SESSION['message']; ?></b>
                                        </div>
                                    <?php
                                unset($_SESSION['message']);
                                }
                            ?>
                            </div>
                            <div class="signin-input">
                                <input type="text" name="email" id="email" required>
                                <label for="email">Email</label>
                            </div>
                            <div class="signin-input">
                                <input type="password" name="password" id="Pass" required>
                                <label for="Pass">Password</label>
                                <span>
                                    <i class="fa fa-eye" id="eye" onclick="toggle()"></i>
                                </span>
                            </div>
                        </div>
                         <div class="g-recaptcha" data-sitekey="6LfxDWojAAAAANjl_UPSCxehigqkHZdbQGbOsR3p" id="captcha" style="-webkit-transform:scale(0.65);"></div>
                             <script>
                    
                                 setInterval(function(){ 
                                    var response = grecaptcha.getResponse();
                                     if(response.length == 0){
                                         document.getElementById('captcha_message').style.display = 'block';
                                         return false;
                                     }else{
                                         document.getElementById('captcha_message').style.display = 'none';
                                         document.getElementById('captcha').style.display = 'none';
                                         
                                         document.getElementById('terms').style.display = 'inline';
                                         document.getElementById('signinBtn').style.display = 'inline';
                                     }
                                }, 1000);
                             </script>
                             <p id="captcha_message" style="display:none;font-size:10px">Please verify you are not a robot.</p>
                        <a href="forgot-password.php" id="terms" style="display:none">Forgot your password?</a><br>
                        <button type="submit" name="signin" formaction="../Small-Entrepreneur/sign-in-process.php" id="signinBtn" style="display:none">Sign In</button>
                    </form>
                </div>
            </div>
            <div class="sign-right">
                <div class="sign-pads">
                    <h2>Hello!</h2>
                    <p>Enter your personal details and start journey with us</p>
                    <a href="sign-up.php"><button>Sign Up</button></a>
                </div>
            </div>
        </div>
    </div>

<script>
    var state= false;
    function toggle(){
        if(state){
        document.getElementById("Pass").setAttribute("type","password");
        document.getElementById("eye").style.color='#999999';
        state = false;
        }
        else{
        document.getElementById("Pass").setAttribute("type","text");
        document.getElementById("eye").style.color='#2c66e4';
        state = true;
        }
    }
</script>
    
</body>
</html>
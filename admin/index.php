<?php 
session_start();
date_default_timezone_set('Asia/Manila');  
include ('../Process/server.php');

if(isset($_SESSION['admin'])){
    header("location: admin-dashboard.php");
}

function timeago($timestamp)  
{  
    $time_ago = strtotime($timestamp);  
    $current_time = time();  
    $time_difference = $current_time - $time_ago;  
    $seconds = $time_difference;  
    $minutes      = round($seconds / 60 );  
    $hours           = round($seconds / 3600);          
    $days          = round($seconds / 86400);          
    $weeks          = round($seconds / 604800);          
    $months          = round($seconds / 2629440);     
    $years          = round($seconds / 31553280);     
        if($seconds <= 60)  
        {  
        return "just now";  
    }  
        else if($minutes <=60)  
        {  
        if($minutes==1)  
            {  
        return "one minute ago";  
        }  
        else  
            {  
        return "$minutes minutes ago";  
        }  
    }  
        else if($hours <=24)  
        {  
        if($hours==1)  
            {  
        return "an hour ago";  
        }  
            else  
            {  
        return "$hours hrs ago";  
        }  
    }  
        else if($days <= 7)  
        {  
        if($days==1)  
            {  
        return "yesterday";  
        }  
            else  
            {  
        return "$days days ago";  
        }  
    }  
        else if($weeks <= 4.3) 
        {  
        if($weeks==1)  
            {  
        return "a week ago";  
        }  
            else  
            {  
        return "$weeks weeks ago";  
        }  
    }  
        else if($months <=12)  
        {  
        if($months==1)  
            {  
        return "a month ago";  
        }  
            else  
            {  
        return "$months months ago";  
        }  
    }  
        else  
        {  
        if($years==1)  
            {  
        return "one year ago";  
        }  
            else  
            {  
        return "$years years ago";  
        }  
    }  
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
    <title>BuildUp | Admin</title>
</head>
    <!--Admin Dashboard-->
<body class="admin-panel">
    <div class="admin-container">
        <div class="blue">
        </div>
        <div class="admin-content">
            <div class="admin-nav-cont">
                <div class="nav-container">
                    <a class="logo" href="admin-dashboard.php">BuildUp</a>
                </div>
            </div>
            <div class="date">
                <h2>Administrator Sign-in</h2>
                <p>
                    <?php
                        $day=date("l");
                        $date=date("F/d/Y");
                        $mt = explode("/", $date);
                        $mon = $mt[0];
                        $days = $mt[1];
                        $year = $mt[2];
                        echo " Today is " .$day.", ".$mon." ".$days.", ".$year."";

                    ?>
                </p>
            </div>
            <div class="signin-admin">
                <form action="admin-process.php" method="post">
                    <div class="icon">
                        <i class="fa-solid fa-lock"></i>
                            <?php
                                if(isset($_SESSION['admins']))
                                {
                                    ?>
                                        <div class="admin-wrong">
                                            <p><?php echo $_SESSION['admins']; ?></p>
                                        </div>
                                    <?php
                                unset($_SESSION['admins']);
                                }
                            ?>
                    </div>
                    <div class="admin-pass">
                        <input type="password" name="pass" id="pass" required>
                        <label for="pass">Admin Password</label>
                    </div>
                    <button name="submit" type="submit">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

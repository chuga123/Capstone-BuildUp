<?php 
session_start();
date_default_timezone_set('Asia/Manila');  
include ('../Process/server.php');
include ('active-admin.php');


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
                    <a class="nav-btn active" href="admin-dashboard.php">Dashboard</a>
                    <a class="nav-btn" href="admin-business.php?show=all">Business</a>
                    <a class="nav-btn" href="admin-users.php">Users</a>
                    <input type="image" title="Administrator" onclick="myadmin();" class="admin-btn" id="profile-btn" src="../Images/default-profile.png">
                    <div id='myadmindiv' class='admin-infos'>
                        <a href="logout-admin.php">Sign out</a>
                    </div>
                </div>
            </div>
            <div class="date">
                <h2>Overview</h2>
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
            <div class="main-body">
                <div class="total">
                    <div class="total-cards">
                        <div class="total-info">
                            <?php
                                $sqlentrep = "SELECT * from entrep";
                                $resultentrep = mysqli_query($conn, $sqlentrep);
                                $totalentrep = mysqli_num_rows( $resultentrep );
                                if($totalentrep <= 1){
                                    echo "<b>".$totalentrep."</b> <p>Small Entrepreneur</p>";
                                } else {
                                    echo "<b>".$totalentrep."</b> <p>Small Entrepreneurs</p>";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="total-cards">
                        <div class="total-info">
                            <?php
                                $sqlreseller = "SELECT * from reseller";
                                $resultentrep = mysqli_query($conn, $sqlreseller);
                                $totalreseller = mysqli_num_rows( $resultentrep );
                                if($totalreseller <= 1){
                                    echo "<b>".$totalreseller."</b> <p>Reseller</p>";
                                } else {
                                    echo "<b>".$totalreseller."</b> <p>Resellers</p>";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="total-cards">
                        <div class="total-info">
                            <?php
                                $sql = "SELECT * from recommender_user";
                                $result = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows( $result );
                                if($total <= 1){
                                    echo "<b>".$total."</b> <p>Recommender User</p>";
                                } else {
                                    echo "<b>".$total."</b> <p>Recommender Users</p>";
                                }
                            ?>  
                        </div>
                    </div>
                </div>
                <div class="recent-activity">
                    <h3>Recent Activity</h3>
                    <div class="platform">
                        <div class="new">
                            <div class="new-content">
                                <p>Small Entrepreneur</p>
                                <div class="notif">
                                    <table>
                                    <?php
                                        $sql = "SELECT * from entrep ORDER BY date desc LIMIT 5";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $date=$row['date'];
                                                $datetime = (timeago($date));
                                                echo "<tr><td>".$row["firstname"]." ".$row["lastname"]."</td><td>".$row["email"]."</td><td>signed up ".$datetime."</td></tr>";
                                            }
                                        }else {
                                            echo "<tr><td>No record available</td><td>No record available</td><td>No record available</td></tr>";
                                        }
                                    ?>  
                                    </table>
                                </div>
                            </div>
                            <div class="new-content">
                                <p>Reseller</p>
                                <div class="notif">
                                    <table>
                                    <?php
                                        $sql = "SELECT * from reseller ORDER BY date desc LIMIT 5";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $date=$row['date'];
                                                $datetime = (timeago($date));
                                                echo "<tr><td>".$row["firstname"]." ".$row["lastname"]."</td><td>".$row["email"]."</td><td>signed up ".$datetime."</td></tr>";
                                            }
                                        }else {
                                            echo "<tr><td>No record available</td><td>No record available</td><td>No record available</td></tr>";
                                        }
                                    ?>  
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="recom">
                        <h3>Most Liked Business</h3>
                        <div class="recom-container">
                            <div class="recom-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Likes</th>
                                            <th>Business Name</th>
                                            <th>Line of Business</th>
                                            <th>Capital</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        $sql = "SELECT * from businesses ORDER BY likes desc LIMIT 5";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr><td>".$row["likes"]."</td><td>".$row["business_name"]."</td><td>".$row["line_of_business"]."</td><td>₱ ".$row['costing']."</td></tr>";
                                            }
                                        }else {
                                            echo "<tr><td>No record</td><td>No record</td><td>No record</td><td>No record</td></tr>";
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script>

    function myadmin() {
    document.getElementById("myadmindiv").classList.toggle("show");
    }

    window.addEventListener("click", function(event) {
    if (!event.target.matches('.admin-btn')) {
        var updgrades = document.getElementsByClassName("admin-infos");
        var i;
        for (i = 0; i < updgrades.length; i++) {
        var openupgrade = updgrades[i];
        if (openupgrade.classList.contains('show')) {
            openupgrade.classList.remove('show');
        }
        }
    }
    });

</script>
    
</body>
</html>
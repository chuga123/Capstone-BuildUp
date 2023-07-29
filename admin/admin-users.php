<?php 
session_start();
date_default_timezone_set('Asia/Manila');  
include ('../Process/server.php');
include ('active-admin.php');
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
    <!--Admin Dashboard Container-->
    <div class="admin-container">
        <div class="admins">
            <div>
                <?php
                if(isset($_SESSION['accepted'])){
                    ?>
                    <div class="accept">
                        <p><?php echo $_SESSION['accepted']; ?></p>
                    </div>
                    <?php
                unset($_SESSION['accepted']);
                }
                ?>
            </div>
            <div>
                <?php
                if(isset($_SESSION['deleted'])){
                    ?>
                    <div class="accept">
                        <p><?php echo $_SESSION['deleted']; ?></p>
                    </div>
                    <?php
                unset($_SESSION['deleted']);
                }
                ?>
            </div>
        </div>
        <div class="blue">
        </div>
        <div class="admin-content">
            <div class="admin-nav-cont">
                <div class="nav-container">
                    <a class="logo" href="admin-dashboard.php">BuildUp</a>
                    <a class="nav-btn" href="admin-dashboard.php">Dashboard</a>
                    <a class="nav-btn" href="admin-business.php?show=all">Business</a>
                    <a class="nav-btn active" href="admin-users.php">Users</a>
                    <input type="image" title="Administrator" onclick="myadmin();" class="admin-btn" id="profile-btn" src="../Images/default-profile.png">
                    <div id='myadmindiv' class='admin-infos'>
                        <a href="logout-admin.php">Sign out</a>
                    </div>
                </div>
            </div>
            <div class="date">
                <h2>Manage Users</h2>
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
                <div class="small">
                        <?php
                            $sql = "SELECT * from entrep";
                            $result = mysqli_query($conn, $sql);
                            $all = mysqli_num_rows($result);
                            echo "<h3>Small Entrepreneur ($all)</h3>";
                        ?>
                        <div class="small-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Contact No.</th>
                                        <th>Email</th>
                                        <th>Date Joined</th>
                                        <th>Plan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $sql = "SELECT * from entrep ORDER BY date desc";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $datetime = $row['date'];
                                            $datearray = explode(' ', $datetime);
                                            $date1 = $datearray[0];
                                            $date2 = $datearray[1];
                                            $dat = explode('-', $date1);
                                            $day = $dat[0];
                                            $mon = $dat[1];
                                            $year = $dat[2];
                                            if($mon == 1){
                                                $month = 'Jan';
                                            } else if ($mon == 2){
                                                $month = 'Feb';
                                            } else if ($mon == 3){
                                                $month = 'Mar';
                                            } else if ($mon == 4){
                                                $month = 'Apr';
                                            } else if ($mon == 5){
                                                $month = 'May';
                                            }  else if ($mon == 6){
                                                $month = 'Jun';
                                            }  else if ($mon == 7){
                                                $month = 'Jul';
                                            }  else if ($mon == 8){
                                                $month = 'Aug';
                                            }  else if ($mon == 9){
                                                $month = 'Sept';
                                            }  else if ($mon == 10){
                                                $month = 'Oct';
                                            }  else if ($mon == 11){
                                                $month = 'Nov';
                                            }  else{
                                                $month = 'Dec';
                                            } 
                                            echo "<tr><td>".$row['entrep_id']."</td><td>".$row["firstname"]." ".$row["lastname"]."</td><td>0".$row["contact"]."</td><td>".$row["email"]."</td><td>$month. $day, $year - ".$date2."</td><td>".$row['plan']."</td><td>".$row['status']."
                                            </td><td>
                                                <a href='delete.php?entrep_id=".$row['entrep_id']."' title='Delete' class='del'><i class='fa-regular fa-trash-can'></i></a>
                                            </td></tr>";
                                        }
                                    }else {
                                        echo "<tr><td>No record available</td><td>No record available</td><td>No record available</td><td>No record available</td><td>No record available</td><td>No record available</td><td>No record available</td></tr>";
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                </div><br>
                <div class="small">
                        <?php
                            $sql = "SELECT * from reseller";
                            $result = mysqli_query($conn, $sql);
                            $all = mysqli_num_rows($result);
                            echo "<h3>Reseller ($all)</h3>";
                        ?>
                        <div class="small-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Contact No.</th>
                                        <th>Email</th>
                                        <th>Date Joined</th>
                                        <th>Plan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $sql = "SELECT * from reseller  ORDER BY date desc";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $datetime = $row['date'];
                                            $datearray = explode(' ', $datetime);
                                            $date1 = $datearray[0];
                                            $date2 = $datearray[1];
                                            $dat = explode('-', $date1);
                                            $day = $dat[0];
                                            $mon = $dat[1];
                                            $year = $dat[2];
                                            if($mon == 1){
                                                $month = 'Jan';
                                            } else if ($mon == 2){
                                                $month = 'Feb';
                                            } else if ($mon == 3){
                                                $month = 'Mar';
                                            } else if ($mon == 4){
                                                $month = 'Apr';
                                            } else if ($mon == 5){
                                                $month = 'May';
                                            }  else if ($mon == 6){
                                                $month = 'Jun';
                                            }  else if ($mon == 7){
                                                $month = 'Jul';
                                            }  else if ($mon == 8){
                                                $month = 'Aug';
                                            }  else if ($mon == 9){
                                                $month = 'Sept';
                                            }  else if ($mon == 10){
                                                $month = 'Oct';
                                            }  else if ($mon == 11){
                                                $month = 'Nov';
                                            }  else{
                                                $month = 'Dec';
                                            } 
                                            echo "<tr><td>".$row['reseller_id']."</td><td>".$row["firstname"]." ".$row["lastname"]."</td><td>0".$row["contact"]."</td><td>".$row["email"]."</td><td>$month. $day, $year - ".$date2."</td><td>".$row['plan']."
                                            </td><td> 
                                                <a href='delete.php?reseller_id=".$row['reseller_id']."' title='Delete' class='del'><i class='fa-regular fa-trash-can'></i></a>
                                            </td></tr>";
                                        }
                                    }else {
                                        echo "<tr><td>No record available</td><td>No record available</td><td>No record available</td><td>No record available</td><td>No record available</td><td>No record available</td></tr>";
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                </div><br>
                <div class="small">
                    <?php
                            $sql = "SELECT * from payment";
                            $result = mysqli_query($conn, $sql);
                            $all = mysqli_num_rows($result);
                            echo "<h3>Pending Payments ($all)</h3>";
                        ?>
                    <div class="small-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>User Role</th>
                                        <th>Amount</th>
                                        <th>Reference No.</th>
                                        <th>Date Paid</th>
                                        <th>Time Paid</th>
                                        <th>E-receipt</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $sql = "SELECT * from payment ORDER BY id";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id=$row['id'];
                                            $user_id=$row['user_id'];
                                            $role=$row['user_role'];
                                            $cost=$row['cost'];
                                            $g_ss=$row['gcash_ss'];
                                            $g_ref=$row['gcash_reference'];
                                            $dop=$row['date_paid'];
                                            $top=$row['time_paid'];

                                            if($role === 'Small Entrepreneur'){
                                                $sqlentrep = "SELECT * from entrep WHERE entrep_id='$user_id'";
                                                $resultentrep = mysqli_query($conn, $sqlentrep);
                                                if (mysqli_num_rows($resultentrep) > 0) {
                                                    while ($row = mysqli_fetch_assoc($resultentrep)) {
                                                        $e_fname = $row['firstname'];
                                                        $e_lname = $row['lastname'];

                                                        echo"<tr><td>$id</td><td>$e_fname $e_lname</td><td>$role</td><td>$cost</td><td>$g_ref</td><td>$dop</td><td>$top</td>
                                                        <td>
                                                            <div class='preview'>
                                                                <button class='previewbtn'>View</button>
                                                                <div class='preview-content'>
                                                                    <img src='Payment Image/$g_ss'>
                                                                </div>  
                                                            </div> 
                                                        </td>
                                                        <td>
                                                        <div class='action'>
                                                            <a class='approve' href='accept.php?user_id=$user_id&&role=$role' title='Approve'>Approve</a>
                                                            <a class='reject' href='reject.php?user_id=$user_id&&role=$role' title='Reject'>Reject</a>
                                                        </div>
                                                        </td></tr>";
                                                    }
                                                }
                                            }else if($role === 'Reseller'){
                                                $sqlres = "SELECT * from reseller WHERE reseller_id='$user_id'";
                                                $resultres = mysqli_query($conn, $sqlres);
                                                if (mysqli_num_rows($resultres) > 0) {
                                                    while ($row = mysqli_fetch_assoc($resultres)) {
                                                        $r_fname = $row['firstname'];
                                                        $r_lname = $row['lastname'];

                                                        echo"<tr><td>$id</td><td>$r_fname $r_lname</td><td>$role</td><td>$cost</td><td>$g_ref</td><td>$dop</td><td>$top</td>
                                                        <td>
                                                            <div class='preview'>
                                                                <button class='previewbtn'>View</button>
                                                                <div class='preview-content'>
                                                                    <img src='Payment Image/$g_ss'>
                                                                </div>  
                                                            </div> 
                                                        </td>
                                                        <td>
                                                        <div class='action'>
                                                            <a class='approve' href='accept.php?user_id=$user_id&&role=$role' title='Approve'>Approve</a>
                                                            <a class='reject' href='reject.php?user_id=$user_id&&role=$role' title='Reject'>Reject</a>
                                                        </div>
                                                        </td></tr>";
                                                    }
                                                }
                                            }
                                        }
                                    }else {
                                        echo "<tr><td>No record available</td><td>No record available</td><td>No record available</td><td>No record available</td><td>No record available</td><td>No record available</td><td>No record available</td><td>No record available</td><td>No record available</td></tr>";
                                    }
                                ?>
                                </tbody>
                            </table>
                    </div>
                </div><br>
                <div class="small">
                    <?php
                            $sql = "SELECT * from verify";
                            $result = mysqli_query($conn, $sql);
                            $all = mysqli_num_rows($result);
                            echo "<h3>Verification Request ($all)</h3>";
                        ?>
                    <div class="small-contents">
                            <table>
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Type of ID</th>
                                        <th>Address</th>
                                        <th>Contact</th>
                                        <th>Proof</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $sql = "SELECT * from verify ORDER BY id";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id=$row['id'];
                                            $user_id=$row['user_id'];
                                            $proof = $row['proof'];
                                            $toi = $row['type_of_id'];
                                            $address = $row['address'];
                                            $contact = $row['contact'];

                                            $sqlentrep = "SELECT * from entrep WHERE entrep_id='$user_id'";
                                            $resultentrep = mysqli_query($conn, $sqlentrep);
                                            if (mysqli_num_rows($resultentrep) > 0) {
                                                while ($row = mysqli_fetch_assoc($resultentrep)) {
                                                    $e_fname = $row['firstname'];
                                                    $e_lname = $row['lastname'];

                                                    echo"<tr><td>$user_id</td><td>$e_fname $e_lname</td><td>$toi</td><td>$address</td><td>0$contact</td>
                                                    <td>
                                                        <div class='preview'>
                                                            <button class='previewbtn'>View</button>
                                                            <div class='preview-content'>
                                                                <img src='Proof Image/$proof'>
                                                            </div>  
                                                        </div> 
                                                        </td>
                                                    <td>
                                                    <div class='action'>
                                                        <a class='approve' href='verify.php?user_id=$user_id' title='Verify'>Verify</a>
                                                        <a class='reject' href='deny.php?user_id=$user_id' title='Deny'>Deny</a>
                                                    </div>
                                                    </td></tr>";
                                                }
                                            }
                                        }
                                    }else {
                                        echo "<tr><td>No record available</td><td>No record available</td><td>No record available</td><td>No record available</td><td>No record available</td><td>No record available</td><td>No record available</td></tr>";
                                    }
                                ?>
                                </tbody>
                            </table>
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

    function myFunction() {
    document.getElementById("myoptions").classList.toggle("show");
    }

    window.addEventListener("click", function(event) {
    if (!event.target.matches('.buttons-admin')) {
        var dropdowns = document.getElementsByClassName("options-admin");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
        }
        }
    }
    });

    window.addEventListener('load', function() {
    document.addEventListener('click', function(event) {
        document.querySelectorAll('.preview-content').forEach(function(el) {
        if (el !== event.target) el.classList.remove('show')
        });
        if (event.target.matches('.previewbtn')) {
        event.target.closest('.preview').querySelector('.preview-content').classList.toggle('show')
        }
    })
    })
</script>
    
</body>
</html>
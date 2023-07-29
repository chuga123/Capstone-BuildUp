<?php
session_start();
date_default_timezone_set("Asia/Manila");
include ('../Process/server.php');
include ('../Process/active-reseller.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/e0ee1df878.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Style/index.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="../Images/buildup.png">
    <title>BuildUp - Collection</title>
</head>

<body class="bg-reseller">

    <!-- NAVIGATION BAR -->
    <div class="navigation">
        <div class="sticky">
            <div class="logos">
                <a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=All"><img src="../Images/buildup.png" alt="BuildUp Logo" width="40px" height="40px"><b>&nbspBuildUp</b></a>
            </div>
            <div class="collection-button">
            <?php
                    $id = $_SESSION['reseller_id'];
                    $check = mysqli_query($conn, "SELECT * FROM reseller WHERE reseller_id=$id");
                    if(mysqli_num_rows($check) > 0 ){
                        while($row = mysqli_fetch_array($check)){
                        $premium = $row['plan'];
                            if($premium == 'premium') {
                                echo "<b><i class='fa-solid fa-crown'></i> Premium</b>";
                            }else {
                                echo "
                                <button onclick='myupgrades()' class='upgrades'>Upgrade</button>
                                <div id='myups' class='upgrade-info'>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Premium Benefits</th> 
                                                <th>Free</th>
                                                <th>Premium</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Post Products</td>
                                                <td>3</td>
                                                <td>Unlimited</td>
                                            </tr>
                                            <tr>
                                                <td>Chance to get verified</td>
                                                <td>0</td>
                                                <td>Unlimited</td>
                                            </tr>
                                        </tbody>
                                    </table>";
                                    $check = mysqli_query($conn, "SELECT * FROM reseller WHERE reseller_id=$id");
                                    if(mysqli_num_rows($check) > 0 ){
                                        while($row = mysqli_fetch_array($check)){
                                            $month = $row['month'];
                                            if($month < 1 ){
                                                echo "<br><p>Enjoy 3 months of premium for only ₱300<br> Save ₱50 on your next premium upgrade</p>";
                                                echo "<a data-amount='300' data-fee='0' data-expiry='12' data-description='Payment for 3 months of Premium in BuildUp' data-href='https://getpaid.gcash.com/paynow' data-public-key='pk_3778e656f0582e1368cf8145aaf3348d' onclick='this.href = this.getAttribute('data-href')+'?public_key='+this.getAttribute('data-public-key')+'&amp;amount='+this.getAttribute('data-amount')+'&amp;fee='+this.getAttribute('data-fee')+'&amp;expiry='+this.getAttribute('data-expiry')+'&amp;description='+this.getAttribute('data-description');' href='https://getpaid.gcash.com/paynow?public_key=pk_3778e656f0582e1368cf8145aaf3348d&amp;amount=300&amp;fee=0&amp;expiry=12&amp;description=Payment for 3 months of Premium in BuildUp' target='_blank' class='x-getpaid-button'><img src='https://getpaid.gcash.com/assets/img/paynow.png' width='100px'></a>";
                                                echo "<hr><a href='../Admin/payment-form.php?reseller_id=$id' class='already'>Already Paid</a>";      
                                            }else {
                                                echo "<br><p>Enjoy 3 months of premium for only ₱250</p>";
                                                echo "<a data-amount='300' data-fee='0' data-expiry='12' data-description='Payment for 3 months of Premium in BuildUp' data-href='https://getpaid.gcash.com/paynow' data-public-key='pk_3778e656f0582e1368cf8145aaf3348d' onclick='this.href = this.getAttribute('data-href')+'?public_key='+this.getAttribute('data-public-key')+'&amp;amount='+this.getAttribute('data-amount')+'&amp;fee='+this.getAttribute('data-fee')+'&amp;expiry='+this.getAttribute('data-expiry')+'&amp;description='+this.getAttribute('data-description');' href='https://getpaid.gcash.com/paynow?public_key=pk_3778e656f0582e1368cf8145aaf3348d&amp;amount=300&amp;fee=0&amp;expiry=12&amp;description=Payment for 3 months of Premium in BuildUp' target='_blank' class='x-getpaid-button'><img src='https://getpaid.gcash.com/assets/img/paynow.png' width='100px'></a>";
                                                echo "<hr><a href='../Admin/payment-form.php?reseller_id=$id' class='already'>Already Paid</a>";
                                            }
                                        }
                                    }
                                    echo"
                                </div>
                                ";
                            }
                        }
                    }else{
                        echo "
                        <button onclick='myupgrades()' class='upgrades'>Upgrade</button>
                        <div id='myups' class='upgrade-info'>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Premium Benefits</th> 
                                        <th>Free</th>
                                        <th>Premium</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Post Products</td>
                                        <td>3</td>
                                        <td>Unlimited</td>
                                    </tr>
                                    <tr>
                                        <td>Chance to get verified</td>
                                        <td>0</td>
                                        <td>Unlimited</td>
                                    </tr>
                                </tbody>
                            </table>";
                            $check = mysqli_query($conn, "SELECT * FROM reseller WHERE reseller_id=$id");
                            if(mysqli_num_rows($check) > 0 ){
                                while($row = mysqli_fetch_array($check)){
                                    $month = $row['month'];
                                    if($month < 1 ){
                                        echo "<br><p>Enjoy 3 months of premium for only ₱300<br> Save ₱50 on your next premium upgrade</p>";
                                        echo "<a data-amount='300' data-fee='0' data-expiry='12' data-description='Payment for 3 months of Premium in BuildUp' data-href='https://getpaid.gcash.com/paynow' data-public-key='pk_3778e656f0582e1368cf8145aaf3348d' onclick='this.href = this.getAttribute('data-href')+'?public_key='+this.getAttribute('data-public-key')+'&amp;amount='+this.getAttribute('data-amount')+'&amp;fee='+this.getAttribute('data-fee')+'&amp;expiry='+this.getAttribute('data-expiry')+'&amp;description='+this.getAttribute('data-description');' href='https://getpaid.gcash.com/paynow?public_key=pk_3778e656f0582e1368cf8145aaf3348d&amp;amount=300&amp;fee=0&amp;expiry=12&amp;description=Payment for 3 months of Premium in BuildUp' target='_blank' class='x-getpaid-button'><img src='https://getpaid.gcash.com/assets/img/paynow.png' width='100px'></a>";
                                        echo "<hr><a href='../Admin/payment-form.php?reseller_id=$id' class='already'>Already Paid</a>";      
                                    }else {
                                        echo "<br><p>Enjoy 3 months of premium for only ₱250</p>";
                                        echo "<a data-amount='300' data-fee='0' data-expiry='12' data-description='Payment for 3 months of Premium in BuildUp' data-href='https://getpaid.gcash.com/paynow' data-public-key='pk_3778e656f0582e1368cf8145aaf3348d' onclick='this.href = this.getAttribute('data-href')+'?public_key='+this.getAttribute('data-public-key')+'&amp;amount='+this.getAttribute('data-amount')+'&amp;fee='+this.getAttribute('data-fee')+'&amp;expiry='+this.getAttribute('data-expiry')+'&amp;description='+this.getAttribute('data-description');' href='https://getpaid.gcash.com/paynow?public_key=pk_3778e656f0582e1368cf8145aaf3348d&amp;amount=300&amp;fee=0&amp;expiry=12&amp;description=Payment for 3 months of Premium in BuildUp' target='_blank' class='x-getpaid-button'><img src='https://getpaid.gcash.com/assets/img/paynow.png' width='100px'></a>";
                                        echo "<hr><a href='../Admin/payment-form.php?reseller_id=$id' class='already'>Already Paid</a>";
                                    }
                                }
                            }
                            echo"
                        </div>
                        ";
                    }

                    $sql = "SELECT * FROM reseller WHERE reseller_id='$id'";
                    $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $firstname = $row['firstname'];
                            $lastname = $row['lastname'];

                            $sqlImg = "SELECT * FROM reseller_profile_pic WHERE reseller_id='$id'";
                            $resultImg = mysqli_query($conn, $sqlImg);
                                while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                                    $filepath = $rowImg['filepath'];
                                    if ($rowImg['status'] != 0) {
                                        echo "<input type='image' title='".$firstname." ".$lastname."' id='profile-btn' src='../Process/Reseller/".$filepath."'>";
                                    }else {
                                        echo "<input type='image' title='".$firstname." ".$lastname."' id='profile-btn' src='../Process/Reseller/".$filepath."'>";
                                    }
                                }
                            }
                ?>
            </div>
            <div id="profile" class="profile">
                <div class="triangle"><i class="fa-solid fa-play"></i></div>
                <div class="profile-pic">
                    <?php
                    include ('../Process/server.php');
                    $id = $_SESSION['reseller_id'];
                    $sqlImg = "SELECT * FROM reseller_profile_pic WHERE reseller_id='$id'";
                    $resultImg = mysqli_query($conn, $sqlImg);
                        while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                            $filepath = $rowImg['filepath'];
                            if ($rowImg['status'] != 0) {
                                echo "<img src='../Process/Reseller/".$filepath."'>";
                            }else {
                                echo "<img src='../Process/Reseller/".$filepath."'>";
                            }
                        }
                    ?>
                </div>
                <div class="colored">
                    <h4 style="text-align: center;">
                        <?php 
                        include ('../Process/server.php');
                        $id = $_SESSION['reseller_id'];
                        $sql = "SELECT * FROM reseller WHERE reseller_id='$id'";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)){
                            $firstname= $row["firstname"];
                            $lastname= $row["lastname"];
                                echo $firstname; 
                                echo ' ', $lastname;
                            }
                        }
                        ?>
                    </h4>
                    <small>Reseller</small>
                    <p style="padding-left: 10px;"><i class="fa-solid fa-envelope"></i>&nbsp
                        <?php 
                            include ('../Process/server.php');
                            $id = $_SESSION['reseller_id'];
                            $sql = "SELECT * FROM reseller WHERE reseller_id='$id'";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)){
                                $email= $row["email"];
                                    echo $email;
                                }
                            }
                        ?>
                    </p>
                    <p style="padding-left: 10px;"><i class="fa-solid fa-phone"></i>&nbsp
                        <?php 
                            include ('../Process/server.php');
                            $id = $_SESSION['reseller_id'];
                            $sql = "SELECT * FROM reseller WHERE reseller_id='$id'";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)){
                                $contact= $row["contact"];
                                    echo '0', $contact;
                                }
                            }
                        ?>
                    </p>
                </div>
                <form method="post">
                    <div class="edits">
                        <a class="edits-up" href="edit-profile.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=<?php echo $_GET['filter']?>" title="Edit Profile">Edit profile</a>
                        <a class="edits-down" href="" title="Change password">Change password</a>
                        <button class="sign-out" type="submit" formaction="../Process/log-out.php" name="logout-reseller" title="Sign-out">Sign out</button>
                    </div>
                </form>
            </div>
            <div class="fade-out">
                <div>
                    <?php
                    if(isset($_SESSION['success'])){
                        ?>
                            <div class="success">
                                <strong><?php echo $_SESSION['success']; ?>&nbsp<i class="fa-solid fa-circle-check"></i></strong>
                            </div>
                        <?php
                        unset($_SESSION['success']);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="collection">
        <h2><a href='home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=All'><i class="fa-solid fa-arrow-left-long"></i></a>&nbsp&nbsp Collection</h2>
    </div>
    <div class="collection-container">
        <div class="collection-row">
                <?php

                    date_default_timezone_set('Asia/Manila');  
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

                    $reseller_id = $_SESSION['reseller_id'];
                    $sql = "SELECT * FROM saved_product WHERE reseller_id=$reseller_id ORDER BY saved_date desc";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $product_id = $row['product_id'];
                            $saved_date = $row['saved_date'];
                            $datetime = (timeago($saved_date));

                            $sqls = "SELECT firstname, lastname FROM reseller WHERE reseller_id=$reseller_id";
                            $results = mysqli_query($conn, $sqls);
                            if (mysqli_num_rows($results) > 0) {
                                while ($rows = mysqli_fetch_assoc($results)) {
                                    $firstname = $rows['firstname'];
                                    $lastname = $rows['lastname'];

                                    $sqla = "SELECT * FROM uploaded_product WHERE product_id=$product_id";
                                    $resulta = mysqli_query($conn, $sqla);
                                    if (mysqli_num_rows($resulta) > 0) {
                                        while ($rowa = mysqli_fetch_assoc($resulta)) {
                                            $productname = $rowa['productname'];
                                            $productprice = $rowa['productprice'];
                                            $filename = $rowa['productimage'];
                                            $province = $rowa['province'];
                                            $filepath = $rowa['filepath'];
                                            
                                            echo"
                                                <div class='collection-column'>
                                                    <div class='collection-card'>
                                                        <div class='prod-img'>
                                                            <img src='../Process/Small Entrepreneur/".$filepath."'>
                                                        </div>
                                                        <div class='collection-info'>
                                                            <a href='../Process/Reseller/remove-collection.php?reseller_id=".$reseller_id."&&product_id=".$product_id."' title='Remove to collection'><i class='fa-solid fa-xmark'></i></a>
                                                            <h5>".$productname."</h5>
                                                            <p>₱ ".$productprice."</p>
                                                            <b>Added ".$datetime."</b>
                                                            <a href='view-product-collection.php?reseller_id=".$reseller_id."&&filter=".$province."&&id=".$filename."&&product_id=".$product_id."'>View <i class='fa-solid fa-angles-right'></i></a>
                                                        </div>
                                                    </div>
                                                </div>";
                                        }
                                    }
                                }
                            }
                        }
                    }else{
                        echo "
                            <p>Your saved products will be added here.</p>
                        ";
                    }
                ?>
        </div>
    </div>
    <div class="bottom-upgrade">
        <div class="bottom-container">
        <?php
            $id = $_SESSION['reseller_id'];
            $check = mysqli_query($conn, "SELECT * FROM reseller WHERE reseller_id=$id");
            if(mysqli_num_rows($check) > 0 ){
                while($row = mysqli_fetch_array($check)){
                    $premium = $row['plan'];
                    if($premium == 'premium') {
                        echo "<p>Save your chosen products as much as you want.</p>
                            <p><i class='fa-solid fa-crown'></i> Premium</p>";
                    }else {
                        echo "<p>Get unlimited save from your chosen products on premium.</p>";
                    }
                }
            }
        ?>
        </div>
    </div>

<script>
    function myupgrades() {
    document.getElementById("myups").classList.toggle("show");
    }

    window.addEventListener("click", function(event) {
    if (!event.target.matches('.upgrades')) {
        var updgrades = document.getElementsByClassName("upgrade-info");
        var i;
        for (i = 0; i < updgrades.length; i++) {
        var openupgrade = updgrades[i];
        if (openupgrade.classList.contains('show')) {
            openupgrade.classList.remove('show');
        }
        }
    }
    });

    const targetprofile = document.getElementById("profile");
    const profile = document.getElementById("profile-btn");
    profile.onclick = function () {
    if (targetprofile.style.display === "block") {
        targetprofile.style.display = "none";
    } else {
        targetprofile.style.display = "block";
    }
    };
</script>

</body>
</html>
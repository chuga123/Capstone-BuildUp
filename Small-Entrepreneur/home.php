<?php
session_start();
date_default_timezone_set("Asia/Manila");
include ('../Process/server.php');
include ('../Process/active-smallentrep.php');
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
    <title>BuildUp - Small Entrepreneur</title>
</head>

<body class="bg-smallentrep">

    <!-- NAVIGATION BAR -->
    <div class="navigation">
        <div class="sticky">
            <div class="logos">
                <a href="home.php?entrep_id=<?php echo $_SESSION['entrep_id'];?>"><img src="../Images/buildup.png" alt="BuildUp Logo" width="40px" height="40px"><b>&nbspBuildUp</b></a>
            </div>
            <div class="collection-button">
                <?php
                    $id = $_SESSION['entrep_id'];
                    $check = mysqli_query($conn, "SELECT * FROM entrep WHERE entrep_id=$id");
                    if(mysqli_num_rows($check) > 0 ){
                        while($row = mysqli_fetch_array($check)){
                        $premium = $row['plan'];
                        $status = $row['is_verified'];
                            if($premium == 'premium') {
                                if($status == 'true') {
                                    echo "
                                        <button onclick='myupgrade()' class='upgrade'><i class='fa-solid fa-crown'></i> Premium</button>
                                        <div id='myup' class='upgrades-info'>
                                            <p>You are on Premium Version.
                                            <br><i class='fa-solid fa-circle-check'></i> Unlimited Post
                                            <br><i class='fa-solid fa-circle-check'></i> Account verified
                                            </p>
                                        </div>
                                    ";
                                }else{
                                    echo "
                                        <button onclick='myupgrade()' class='upgrade'><i class='fa-solid fa-crown'></i> Premium</button>
                                        <div id='myup' class='upgrades-info'>
                                            <p>You are on Premium Version.
                                            <br><i class='fa-solid fa-circle-check'></i> Unlimited Post
                                            <br><a href='get-verified.php?entrep_id=$id'><i class='fa-regular fa-circle-check'></i> Get verified</a>
                                            </p>
                                        </div>
                                    ";
                                }
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
                                    $check = mysqli_query($conn, "SELECT * FROM entrep WHERE entrep_id=$id");
                                    if(mysqli_num_rows($check) > 0 ){
                                        while($row = mysqli_fetch_array($check)){
                                            $month = $row['month'];
                                            if($month < 1 ){
                                                echo "<br><p>Enjoy 3 months of premium for only ₱300<br> Save ₱50 on your next premium upgrade</p>";
                                                echo "<a data-amount='300' data-fee='0' data-expiry='12' data-description='Payment for 3 months of Premium in BuildUp' data-href='https://getpaid.gcash.com/paynow' data-public-key='pk_3778e656f0582e1368cf8145aaf3348d' onclick='this.href = this.getAttribute('data-href')+'?public_key='+this.getAttribute('data-public-key')+'&amp;amount='+this.getAttribute('data-amount')+'&amp;fee='+this.getAttribute('data-fee')+'&amp;expiry='+this.getAttribute('data-expiry')+'&amp;description='+this.getAttribute('data-description');' href='https://getpaid.gcash.com/paynow?public_key=pk_3778e656f0582e1368cf8145aaf3348d&amp;amount=300&amp;fee=0&amp;expiry=12&amp;description=Payment for 3 months of Premium in BuildUp' target='_blank' class='x-getpaid-button'><img src='https://getpaid.gcash.com/assets/img/paynow.png' width='100px'></a>";
                                                echo "<hr><a href='../Admin/payment-form.php?entrep_id=$id' class='already'>Already Paid</a>";      
                                            }else {
                                                echo "<br><p>Enjoy 3 months of premium for only ₱250</p>";
                                                echo "<a data-amount='250' data-fee='0' data-expiry='12' data-description='Payment for 3 months of Premium in BuildUp' data-href='https://getpaid.gcash.com/paynow' data-public-key='pk_3778e656f0582e1368cf8145aaf3348d' onclick='this.href = this.getAttribute('data-href')+'?public_key='+this.getAttribute('data-public-key')+'&amp;amount='+this.getAttribute('data-amount')+'&amp;fee='+this.getAttribute('data-fee')+'&amp;expiry='+this.getAttribute('data-expiry')+'&amp;description='+this.getAttribute('data-description');' href='https://getpaid.gcash.com/paynow?public_key=pk_3778e656f0582e1368cf8145aaf3348d&amp;amount=250&amp;fee=0&amp;expiry=12&amp;description=Payment for 3 months of Premium in BuildUp' target='_blank' class='x-getpaid-button'><img src='https://getpaid.gcash.com/assets/img/paynow.png' width='100px'></a>";
                                                echo "<hr><a href='../Admin/payment-form.php?entrep_id=$id' class='already'>Already Paid</a>";
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
                            $check = mysqli_query($conn, "SELECT * FROM entrep WHERE entrep_id=$id");
                            if(mysqli_num_rows($check) > 0 ){
                                while($row = mysqli_fetch_array($check)){
                                    $month = $row['month'];
                                    if($month < 1 ){
                                        echo "<br><p>Enjoy 3 months of premium for only ₱300<br> Save ₱50 on your next premium upgrade</p>";
                                        echo "<a data-amount='300' data-fee='0' data-expiry='12' data-description='Payment for 3 months of Premium in BuildUp' data-href='https://getpaid.gcash.com/paynow' data-public-key='pk_3778e656f0582e1368cf8145aaf3348d' onclick='this.href = this.getAttribute('data-href')+'?public_key='+this.getAttribute('data-public-key')+'&amp;amount='+this.getAttribute('data-amount')+'&amp;fee='+this.getAttribute('data-fee')+'&amp;expiry='+this.getAttribute('data-expiry')+'&amp;description='+this.getAttribute('data-description');' href='https://getpaid.gcash.com/paynow?public_key=pk_3778e656f0582e1368cf8145aaf3348d&amp;amount=300&amp;fee=0&amp;expiry=12&amp;description=Payment for 3 months of Premium in BuildUp' target='_blank' class='x-getpaid-button'><img src='https://getpaid.gcash.com/assets/img/paynow.png' width='100px'></a>";
                                        echo "<hr><a href='../Admin/payment-form.php?entrep_id=$id' class='already'>Already Paid</a>";      
                                    }else {
                                        echo "<br><p>Enjoy 3 months of premium for only ₱250</p>";
                                        echo "<a data-amount='250' data-fee='0' data-expiry='12' data-description='Payment for 3 months of Premium in BuildUp' data-href='https://getpaid.gcash.com/paynow' data-public-key='pk_3778e656f0582e1368cf8145aaf3348d' onclick='this.href = this.getAttribute('data-href')+'?public_key='+this.getAttribute('data-public-key')+'&amp;amount='+this.getAttribute('data-amount')+'&amp;fee='+this.getAttribute('data-fee')+'&amp;expiry='+this.getAttribute('data-expiry')+'&amp;description='+this.getAttribute('data-description');' href='https://getpaid.gcash.com/paynow?public_key=pk_3778e656f0582e1368cf8145aaf3348d&amp;amount=250&amp;fee=0&amp;expiry=12&amp;description=Payment for 3 months of Premium in BuildUp' target='_blank' class='x-getpaid-button'><img src='https://getpaid.gcash.com/assets/img/paynow.png' width='100px'></a>";
                                        echo "<hr><a href='../Admin/payment-form.php?entrep_id=$id' class='already'>Already Paid</a>";
                                    }
                                }
                            }
                            echo"
                        </div>
                        ";
                    }

                    $sql = "SELECT * FROM entrep WHERE entrep_id='$id'";
                    $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $firstname = $row['firstname'];
                            $lastname = $row['lastname'];

                            $sqlImg = "SELECT * FROM entrep_profile_pic WHERE entrep_id='$id'";
                            $resultImg = mysqli_query($conn, $sqlImg);
                                while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                                    $filepath = $rowImg['filepath'];
                                    if ($rowImg['status'] != 0) {
                                        echo "<input type='image' title='".$firstname." ".$lastname."' id='profile-btn' src='../Process/Small Entrepreneur/".$filepath."'>";
                                    }else {
                                        echo "<input type='image' title='".$firstname." ".$lastname."' id='profile-btn' src='../Process/Small Entrepreneur/".$filepath."'>";
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
                    $id = $_SESSION['entrep_id'];
                    $sqlImg = "SELECT * FROM entrep_profile_pic WHERE entrep_id='$id'";
                    $resultImg = mysqli_query($conn, $sqlImg);
                        while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                            $filepath = $rowImg['filepath'];
                            if ($rowImg['status'] != 0) {
                                echo "<img src='../Process/Small Entrepreneur/".$filepath."'>";
                            }else {
                                echo "<img src='../Process/Small Entrepreneur/".$filepath."'>";
                            }
                        }
                    ?>
                </div>
                <div class="colored">
                    <h4 style="text-align: center;">
                        <?php 
                        include ('../Process/server.php');
                        $id = $_SESSION['entrep_id'];
                        $sql = "SELECT * FROM entrep WHERE entrep_id='$id'";
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
                    <small>Small Entrepreneur</small>
                    <p style="padding-left: 10px;"><i class="fa-solid fa-envelope"></i>
                        <?php 
                            include ('../Process/server.php');
                            $id = $_SESSION['entrep_id'];
                            $sql = "SELECT * FROM entrep WHERE entrep_id='$id'";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)){
                                $email= $row["email"];
                                    echo $email;
                                }
                            }
                        ?>
                    </p>
                    <p style="padding-left: 10px;"><i class="fa-solid fa-phone"></i>
                        <?php 
                            include ('../Process/server.php');
                            $id = $_SESSION['entrep_id'];
                            $sql = "SELECT * FROM entrep WHERE entrep_id='$id'";
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
                        <a class="edits-up" href="edit-profile.php?entrep_id=<?php echo $_SESSION['entrep_id'];?>" title="Edit Profile">Edit profile</a>
                        <a class="edits-down" href="change-password.php" title="Change password">Change password</a>
                        <button class="sign-out" type="submit" formaction="../Process/log-out.php" name="logout-smallentrep" title="Sign-out">Sign out</button>
                    </div>
                </form>
            </div>
            <!--Success processess-->
            <div class="premium-form">
                <div>
                    <?php
                    if(isset($_SESSION['submitted'])){
                        ?>
                            <div class="sent">
                                <p><?php echo $_SESSION['submitted']; ?></p>
                            </div>
                        <?php
                        unset($_SESSION['submitted']);
                    }
                    ?>
                </div>
            </div>
            <div class="fade-out">
                <div>
                    <?php
                    if(isset($_SESSION['success'])){
                        ?>
                            <div class="success">
                                <strong><?php echo $_SESSION['success']; ?>&nbsp&nbsp<i class="fa-solid fa-circle-check"></i></strong>
                            </div>
                        <?php
                        unset($_SESSION['success']);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- SMALL ENTREPRENEUR PLATFORM-->
    <div class="platform">
        <div class="reload">
                <div class="up">
                    <h3><a class="load" href="home.php?entrep_id=<?php echo $_SESSION['entrep_id'];?>"><i class="fa-solid fa-house"></i></a></h3>
                    <?php
                        $id = $_SESSION['entrep_id'];
                        $checks = mysqli_query($conn, "SELECT * FROM uploaded_product_limit WHERE entrep_id=$id");
                        if(mysqli_num_rows($checks) < 3 ){
                            echo "
                                <a class='add-btn' href='add-new-product.php?entrep_id=$id'><span class='fa-solid fa-plus'></span> New product</a>
                            ";
                        }else{
                            $check = mysqli_query($conn, "SELECT * FROM entrep WHERE entrep_id=$id");
                            if(mysqli_num_rows($check) > 0 ){
                                while($row = mysqli_fetch_array($check)){
                                    $premium = $row['plan'];
                                    if($premium == 'premium') {
                                        echo "
                                            <a class='add-btn' href='add-new-product.php?entrep_id=$id'><span class='fa-solid fa-plus'></span> New product</a>
                                        ";
                                    } else {
                                        echo" 
                                        <button onclick='mynew()' class='adds'><span class='fa-solid fa-plus'></span> New product</button>
                                        <div id='mypremium' class='premium-info'>
                                           <p>Maximum number of uploaded products was reached.<br>Upgrade to premium to get unlimited uploads.</p>
                                        </div>
                                        ";
                                    }
                                }
                            }
                        }
                    ?>
                </div>
        </div>
        <div class="row">
            <!-- Middle column -->
            <div class="platform-column middle">
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

                            $id = $_SESSION['entrep_id'];
                            $sql = "SELECT * FROM entrep WHERE entrep_id='$id'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $firstname = $row['firstname'];
                                    $lastname = $row['lastname'];

                                    $id = $_SESSION['entrep_id'];
                                    $sqla = "SELECT * FROM uploaded_product WHERE entrep_id='$id' ORDER BY  product_id desc";
                                    $results = mysqli_query($conn, $sqla);
                                    if (mysqli_num_rows($results) > 0) {
                                        while ($rows = mysqli_fetch_assoc($results)) {
                                            $product_id = $rows['product_id'];
                                            $productname = $rows['productname'];
                                            $productprice = $rows['productprice'];
                                            $filename = $rows['productimage'];
                                            $description = $rows['productdescription'];
                                            $province = $rows['province'];
                                            $filepath = $rows['filepath'];
                                            $date = $rows['uploaddate'];
                                            $category = $rows['category'];
                                            $datetime = (timeago($date));

                                            echo 
                                            "
                                                <div class='uploaded'>
                                                    <div class='product-image'>
                                                        <a href='view-product.php?entrep_id=".$id."&&id=".$filename."&&product_id=".$product_id."' title='".$productname."'><img src='../Process/Small Entrepreneur/".$filepath."'></a>
                                                    </div>
                                                    <div class='productname'>
                                                        <span class='left-name'>".$productname."</span>
                                                       
                                                        <span class='right-price'> ₱".$productprice."</span>
                                                    </div>
                                                    <div class='description'>
                                                         <span style='float:left; font-size:12px;'>Category: <b>".$category."</b></span><br>
                                                        <p class='content-see-more'>".$description."</p>
                                                        
                                                        
                                                        
                                                        <button class='see-more' onclick='readMore(this)'>See more</button>
                                                    </div>
                                                    <div class='datetime'>
                                                        <p><b><i class='fa-solid fa-map-pin'></i>&nbsp".$province."</b> ⋅ ".$datetime."</p>
                                                    </div>
                                                </div>
                                            ";
                                        
                                        }    
                                    }else{
                                        echo
                                        "
                                            <div class='uploaded'>
                                                <p style='text-align: center; padding: 20px 0;'>No product available</p>
                                            </div>
                                        ";
                                    }
                                    
                                }
                            }
                        

                    
                    ?>
            </div>
        </div>


    </div>

<script>

    function myupgrade() {
    document.getElementById("myup").classList.toggle("show");
    }

    window.addEventListener("click", function(event) {
    if (!event.target.matches('.upgrade')) {
        var updgrade = document.getElementsByClassName("upgrades-info");
        var i;
        for (i = 0; i < updgrade.length; i++) {
        var openupgrades = updgrade[i];
        if (openupgrades.classList.contains('show')) {
            openupgrades.classList.remove('show');
        }
        }
    }
    });

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

    function mynew() {
    document.getElementById("mypremium").classList.toggle("show");
    }

    window.addEventListener("click", function(event) {
    if (!event.target.matches('.adds')) {
        var infos = document.getElementsByClassName("premium-info");
        var i;
        for (i = 0; i < infos.length; i++) {
        var openinfos = infos[i];
        if (openinfos.classList.contains('show')) {
            openinfos.classList.remove('show');
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

    let noOfCharac = 70;
    let contents = document.querySelectorAll(".content-see-more");
    contents.forEach(content => {

        if(content.textContent.length < noOfCharac){
            content.nextElementSibling.style.display = "none";
        }
        else{
            let displayText = content.textContent.slice(0,noOfCharac);
            let moreText = content.textContent.slice(noOfCharac);
            content.innerHTML = `${displayText}<span class="dots">...</span><span class="hide more">${moreText}</span>`;
        }
    });

    function readMore(btn){
        let post = btn.parentElement;
        post.querySelector(".dots").classList.toggle("hide");
        post.querySelector(".more").classList.toggle("hide");
        btn.textContent == "See more" ? btn.textContent = "See less" : btn.textContent = "See more";
    }

</script>

</body>
</html>
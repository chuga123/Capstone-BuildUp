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
    <title>BuildUp - Reseller</title>
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
                                echo "
                                    <button onclick='myupgrade()' class='upgrade'><i class='fa-solid fa-crown'></i> Premium</button>
                                    <div id='myup' class='upgrades-info'>
                                        <p>You are on Premium Version.
                                        <br><i class='fa-solid fa-circle-check'></i> Unlimited Save
                                        </p>
                                    </div>
                                ";
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
                                                <td>Save Products</td>
                                                <td>3</td>
                                                <td>Unlimited</td>
                                            </tr>
                                        </tbody>
                                    </table>";
                                    $check = mysqli_query($conn, "SELECT * FROM reseller WHERE reseller_id=$id");
                                    if(mysqli_num_rows($check) > 0 ){
                                        while($row = mysqli_fetch_array($check)){
                                            $month = $row['month'];
                                            if($month < 1 ){
                                                echo "<br><p>Enjoy 3 months of premium for only ₱150<br> Save ₱50 on your next premium upgrade</p>";
                                                echo "<a data-amount='150' data-fee='0' data-expiry='12' data-description='Payment for 3 months of Premium in BuildUp' data-href='https://getpaid.gcash.com/paynow' data-public-key='pk_3778e656f0582e1368cf8145aaf3348d' onclick='this.href = this.getAttribute('data-href')+'?public_key='+this.getAttribute('data-public-key')+'&amp;amount='+this.getAttribute('data-amount')+'&amp;fee='+this.getAttribute('data-fee')+'&amp;expiry='+this.getAttribute('data-expiry')+'&amp;description='+this.getAttribute('data-description');' href='https://getpaid.gcash.com/paynow?public_key=pk_3778e656f0582e1368cf8145aaf3348d&amp;amount=150&amp;fee=0&amp;expiry=12&amp;description=Payment for 3 months of Premium in BuildUp' target='_blank' class='x-getpaid-button'><img src='https://getpaid.gcash.com/assets/img/paynow.png' width='100px'></a>";
                                                echo "<hr><a href='../Admin/payment-form.php?reseller_id=$id' class='already'>Already Paid</a>";      
                                            }else {
                                                echo "<br><p>Enjoy 3 months of premium for only ₱100</p>";
                                                echo "<a data-amount='100' data-fee='0' data-expiry='12' data-description='Payment for 3 months of Premium in BuildUp' data-href='https://getpaid.gcash.com/paynow' data-public-key='pk_3778e656f0582e1368cf8145aaf3348d' onclick='this.href = this.getAttribute('data-href')+'?public_key='+this.getAttribute('data-public-key')+'&amp;amount='+this.getAttribute('data-amount')+'&amp;fee='+this.getAttribute('data-fee')+'&amp;expiry='+this.getAttribute('data-expiry')+'&amp;description='+this.getAttribute('data-description');' href='https://getpaid.gcash.com/paynow?public_key=pk_3778e656f0582e1368cf8145aaf3348d&amp;amount=100&amp;fee=0&amp;expiry=12&amp;description=Payment for 3 months of Premium in BuildUp' target='_blank' class='x-getpaid-button'><img src='https://getpaid.gcash.com/assets/img/paynow.png' width='100px'></a>";
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
                                        echo "<br><p>Enjoy 3 months of premium for only ₱150<br> Save ₱50 on your next premium upgrade</p>";
                                        echo "<a data-amount='150' data-fee='0' data-expiry='12' data-description='Payment for 3 months of Premium in BuildUp' data-href='https://getpaid.gcash.com/paynow' data-public-key='pk_3778e656f0582e1368cf8145aaf3348d' onclick='this.href = this.getAttribute('data-href')+'?public_key='+this.getAttribute('data-public-key')+'&amp;amount='+this.getAttribute('data-amount')+'&amp;fee='+this.getAttribute('data-fee')+'&amp;expiry='+this.getAttribute('data-expiry')+'&amp;description='+this.getAttribute('data-description');' href='https://getpaid.gcash.com/paynow?public_key=pk_3778e656f0582e1368cf8145aaf3348d&amp;amount=150&amp;fee=0&amp;expiry=12&amp;description=Payment for 3 months of Premium in BuildUp' target='_blank' class='x-getpaid-button'><img src='https://getpaid.gcash.com/assets/img/paynow.png' width='100px'></a>";
                                        echo "<hr><a href='../Admin/payment-form.php?reseller_id=$id' class='already'>Already Paid</a>";      
                                    }else {
                                        echo "<br><p>Enjoy 3 months of premium for only ₱100</p>";
                                        echo "<a data-amount='100' data-fee='0' data-expiry='12' data-description='Payment for 3 months of Premium in BuildUp' data-href='https://getpaid.gcash.com/paynow' data-public-key='pk_3778e656f0582e1368cf8145aaf3348d' onclick='this.href = this.getAttribute('data-href')+'?public_key='+this.getAttribute('data-public-key')+'&amp;amount='+this.getAttribute('data-amount')+'&amp;fee='+this.getAttribute('data-fee')+'&amp;expiry='+this.getAttribute('data-expiry')+'&amp;description='+this.getAttribute('data-description');' href='https://getpaid.gcash.com/paynow?public_key=pk_3778e656f0582e1368cf8145aaf3348d&amp;amount=100&amp;fee=0&amp;expiry=12&amp;description=Payment for 3 months of Premium in BuildUp' target='_blank' class='x-getpaid-button'><img src='https://getpaid.gcash.com/assets/img/paynow.png' width='100px'></a>";
                                        echo "<hr><a href='../Admin/payment-form.php?reseller_id=$id' class='already'>Already Paid</a>";
                                    }
                                }
                            }
                            echo"
                        </div>
                        ";
                    }

                    $id = $_SESSION['reseller_id'];
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
                        <a class="edits-down" href="change-password.php" title="Change password">Change password</a>
                        <button class="sign-out" type="submit" formaction="../Process/log-out.php" name="logout-reseller" title="Sign-out">Sign out</button>
                    </div>
                </form>
            </div>
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
                                <strong><?php echo $_SESSION['success']; ?>&nbsp<i class="fa-solid fa-circle-check"></i></strong>
                            </div>
                        <?php
                        unset($_SESSION['success']);
                    }
                    ?>
                </div>
            </div>
            <div class="fade-out-filter">
                <div>
                    <?php
                        if(isset($_GET['filter']) && $_GET['filter'] == 'All'){
                        }else{
                            echo"
                            <div class='success-filter'>
                                <p><i class='fa-solid fa-map-pin'></i> ".$_GET['filter']."</p>
                            </div>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <!-- RESELLER PLATFORM-->
    <div class="platform">
        <div class="reload">
                <div class="up">
                    <h3><a class="load" href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=All"><i class="fa-solid fa-house"></i></a></h3>
                    <div class="filter">
                        <a class="collection-btn" href="collection.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=<?php echo $_GET['filter'];?>"><button>Collection</button></a>
                        <button id="filters" class="dropbtn">Filter location</button>
                        <div id="divfilters" class="dropdown-content">
                        <ul>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=All">All</a></li>    
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Abra">Abra</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Agusan del Norte">Agusan del Norte</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Agusan del Sur">Agusan del Sur</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Aklan">Aklan</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Antique">Antique</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Apayao">Apayao</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Aurora">Aurora</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Basilan">Basilan</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Bataan">Bataan</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Batanes">Batanes</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Batangas">Batangas</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Benguet">Benguet</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Biliran">Biliran</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Bohol">Bohol</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Bukidnon">Bukidnon</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Bulacan">Bulacan</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Cagayan">Cagayan</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Camarines Norte">Camarines Norte</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Camarines Sur">Camarines Sur</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Camiguin">Camiguin</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Capiz">Capiz</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Catanduanes">Catanduanes</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Cavite">Cavite</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Cebu">Cebu</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Cotabato">Cotabato</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Davao de Oro">Davao de Oro</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Davao del Norte">Davao del Norte</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Davao del Sur">Davao del Sur</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Davao Occidental">Davao Occidental</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Davao Oriental">Davao Oriental</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Dinagat Islands">Dinagat Islands</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Eastern Samar">Eastern Samar</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Guimaras">Guimaras</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Ifugao">Ifugao</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Ilocos Norte">Ilocos Norte</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Ilocos Sur">Ilocos Sur</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Iloilo">Iloilo</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Isabela">Isabela</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Kalinga">Kalinga</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=La Union">La Union</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Laguna">Laguna</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Lanao del Norte">Lanao del Norte</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Lanao del Sur">Lanao del Sur</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Leyte">Leyte</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Maguindanao">Maguindanao</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Marinduque">Marinduque</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Masbate">Masbate</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Misamis Occidental">Misamis Occidental</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Misamis Oriental">Misamis Oriental</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Mountain Province">Mountain Province</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Negros Occidental">Negros Occidental</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Negros Oriental">Negros Oriental</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Northern Samar">Northern Samar</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Nueva Ecija">Nueva Ecija</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Nueva Vizcaya">Nueva Vizcaya</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Occidental Mindoro">Occidental Mindoro</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Oriental Mindoro">Oriental Mindoro</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Palawan">Palawan</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Pampanga">Pampanga</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Pangasinan">Pangasinan</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Quezon">Quezon</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Quirino">Quirino</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Rizal">Rizal</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Romblon">Romblon</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Samar">Samar</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Sarangani">Sarangani</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Siquijor">Siquijor</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Sorsogon">Sorsogon</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=South Cotabato">South Cotabato</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Southern Leyte">Southern Leyte</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Sultan Kudarat">Sultan Kudarat</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Sulu">Sulu</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Surigao del Norte">Surigao del Norte</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Surigao del Sur">Surigao del Sur</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Tarlac">Tarlac</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Tawi-Tawi">Tawi-Tawi</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Zambales">Zambales</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Zamboanga del Norte">Zamboanga del Norte</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Zamboanga del Sur">Zamboanga del Sur</a></li>
                            <li><a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id'];?>&&filter=Zamboanga Sibugay">Zamboanga Sibugay</a></li>
                        </ul>
                        </div>
                    </div>
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
                            
                            if(isset($_GET['filter'])) {
                                $filter = $_GET['filter'];
                                if (($filter) == 'All'){

                                    $favorate = "select category from viewTracker where user_id='$id'  group by category order by count(*) desc";
                                    $fav_res = mysqli_query($conn, $favorate);
                                    
                                    if (mysqli_num_rows($fav_res) > 0) {
                                     while ($rows = mysqli_fetch_assoc($fav_res)) {
                                         $user_favorate = $rows['category'];
                                         break;
                                     }
                                     
                                    $sqla = "SELECT * FROM uploaded_product ORDER BY category='$user_favorate' DESC;";
                                        $results = mysqli_query($conn, $sqla);
                                        if (mysqli_num_rows($results) > 0) {
                                            while ($rows = mysqli_fetch_assoc($results)) {
                                                $product_id = $rows['product_id'];
                                                $entrep_id = $rows['entrep_id'];
                                                $productname = $rows['productname'];
                                                $productprice = $rows['productprice'];
                                                $filename = $rows['productimage'];
                                                $description = $rows['productdescription'];
                                                $province = $rows['province'];
                                                $filepath = $rows['filepath'];
                                                $date = $rows['uploaddate'];
                                                $datetime = (timeago($date));
                                                $category= $rows['category'];
                                                
                                                $sql = "SELECT * FROM entrep WHERE entrep_id=$entrep_id";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $firstname= $row['firstname'];
                                                        $lastname= $row['lastname'];
                                                        $status= $row['status'];
                                                            
                                                        $sqlimg = "SELECT * FROM entrep_profile_pic WHERE entrep_id=$entrep_id";
                                                        $resultimg = mysqli_query($conn, $sqlimg);
                                                        while ($rowimg = mysqli_fetch_assoc($resultimg)) {
                                                            $profile= $rowimg['filepath'];
                                                            echo 
                                                            "
                                                                <div class='uploaded'>
                                                                    <div class='pic'>
                                                                        <img src='../Process/Small Entrepreneur/".$profile."'>
                                                                        <p>".$firstname." ".$lastname."</p>";
                                                                        if($status === "verified"){
                                                                            echo "<i class='fa-solid fa-certificate'></i><i class='fa-solid fa-check'></i>";
                                                                        }
                                                                    echo "
                                                                    </div>
                                                                    <div class='product-image'>
                                                                        <a href='view-product.php?id=".$filename."&reseller_id=".$id."&filter=".$filter."&product_id=".$product_id."&title=".$productname."&category=".base64_encode($category)."'><img src='../Process/Small Entrepreneur/".$filepath."'></a>
                                                                    </div>
                                                                    <div class='productname'>
                                                                        <p class='left-name'>".$productname."</p> 
                                                                        <p class='right-price'> ₱".$productprice."</p>
                                                                    </div>
                                                                    <div class='description'>
                                                                        <span style='float:right; font-size:13px;'>Category: ".$category."</span>
                                                                        <p class='content-see-more'>".$description."</p>
                                                                        <button class='see-more' onclick='readMore(this)'>See more</button>
                                                                    </div>
                                                                    <div class='datetime'>
                                                                        <p><i class='fa-solid fa-map-pin'></i> <b>".$province."</b> ⋅ ".$datetime."</p>
                                                                    </div>
                                                                </div>
                                                            ";
                                                        }
                                                    } 
                                                }
                                            }     
                                        }else{
                                            echo
                                            "
                                                <div class='uploaded'>
                                                    <p style='text-align: center; padding: 20px 0;'>No product available</p>
                                                </div>
                                            ";
                                        }
                                    }else{
                                        $sqla = "SELECT * FROM uploaded_product ORDER BY uploaddate DESC;";
                                        $results = mysqli_query($conn, $sqla);
                                        if (mysqli_num_rows($results) > 0) {
                                            while ($rows = mysqli_fetch_assoc($results)) {
                                                $product_id = $rows['product_id'];
                                                $entrep_id = $rows['entrep_id'];
                                                $productname = $rows['productname'];
                                                $productprice = $rows['productprice'];
                                                $filename = $rows['productimage'];
                                                $description = $rows['productdescription'];
                                                $province = $rows['province'];
                                                $filepath = $rows['filepath'];
                                                $date = $rows['uploaddate'];
                                                $datetime = (timeago($date));
                                                $category= $rows['category'];
                                                
                                                $sql = "SELECT * FROM entrep WHERE entrep_id=$entrep_id";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $firstname= $row['firstname'];
                                                        $lastname= $row['lastname'];
                                                        $status= $row['status'];
                                                            
                                                        $sqlimg = "SELECT * FROM entrep_profile_pic WHERE entrep_id=$entrep_id";
                                                        $resultimg = mysqli_query($conn, $sqlimg);
                                                        while ($rowimg = mysqli_fetch_assoc($resultimg)) {
                                                            $profile= $rowimg['filepath'];
                                                            echo 
                                                            "
                                                                <div class='uploaded'>
                                                                    <div class='pic'>
                                                                        <img src='../Process/Small Entrepreneur/".$profile."'>
                                                                        <p>".$firstname." ".$lastname."</p>";
                                                                        if($status === "verified"){
                                                                            echo "<i class='fa-solid fa-certificate'></i><i class='fa-solid fa-check'></i>";
                                                                        }
                                                                    echo "
                                                                    </div>
                                                                    <div class='product-image'>
                                                                        <a href='view-product.php?id=".$filename."&reseller_id=".$id."&filter=".$filter."&product_id=".$product_id."&title=".$productname."&category=".base64_encode($category)."'><img src='../Process/Small Entrepreneur/".$filepath."'></a>
                                                                    </div>
                                                                    <div class='productname'>
                                                                        <p class='left-name'>".$productname."</p> 
                                                                        <p class='right-price'> ₱".$productprice."</p>
                                                                    </div>
                                                                    <div class='description'>
                                                                        <span style='float:right; font-size:13px;'>Category: ".$category."</span>
                                                                        <p class='content-see-more'>".$description."</p>
                                                                        <button class='see-more' onclick='readMore(this)'>See more</button>
                                                                    </div>
                                                                    <div class='datetime'>
                                                                        <p><i class='fa-solid fa-map-pin'></i> <b>".$province."</b> ⋅ ".$datetime."</p>
                                                                    </div>
                                                                </div>
                                                            ";
                                                        }
                                                    } 
                                                }
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
                                }else{
                                    $favorate = "select category from viewTracker where user_id='$id'  group by category order by count(*) desc";
                                    $fav_res = mysqli_query($conn, $favorate);
                                    
                                    if (mysqli_num_rows($fav_res) > 0) {
                                     while ($rows = mysqli_fetch_assoc($fav_res)) {
                                         $user_favorate = $rows['category'];
                                         break;
                                     }
                                    
                                        $sqla = "SELECT * FROM uploaded_product where province='$filter' ORDER BY category='$user_favorate' DESC";
                                        $results = mysqli_query($conn, $sqla);
                                        if (mysqli_num_rows($results) > 0) {
                                            while ($rows = mysqli_fetch_assoc($results)) {
                                                $product_id = $rows['product_id'];
                                                $entrep_id = $rows['entrep_id'];
                                                $productname = $rows['productname'];
                                                $productprice = $rows['productprice'];
                                                $filename = $rows['productimage'];
                                                $description = $rows['productdescription'];
                                                $province = $rows['province'];
                                                $filepath = $rows['filepath'];
                                                $date = $rows['uploaddate'];
                                                $category = $rows['category'];
                                                $datetime = (timeago($date));
    
                                                $sql = "SELECT * FROM entrep WHERE entrep_id=$entrep_id";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $firstname= $row['firstname'];
                                                        $lastname= $row['lastname'];
                                                        $status= $row['status'];
    
                                                        $sqlimg = "SELECT * FROM entrep_profile_pic WHERE entrep_id=$entrep_id";
                                                        $resultimg = mysqli_query($conn, $sqlimg);
                                                        while ($rowimg = mysqli_fetch_assoc($resultimg)) {
                                                            $profile= $rowimg['filepath'];
                                                            echo 
                                                            "
                                                                <div class='uploaded'>
                                                                    <div class='pic'>
                                                                        <img src='../Process/Small Entrepreneur/".$profile."'>
                                                                        <p>".$firstname." ".$lastname."</p>";
                                                                        if($status === "verified"){
                                                                            echo "<i class='fa-solid fa-certificate'></i><i class='fa-solid fa-check'></i>";
                                                                        }
                                                                    echo "
                                                                    </div>
                                                                    <div class='product-image'>
                                                                        <a href='view-product.php?id=".$filename."&reseller_id=".$id."&filter=".$filter."&product_id=".$product_id."&title=".$productname."&category=".base64_encode($category)."'><img src='../Process/Small Entrepreneur/".$filepath."'></a>
                                                                    </div>
                                                                    <div class='productname'>
                                                                        <p class='left-name'>".$productname."</p> 
                                                                        <p class='right-price'> ₱".$productprice."</p>
                                                                    </div>
                                                                    <div class='description'>
                                                                        <span style='float:right; font-size:13px;'>Category: ".$category."</span>
                                                                        <p class='content-see-more'>".$description."</p>
                                                                        <button class='see-more' onclick='readMore(this)'>See more</button>
                                                                    </div>
                                                                    <div class='datetime'>
                                                                        <p><i class='fa-solid fa-map-pin'></i> <b>".$province."</b> ⋅ ".$datetime."</p>
                                                                    </div>
                                                                </div>
                                                            ";
                                                        }
                                                    } 
                                                } 
                                            }
                                                     
                                        }else{
                                            echo
                                            "
                                                <div class='uploaded'>
                                                    <p style='text-align: center; padding: 20px 0;'>No product available in ".$filter."</p>
                                                </div>
                                            ";
                                        }
                                    }else{
                                        $sqla = "SELECT * FROM uploaded_product where province='$filter' ORDER BY uploaddate DESC";
                                        $results = mysqli_query($conn, $sqla);
                                        if (mysqli_num_rows($results) > 0) {
                                            while ($rows = mysqli_fetch_assoc($results)) {
                                                $product_id = $rows['product_id'];
                                                $entrep_id = $rows['entrep_id'];
                                                $productname = $rows['productname'];
                                                $productprice = $rows['productprice'];
                                                $filename = $rows['productimage'];
                                                $description = $rows['productdescription'];
                                                $province = $rows['province'];
                                                $filepath = $rows['filepath'];
                                                $date = $rows['uploaddate'];
                                                $category = $rows['category'];
                                                $datetime = (timeago($date));
    
                                                $sql = "SELECT * FROM entrep WHERE entrep_id=$entrep_id";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $firstname= $row['firstname'];
                                                        $lastname= $row['lastname'];
                                                        $status= $row['status'];
    
                                                        $sqlimg = "SELECT * FROM entrep_profile_pic WHERE entrep_id=$entrep_id";
                                                        $resultimg = mysqli_query($conn, $sqlimg);
                                                        while ($rowimg = mysqli_fetch_assoc($resultimg)) {
                                                            $profile= $rowimg['filepath'];
                                                            echo 
                                                            "
                                                                <div class='uploaded'>
                                                                    <div class='pic'>
                                                                        <img src='../Process/Small Entrepreneur/".$profile."'>
                                                                        <p>".$firstname." ".$lastname."</p>";
                                                                        if($status === "verified"){
                                                                            echo "<i class='fa-solid fa-certificate'></i><i class='fa-solid fa-check'></i>";
                                                                        }
                                                                    echo "
                                                                    </div>
                                                                    <div class='product-image'>
                                                                        <a href='view-product.php?id=".$filename."&reseller_id=".$id."&filter=".$filter."&product_id=".$product_id."&title=".$productname."&category=".base64_encode($category)."'><img src='../Process/Small Entrepreneur/".$filepath."'></a>
                                                                    </div>
                                                                    <div class='productname'>
                                                                        <p class='left-name'>".$productname."</p> 
                                                                        <p class='right-price'> ₱".$productprice."</p>
                                                                    </div>
                                                                    <div class='description'>
                                                                        <span style='float:right; font-size:13px;'>Category: ".$category."</span>
                                                                        <p class='content-see-more'>".$description."</p>
                                                                        <button class='see-more' onclick='readMore(this)'>See more</button>
                                                                    </div>
                                                                    <div class='datetime'>
                                                                        <p><i class='fa-solid fa-map-pin'></i> <b>".$province."</b> ⋅ ".$datetime."</p>
                                                                    </div>
                                                                </div>
                                                            ";
                                                        }
                                                    } 
                                                } 
                                            }
                                                     
                                        }else{
                                            echo
                                            "
                                                <div class='uploaded'>
                                                    <p style='text-align: center; padding: 20px 0;'>No product available in ".$filter."</p>
                                                </div>
                                            ";
                                        }
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


const targetprofile = document.getElementById("profile");
const profile = document.getElementById("profile-btn");
profile.onclick = function () {
  if (targetprofile.style.display === "block") {
    targetprofile.style.display = "none";
  } else {
    targetprofile.style.display = "block";
  }
};

const targetDiv1 = document.getElementById("divfilters");
const bt1 = document.getElementById("filters");
bt1.onclick = function () {
  if (targetDiv1.style.display === "block") {
    targetDiv1.style.display = "none";
  } else {
    targetDiv1.style.display = "block";
  }
};


let noOfCharac = 100;
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
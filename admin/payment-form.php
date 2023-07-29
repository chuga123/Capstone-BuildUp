<?php
session_start();
include ('../Process/server.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/e0ee1df878.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Style/index.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="../Images/buildup.png">
    <title>BuildUp - Upgrade to Premium</title>
</head>
<body>

    <!-- NAVIGATION BAR -->
    <div class="navigation">
        <div class="sticky">
            <div class="logos">
                <?php
                    if(empty($_GET['reseller_id'])){
                        echo "
                        <a href='../Reseller/home.php?entrep_id=".$_GET['entrep_id']."&&filter=All'><img src='../Images/buildup.png' alt='BuildUp Logo' width='40px' height='40px'><b>&nbspBuildUp</b></a>
                        ";
                    }else {
                        echo "
                        <a href='../Reseller/home.php?reseller_id=".$_GET['reseller_id']."&&filter=All'><img src='../Images/buildup.png' alt='BuildUp Logo' width='40px' height='40px'><b>&nbspBuildUp</b></a>
                        ";
                    }
                ?>
                
            </div>
            <div class="collection-button">
                <?php
                if(!empty($_GET['reseller_id'])){
                    $id = $_GET['reseller_id'];
 
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
                    echo "
                    </div>
                    <div id='profile' class='profile'>
                        <div class='triangle'><i class='fa-solid fa-play'></i></div>
                        <div class='profile-pic'>";
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
                        echo"
                        </div>
                        <div class='colored'>
                            <h4 style='text-align: center;'>";
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
                        echo "
                            </h4>
                            <small>Reseller</small>
                            <p style='padding-left: 10px;'><i class='fa-solid fa-envelope'></i>&nbsp";
                                    $id = $_SESSION['reseller_id'];
                                    $sql = "SELECT * FROM reseller WHERE reseller_id='$id'";
                                    $result = mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)){
                                        $email= $row["email"];
                                            echo $email;
                                        }
                                    }
                        echo"
                            </p>
                            <p style='padding-left: 10px;'><i class='fa-solid fa-phone'></i>&nbsp";
                                    $id = $_SESSION['reseller_id'];
                                    $sql = "SELECT * FROM reseller WHERE reseller_id='$id'";
                                    $result = mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)){
                                        $contact= $row["contact"];
                                            echo '0', $contact;
                                        }
                                    }
                        echo"
                            </p>
                        </div>
                        <form method='post'>
                            <div class='edits'>
                                <a class='edits-up' href='edit-profile.php?reseller_id=".$_SESSION['reseller_id']."&&filter=All' title='Edit Profile'>Edit profile</a>
                                <a class='edits-down' href='change-password.php' title='Change password'>Change password</a>
                                <button class='sign-out' type='submit' formaction='../Process/log-out.php' name='logout-reseller' title='Sign-out'>Sign out</button>
                            </div>
                        </form>
                    </div>";
                }else {
                    $id = $_GET['entrep_id'];
 
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
                    echo "
                    </div>
                    <div id='profile' class='profile'>
                        <div class='triangle'><i class='fa-solid fa-play'></i></div>
                        <div class='profile-pic'>";
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
                        echo"
                        </div>
                        <div class='colored'>
                            <h4 style='text-align: center;'>";
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
                        echo "
                            </h4>
                            <small>entrep</small>
                            <p style='padding-left: 10px;'><i class='fa-solid fa-envelope'></i>&nbsp";
                                    $id = $_SESSION['entrep_id'];
                                    $sql = "SELECT * FROM entrep WHERE entrep_id='$id'";
                                    $result = mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)){
                                        $email= $row["email"];
                                            echo $email;
                                        }
                                    }
                        echo"
                            </p>
                            <p style='padding-left: 10px;'><i class='fa-solid fa-phone'></i>&nbsp";
                                    $id = $_SESSION['entrep_id'];
                                    $sql = "SELECT * FROM entrep WHERE entrep_id='$id'";
                                    $result = mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)){
                                        $contact= $row["contact"];
                                            echo '0', $contact;
                                        }
                                    }
                        echo"
                            </p>
                        </div>
                        <form method='post'>
                            <div class='edits'>
                                <a class='edits-up' href='edit-profile.php?entrep_id=".$_SESSION['entrep_id']."' title='Edit Profile'>Edit profile</a>
                                <a class='edits-down' href='change-password.php' title='Change password'>Change password</a>
                                <button class='sign-out' type='submit' formaction='../Process/log-out.php' name='logout-entrep' title='Sign-out'>Sign out</button>
                            </div>
                        </form>
                    </div>";
                }
            ?>
        </div>
    </div>

    <!-- UPLOAD FORM -->
    <div class="upload-container">
        <form class="upload-form" action="payment.php" method="post" enctype='multipart/form-data'>
            <div class="head">
                <h4>Payment form</h4>
                <?php 
                        if(empty($_SESSION['reseller_id'])){
                            $id = $_SESSION['entrep_id'];
                            echo "<a href='../Small-Entrepreneur/home.php?entrep_id=$id' title='Cancel'>Cancel</a>";
                        }else{
                            $id = $_SESSION['reseller_id'];
                            echo "<a href='../Reseller/home.php?reseller_id=$id&&filter=All' title='Cancel'>Cancel</a>";
                        }
                ?>
            </div>
            <div class="body-form">
                <?php
                    if(isset($_SESSION['failed']))
                    {
                        ?>
                            <div class="failed">
                                <strong><?php echo $_SESSION['failed']; ?></strong>
                            </div>
                        <?php
                    unset($_SESSION['failed']);
                    }
                ?>
                <div class='pic-container'>
                    <div class='product-placeholder' onClick='triggerClick()'>
                        <h4><i class='fa-solid fa-arrow-up-from-bracket'></i></h4>
                    </div>
                    <img src="../Images/blank.png" onClick="triggerClick()" id="productDisplay" title="Add Product Image">
                    <input type="file" name="file" onChange="displayImage(this)" id="file" style="display: none;" accept="Image/png, Image/jpg, Image/jpeg" required>
                    <p>Attach your e-receipt</p>
                </div><br>
                <div class="gcash-inputs">
                    <div class="g-input">
                        <input type="text" name="ref" id="ref" required>
                        <label for="ref">Reference Number</label>
                    </div>     
                    <div class="g-input">
                        <input type="text" name="amount" id="amount" required>
                        <label for="amount">Amount Paid</label>
                    </div> 
                    <div class="g-input">
                        <input type="text" id="start" name="date_paid" placeholder="Date paid" onfocus="(this.type='date')" min="2022-01-01" max="2050-12-31" required>
                    </div>       
                    <div class="g-input">
                        <input type="text" id="appt" onfocus="(this.type='time')" placeholder="Time paid" name="time_paid" required>
                    </div>    
                    <div class="note">                         
                        <p>Note: Double-check the information you have entered.This cannot be undone.</p>
                    </div>
                    <?php 
                        if(empty($_GET['reseller_id'])){
                            echo"
                                <input type='text' name='role' value='Small Entrepreneur' hidden>
                            ";
                        }else{
                            echo"
                                <input type='text' name='role' value='Reseller' hidden>
                            ";         
                        }
                    ?>
                </div>            
                <button type="submit" name="upgrade">Submit</button>
            </div>
        </form>
    </div>   
    


<script>
    const targetprofile = document.getElementById("profile");
    const profile = document.getElementById("profile-btn");
    profile.onclick = function () {
    if (targetprofile.style.display === "block") {
        targetprofile.style.display = "none";
    } else {
        targetprofile.style.display = "block";
    }
    };

    function triggerClick(e) {
    document.querySelector('#file').click();
    }
    function displayImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
        document.querySelector('#productDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
    }
</script>

</body>
</html>
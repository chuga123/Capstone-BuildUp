<?php
session_start();
include ('../Process/server.php');
include ('../Process/active-smallentrep.php');
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
    <title>BuildUp - Get verified</title>
</head>
<body>

    <!-- NAVIGATION BAR -->
    <div class="navigation">
        <div class="sticky">
            <div class="logos">
                <a href="home.php?entrep_id=<?php echo $_SESSION['entrep_id'];?>"><img src="../Images/buildup.png" alt="BuildUp Logo" width="40px" height="40px"><b>&nbspBuildUp</b></a>
            </div>
            <div class="collection-button">
                <?php
                    $id = $_SESSION['entrep_id'];
 
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
                    <p style="padding-left: 10px;"><i class="fa-solid fa-envelope"></i>&nbsp
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
                    <p style="padding-left: 10px;"><i class="fa-solid fa-phone"></i>&nbsp
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
                        <a class="edits-up" href="edit-profile.php?entrep_id=<?php echo $_SESSION['entrep_id'];?>&&filter=All" title="Edit Profile">Edit profile</a>
                        <a class="edits-down" href="change-password.php" title="Change password">Change password</a>
                        <button class="sign-out" type="submit" formaction="../Process/log-out.php" name="logout-entrep" title="Sign-out">Sign out</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- UPLOAD FORM -->
    <div class="upload-container">
        <form class="upload-form" action="../Admin/get-verified.php" method="post" enctype='multipart/form-data'>
            <div class="head">
                <h4>Verification form</h4>
                <a href='../Small-Entrepreneur/home.php?entrep_id=<?php echo $_SESSION['entrep_id']; ?>' title='Cancel'>Cancel</a>
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
                    <img src="../Images/blank.png" onClick="triggerClick()" id="productDisplay" title="Add Valid ID">
                    <input type="file" name="file" onChange="displayImage(this)" id="file" style="display: none;" accept="Image/png, Image/jpg, Image/jpeg" required>
                    <p>Attach a Valid ID</p>
                </div><br>
                <div class="province-containers">
                    <select class="select-box" name="valid_id" required>
                        <option value=""disabled selected>Select your ID</option>
                        <option value="Passport">Passport</option>
                        <option value="Driver's License">Driver's License</option>
                        <option value="National ID">National ID</option>
                        <option value="PhilHealth">PhilHealth</option>
                        <option value="NBI Clearance">NBI Clearance</option>
                        <option value="Police Clearance">Police Clearance</option>
                        <option value="Postal ID">Postal ID</option>
                        <option value="Voter's ID">Voter's ID</option>
                        <option value="Barangay Clearance">Barangay Clearance</option>
                        <option value="GSIS e-card">GSIS e-card</option>
                        <option value="SSS Card">SSS Card</option>
                        <option value="Senior Citizen Card">Senior Citizen Card</option>
                        <option value="OWWA ID">OWWA ID</option>
                        <option value="OFW ID">OFW ID</option>
                    </select>  
                    </div>  
                <div class="gcash-inputs">
                    <div class="g-input">
                        <input type="text" name="firstname" id="first" required>
                        <label for="first">First Name</label>
                    </div> 
                    <div class="g-input">
                        <input type="text" name="lastname" id="last" required>
                        <label for="last">Last Name</label>
                    </div>       
                    <div class="g-input">
                        <input type="text" name="address" id="add" required>
                        <label for="add">Address</label>
                    </div>    
                    <div class="g-input">
                        <input type="text" name="contact" id="cont" required>
                        <label for="cont">Contact</label>
                    </div>    
                    <div class="note">                         
                        <p>Note: Double-check the information you have entered.This cannot be undone.</p>
                    </div>
                </div>            
                <button type="submit" name="verify">Submit</button>
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
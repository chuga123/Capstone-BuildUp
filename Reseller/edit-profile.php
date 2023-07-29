<?php
session_start();
include ('../Process/server.php');
include ('../Process/active-reseller.php');
?>

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
    <title>BuildUp - Edit Profile</title>
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
    <!-- Edit profile form -->
    <div class="upload-container">
        <form class="upload-form" action="../Process/Reseller/edit-profile-process.php" method="post" enctype='multipart/form-data'>
            <div class="head">
                <h4>Edit profile</h4>
                <a href="home.php?reseller_id=<?php echo $_SESSION['reseller_id']?>&&filter=<?php echo $_GET['filter']?>" title="Cancel">Cancel</a>
            </div>
            <div>
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
            </div>
            <div>
            <?php
                include ('../Process/server.php');
                $reseller_id = $_GET['reseller_id'];
                $sql = "SELECT * FROM reseller WHERE reseller_id='$reseller_id'";
                $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];
                        $contact = $row['contact'];
                        $email = $row['email'];

                        $sqla = "SELECT * FROM reseller_profile_pic WHERE reseller_id='$reseller_id'";
                        $results = mysqli_query($conn, $sqla);
                            while ($rows = mysqli_fetch_assoc($results)) {
                                $filepath = $rows['filepath'];
                                $status = $rows['status'];

                                echo "
                                    <div class='body-form'>
                                        <div class='pic-container'>
                                            <div class='img-placeholder' onClick='triggerClick()' title='Change Profile'>
                                                <h4><i class='fa-solid fa-arrow-up-from-bracket'></i></h4>
                                            </div>
                                            <img src='../Process/Reseller/".$filepath."' onClick='triggerClick()' id='profileDisplay' title='Change Profile'>
                                            <input type='file' name='profileImage' onChange='displayImage(this)' id='profileImage' style='display: none;' accept='Image/png, Image/jpg, Image/jpeg'>
                                            <input type='text' name='oldfile' value='$filepath' hidden='hidden'>
                                        </div>
                                        <br>
                                        <p>First Name</p>
                                        <input type='text' name='firstname' value='".$firstname."' id='firstname' required>
                                        <p>Last Name</p>
                                        <input type='text' name='lastname' value='".$lastname."' id='lastname' required>
                                        <p>Mobile No.</p>
                                        <input type='text' name='contact' value='0".$contact."' id='contact' required>
                                        <p>Email</p>
                                        <input type='text' name='email' value='".$email."' id='email' required>
                                        <button type='submit' name='update_profile'>Update profile</button>
                                    </div>
                                    ";
                            }
                    }
            ?>
            </div>
        </form>
    </div>


    <script>
        function triggerClick(e) {
        document.querySelector('#profileImage').click();
        }
        function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
        }
    </script>

</body>
</html>
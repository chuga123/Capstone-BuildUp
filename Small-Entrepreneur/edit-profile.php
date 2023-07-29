<?php
session_start();
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
    <title>BuildUp - Edit Profile</title>
</head>

<body class="bg-smallentrep">

    <!-- NAVIGATION BAR -->
    <div class="navigation">
        <div class="sticky-signinup">
            <div class="logos">
                <a href="home.php?entrep_id=<?php echo $_SESSION['entrep_id'];?>"><img src="../Images/buildup.png" alt="BuildUp Logo" width="40px" height="40px"><b>&nbspBuildUp</b></a>
            </div>
        </div>
    </div>
    <!-- Edit profile form -->
    <div class="upload-container">
        <form class="upload-form" action="../Process/Small Entrepreneur/edit-profile-process.php" method="post" enctype='multipart/form-data'>
            <div class="head">
                <h4>Edit profile</h4>
                <a href="home.php?entrep_id=<?php echo $_SESSION['entrep_id']?>" title="Cancel">Cancel</a>
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
                $entrep_id = $_SESSION['entrep_id'];
                $sql = "SELECT * FROM entrep WHERE entrep_id='$entrep_id'";
                $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];
                        $contact = $row['contact'];
                        $email = $row['email'];

                        $sqla = "SELECT * FROM entrep_profile_pic WHERE entrep_id='$entrep_id'";
                        $results = mysqli_query($conn, $sqla);
                            while ($rows = mysqli_fetch_assoc($results)) {
                                $filepath = $rows['filepath'];
                                $status = $rows['status'];
                            }
                        }
                ?>

                                    <div class="body-form">
                                        <div class="pic-container">
                                            <div class="img-placeholder" onClick="triggerClick()" title="Change Profile">
                                                <h4><i class="fa-solid fa-arrow-up-from-bracket"></i></h4>
                                            </div>
                                            <img src="../Process/Small Entrepreneur/<?php echo $filepath?>" onClick="triggerClick()" id="profileDisplay" title="Change Profile">
                                            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" style="display: none;" accept="Image/png, Image/jpg, Image/jpeg">
                                            <input type="text" name="oldfile" value="<?php echo $filepath?>" hidden="hidden">
                                            <div>
                                                <?php
                                                    if(isset($_SESSION['error-pic']))
                                                    {
                                                        ?>
                                                            <div class="failed-pic">
                                                                <strong><?php echo $_SESSION['error-pic']; ?></strong>
                                                            </div>
                                                        <?php
                                                    unset($_SESSION['error-pic']);
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="top">
                                            <p>First Name</p>
                                            <input type="text" name="firstname" value="<?php echo $firstname?>" id="firstname" required>
                                            <div class="down">
                                                    <?php
                                                        if(isset($_SESSION['error1']))
                                                        {
                                                            ?>
                                                                <div class="failed-profile">
                                                                    <strong><?php echo $_SESSION['error1']; ?></strong>
                                                                </div>
                                                            <?php
                                                        unset($_SESSION['error1']);
                                                        }
                                                    ?>
                                            </div>
                                        </div>
                                        <div class="top">
                                            <p>Last Name</p>
                                            <input type="text" name="lastname" value="<?php echo $lastname?>" id="lastname" required>
                                                <div class="down">
                                                    <?php
                                                        if(isset($_SESSION['error2']))
                                                        {
                                                            ?>
                                                                <div class="failed-profile">
                                                                    <strong><?php echo $_SESSION['error2']; ?></strong>
                                                                </div>
                                                            <?php
                                                        unset($_SESSION['error2']);
                                                        }
                                                    ?>
                                                </div>
                                        </div>
                                        <div class="top">
                                            <p>Mobile No.</p>
                                            <input type="text" name="contact" value="0<?php echo $contact?>" id="contact" required>
                                                <div class="down">
                                                    <?php
                                                        if(isset($_SESSION['error3']))
                                                        {
                                                            ?>
                                                                <div class="failed-profile">
                                                                    <strong><?php echo $_SESSION['error3']; ?></strong>
                                                                </div>
                                                            <?php
                                                        unset($_SESSION['error3']);
                                                        }
                                                    ?>
                                                </div>
                                        </div>
                                        <div class="top">
                                            <p>Email</p>
                                            <input type="text" name="emailcheck" value="<?php echo $email?>" id="email" disabled="true">
                                            <input type="text" name="email" value="<?php echo $email?>" id="email" hidden>
                                            <div class="down">
                                                    <?php
                                                        if(isset($_SESSION['error4']))
                                                        {
                                                            ?>
                                                                <div class="failed-profile">
                                                                    <strong><?php echo $_SESSION['error4']; ?></strong>
                                                                </div>
                                                            <?php
                                                        unset($_SESSION['error4']);
                                                        }
                                                    ?>
                                                </div>
                                        <div>
                                        <button type="submit" name="update_profile">Update profile</button>
                                    </div>

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
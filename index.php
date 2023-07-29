<?php
session_start();
date_default_timezone_set("Asia/Manila");
error_reporting(0);
include('Process/server.php');

//Sign up validation and insert to database Small Entrepreneur

if(isset($_POST['continue'])){

    $names=$_REQUEST['name'];
    if(empty($names)){
        $_SESSION['error1'] = "Name cannot be empty";
    } else if(!filter_var($names, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $_SESSION['error1'] = "Not a valid name";
    } else if(ctype_space($names)){
        $_SESSION['error1'] = "Not a valid name";
    } else if(ctype_digit($names)){
        $_SESSION['error1'] = "Number is not valid";
    } else {
        $name=$names;
    }

    if($name==""){
    }else{
        $currenttime = time();
        $date = date("m-d-Y h:i:sa");
        $sql = "INSERT INTO recommender_user (name, date) 
                VALUES ('$name', '$date')";
                if (mysqli_query($conn, $sql)) {
                  $sqla = "SELECT * FROM recommender_user WHERE name='$name' AND date='$date'";
                  $result = mysqli_query($conn, $sqla);
                    if(mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)){
                        $user = $row['user_id'];
                        $_SESSION ['user']= $row['user_id'];
                        $_SESSION ['name']= $row['name'];
                        $_SESSION ['date']= $row['date'];
                        header ("Location: Recommender/recommender.php?user=$user");
                      }
                    }else{
                      echo "Error: " . mysqli_error($conn);
                    }
                }else {
                    echo "Error: " . mysqli_error($conn);
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
    <link rel="stylesheet" type="text/css" href="Style/index.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="Images/buildup.png">
    <title>BuildUp</title>
</head>
    <!--HOMEPAGE including the RECOMMENDER-->
<body class="bg-homepage">
    <div class="background-picture">
      <img src="Images/homepage.png">
    </div>
    <!-- NAVIGATION BAR -->
    <div class="navigation-homepage">
        <div class="sticky-signinup">
            <div class="logos">
                <a href="../"><img src="Images/buildup.png" alt="BuildUp Logo"><b>&nbspBuildUp</b></a>
            </div>
        </div>
    </div>

    <!--CONTENT OF THE BODY-->
    <div class="homepage-content">
        <!--title-->
        <div class="homepage-title">
          <div class="homepage-text">
            <h1>BuildUp</h1>
            <p>A big business starts small. <i>- Richard Branson</i></p>
          </div>
        </div>
        <div class="photo-credits">
          <p>Photo by <a target="blank" href="https://unsplash.com/@agk42">Alex Knight</a></p>
        </div>

        <!--cards-->
        <div class="cards">
          <div class="container">
            <div class="card">
              <div class="card__body">
                <h4><i class="fa-solid fa-handshake-simple"></i></h4>
                <p>Easy access platform for Small Business Entrepreneur, post your product and gain plenty of resellers to increase your profit and widen your business.</p>
              </div>
            </div>
            <div class="card">
              <div class="card__body">
                <h4><i class="fa-solid fa-hand-holding-dollar"></i></h4>
                <p>Having a platform that helps resellers to find products that they can easily resell is our priority, increase your income through reselling bunch of products.</p>
              </div>
            </div>
            <div class="card">
              <div class="card__body">
                <h4><i class="fa-solid fa-city"></i></h4>
                <p>Recommend you a great small business that fits on how much capital do you have, also based on what line of business you are interested or willing to try.</p>
              </div>
            </div>
            <div class="card">
              <div class="card__body">
                <h4><i class="fa-solid fa-network-wired"></i></h4>
                <p>A place where you can find business partners and resellers which plays a major role in expanding your idea.</p>
              </div>
            </div>
          </div>
        </div>

        <!--button-->
        <div class="homepage-choice">
            <div class="choice-container">
              <div class="position">
                <div class="choice">
                  <h4>Small Entrepreneur</h4>
                  <p>Start uploading your products to expand your business through gaining more resellers. Increase your profit using this platform. You are one step away to level up your business.</p>
                  <a href="Small-Entrepreneur/sign-in.php">Start now <i class="fa-solid fa-angles-right"></i></a>
                </div>
              </div>
              <div class="position">
                <div class="choice">
                  <h4>Reseller</h4>
                  <p>Start getting products that you want to resell from different provinces. Products are awaiting for you to resell. You are one step away to increase your income.</p>
                  <a href="Reseller/sign-in.php">Start now <i class="fa-solid fa-angles-right"></i></a>
                </div>
              </div>
            </div>
        </div>
 
      <form action="index.php" method="post">
        <div class="recommender-content">
          <h3>Small Business Recommender</h3>
          <p>Confused what business is suitable for you? We're here to assist you, enter your name and click the button below to start.</p><br>
          <div class="horizontal">
            <div class="inputs">
              <div>
                <input type="text" id="name" name="name" required>
                <label for="name">Name</label>
                <small>              
                  <?php
                    if(isset($_SESSION['error1'])){
                        ?>
                          <div class="failed">
                            <strong><?php echo $_SESSION['error1']; ?></strong>
                          </div>
                        <?php
                      unset($_SESSION['error1']);
                    }
                  ?>
                </small>
              </div>
            </div>
            <div class="continue">
              <button type="submit" name="continue">Proceed <i class="fa-solid fa-angles-right"></i></button>
            </div>
          </div>
        </div>
      </form>
    </div>

    <!--FOOTER-->
    <footer class="footer">
      <div class="links">
        <a href="#">About</a>
			  <a href="#">Contact</a>
      </div>
      <div class="copy-right">
        <p>Copyrightright @ 2022 BuildUp</p>
      </div>
    </footer>



</body>
</html>
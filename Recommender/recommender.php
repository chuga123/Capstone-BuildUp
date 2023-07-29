<?php
session_start();
include ('../Process/server.php');
$user = $_GET['user'];
$names = $_SESSION['name'];
$date = $_SESSION ['date'];
if(($_SESSION['name'] == "")&&($_SESSION['date'] == "")){
    header ("Location: Homepage.php?Enter-your-name");
}else{
    $sql = "SELECT user_id FROM recommender_user WHERE name='$names' AND date='$date'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row ['user_id'];
            $_SESSION['id']=$id;
            if($id == $user){
            }else{
                header ("Location: index.php?Fill-out form first! ");
                die();
            }
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
    <title>BuildUp - Small Business Recommender</title>
</head>

<body class="bg-reseller">

    <!-- NAVIGATION BAR -->
    <div class="navigation-rec">
        <div class="sticky-collection">
            <div class="logos">
                <a href="../index.php"><img src="../Images/buildup.png" alt="BuildUp Logo" width="40px" height="40px"><b>&nbspBuildUp</b></a>
            </div> 
        </div>
    </div>

    <!-- Reccomender system -->
    <div class="recommender-body">
        <div class="backs">
            <p><a href="../index.php"><i class="fa-solid fa-arrow-left-long"></i></a>&nbspHomepage</p>    
        </div>  
        <div class="recommender-filter">
                <div class="rights">  
                    <?php 
                        if(empty($_GET['lineofbusiness'])){
                            echo" 
                            <div class='pos1'>  
                                <button id='filterone'>Line of Business <i class='fa-solid fa-sort-down'></i></button>
                                <div id='divone' class='lob'>";
                                    $sql = 'SELECT distinct line_of_business FROM businesses';
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $lob = $row['line_of_business'];
                                            echo "
                                                <a href='recommender.php?user=".$id."&&lineofbusiness=".$lob."'>$lob</a>
                                                ";
                                        }
                                    }
                                echo "
                                </div>
                            </div>
                                ";
                        }else{
                            $line = $_GET['lineofbusiness'];
                            echo "
                            <div class='reset'>
                                <a href='recommender.php?user=".$_SESSION['id']."'>Reset</a>
                            </div> 
                            <div class='selected-range'>
                                <span>$line</span>
                            </div>
                            <div class='pos2'>  
                                <button id='filterone'>Capital Range <i class='fa-solid fa-sort-down'></i></button>
                                <div id='divone' class='cr'>";
                                $sql = "SELECT * FROM businesses WHERE line_of_business='$line'AND costing BETWEEN 0 AND 1000";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                   echo "
                                        <a href='recommender.php?user=".$_SESSION['id']."&&lineofbusiness=".$_GET['lineofbusiness']."&&capitalrange=0to1000'>₱1000 below</a>
                                        ";
                                }
                                $sql = "SELECT * FROM businesses WHERE line_of_business='$line'AND costing BETWEEN 1001 AND 4000";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                   echo "
                                        <a href='recommender.php?user=".$_SESSION['id']."&&lineofbusiness=".$_GET['lineofbusiness']."&&capitalrange=1001to4000'>₱1001 to ₱4000</a>
                                        ";
                                }
                                $sql = "SELECT * FROM businesses WHERE line_of_business='$line'AND costing BETWEEN 4001 AND 7000";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                   echo "
                                        <a href='recommender.php?user=".$_SESSION['id']."&&lineofbusiness=".$_GET['lineofbusiness']."&&capitalrange=4001to7000'>₱4001 to ₱7000</a>
                                        ";
                                }
                                $sql = "SELECT * FROM businesses WHERE line_of_business='$line'AND costing BETWEEN 7001 AND 10000";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                   echo "
                                        <a href='recommender.php?user=".$_SESSION['id']."&&lineofbusiness=".$_GET['lineofbusiness']."&&capitalrange=7001to10000'>₱7001 to ₱10000</a>
                                        ";
                                }
                        echo "
                            </div>
                        </div>
                            ";

                        }
                    ?>
                </div> 
        </div>
        <?php
            if(empty($_GET['lineofbusiness']) && empty($_GET['capitalrange'])){
            }else if(!empty($_GET['lineofbusiness']) && empty($_GET['capitalrange'])){
                echo "
                <div class='recommendedr-display'>
                    <div class='recommender-choice'>
                        <span><h3><b>".$_GET['lineofbusiness']."</b></h3></span>
                    </div>
                </div>";
            }else{
                $range= $_GET['capitalrange'];
                $capital = explode("to", $range);
                $cr1 = $capital[0];
                $cr2 = $capital[1];
                echo "
                <div class='recommendedr-display'>
                    <div class='recommender-choice'>
                        <span><h3><b>".$_GET['lineofbusiness']."</b> ranges from <b>₱".$cr1."</b> to <b>₱".$cr2."</b></h3></span>
                    </div>
                </div>";
            }
        ?>
        <div class='recommender-container'>
            <div class='recommender-row'>
                <?php

                    if(empty($_GET['lineofbusiness']) && empty($_GET['capitalrange'])){
                        $sql = "SELECT * FROM businesses ORDER BY rand()";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $businessid = $row['business_id'];
                                $lineofbusiness = $row['line_of_business'];
                                $businessname = $row['business_name'];
                                $image = $row['image'];
                                $costing = $row['costing'];
                                $blikes = $row['likes'];
                                echo "
                                    <a href='view-business.php?user=$id&&business_id=$businessid'>
                                        <div class='recommender-column'>
                                            <div class='recommender-card'>
                                                <div class='image'>
                                                    <img src='../Recommender Images/$image'>
                                                </div>
                                                <div class='name-price'>
                                                    <p>$businessname</p>
                                                    <b>₱ $costing.00</b>
                                                    <span>$blikes <i class='fa-solid fa-heart'></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    ";
                            }
                        }

                    }else if(!empty($_GET['lineofbusiness']) && empty($_GET['capitalrange'])){
                        $lineofb = $_GET['lineofbusiness'];
                        $sql = "SELECT * FROM businesses WHERE line_of_business='$lineofb' order by rand()";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $businessid = $row['business_id'];
                                $lineofbusiness = $row['line_of_business'];
                                $businessname = $row['business_name'];
                                $image = $row['image'];
                                $costing = $row['costing'];
                                $blikes = $row['likes'];
                                echo "
                                    <a href='view-business.php?user=$id&&business_id=$businessid'>
                                        <div class='recommender-column'>
                                            <div class='recommender-card'>
                                                <div class='image'>
                                                    <img src='../Recommender Images/$image'>
                                                </div>
                                                <div class='name-price'>
                                                    <p>$businessname</p>
                                                    <b>₱ $costing.00</b>
                                                    <span>$blikes <i class='fa-solid fa-heart'></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    ";
                            }
                        }
    
                    }else{
                        $lineofb = $_GET['lineofbusiness'];
                        $range= $_GET['capitalrange'];
                        $capital = explode("to", $range);
                        $cr1 = $capital[0];
                        $cr2 = $capital[1];
                        $sql = "SELECT * FROM businesses WHERE line_of_business='$lineofb' AND costing BETWEEN $cr1 AND $cr2 order by costing";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $businessid = $row['business_id'];
                                $lineofbusiness = $row['line_of_business'];
                                $businessname = $row['business_name'];
                                $image = $row['image'];
                                $costing = $row['costing'];
                                $blikes = $row['likes'];
                                echo "
                                    <a href='view-business.php?user=$id&&business_id=$businessid'>
                                        <div class='recommender-column'>
                                            <div class='recommender-card'>
                                                <div class='image'>
                                                    <img src='../Recommender Images/$image'>
                                                </div>
                                                <div class='name-price'>
                                                    <p>$businessname</p>
                                                    <b>₱ $costing.00</b>
                                                    <span>$blikes <i class='fa-solid fa-heart'></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    ";
                            }
                        }
                    
                    }
                ?>
            </div>
        
        </div>
    </div>

<script>
    const divone = document.getElementById("divone");
    const filterone = document.getElementById("filterone");
    filterone.onclick = function () {
    if (divone.style.display === "block") {
        divone.style.display = "none";
    } else {
        divone.style.display = "block";
    }
    };

</script>

</body>
</html>
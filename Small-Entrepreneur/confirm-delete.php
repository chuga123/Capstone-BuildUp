<?php
session_start();
include ('../Process/server.php');
include ('../Process/active-smallentrep.php');
$product_id = $_GET['product_id'];
$productimage = $_GET['id'];
$sql = "SELECT * FROM uploaded_product WHERE productimage='$productimage' AND product_id='$product_id'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) {
}else{
    header ("Location: ../Small-Entrepreneur/home.php?entrep_id=".$entrep_id."&&Product does not exist ");
    die();
}

?>

<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=devide-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e0ee1df878.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Style/index.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="../Images/buildup.png">
    <title>BuildUp - Edit Product</title>
</head>

<body class="bg-smallentrep">

    <?php
                $product_id = $_GET['product_id'];
                $productimage = $_GET['id'];
                $id = $_GET['entrep_id'];
                $sql = "SELECT * FROM uploaded_product WHERE productimage='$productimage' AND product_id='$product_id'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)){
                        $productname = $row['productname'];
                        $filepath = $row['filepath'];
                        }
                }else{
                    echo error_reporting(E_ALL);
                }

    ?>

    <!-- NAVIGATION BAR -->
    <div class="navigation">
        <div class="sticky-signinup">
            <div class="logos">
                <a href="home.php?entrep_id=<?php echo $_SESSION['entrep_id'];?>"><img src="../Images/buildup.png" alt="BuildUp Logo" width="40px" height="40px"><b>&nbspBuildUp</b></a>
            </div>
        </div>
    </div>

    <!-- EDIT PRODUCT -->
    <div class="upload-container">
        <form class="upload-form">
            <div class="head">
                <h4>Delete Product</h4>
            </div>
            <div class="delete-confirm">
                <p>Are you sure you want to remove this product?</p>
                <div class="box">
                    <div class="image-holder">
                        <img src="../Process/Small Entrepreneur/<?php echo $filepath?>">
                    </div>
                    <div class="name">
                        <b><?php echo $productname?></b>
                    </div>
                </div>
                <div class="delete-btn">
                    <a class="right" href="../Process/Small Entrepreneur/delete-product.php?entrep_id=<?php echo $id?>&&id=<?php echo $productimage?>&&product_id=<?php echo $product_id?>">Delete</a>
                    <a class="left" href="view-product.php?entrep_id=<?php echo $_GET['entrep_id']?>&&id=<?php echo $_GET['id']?>&&product_id=<?php echo $_GET['product_id']?>" title="Cancel">Cancel</a>
                </div>
            </div><br><br>
        </form>
    </div>

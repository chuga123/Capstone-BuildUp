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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Style/index.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="../Images/buildup.png">
    <title>BuildUp - View Product</title>
</head>

<body class="bg-smallentrep">
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

    <div class="view-product-container">
        <?php 
            include ('../Process/server.php');


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
            $product_id = $_GET['product_id'];
            $productimage = $_GET['id'];
            $id = $_GET['entrep_id'];
            $sql = "SELECT * FROM uploaded_product WHERE productimage='$productimage' AND product_id='$product_id'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                    $productname = $row['productname'];
                    $productprice = $row['productprice'];
                    $description = $row['productdescription'];
                    $filename = $row['productimage'];
                    $province = $row['province'];
                    $filepath = $row['filepath'];
                    $date = $row['uploaddate'];

                    $datetime = (timeago($date));

                    }
            }else{
                echo error_reporting(E_ALL);
            }
        ?>
            <div class="view-product">
                <div class="view-image">
                    <img src="../Process/Small Entrepreneur/<?php echo $filepath?>">
                    <div class="close">
                        <a href="home.php?entrep_id=<?php echo $id?>"><i class="fa-solid fa-xmark"></i></a>
                    </div>
                </div>
                <div class="view-info">
                    <div class="view-name-price">
                        <p class="p"><?php echo $productname ?> ⋅  ₱<?php echo $productprice ?></p>
                    </div>
                    <div class="option">
                        <button onclick="myFunction()" class="buttons"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                        <div id="myoptions" class="options">
                            <a class="edit" href="edit-product.php?entrep_id=<?php echo $id?>&&id=<?php echo $filename?>&&product_id=<?php echo $product_id?>" title="Edit"><i class="fa-solid fa-pen"></i> Edit</a>
                            <a class="delete" href="confirm-delete.php?entrep_id=<?php echo $id?>&&id=<?php echo $filename?>&&product_id=<?php echo $product_id?>" title="Delete"><i class="fa-solid fa-trash"></i> Delete</a>
                        </div>
                    </div>
                    <div class="view-time-location">
                        <p><b><i class="fa-solid fa-map-pin"></i> <?php echo $province?> ⋅ </b><?php echo  $datetime?></p>
                    </div>
                    <div class="view-description">
                        <p><?php echo $description?></p>
                    </div>
                </div>
            </div>
    </div>

<script>
    function myFunction() {
    document.getElementById("myoptions").classList.toggle("show");
    }

    window.onclick = function(event) {
    if (!event.target.matches('.buttons')) {
        var dropdowns = document.getElementsByClassName("options");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
        }
        }
    }
    }
</script>

</body>
</html>
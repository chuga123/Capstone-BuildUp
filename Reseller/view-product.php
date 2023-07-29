<?php
session_start();
date_default_timezone_set("Asia/Manila");
include ('../Process/server.php');
include ('../Process/active-reseller.php');


$ids = $_SESSION['reseller_id'];
$currenttime = time();
$date = date("Y-m-d h:i:sa");
$user_id = $_GET['reseller_id'];
$product_id = $_GET['product_id'];
$category = base64_decode($_GET['category']);


    $res = "SELECT * FROM viewTracker WHERE user_id=$user_id";
    $ress = mysqli_query($conn, $res);
    if(mysqli_num_rows($ress) > 1){
        $resss = "DELETE FROM viewTracker WHERE user_id=$user_id";
        $ressss = mysqli_query($conn, $resss);
        $result = mysqli_query($conn, "INSERT INTO viewTracker(user_id,product_id,category,date) values ('$user_id','$product_id','$category','$date')");
    }else{
    $result = mysqli_query($conn, "INSERT INTO viewTracker(user_id,product_id,category,date) values ('$user_id','$product_id','$category','$date')");
    }

if (isset($_POST['saved'])) {
    $postid = $_POST['postid'];
    $result = mysqli_query($conn, "SELECT * FROM uploaded_product WHERE product_id='$postid'");
    $row = mysqli_fetch_array($result);
    $save = $row['save'];
    $posts = mysqli_query($conn, "SELECT * FROM saved_product_limit WHERE product_id=$postid AND reseller_id=$ids");
        if (mysqli_num_rows($posts) > 0){
            $insert = "INSERT INTO saved_product SET reseller_id='$ids', product_id='$postid', saved_date='$date'";
            $query_insert = $conn->prepare( $insert );
            $query_insert->execute();
            mysqli_query($conn, "UPDATE uploaded_product SET save=$save+1 WHERE product_id=$postid");
            echo $save+1;
        }else {
            $inserts = "INSERT INTO saved_product_limit SET reseller_id='$ids', product_id='$postid', saved_date='$date'";
            $query_inserts = $conn->prepare( $inserts );
            $query_inserts->execute();
            $insert = "INSERT INTO saved_product SET reseller_id='$ids', product_id='$postid', saved_date='$date'";
            $query_insert = $conn->prepare( $insert );
            $query_insert->execute();
            mysqli_query($conn, "UPDATE uploaded_product SET save=$save+1 WHERE product_id=$postid");
            echo $save+1;
        }
}
if (isset($_POST['unsaved'])) {
    $postid = $_POST['postid'];
    $result = mysqli_query($conn, "SELECT * FROM uploaded_product WHERE product_id=$postid");
    $row = mysqli_fetch_array($result);
    $save = $row['save'];


    $delete = "DELETE FROM saved_product WHERE product_id='$postid' AND reseller_id='$ids'";
    $query_insert = $conn->prepare( $delete );
    $query_insert->execute();
    mysqli_query($conn, "UPDATE uploaded_product SET save=$save-1 WHERE product_id=$postid");
    
    echo $save-1;
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=devide-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e0ee1df878.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Style/index.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="../Images/buildup.png">
    <title>BuildUp - View Product</title>
</head>

<body class="bg-smallentrep">
    <div class='fade-out-view-save'>
        <?php
            if(isset($_SESSION['success'])){
            ?>
                <div class='saved'>
                    <strong><?php echo $_SESSION['success']; ?></strong>
                </div>
            <?php
                unset($_SESSION['success']);
            }
        ?>
    </div>
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
            $filter = $_GET['filter'];
            $product_id = $_GET['product_id'];
            $productimage = $_GET['id'];
            $id = $_SESSION['reseller_id'];
            $sql = "SELECT * FROM uploaded_product WHERE productimage='$productimage' AND product_id='$product_id'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                    $entrep_id = $row['entrep_id'];
                    $productname = $row['productname'];
                    $productprice = $row['productprice'];
                    $description = $row['productdescription'];
                    $filename = $row['productimage'];
                    $province = $row['province'];
                    $filepath = $row['filepath'];
                    $date = $row['uploaddate'];
                    $save= $row['save'];

                    $datetime = (timeago($date));
                    $sql = "SELECT * FROM entrep WHERE entrep_id=$entrep_id";
                    $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $firstname= $row['firstname'];
                            $lastname= $row['lastname'];
                            $contact= $row['contact'];
                            $email= $row['email'];

                            $sqlimg = "SELECT * FROM entrep_profile_pic WHERE entrep_id=$entrep_id";
                            $resultimg = mysqli_query($conn, $sqlimg);
                            while ($rowimg = mysqli_fetch_assoc($resultimg)) {
                                $profile= $rowimg['filepath'];

                                echo "
                                <div class='view-product'>
                                    <div class='view-image'>
                                        <img src='../Process/Small Entrepreneur/".$filepath."'>
                                        <div class='close'>
                                            <a href='home.php?reseller_id=".$id."&&filter=".$filter."'><i class='fa-solid fa-xmark'></i></a>
                                        </div>
                                    </div>
                                    <div class='view-info'>
                                        <div class='view-name-price'>
                                            <p class='p'>".$productname."  ⋅  ₱".$productprice."</p>
                                            <div class='edit-product'>";
                                                $posts = mysqli_query($conn, "SELECT * FROM saved_product WHERE product_id=$product_id AND reseller_id=$id");
                                                if (mysqli_num_rows($posts) > 0 ){
                                                    $limit = mysqli_query($conn, "SELECT * FROM saved_product_limit WHERE reseller_id=$id");
                                                    if(mysqli_num_rows($limit) < 3){
                                                        echo "
                                                            <span class='unsave fa-solid fa-bookmark' data-id='$product_id' title='Unsave'></span> 
                                                            <span class='save hide fa-regular fa-bookmark' data-id='$product_id'title='Save to collection'></span>
                                                            ";
                                                    } else{
                                                        $check = mysqli_query($conn, "SELECT * FROM reseller WHERE reseller_id=$id");
                                                        if(mysqli_num_rows($check) > 0 ){
                                                            while($row = mysqli_fetch_array($check)){
                                                                $premium = $row['plan'];
                                                                if($premium == 'premium') {
                                                                    echo "
                                                                    <span class='unsave fa-solid fa-bookmark' data-id='$product_id' title='Unsave'></span> 
                                                                    <span class='save hide fa-regular fa-bookmark' data-id='$product_id'title='Save to collection'></span>
                                                                    ";
                                                                } else {
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
                                                        }
                                                    }
                                                }else{
                                                    $limit = mysqli_query($conn, "SELECT * FROM saved_product_limit WHERE reseller_id=$id");
                                                    if(mysqli_num_rows($limit) >= 3){
                                                        $check = mysqli_query($conn, "SELECT * FROM reseller WHERE reseller_id=$id");
                                                        if(mysqli_num_rows($check) > 0 ){
                                                            while($row = mysqli_fetch_array($check)){
                                                                $premium = $row['plan'];
                                                                if($premium == 'premium') {
                                                                    echo "
                                                                        <span class='save fa-regular fa-bookmark' data-id='$product_id' title='Save to collection'></span> 
                                                                        <span class='unsave hide fa-solid fa-bookmark' data-id='$product_id' title='Unsave'></span> 
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
                                                        }
                                                    } else{
                                                        echo "
                                                            <span class='save fa-regular fa-bookmark' data-id='$product_id' title='Save to collection'></span> 
                                                            <span class='unsave hide fa-solid fa-bookmark' data-id='$product_id' title='Unsave'></span> 
                                                        ";
                                                    }
                                                }
                                        echo"
                                            </div>
                                        </div>
                                        <div class='view-description'>
                                            <p>".$description."</p>
                                        </div>
                                        <div class='view-time-location'>
                                            <p><b><i class='fa-solid fa-map-pin'></i> ".$province." ⋅ </b>".$datetime."</p>
                                        </div>
                                        <div class='seller'>
                                            <p class='seller-cont'>Seller Contact Information</p>
                                            <div class='pic'>
                                                <img src='../Process/Small Entrepreneur/".$profile."'>
                                                <p>".$firstname."&nbsp".$lastname."</p>
                                            </div><br>
                                            <div class='info'>
                                            <p class='cont'><i style='color:#00aeff;' class='fa-solid fa-envelope'></i> Email &nbsp :&nbsp".$email."</p>
                                            <p class='cont'><i style='color:#2eb232;' class='fa-solid fa-phone'></i> Mobile :&nbsp0".$contact."</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                            }
                        }
                    }
                }else{
                    echo error_reporting(E_ALL);
                }
        ?>
    </div>


<script>

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

	$(document).ready(function(){
		$('.save').on('click', function(){
			var postid = $(this).data('id');
			    $post = $(this);

			$.ajax({
				url: 'view-product.php',
				type: 'post',
				data: {
					'saved': 1,
					'postid': postid
				},
				success: function(response){
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});

		$('.unsave').on('click', function(){
			var postid = $(this).data('id');
		    $post = $(this);

			$.ajax({
				url: 'view-product.php',
				type: 'post',
				data: {
					'unsaved': 1,
					'postid': postid
				},
				success: function(response){
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});
	});
</script>

    
</body>
</html>
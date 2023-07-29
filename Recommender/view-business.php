<?php
session_start();
date_default_timezone_set("Asia/Manila");
include ('../Process/server.php');

$ids = $_SESSION['user'];
$currenttime = time();
$date = date("m-d-Y h:i:sa");

if (isset($_POST['liked'])) {
    $postid = $_POST['postid'];
    $result = mysqli_query($conn, "SELECT * FROM businesses WHERE business_id=$postid");
    $row = mysqli_fetch_array($result);
    $likes = $row['likes'];

    $insert = "INSERT INTO liked_business SET recommender_user='$ids', business_id='$postid', liked_time='$date'";
    $query_insert = $conn->prepare( $insert );
    $query_insert->execute();
    mysqli_query($conn, "UPDATE businesses SET likes=$likes+1 WHERE business_id=$postid");
    echo $likes+1;
    exit();
}
if (isset($_POST['unliked'])) {
    $postid = $_POST['postid'];
    $result = mysqli_query($conn, "SELECT * FROM businesses WHERE business_id=$postid");
    $row = mysqli_fetch_array($result);
    $likes = $row['likes'];


    $delete = "DELETE FROM liked_business WHERE business_id='$postid' AND recommender_user='$ids'";
    $query_insert = $conn->prepare( $delete );
    $query_insert->execute();
    mysqli_query($conn, "UPDATE businesses SET likes=$likes-1 WHERE business_id=$postid");
    
    echo $likes-1;
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
    <title>BuildUp - Small Business Recommender</title>
</head>

<body class="bg-reseller">

    <!-- NAVIGATION BAR -->
    <div class="navigation">
        <div class="sticky-collection">
            <div class="logos">
                <a href="../"><img src="../Images/buildup.png" alt="BuildUp Logo" width="40px" height="40px"><b>&nbspBuildUp</b></a>
            </div>
        </div>
    </div>

    <?php 
        $business_id = $_GET['business_id'];
        $reco_user =  $_SESSION['user'];
        $sql = "SELECT * FROM businesses WHERE business_id=$business_id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $lob = $row['line_of_business'];
                $bn = $row['business_name'];
                $bimage = $row['image'];
                $bim = $row['ingredients_materials'];
                $bmethod = $row['method'];
                $bcosting= $row['costing'];
                $blink= $row['source'];
                $blikes= $row['likes'];
            }
        }
    ?>
    <div class="print">
        <button onclick="myfunction()">Print <i class="fa-solid fa-print"></i></button>
    </div>
    
    <div class="business-container">
        <div class="business-back">
            <h4><a href="recommender.php?user=<?php echo $_SESSION['id'] ?>"><i class="fa-solid fa-left-long"></i> Back</a></h4>
        </div>
        <div class="business-background">
            <img src="../Recommender Images/<?php echo $bimage ?>">
        </div>
        <div class="business-content">
            <div class="business-image">
                <img src="../Recommender Images/<?php echo $bimage ?>">
                <div class="liked">
                    <?php
                        $posts = mysqli_query($conn, "SELECT * FROM liked_business WHERE business_id=$business_id AND recommender_user=$reco_user");

                        if (mysqli_num_rows($posts) == 1 ){
                            echo "
                            <span class='unlike fa-solid fa-heart' data-id='$business_id' title='Unlike'></span> 
                            <span class='like hide fa-regular fa-heart' data-id='$business_id'title='Like'></span> 
                            ";
                        }else{
                            echo "
                            <span class='like fa-regular fa-heart' data-id='$business_id' title='Like'></span> 
                            <span class='unlike hide fa-solid fa-heart' data-id='$business_id' title='Unlike'></span> 
                            ";
                        }
                    ?><br>
                    <span class="likes_count"><?php echo $blikes ?> likes</span>
                </div>
            </div>
            <div class="business-name">
                <h3><?php echo $bn ?></h3>
            </div>
            <div class="business-line">
                <h4>Line of business</h4>
                <p><?php echo $lob ?></p>
            </div>
            <div class="business-ingredients">
                <h4>Ingredients/Materials:</h4>
                <p><?php echo $bim ?></p>
            </div>
            <div class="business-method">
                <h4>Procedure</h4>
                <p><?php echo $bmethod ?></p>
            </div>
            <div class="business-costing">
                <h4>Capital</h4>
                <p>₱ <?php echo $bcosting ?>.00</p>
            </div>
            <div class="business-source">
                <h4>Source</h4>
                <a target="blank" href="<?php echo $blink ?>"><?php echo $blink ?></a>
            </div>
        </div>
    </div>

<script>
	$(document).ready(function(){
		// when the user clicks on like
		$('.like').on('click', function(){
			var postid = $(this).data('id');
			    $post = $(this);

			$.ajax({
				url: 'view-business.php',
				type: 'post',
				data: {
					'liked': 1,
					'postid': postid
				},
				success: function(response){
					$post.parent().find('span.likes_count').text(response + ' likes');
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});

		// when the user clicks on unlike
		$('.unlike').on('click', function(){
			var postid = $(this).data('id');
		    $post = $(this);

			$.ajax({
				url: 'view-business.php',
				type: 'post',
				data: {
					'unliked': 1,
					'postid': postid
				},
				success: function(response){
					$post.parent().find('span.likes_count').text(response + ' likes');
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});
	});

    function myfunction() {
        window.print();
    }
</script>


</body>
</html>
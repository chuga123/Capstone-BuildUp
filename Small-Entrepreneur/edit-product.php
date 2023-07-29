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
        <form class="upload-form" method="post" enctype='multipart/form-data'>
            <div class="head">
                <h4>Edit product</h4>
                <a href="<?php echo "view-product.php?entrep_id=".$_SESSION['entrep_id']."&&id=".$_GET['id']."&&product_id=".$_GET['product_id'].""?>" title="Cancel">Cancel</a>
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
            $product_image = $_GET['id'];
            $sql = "SELECT * FROM uploaded_product WHERE productimage='$product_image'";
            $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $filename = $row['productimage'];
                    $filepath = $row['filepath'];
                    $productname = $row['productname'];
                    $productprice = $row['productprice'];
                    $description = $row['productdescription'];
                    $province = $row['province'];
                    $product_id =$row['product_id'];
                    $_SESSION['product_id'] = $product_id;
                }
            ?>
                        <div class="body-form">
                            <div class="pic-container">
                                <div class="product-placeholder" onClick="triggerClick()">
                                    <h4><i class="fa-solid fa-arrow-up-from-bracket"></i></h4>
                                </div>
                                <img src="../Process/Small Entrepreneur/<?php echo $filepath ?>" onClick="triggerClick()" id="productDisplay" title="Change Product Image">
                                <input type="file" name="newImage" onChange="displayImage(this)" id="newImage" style="display: none;" accept="Image/png, Image/jpg, Image/jpeg">
                                <input type="text" name="oldfile" value="<?php echo $filename ?>" hidden="hidden">
                            </div>
                            <p>Product Name</p>
                            <input type="text" name="productname" value="<?php echo $productname?>" id="productname" required>
                            <p>Price</p>
                            <input type="text" name="price" value="<?php echo $productprice?>" id="price" required>
                            <p>Description</p>
                            <textarea name="description" id="description" spellcheck="false" required><?php echo $description?></textarea>
                            <div class="province-container">
                                <select class="select-box" name="province">
                                        <option value="<?php echo $province?>"><?php echo $province?></option>
                                        <option value="Abra">Abra</option>
                                        <option value="Agusan del Norte">Agusan del Norte</option>
                                        <option value="Agusan del Sur">Agusan del Sur</option>
                                        <option value="Aklan">Aklan</option>
                                        <option value="Antique">Antique</option>
                                        <option value="Apayao">Apayao</option>
                                        <option value="Aurora">Aurora</option>
                                        <option value="Basilan">Basilan</option>
                                        <option value="Bataan">Bataan</option>
                                        <option value="Batanes">Batanes</option>
                                        <option value="Batangas">Batangas</option>
                                        <option value="Benguet">Benguet</option>
                                        <option value="Biliran">Biliran</option>
                                        <option value="Bohol">Bohol</option>
                                        <option value="Bukidnon">Bukidnon</option>
                                        <option value="Bulacan">Bulacan</option>
                                        <option value="Cagayan">Cagayan</option>
                                        <option value="Camarines Norte">Camarines Norte</option>
                                        <option value="Camarines Sur">Camarines Sur</option>
                                        <option value="Camiguin">Camiguin</option>
                                        <option value="Capiz">Capiz</option>
                                        <option value="Catanduanes">Catanduanes</option>
                                        <option value="Cavite">Cavite</option>
                                        <option value="Cebu">Cebu</option>
                                        <option value="Cotabato">Cotabato</option>
                                        <option value="Davao de Oro (Compostela Valley)">Davao de Oro (Compostela Valley)</option>
                                        <option value="Davao del Norte">Davao del Norte</option>
                                        <option value="Davao del Sur">Davao del Sur</option>
                                        <option value="Davao Occidental">Davao Occidental</option>
                                        <option value="Davao Oriental">Davao Oriental</option>
                                        <option value="Dinagat Islands">Dinagat Islands</option>
                                        <option value="Eastern Samar">Eastern Samar</option>
                                        <option value="Guimaras">Guimaras</option>
                                        <option value="Ifugao">Ifugao</option>
                                        <option value="Ilocos Norte">Ilocos Norte</option>
                                        <option value="Ilocos Sur">Ilocos Sur</option>
                                        <option value="Iloilo">Iloilo</option>
                                        <option value="Isabela">Isabela</option>
                                        <option value="Kalinga">Kalinga</option>
                                        <option value="La Union">La Union</option>
                                        <option value="Laguna">Laguna</option>
                                        <option value="Lanao del Norte">Lanao del Norte</option>
                                        <option value="Lanao del Sur">Lanao del Sur</option>
                                        <option value="Leyte">Leyte</option>
                                        <option value="Maguindanao">Maguindanao</option>
                                        <option value="Marinduque">Marinduque</option>
                                        <option value="Masbate">Masbate</option>
                                        <option value="Misamis Occidental">Misamis Occidental</option>
                                        <option value="Misamis Oriental">Misamis Oriental</option>
                                        <option value="Mountain Province">Mountain Province</option>
                                        <option value="Negros Occidental">Negros Occidental</option>
                                        <option value="Negros Oriental">Negros Oriental</option>
                                        <option value="Northern Samar">Northern Samar</option>
                                        <option value="Nueva Ecija">Nueva Ecija</option>
                                        <option value="Nueva Vizcaya">Nueva Vizcaya</option>
                                        <option value="Occidental Mindoro">Occidental Mindoro</option>
                                        <option value="Oriental Mindoro">Oriental Mindoro</option>
                                        <option value="Palawan">Palawan</option>
                                        <option value="Pampanga">Pampanga</option>
                                        <option value="Pangasinan">Pangasinan</option>
                                        <option value="Quezon">Quezon</option>
                                        <option value="Quirino">Quirino</option>
                                        <option value="Rizal">Rizal</option>
                                        <option value="Romblon">Romblon</option>
                                        <option value="Samar">Samar</option>
                                        <option value="Sarangani">Sarangani</option>
                                        <option value="Siquijor">Siquijor</option>
                                        <option value="Sorsogon">Sorsogon</option>
                                        <option value="South Cotabato">South Cotabato</option>
                                        <option value="Southern Leyte">Southern Leyte</option>
                                        <option value="Sultan Kudarat">Sultan Kudarat</option>
                                        <option value="Sulu">Sulu</option>
                                        <option value="Surigao del Norte">Surigao del Norte</option>
                                        <option value="Surigao del Sur">Surigao del Sur</option>
                                        <option value="Tarlac">Tarlac</option>
                                        <option value="Tawi-Tawi">Tawi-Tawi</option>
                                        <option value="Zambales">Zambales</option>
                                        <option value="Zamboanga del Norte">Zamboanga del Norte</option>
                                        <option value="Zamboanga del Sur">Zamboanga del Sur</option>
                                        <option value="Zamboanga Sibugay">Zamboanga Sibugay</option>
                                    </div>
                                </select>
                            </div>
                            <button type="submit" formaction="../Process/Small Entrepreneur/edit-product-process.php" name="update_product">Update</button>
                        </div>
            </div>
        </form>
    </div>


    <script>
        /* Chosoe file*/
        function triggerClick(e) {
        document.querySelector('#newImage').click();
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
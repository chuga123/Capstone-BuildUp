<?php
session_start();
include ('../Process/server.php');
include ('../Process/active-smallentrep.php');

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
    <title>BuildUp - Add new product</title>
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

    <!-- UPLOAD FORM -->
    <div class="upload-container">
        <form class="upload-form" action="../Process/Small Entrepreneur/upload-process.php" method="post" enctype='multipart/form-data'>
            <div class="head">
                <h4>Add new product</h4>
                <a href="home.php?entrep_id=<?php echo $_SESSION['entrep_id']?>" title="Cancel">Cancel</a>
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
                    <img src="../Images/blank.png" onClick="triggerClick()" id="productDisplay" title="Add Product Image">
                    <input type="file" name="file" onChange="displayImage(this)" id="file" style="display: none;" accept="Image/png, Image/jpg, Image/jpeg"required>
                </div>
                <p style="text-align: center;">Upload Image</p><br>
                <p>Product Name</p>
                <input type="text" name="productname" Placeholder="What are you selling?" id="productname"  required>
                <div class="province-container">
                    <select class="select-box" name="category" required>
                            <option value=""disabled selected>Select Category</option>
                            <option value="Technology ">Technology</option>
                            <option value="Appliances">Appliances</option>
                            <option value="Automotive Parts & Accessories">Automotive Parts & Accessories</option>
                            <option value="Beauty & Personal Care">Beauty & Personal Care</option>
                            <option value="Cell Phones & Accessories">Cell Phones & Accessories</option>
                            <option value="Clothing, Shoes and Jewelry">Clothing, Shoes and Jewelry</option>
                            <option value="Collectibles & Fine Art">Collectibles & Fine Art</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Garden & Outdoor">Garden & Outdoor</option>
                            <option value="Grocery & Gourmet Food">Grocery & Gourmet Food</option>
                            <option value="Handmade">Handmade</option>
                            <option value="Health, Household & Baby Care">Health, Household & Baby Care</option>
                            <option value="Home & Kitchen">Home & Kitchen</option>
                            <option value="Industrial & Scientific">Industrial & Scientific</option>
                            <option value="Luggage & Travel Gear">Luggage & Travel Gear</option>
                            <option value="Movies & TV">Movies & TV</option>
                            <option value="Musical Instruments">Musical Instruments</option>
                            <option value="Office Products">Office Products</option>
                            <option value="Pet Supplies">Pet Supplies</option>
                            <option value="Sports & Outdoors">Sports & Outdoors</option>
                            <option value="Tools & Home Improvement">Tools & Home Improvement</option>
                            <option value="Toys & Games">Toys & Games</option>
                            <option value="Video Games">Video Games</option>
                            <option value="Art & Crafts">Art & Crafts</option>
                            <option value="Others">Others</option>
                    </select><br><br>
                </div>
                
                <p>Price</p>
                <input type="text" name="price" Placeholder="0000" id="price"  required>
                <p>Description</p>
                <textarea name="description" id="description" spellcheck="false" placeholder="Tell something about your product..."required></textarea>
                <div class="province-container">
                    <select class="select-box" name="province" required>
                            <option value=""disabled selected>Select your province</option>
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
                            <option value="Davao de Oro (Compostela Valley)">Davao de Oro</option>
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
                    </select>
                </div>
                 
                <button type="submit" name="add_product">Add product</button>
            </div>
        </form>
    </div>

    <script>
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
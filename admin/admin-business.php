<?php 
session_start();
date_default_timezone_set('Asia/Manila');  
include ('../Process/server.php');
include ('active-admin.php');
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
    <title>BuildUp | Admin</title>
</head>
    <!--Admin Dashboard-->
<body class="admin-panel">
    <!--Admin Dashboard Container-->
    <div class="admin-container">
        <div class="admins">
            <div>
                <?php
                if(isset($_SESSION['accepted'])){
                    ?>
                    <div class="accept">
                        <p><?php echo $_SESSION['accepted']; ?></p>
                    </div>
                    <?php
                unset($_SESSION['accepted']);
                }
                ?>
            </div>
            <div>
                <?php
                if(isset($_SESSION['deleted'])){
                    ?>
                    <div class="accept">
                        <p><?php echo $_SESSION['deleted']; ?></p>
                    </div>
                    <?php
                unset($_SESSION['deleted']);
                }
                ?>
            </div>
            <div>
                <?php
                if(isset($_SESSION['failed'])){
                    ?>
                    <div class="fail">
                        <p><?php echo $_SESSION['failed']; ?></p>
                    </div>
                    <?php
                unset($_SESSION['failed']);
                }
                ?>
            </div>
        </div>
        <div class="blue">
        </div>
        <div class="admin-content">
            <div class="admin-nav-cont">
                <div class="nav-container">
                    <a class="logo" href="admin-dashboard.php">BuildUp</a>
                    <a class="nav-btn" href="admin-dashboard.php">Dashboard</a>
                    <a class="nav-btn active" href="admin-business.php?show=all">Business</a>
                    <a class="nav-btn" href="admin-users.php">Users</a>
                    <input type="image" title="Administrator" onclick="myadmin();" class="admin-btn" id="profile-btn" src="../Images/default-profile.png">
                    <div id='myadmindiv' class='admin-infos'>
                        <a href="logout-admin.php">Sign out</a>
                    </div>
                </div>
            </div>
            <div class="date">
                <h2>Manage Business Lists</h2>
                <p>
                    <?php
                        $day=date("l");
                        $date=date("F/d/Y");
                        $mt = explode("/", $date);
                        $mon = $mt[0];
                        $days = $mt[1];
                        $year = $mt[2];
                        echo " Today is " .$day.", ".$mon." ".$days.", ".$year."";

                    ?>
                </p>
            </div>
            <div class="main-body">
                <div class="list">
                    <?php
                        $show = $_GET['show'];
                        if($show === 'capital'){
                            echo "<h3>List of business by Capital</h3>";
                        }else if($show === 'likes'){
                            echo "<h3>List of business by Likes</h3>";
                        }else if($show === 'date-added'){
                            echo "<h3>List of business by Date Added</h3>";
                        }else{
                            echo "<h3>List of business by ID</h3>";
                        }
                    ?>
                    <button onclick='mysort()' class='sort-btn'>Sort by</button>
                    <div id='sort' class='sort-info'>
                        <a href="admin-business.php?show=all"><i class="fa-solid fa-id-badge"></i> ID</a>
                        <a href="admin-business.php?show=capital"><i class="fa-solid fa-sack-dollar"></i> Capital</a>
                        <a href="admin-business.php?show=date-added"><i class="fa-solid fa-calendar-days"></i> Date</a>
                        <a href="admin-business.php?show=likes"><i class="fa-solid fa-thumbs-up"></i> Likes</a>
                    </div> 
                    <a href="admin-business.php?show=<?php echo $_GET['show'];?>&&business_id=new"><button class="add-btn"><i class="fa-solid fa-plus"></i> Add</button></a>                                          
                    </div>
                <div class="list-table">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Business Name</th>
                                <th>Line of Business</th>
                                <th>Capital</th>
                                <th>Likes</th>
                                <th>Date added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(!empty($_GET['show'])){
                                    $show = $_GET['show'];

                                    if($show == 'capital'){
                                        $sql = "SELECT * from businesses ORDER BY costing desc";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $id = $row['business_id'];
                                                $business_name = $row['business_name'];
                                                $lob = $row['line_of_business'];
                                                $capital = $row['costing'];
                                                $likes = $row['likes'];
                                                $id = $row['business_id'];
                                                $date_added = $row['date_added'];

                                                echo"
                                                    <tr>
                                                        <td>$id</td>
                                                        <td>$business_name</td>
                                                        <td>$lob</td>
                                                        <td>$capital</td>
                                                        <td>$likes</td>
                                                        <td>$date_added</td>
                                                        <td>
                                                            <a class='edit-business' href='admin-business.php?show=$show&&business_id=$id' title='Edit'><i class='fa-solid fa-pen-to-square'></i></a>
                                                            <a class='delete-business' href='delete-business.php?show=$show&&business_id=$id' title='Delete'><i class='fa-solid fa-trash'></i></a>
                                                        </td>
                                                    </tr>
                                                ";
                                            }
                                        }
                                    }else if($show == 'likes'){
                                        $sql = "SELECT * from businesses ORDER BY likes desc";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $id = $row['business_id'];
                                                $business_name = $row['business_name'];
                                                $lob = $row['line_of_business'];
                                                $capital = $row['costing'];
                                                $likes = $row['likes'];
                                                $id = $row['business_id'];
                                                $date_added = $row['date_added'];

                                                echo"
                                                    <tr>
                                                        <td>$id</td>
                                                        <td>$business_name</td>
                                                        <td>$lob</td>
                                                        <td>$capital</td>
                                                        <td>$likes</td>
                                                        <td>$date_added</td>
                                                        <td>
                                                            <a class='edit-business' href='admin-business.php?show=$show&&business_id=$id' title='Edit'><i class='fa-solid fa-pen-to-square'></i></a>
                                                            <a class='delete-business' href='delete-business.php?show=$show&&business_id=$id' title='Delete'><i class='fa-solid fa-trash'></i></a>
                                                        </td>
                                                    </tr>
                                                ";
                                            }
                                        }
                                    }else if($show == 'date-added'){
                                        $sql = "SELECT * from businesses ORDER BY date_added desc";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $id = $row['business_id'];
                                                $business_name = $row['business_name'];
                                                $lob = $row['line_of_business'];
                                                $capital = $row['costing'];
                                                $likes = $row['likes'];
                                                $id = $row['business_id'];
                                                $date_added = $row['date_added'];

                                                echo"
                                                    <tr>
                                                        <td>$id</td>
                                                        <td>$business_name</td>
                                                        <td>$lob</td>
                                                        <td>$capital</td>
                                                        <td>$likes</td>
                                                        <td>$date_added</td>
                                                        <td>
                                                            <a class='edit-business' href='admin-business.php?show=$show&&business_id=$id' title='Edit'><i class='fa-solid fa-pen-to-square'></i></a>
                                                            <a class='delete-business' href='delete-business.php?show=$show&&business_id=$id' title='Delete'><i class='fa-solid fa-trash'></i></a>
                                                        </td>
                                                    </tr>
                                                ";
                                            }
                                        }
                                    
                                    } else{
                                        $sql = "SELECT * from businesses";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $id = $row['business_id'];
                                                $business_name = $row['business_name'];
                                                $lob = $row['line_of_business'];
                                                $capital = $row['costing'];
                                                $likes = $row['likes'];
                                                $id = $row['business_id'];
                                                $date_added = $row['date_added'];

                                                echo"
                                                    <tr>
                                                        <td>$id</td>
                                                        <td>$business_name</td>
                                                        <td>$lob</td>
                                                        <td>$capital</td>
                                                        <td>$likes</td>
                                                        <td>$date_added</td>
                                                        <td>
                                                            <a class='edit-business' href='admin-business.php?show=$show&&business_id=$id' title='Edit'><i class='fa-solid fa-pen-to-square'></i></a>
                                                            <a class='delete-business' href='delete-business.php?show=$show&&business_id=$id' title='Delete'><i class='fa-solid fa-trash'></i></a>
                                                        </td>
                                                    </tr>
                                                ";
                                            }
                                        }
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="add-edit">
                    <?php
                        if(!empty($_GET['business_id']) && (strpos($_GET['business_id'], 'new') !== false)){
                            echo"
                                <h3 class='active'>Add</h3>
                                <div class='add-business'>
                                    <form action='add-business.php' method='post' enctype='multipart/form-data'>
                                        <div class='left'>
                                            <div class='business-holder' onClick='triggerClick()'>
                                                <h4><i class='fa-solid fa-arrow-up-from-bracket'></i></h4>
                                            </div>
                                            <img src='../Images/blank.png' onClick='triggerClick()' id='businessDisplay' title='Add business image'>
                                            <input type='file' name='file' onChange='displayImage(this)' id='file' style='display: none;' accept='Image/png, Image/jpg, Image/jpeg'>
                                        </div>
                                        <div class='right'>
                                            <div class='admin-input'>
                                                <input type='text' name='bname' id='bname' required>
                                                <label for='bname'>Business Name</label>
                                            </div>
                                            <div class='admin-input'>
                                                <input type='text' name='lob' id='lob' required>
                                                <label for='lob'>Line of Business</label>
                                            </div>
                                            <div class='admin-inputs'>
                                                <textarea spellcheck='false' name='ingredients' id='ingredients' required></textarea>
                                                <label for='ingredients'>Ingredients or Materials</label>
                                            </div>
                                            <div class='admin-inputs'>
                                                <textarea spellcheck='false' name='procedure' id='procedure' required></textarea>
                                                <label for='procedure'>Procedure</label>
                                            </div>
                                            <div class='admin-input'>
                                                <input type='text' name='capital' id='capital'required>
                                                <label for='capital'>Capital</label>
                                            </div>
                                            <div class='admin-input'>
                                                <input type='text' name='source' id='source' required>
                                                <label for='source'>Source</label>
                                            </div>
                                            <button type='submit' name='add'>Add</button>
                                        </div>
                                    </form>
                                </div>
                            ";
                        }else if(!empty($_GET['business_id']) && (is_numeric($_GET['business_id']))){
                            $id = $_GET['business_id'];
                            $sql = "SELECT * from businesses WHERE business_id=$id";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['business_id'];
                                    $bname = $row['business_name'];
                                    $lob = $row['line_of_business'];
                                    $filename = $row['image'];
                                    $ingredients = $row['ingredients_materials'];
                                    $method = $row['method'];
                                    $capital = $row['costing'];
                                    $source = $row['source']; 
                                    $_SESSION['business_id'] = $id;                      

                                    echo"
                                        <div class='add-business'>
                                            <h3 class='active'>Edit</h3>
                                            <form action='edit-business.php' method='post' enctype='multipart/form-data'>
                                                <div class='left'>
                                                    <div class='business-holder' onClick='triggerClick()'>
                                                        <h4><i class='fa-solid fa-arrow-up-from-bracket'></i></h4>
                                                    </div>
                                                    <img src='../Recommender Images/$filename' onClick='triggerClick()' id='businessDisplay' title='Add business image'>
                                                    <input type='file' name='file' onChange='displayImage(this)' id='file' style='display: none;' accept='Image/png, Image/jpg, Image/jpeg'>
                                                    <input type='text' name='oldfile' value='$filename' hidden='hidden'>
                                                </div>
                                                <div class='right'>
                                                    <div class='admin-input'>
                                                        <input type='text' name='bname' id='bname' value='$bname' required>
                                                        <label for='bname'>Business Name</label>
                                                    </div>
                                                    <div class='admin-input'>
                                                        <input type='text' name='lob' id='lob' value='$lob' required>
                                                        <label for='lob'>Line of Business</label>
                                                    </div>
                                                    <div class='admin-inputs'>
                                                        <textarea spellcheck='false' name='ingredients' id='ingredients' required>$ingredients</textarea>
                                                        <label for='ingredients'>Ingredients or Materials</label>
                                                    </div>
                                                    <div class='admin-inputs'>
                                                        <textarea spellcheck='false' name='procedure' id='procedure' required>$method</textarea>
                                                        <label for='procedure'>Procedure</label>
                                                    </div>
                                                    <div class='admin-input'>
                                                        <input type='text' name='capital' id='capital' value='$capital' required>
                                                        <label for='capital'>Capital</label>
                                                    </div>
                                                    <div class='admin-input'>
                                                        <input type='text' name='source' id='source' value='$source' required>
                                                        <label for='source'>Source</label>
                                                    </div>
                                                    <button type='submit' name='update'>Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    ";
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>


<script>

    function myadmin() {
    document.getElementById("myadmindiv").classList.toggle("show");
    }

    window.addEventListener("click", function(event) {
    if (!event.target.matches('.admin-btn')) {
        var updgrades = document.getElementsByClassName("admin-infos");
        var i;
        for (i = 0; i < updgrades.length; i++) {
        var openupgrade = updgrades[i];
        if (openupgrade.classList.contains('show')) {
            openupgrade.classList.remove('show');
        }
        }
    }
    });

    function triggerClick(e) {
    document.querySelector('#file').click();
    }
    function displayImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
        document.querySelector('#businessDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
    }

    function mysort() {
    document.getElementById("sort").classList.toggle("show");
    }

    window.addEventListener("click", function(event) {
    if (!event.target.matches('.sort-btn')) {
        var updgrades = document.getElementsByClassName("sort-info");
        var i;
        for (i = 0; i < updgrades.length; i++) {
        var openupgrade = updgrades[i];
        if (openupgrade.classList.contains('show')) {
            openupgrade.classList.remove('show');
        }
        }
    }
    });
</script>


</body>
</html>
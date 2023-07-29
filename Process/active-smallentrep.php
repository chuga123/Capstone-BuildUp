<?php

/* Active account signed in (SMALL ENTREP) */
if(empty($_SESSION['entrep_id']) || $_SESSION['entrep_id'] == ''){
    header("Location: ../Small-Entrepreneur/sign-in.php?Sign in first");
    die();
}

?>
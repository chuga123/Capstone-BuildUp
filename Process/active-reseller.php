<?php

/* Active account signed in (RESELLER) */
if(empty($_SESSION['reseller_id']) || $_SESSION['reseller_id'] == ''){
    header("Location: ../Reseller/sign-in.php?Sign in first");
    die();
}

?>
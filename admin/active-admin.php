<?php

/* Active account signed in (ADMIN) */
if(empty($_SESSION['admin']) || $_SESSION['admin'] == ''){
    header("Location: ../admin/");
    die();
}

?>
<?php
    session_start();
    session_destroy();
    
    $root_path = $_SERVER["DOCUMENT_ROOT"] . "\php-mysql\mysql\mvc_blog";
    require("$root_path/config.php");

    header("Location:" . get_path(false, 2, true, "view", 0, "index"));
?>
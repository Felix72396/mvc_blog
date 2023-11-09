<?php
    $root_path = $_SERVER["DOCUMENT_ROOT"] . "\php-mysql\mysql\mvc_blog";
    require("$root_path/config.php");

    if (isset($_GET["btn_accept"])) {
        require_once(get_path(true, 0, true, "model", 1, "delete"));
   
        $blog_post_delete = new Post_Delection_Model();
        $blog_post_delete->delete_post($_GET["content_id"]);      
    }

    header("Location:" . get_path(false, 2, true, "view", 1, "maintenance"));
?>

</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <!-- <script src="../js/role_permission_script.js"></script>
    <script src="../js/user_info_script.js"></script> -->
    <title>Update Post</title>
</head>
<body>
<?php
$root_path = $_SERVER["DOCUMENT_ROOT"] . "\php-mysql\mysql\mvc_blog";
require("$root_path/config.php");

require_once(get_path(true, 0, true, "controller", 1, "select"));


echo "<div class='frm-update-container'><form class='frm-update' action='". get_path(false, 2, true, "controller", 1, "update") ."' method='post' enctype='multipart/form-data'>
<input type='hidden' name='content_id' value='$_GET[content_id]'>
<div class='content-container'>   
    <div>
        <label for='content_title'>Title</label>
        <input type='text' placeholder='Enter the title...' name='content_title' maxlength='50' required value='" . $blog_post_object_view->get_content_title() . "'>
    </div>          

    <div>
        <label for='content_comment'>Comment</label>
        <textarea name='content_comment' placeholder='Enter a comment...' cols='30' rows='10' maxlength='1000' required>" . $blog_post_object_view->get_content_comment() . "</textarea>
    </div>

    <div>
        <label for='file_name'>Select a picture below 2MB</label>
        <input type='file' name='content_file' accept='image/*'>
        <input type='hidden' name='max_file_size' value = '2097152'>
    </div>

    <div class='btn-content-container'>
        <input class='btn-save-update' type='submit' name='btn_save_update' value='Save' title='Save'>
        <a href='" . get_path(false, 1, false, "view", 1, "maintenance") . "'><input class='btn-cancel-update' type='button' value='Cancel' title='Cancel'></a>
    </div>
</div>         
</form></div>";

?>

</body>
</html>


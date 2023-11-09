<?php

function get_content_picture_array()
{
    $picture_name = $_FILES["user_picture_file"]["name"];
    $picture_type = $_FILES["user_picture_file"]["type"];
    $picture_size_byte = $_FILES["user_picture_file"]["size"];
    $tmp_name = $_FILES["user_picture_file"]["tmp_name"];

    $destination_path =  dirname(__FILE__) . "\user_pictures\\$picture_name";

    // $picture_size_megabyte = $picture_size_byte / 1048576;
    if ($_FILES["user_picture_file"]["error"]) 
    {
        $picture_data = "";
        switch ($_FILES["user_picture_file"]["error"]) 
        {
            case 1:
                echo "<h2 class='add-orange-color'>Picture size exceeds what's allowed for the server!</h2>";
                break;

            case 2:
                echo "<h2 class='add-orange-color'>Picture size exceeds what was set in max_file_size (html document)!</h2>";
                break;

            case 3:
                echo "<h2 class='add-orange-color'>Picture wasn't thoroughly uploaded!</h2>";
                break;

            case 4:
                echo "<h2 class='add-orange-color'>Picture was not uploaded!</h2>";
                break;
        }
    } 
    else 
    {
        if ($picture_name && $_FILES["user_picture_file"]["error"] == UPLOAD_ERR_OK) 
        {
            $pattern = "/image\/jpeg|jpg|png|svg|bmp/";
            // $destination_path = addslashes($destination_path);
            if (preg_match($pattern, $picture_type)) 
            {
                move_uploaded_file($tmp_name, $destination_path);

                $target_picture = fopen($destination_path, "r");
                $picture_data = fread($target_picture, $picture_size_byte);
                fclose($target_picture);
            }
        }
    }

    return array($picture_data, $picture_type, $picture_name);
}

if (isset($_POST["btn_save_user_picture"])) 
{
    
    $root_path = $_SERVER["DOCUMENT_ROOT"] . "/mvc_blog";
    require("$root_path/config.php");

    require(get_path(true, 0, true, "controller", 2, "user_info"));
    require_once(get_path(true, 0, true, "model", 2, "user_picture_insert"));
    
    
    $user = new  User_Picture_Insertion_Model();
    $user->update_profile_picture($username, addslashes(get_content_picture_array()[0]), get_content_picture_array()[1], get_content_picture_array()[2]);
    header("Location:" . get_path(true, 0, true, "view", 2, "user_info"));

}



?>
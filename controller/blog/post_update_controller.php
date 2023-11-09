<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../view/css/styles.css">
    <script src="../../view/js/role_permission_script.js"></script>
    <script src="../../view/js/user_info_script.js"></script>
    <script src="../../view/js/script.js"></script>

    <script>
        if (window.history.replaceState) { // we verify if there's availability
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <title>Update | Result</title>
</head>

<body>
    <?php
    $root_path = $_SERVER["DOCUMENT_ROOT"] . "\php-mysql\mysql\mvc_blog";
    require("$root_path/config.php");

    require_once(get_path(true, 0, true, "controller", 2, "user_info"));

    
    if (isset($_POST["btn_save_update"])) 
    {
        unset($_POST["btn_save_update"]);
    } 
    else 
    {
        header("Location:" . get_path(false, 2, true, "view", 1, "maintenance"));
    }

    echo "<header>
                <nav>
                    <button id='btn-img-bars' class='btn-img-bars'></button>
                    
                    <div class='logo'>
                        <a href='". get_path(false, 2, true, "view", 0, "index") ."'><img src='". get_path(false, 2, true, "view", 3, "logo") ."' alt='Blog icon'></a>
                    </div>

                    <ul>
                        <li><a href='" . get_path(false, 2, true, "view", 1, "select") . "'>Blog</a></li>
                        <li><a href='" . get_path(false, 2, true, "view", 1, "about_us") . "'>About us</a></li>
                        <li><a href='" . get_path(false, 2, true, "view", 1, "contact") . "'>Contact</a></li>
                    </ul>";
    if ($username === "") 
    {
        echo "<div class='log-in-a-container'> 
                        <a href='" . get_path(false, 2, true, "view", 2, "log_in") . "'>Log in</a>
                   </div>";
    }
    else
    {
     echo "<div class='user-picture-container'>      
             <button id='btn-user-info' class='btn-user-info'>";
             if($user_picture_array[0]->user_picture_data == "")
             {
                 echo "<img class='profile-picture' src='" . get_path(false, 2, true, "view", 3, "profile_photo") . "' alt='Profile picture' title='$username'>";

             }
             else
             {
                 echo "<img class='profile-picture' src='$data_picture_source' alt='" . $user_picture_array[0]->user_picture_name . "' title='$username'>";          
             }
             echo "</button>";
           echo "</div>";
    }

    echo "</nav>
            <div class='user-info-container'>
                <div>     
                    <div class='user-role-container'>
                        <div>
                            USER ROLE
                        </div>
                        <div>
                            $user_role
                        </div>       
                    </div>
                    
                    <div class='username-container'>
                        <div>
                            USERNAME
                        </div>
                        <div>
                            $username
                        </div>       
                    </div>
                </div>

                <div>
                    <div class='more-info-container'>
                        <a href='" . get_path(false, 2, true, "view", 2, "user_info") . "' title='User Info'>User info</a>
                    </div>

                    <div class='maintenance-container maintenance-permission'>
                        <a href='" . get_path(false, 2, true, "view", 1, "maintenance") . "' title='Maintenance'>Maintenance</a>
                    </div>

                    <div class='change-user-role-container admin-permission'>
                        <a href='" . get_path(false, 2, true, "view", 2, "user_role") . "' title='Change user role'>Change user role</a>
                    </div>

                    <div class='sign-out-container'>
                        <a href='" . get_path(false, 2, true, "model", 2, "sign_out") . "' title='Sign out'>Sign out</a>
                    </div>
                </div>            
            </div>
        </header>";


    // method
    function get_content_picture_array()
    {
        $picture_name = $_FILES["content_file"]["name"];
        $picture_type = $_FILES["content_file"]["type"];
        $picture_size_byte = $_FILES["content_file"]["size"];
        $tmp_name = $_FILES["content_file"]["tmp_name"];
        // $megabyte_limit = 2;

        $destination_path =  dirname(__FILE__) . "\uploads\\$picture_name";

        // $picture_size_megabyte = $picture_size_byte / 1048576;
        if ($_FILES["content_file"]["error"]) {
            $picture_content = "";
            switch ($_FILES["content_file"]["error"]) {
                case 1:
                    echo "<h2 class='add-orange-color'>Picture size exceeds what's allowed for the server!</h2>";
                    break;

                case 2:
                    echo "<h2 class='add-orange-color'>Picture size exceeds what was set in max_file_size (html document)!</h2>";
                    break;

                case 3:
                    echo "<h2 class='add-orange-color'>Picture wasn't thoroughly uploaded!</h2>";
                    break;
            }
        } else {
            if ($picture_name && $_FILES["content_file"]["error"] == UPLOAD_ERR_OK) {
                $pattern = "/image\/jpeg|jpg|png|svg|bmp/";
                // $destination_path = addslashes($destination_path);
                if (preg_match($pattern, $picture_type)) {
                    move_uploaded_file($tmp_name, $destination_path);

                    $target_picture = fopen($destination_path, "r");
                    $picture_content = fread($target_picture, $picture_size_byte);
                    fclose($target_picture);
                }
            }
        }

        return array($picture_content, $picture_type, $picture_name);
    }


    
    require_once(get_path(true, 0, true, "model", 1, "update"));
    require_once(get_path(true, 0, true, "model", 1, "properties"));

    $blog_post = new Post_Properties_Model();
    $blog_post->set_content_id(addslashes($_POST["content_id"]));

    $blog_post->set_content_title(addslashes($_POST["content_title"]));
    $blog_post->set_content_comment(addslashes($_POST["content_comment"]));

    // htmlspecialchars()
    // htmlentities()
    $is_picture_uploaded = false;

    if (isset($_FILES["content_file"]) && is_uploaded_file($_FILES['content_file']['tmp_name'])) {
        $blog_post->set_content_picture(addslashes(get_content_picture_array()[0]));
        $blog_post->set_content_picture_type(get_content_picture_array()[1]);
        $blog_post->set_content_picture_name(get_content_picture_array()[2]);
        $is_picture_uploaded = true;
    }
    
    $blog_post_update = new Post_Update_Model();
    $blog_post_update->update_post_content($blog_post, $is_picture_uploaded);


    for ($i=0; $i < 5; $i++) { 
        echo "<br/><br/><br/><br/><br/><br/><br/>";
    }

    echo "<footer>
        <div class='footer-a-container'>
            <nav>
                <ul>
                    <li><a href='" . get_path(false, 2, true, "view", 1, "select") . "'>Blog</a></li>
                    <li><a href='" . get_path(false, 2, true, "view", 1, "about_us") . "'>About us</a></li>
                    <li><a href='" . get_path(false, 2, true, "view", 1, "contact") . "'>Contact</a></li>
                </ul>
            </nav>

            <div class='footer-social-media-container'>
                <ul>
                    <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 2, true, "view", 3, "facebook") . "' alt='Facebook-logo' title='Facebook'></a></li>
                    <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 2, true, "view", 3, "facebook") . "' alt='Facebook-logo' title='Facebook'></a></li>
                    <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 2, true, "view", 3, "facebook") . "' alt='Facebook-logo' title='Facebook'></a></li>
                    <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 2, true, "view", 3, "facebook") . "' alt='Facebook-logo' title='Facebook'></a></li>
                    <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 2, true, "view", 3, "facebook") . "' alt='Facebook-logo' title='Facebook'></a></li>
                    <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 2, true, "view", 3, "facebook") . "' alt='Facebook-logo' title='Facebook'></a></li>
                </ul>
            </div>
        </div>

        <div class='copyright-container'>
            <p>Copyright 2022 &copy; Félix Paniagua</p>
        </div>
    </footer>";
    ?>


</body>

</html>
<!-- https://www.youtube.com/watch?v=mjPr763BH0M&list=PLU8oAlHdN5BkinrODGXToK9oPAlnJxmW_&index=95&ab_channel=pildorasinformaticas -->
<!-- https://www.php.net/manual/es/features.file-upload.errors.php -->
<!-- https://www.youtube.com/watch?v=m6cjCKr56GA&list=PLU8oAlHdN5BkinrODGXToK9oPAlnJxmW_&index=90&t=58s&ab_channel=pildorasinformaticas -->
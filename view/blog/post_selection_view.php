<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/role_permission_script.js"></script>
    <script src="../js/user_info_script.js"></script>
    <script src="../js/script.js"></script>
    <title>Blog</title>

    <style>
        footer{
            position: static;
        }
    </style>
</head>

<body>
    <?php
    $root_path = $_SERVER["DOCUMENT_ROOT"] . "\php-mysql\mysql\mvc_blog";
    require("$root_path\config.php");

    // $_POST["page"] = show_post; I'm using this to differenciate between show_post form and maintenance form when using paginattion
    $_POST["page"] = "select";

    require_once(get_path(true, 0, true, "controller", 2, "user_info"));
 
    require_once(get_path(true, 0, true, "controller", 1, "select"));

    echo " <header>
          <nav>
            <button id='btn-img-bars' class='btn-img-bars'></button>
            
            <div class='logo'>
                <a href='" . get_path(false, 2, true, "view", 0, "index") . "'><img src='". get_path(false, 2, true, "view", 3, "logo") ."' alt='Blog icon'></a>
            </div>

            <ul>
                <li><a href='" . get_path(false, 1, false, "view", 1, "select") . "'>Blog</a></li>
                <li><a href='" . get_path(false, 1, false, "view", 1, "about_us") . "'>About us</a></li>
                <li><a href='" . get_path(false, 1, false, "view", 1, "contact") . "'>Contact</a></li>
            </ul>

              ";
    if ($username === "") {
        echo "<div class='log-in-a-container'> 
                <a href='" . get_path(false, 1, false, "view", 2, "log_in") . "'>Log in</a>
              </div>";
    } 
    else
    {
     echo "<div class='user-picture-container'>      
             <button id='btn-user-info' class='btn-user-info'>";
             if($user_picture_array[0]->user_picture_data == "")
             {
                 echo "<img class='profile-picture' src='" . get_path(false, 1, false, "view", 3, "profile_photo") . "' alt='Profile picture' title='$username'>";

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
                        <a href='" . get_path(false, 1, false, "view", 2, "user_info") . "' title='User Info'>User info</a>
                    </div>

                    <div class='maintenance-container maintenance-permission'>
                        <a href='" . get_path(false, 1, false, "view", 1, "maintenance") . "' title='Maintenance'>Maintenance</a>
                    </div>

                    <div class='change-user-role-container admin-permission'>
                        <a href='" . get_path(false, 1, false, "view", 2, "user_role") . "' title='Change user role'>Change user role</a>
                    </div>

                    <div class='sign-out-container'>
                        <a href='" . get_path(false, 2, true, "model", 2, "sign_out") . "' title='Sign out'>Sign out</a>
                    </div>
                </div>            
            </div>
          </header>";

    echo "<h1>Blog</h1><br/>";
    if ($post_count == 1) {
        echo "<p class='p-post-count'>There's $post_count post</p>";
    } else {
        echo "<p class='p-post-count'>There are $post_count posts</p>";
    }
  
    require_once(get_path(false, 2, true, "view", 1, "pagination"));
    // $pagination = new Pagination(15);
     
    $url_page_index = 0;
    if (isset($_GET["page_index"]))  $url_page_index = $_GET["page_index"];
    else  $url_page_index = 1;

    $post_index = ($url_page_index - 1) * 10;
    $post_index = ($post_index > 0) ? $post_index : $post_index * -1;

    $comment_length = 350;

    echo "<div class='post-card-container'>";
    foreach ($blog_post_array_view as $blog_post) {
        $data_source = "data:" . $blog_post->get_content_picture_type() . "; base64, " . base64_encode($blog_post->get_content_picture());
        echo "<a href='" . get_path(false, 2, true, "view", 1, "post_view") . "?content_id=" . $blog_post->get_content_id() . "'><div class='post-card-content' data-count='" . ++$post_index . "' title='" . $blog_post->get_content_title() . "'>
                <img loading='lazy' src='$data_source' alt='" . $blog_post->get_content_picture_name() . "'/>
                <div class='post-card-text-container'>
                    <h3>" . $blog_post->get_content_title() . "</h3>
                    <p class='p-content' max-length='5'>" . substr($blog_post->get_content_comment(), 0, $comment_length) . "...</p>
                    <p class='p-date'><b>Posted on:</b> " . $blog_post->get_content_date() . "</p>
                </div>
              </div></a>";
    }
    $pagination->create_page_index_buttons();
    echo "</div><br/>";

    echo "<footer>
    <div class='footer-a-container'>
        <nav>
            <ul>
                <li><a href='" . get_path(false, 1, false, "view", 1, "select") . "'>Blog</a></li>
                <li><a href='" . get_path(false, 1, false, "view", 1, "about_us") . "'>About us</a></li>
                <li><a href='" . get_path(false, 1, false, "view", 1, "contact") . "'>Contact</a></li>
            </ul>
        </nav>

        <div class='footer-social-media-container'>
            <ul>
                <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 1, false, "view", 3, "facebook") . "' alt='Facebook-logo' title='Facebook'></a></li>
                <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 1, false, "view", 3, "facebook") . "' alt='Facebook-logo' title='Facebook'></a></li>
                <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 1, false, "view", 3, "facebook") . "' alt='Facebook-logo' title='Facebook'></a></li>
                <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 1, false, "view", 3, "facebook") . "' alt='Facebook-logo' title='Facebook'></a></li>
                <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 1, false, "view", 3, "facebook") . "' alt='Facebook-logo' title='Facebook'></a></li>
                <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 1, false, "view", 3, "facebook") . "' alt='Facebook-logo' title='Facebook'></a></li>
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


<!-- https://www.php.net/manual/es/function.key.php -->
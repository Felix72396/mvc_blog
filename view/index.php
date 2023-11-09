<!DOCTYPE html>
<html id="html" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/role_permission_script.js"></script>
    <script src="js/user_info_script.js"></script>
    <script src="js/script.js"></script>

    <style>
        footer {
            position: static;
        }
    </style>
</head>

<body>
    <?php
    $root_path = $_SERVER["DOCUMENT_ROOT"] . "\php-mysql\mysql\mvc_blog";
 
    require("$root_path\config.php");

    require(get_path(true, 0, true, "controller", 2, "user_info"));

    echo " <header>
            <nav>
                <button id='btn-img-bars' class='btn-img-bars'></button>

                <div class='logo'>
                    <a href='" . get_path(false, 0, false, "view", 0, "index") . "'><img src='" . get_path(false, 0, false, "view", 3, "logo") . "' alt='Blog icon'></a>
                </div>     

                <ul>
                    <li><a href='" . get_path(false, 0, false, "view", 1, "select") . "'>Blog</a></li>
                    <li><a href='" . get_path(false, 0, false, "view", 1, "about_us") . "'>About us</a></li>
                    <li><a href='" . get_path(false, 0, false, "view", 1, "contact") . "'>Contact</a></li>
                </ul>";
    if ($username === "") {
        echo "<div class='log-in-a-container'> 
                <a href='" . get_path(false, 1, true, "view", 2, "log_in") . "'>Log in</a>
              </div>";
    } else {

        echo "<div class='user-picture-container'>      
        <button id='btn-user-info' class='btn-user-info'>";
        if ($user_picture_array[0]->user_picture_data == "") {
            echo "<img class='profile-picture' src='" . get_path(false, 0, false, "view", 3, "profile_photo") . "' alt='Profile picture' title='$username'>";
        } else {
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
                            <a href='" . get_path(false, 0, false, "view", 2, "user_info") . "' title='User Info'>User info</a>
                        </div>

                        <div class='maintenance-container maintenance-permission'>
                            <a href='" . get_path(false, 0, false, "view", 1, "maintenance") . "' title='Maintenance'>Maintenance</a>
                        </div>

                        <div class='change-user-role-container admin-permission'>
                            <a href='" . get_path(false, 0, false, "view", 2, "user_role") . "' title='Change user role'>Change user role</a>
                        </div>

                        <div class='sign-out-container'>
                            <a href='" . get_path(false, 1, true, "model", 2, "sign_out") . "' title='Sign out'>Sign out</a>
                        </div>
                    </div>            
                </div>
            </header>";



    echo "<!-- <progress min='0' max='100' value='50' max></progress> -->
    <h1>Welcome to Félix's blog</h1>

    <div class='background-container'>
        <ul class='social-media'>
            <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 0, false, "view", 3, "facebook") . "' alt='Facebook-logo'></a></li>
        </ul>
    </div>

    <footer>
        <div class='footer-a-container'>
            <nav>
                <ul>
                    <li><a href='" . get_path(false, 0, false, "view", 1, "select") . "'>Blog</a></li>
                    <li><a href='" . get_path(false, 0, false, "view", 1, "about_us") . "'>About us</a></li>
                    <li><a href='" . get_path(false, 0, false, "view", 1, "contact") . "'>Contact</a></li>
                </ul>
            </nav>

            <div class='footer-scroll-a-container'>
                <ul>
                    <li>
                        <a class='scroll-a' href='#html' title='Up'>^</a>
                    </li>
                </ul>
            </div>

            <div class='footer-social-media-container'>
                <ul>
                    <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 0, false, "view", 3, "facebook") . "' alt='Facebook-logo' title='Facebook'></a></li>
                    <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 0, false, "view", 3, "facebook") . "' alt='Facebook-logo' title='Facebook'></a></li>
                    <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 0, false, "view", 3, "facebook") . "' alt='Facebook-logo' title='Facebook'></a></li>
                    <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 0, false, "view", 3, "facebook") . "' alt='Facebook-logo' title='Facebook'></a></li>
                    <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 0, false, "view", 3, "facebook") . "' alt='Facebook-logo' title='Facebook'></a></li>
                    <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 0, false, "view", 3, "facebook") . "' alt='Facebook-logo' title='Facebook'></a></li>
                </ul>
            </div>
        </div>

        <div class='copyright-container'>
            <p>Copyright 2022 &copy; Félix Paniagua</p>
        </div>
    </footer>";
    echo "<div class='user-info-container'>

    </div>";
    //hello

    /*hello
    kkm
    */
    ?>
</body>

</html>

<!-- Here I can change the file format -->
<!-- https://stackoverflow.com/questions/5138719/change-default-text-in-input-type-file -->


<!-- <label class='profile-picture-file-label' for='picture_file' title='$username'>Select Photo</p>
                                <input id='picture_file' type='file' name='content_file' style='visibility:hidden' accept='image/*'>  -->
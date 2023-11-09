<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../view/css/styles.css">
    <script src="../../view/js/role_permission_script.js"></script>
    <script src="../../view/js/user_info_script.js"></script>

    <script>
        if (window.history.replaceState) { // we verify if there's availability
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <title>User role change | Result</title>
</head>

<body>
    <?php
        $root_path = $_SERVER["DOCUMENT_ROOT"] . "\php-mysql\mysql\mvc_blog";
        require("$root_path/config.php");

        require_once(get_path(true, 0, true, "controller", 2, "user_info"));
        
            
        if (isset($_POST["btn_save_user_role_change"])) 
        {
            unset($_POST["btn_save_user_role_change"]);
        } 
        else 
        {
            header("Location:" . get_path(false, 2, true, "view", 1, "maintenance"));
        }

        echo "<header>
                  <nav>
                      <div class='logo'>
                          <a href='". get_path(false, 2, true, "view", 0, "index") ."'><img src='". get_path(false, 2, true, "view", 3, "logo") ."' alt='Blog icon'></a>
                      </div>
        
                      <ul>
                        <li><a href='" . get_path(false, 2, true, "view", 1, "select") . "'>Blog</a></li>
                        <li><a href='" . get_path(false, 2, true, "view", 1, "about_us") . "'>About us</a></li>
                        <li><a href='#'>Contact</a></li>
                      </ul>";
            if ($username === "") {
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
        
    require_once(get_path(true, 0, true, "model", 2, "user_role"));  

    $username = htmlentities(addslashes($_POST["username"]));
    $user_role = $_POST["user_role"];
    $user = new User_Role_Change_Model();

    if($user->change_user_role($username, $user_role)){
        echo "<h2 class='add-green-color'>User role was changed</h2>";
    }
    else{
        echo "<h2 class='add-orange-color'>User role wasn't changed</h2>";
    }    
    

    for ($i=0; $i < 5; $i++) { 
        echo "<br/><br/><br/><br/><br/><br/><br/>";
    }

    echo "<footer>
        <div class='footer-a-container'>
            <nav>
                <ul>
                    <li><a href='" . get_path(false, 2, true, "view", 1, "select") . "'>Blog</a></li>
                    <li><a href='" . get_path(false, 2, true, "view", 1, "about_us") . "'>About us</a></li>
                    <li><a href='#'>Contact</a></li>
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
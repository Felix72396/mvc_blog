<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../view/css/styles.css">
    <title>Log in | Result</title>
</head>
<body>
<?php
    $root_path = $_SERVER["DOCUMENT_ROOT"] . "\php-mysql\mysql\mvc_blog";
    require("$root_path/config.php");
    require_once(get_path(true, 0, true, "model", 2, "user_validation"));

    // validating user
    if(isset($_POST["username"]))
    {
        $user = new User_Validation_Model();

        $username = htmlentities(addslashes($_POST["username"]));
        $password = htmlentities(addslashes($_POST["password"]));

        if(!$user->log_in($username, $password))
        {
            echo "<header class='log-in-header'>
                    <nav>
                        <div class='logo'>
                            <a href='". get_path(false, 2, true, "view", 0, "index") ."'><img src='". get_path(false, 2, true, "view", 3, "logo") ."' alt='Blog icon'></a>
                        </div>

                        <div class='log-in-a-container'>
                            <a href='" . get_path(false, 2, true, "view", 2, "log_in") . "'>Log in</a>
                        </div>
                    </nav>
                  </header>";

            if($user->check_if_user_exists($username)) echo "<h2 class='add-red-color'>Incorrect password</h2>";
            else echo "<h2 class='add-orange-color'>User [$username] doesn't exist</h2>";


            for ($i = 0; $i < 5; $i++) {
                echo "<br/><br/><br/><br/><br/><br/>";
            }
     
            echo "<footer>
            <div class='footer-a-container'>
                <nav>
                    <ul>
                        <li><a href='" . get_path(false, 2, true, "view", 1, "select") . "'>Blog</a></li>
                        <li><a href='#'>About us</a></li>
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

        }
    }

  ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../view/css/styles.css">
    <title>Sign up | Result</title>
    <script>
        if (window.history.replaceState) { // we verify if there's availability
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>

<body>
    <?php
    $root_path = $_SERVER["DOCUMENT_ROOT"] . "\php-mysql\mysql\mvc_blog";
    require_once("$root_path/config.php");

    if (isset($_POST["btn_accept"])) 
    {
        require_once(get_path(true, 0, true, "model", 2, "sign_up"));
        unset($_POST["btn_accept"]);
        
        echo "<header class='sign-up-header'>
                <nav>
                    <div class='logo'>
                        <a href='" . get_path(false, 2, true, "view", 0, "index") . "'><img src='" . get_path(false, 2, true, "view", 3, "logo") . "' alt='Blog icon'></a>
                    </div>

                    <div class='log-in-a-container'>
                        <a href='" . get_path(false, 2, true, "view", 2, "log_in") . "'>Log in</a>
                    </div>
                </nav>
              </header>";


        $email = htmlentities(addslashes($_POST["email"]));
        $username = htmlentities(addslashes($_POST["username"]));
        $password = htmlentities(addslashes($_POST["password"]));

        // with this code we encrypt the password
        $encrypted_password = password_hash($password, PASSWORD_DEFAULT, array("cost" => 12));

        $user_obj = new Sign_Up_Model();

        if (!$user_obj->check_if_user_exists($username)) 
        {
            if ($user_obj->register_user($email, $username, $encrypted_password)) 
            {
                echo "<h2 class='add-green-color'>User [$username] was registered successfully</h2>";
            } 
            else 
            {
                echo "<h2 class='add-red-color'>User could not be registered</h2>";
            }
        } 
        else 
        {
            echo "<h2 class='add-orange-color'>User [$username] already exists</h2>";
        }

        for ($i = 0; $i < 5; $i++) {
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
    } 
    else 
    {
        header("Location:" . get_path(false, 2, true, "view", 2, "log_in"));
    }

    ?>

    <!-- https://www.youtube.com/watch?v=BGY-SQtVzJU&list=PLU8oAlHdN5BkinrODGXToK9oPAlnJxmW_&index=59&t=3s&ab_channel=pildorasinformaticas -->

    <!-- sessions in php -->
    <!-- https://www.youtube.com/watch?v=N1HITfGqW74&list=PLU8oAlHdN5BkinrODGXToK9oPAlnJxmW_&index=60&t=1s&ab_channel=pildorasinformaticas -->
    <!-- https://www.youtube.com/watch?v=R18w3gHAVeA&list=PLU8oAlHdN5BkinrODGXToK9oPAlnJxmW_&index=61&ab_channel=pildorasinformaticas -->
</body>

</html>
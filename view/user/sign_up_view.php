<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/form_script.js"></script>
    <title>Sign up!</title>
</head>
<body>
    <?php
    $root_path = $_SERVER["DOCUMENT_ROOT"] . "\php-mysql\mysql\mvc_blog";
    require("$root_path/config.php");

    echo "<header class='sign-up-header'>
        <nav>
            <div class='logo'>
                <a href='". get_path(false, 1, false, "view", 0, "index") ."'><img src='" . get_path(false, 1, false, "view", 3, "logo") . "' alt='Blog icon'></a>
            </div>
            
            <div class='log-in-a-container'>
                <a href='".  get_path(false, 1, false, "view", 2, "log_in") ."'>Log in</a>
            </div>
        </nav>
    </header>";

    echo "<h1>Sign-up form</h1>";

    echo "<form class='user-form' action='". get_path(false, 2, true, "controller", 2, "sign_up") ."' method='post'>
        <div class='input-container'>
            <label for='email'>Email</label>
            <div>
                <input class='input-email' type='email' name='email' placeholder='Enter email' required minlength='5' maxlength='20'>
            </div>

            <label for='username'>Username</label>
            <div>
                <input class='input-username' type='text' name='username' placeholder='Enter username' required minlength='5' maxlength='15'>
            </div>

            <label for='password'>Password</label>
            <div>
                <input class='input-password' type='password' name='password' placeholder='Enter password' required maxlength='15'>
            </div>

            <input type='submit' value='Accept' name='btn_accept' class='btn-accept'>
            <input type='button' id='id-btn-clean' class='btn-clean'>
        </div>
    </form>";

    echo"<footer>
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
                    <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 1, false, "view", 3, "facebook") . "' title='Facebook'></a></li>
                    <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 1, false, "view", 3, "facebook") . "' title='Facebook'></a></li>
                    <li><a href='https://web.facebook.com/fpg72396' target='_blank'><img src='" . get_path(false, 1, false, "view", 3, "facebook") . "' title='Facebook'></a></li>
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
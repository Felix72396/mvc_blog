<?php
    function destroy_cookie(){
        $options = array (
            'expires' => time() - 10,
            'path' => '/',
            'secure' => true,
            'httponly' => true,
            'samesite' => 'None');
        
        setcookie("user_role", $_COOKIE["user_role"], $options);
    }

    if(isset($_COOKIE["user_role"])){
        destroy_cookie();
    }
?>
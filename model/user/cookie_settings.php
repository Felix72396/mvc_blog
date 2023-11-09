<?php      
    function create_cookie($p_user_role){    
        $options = array (
            'expires' => time() + 300,
            'path' => '/',
            'secure' => true,
            'httponly' => true,
            'samesite' => 'None');
            
        setcookie("user_role", $p_user_role, $options);             
    }
?>

<!-- video -->
<!-- https://www.youtube.com/watch?v=3oFoB_ZJcWM&list=PLU8oAlHdN5BkinrODGXToK9oPAlnJxmW_&index=65&ab_channel=pildorasinformaticas -->
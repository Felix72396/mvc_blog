<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/role_permission_script.js"></script>
    <script src="../js/user_info_script.js"></script>
    <title>Change user role</title>

</head>
<body>
<?php
    $root_path = $_SERVER["DOCUMENT_ROOT"] . "\php-mysql\mysql\mvc_blog";
    require("$root_path/config.php");
    
    echo "<div class='frm-user-role-change-container'>
            <form class='frm-user-role-change' action='".get_path(false, 2, true, "controller", 2, "user_role")."' method='post'>
                <div class='content-container'>     
                    <label class='form-label'>Type the username and change its role:</label>
                    <div>
                        <label for='username'>Username</label>
                        <input type='text' placeholder='Enter the username...' name='username' maxlength='20' required>
                    </div>
                    <div>
                        <label for='user_role'>User roles</label>
                        <select class='user-role-displayable' name='user_role'>
                            <option value='user'>User</option>
                            <option value='editor'>Editor</option>
                        </select>
                    </div> 

                    <div class='btn-user-role-change-container'>
                        <input class='btn-save-user-role-change' type='submit' name='btn_save_user_role_change' value='Save' title='Save'>
                        <a href='" . get_path(false, 1, false, "view", 1, "maintenance") . "'><input class='btn-cancel-user-role-change' type='button' value='Cancel' title='Cancel'></a>
                    </div>
                </div>
            </form>
           </div>";  
?>
</body>
</html>
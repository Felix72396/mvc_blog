<?php
     session_start();

     $username = "";
     $user_role = "";
     $permission_info_array = array();
     if (isset($_SESSION["blog_username"]))
     {
          require_once(get_path(true, 0, true, "model", 2, "user_validation"));

          $username = $_SESSION["blog_username"];

          $user_info_obj = new User_Validation_Model();
          $user_role = $user_info_obj->get_user_role($username);
     }

     switch($user_role)
     {
          case "admin":
               $permission_info_array[] = "You're able to access all the content.";
               $permission_info_array[] = "You have access to delete content.";
               $permission_info_array[] = "You have access to update content.";
               $permission_info_array[] = "You have access to add content.";
               $permission_info_array[] = "You have access to change an user's role.";
          break;

          case "editor":
               $permission_info_array[] = "You're able to access all the content.";
               $permission_info_array[] = "You have access to delete content.";
               $permission_info_array[] = "You have access to update content.";
               $permission_info_array[] = "You have access to add content.";
          break;

          case "user":
               $permission_info_array[] = "You're able to access all the content.";
          break;
     }

     echo "<input id='user_role' type='hidden' name='' value='$user_role'>";

     if($username != "") 
     {
          require_once(get_path(true, 0, true, "model", 2, "user_info"));
          // require_once(get_path(false, 0, false, "controller", 2, "user_info"));

          $user = new User_Info_Selection_Model();
          $user_picture_array = $user->get_profile_picture($username);
          $data_picture_source = "data:" . $user_picture_array[0]->user_picture_type . "; base64, " . base64_encode($user_picture_array[0]->user_picture_data);
     }

?>
<?php 
    #config_path
    function get_subdir_name($p_index, $p_is_mvc_dir_name_included)
    {
        if($p_is_mvc_dir_name_included){
            $content = "/";
        }else{
            $content = "";
        }
        
        $dir_name_array = ["", 
                            "blog/", 
                            "user/",
                            "img/"];

        return $dir_name_array[$p_index];
    }

    function get_file_name($p_file_key, $p_mvc_dir_name)
    {
        $file_name_array = [];
        $file_name = "";
        if($p_mvc_dir_name == "model")
        {
            $file_name_array = [
                "insert"=>"post_insertion_model.php",                                  
                "properties"=>"post_properties_model.php",
                "select"=>"post_selection_model.php",
                "update"=>"post_update_model.php",
                "delete"=>"post_deletion_model.php",  
                "cookie_s"=>"cookie_settings.php",
                "cookie_d"=>"cookie_destroyer.php",
                "sign_out"=>"sign_out.php",
                "sign_up"=>"sign_up_model.php",
                "user_validation"=>"user_validation_model.php",
                "user_picture_insert"=>"user_picture_insertion_model.php",
                "user_role"=>"user_role_change_model.php",
                "user_info"=>"user_info_selection_model.php",
                "connection_file"=>"db_blog_connection.php"
            ];
        }
        
        if($p_mvc_dir_name == "view")
        {
            $file_name_array = [
                "index"=>"index.php",              
                "insert"=>"post_insertion_view.php",
                "pagination"=>"pagination.php",
                "post_view"=>"post_view.php",
                "select"=>"post_selection_view.php",
                "update"=>"post_update_view.php",
                "log_in"=>"log_in.php",
                "sign_up"=>"sign_up_view.php",
                "user_info"=>"user_info_view.php",
                "maintenance"=>"post_maintenance_view.php",
                "user_role"=>"user_role_change_view.php",
                "about_us"=>"about_us.php",
                "contact"=>"contact.php",
                "send_email"=>"send_email.php",
                "logo"=>"blog.png",
                "facebook"=>"facebook.png",
                "profile_photo"=>"profile_photo.png",
                "bars"=>"bars.png"
            ];
        }

        if($p_mvc_dir_name == "controller")
        {
            $file_name_array = [
                "insert"=>"post_insertion_controller.php",
                "select"=>"post_selection_controller.php",
                "update"=>"post_update_controller.php",
                "delete"=>"post_deletion_controller.php",  
                "user_validation"=>"user_validation_controller.php",
                "sign_up"=>"sign_up_controller.php",                  
                "user_picture_insert"=>"user_picture_insertion_controller.php",
                "user_info"=>"user_info_selection_controller.php",
                "user_role"=>"user_role_change_controller.php"
            ];
        }

        $file_name = $file_name_array[$p_file_key];

        return $file_name;
    }

        
    function create_relative_path($p_path_level_count, $p_is_mvc_dir_name_included, $p_mvc_dir_name, $p_subdir_index)
    {
        $relative_path = "";
        for ($i=0; $i < $p_path_level_count; $i++) 
        { 
            if($p_path_level_count > 0)
            {
                $relative_path .= "../";
            }
        }

        if($p_is_mvc_dir_name_included)
        {
            $relative_path .= $p_mvc_dir_name . "/";
        }

        $subdir_name = get_subdir_name($p_subdir_index, $p_is_mvc_dir_name_included);
        $relative_path .= $subdir_name;
        
        return $relative_path;
    }

    function create_absolute_path($p_is_mvc_dir_name_included, $p_mvc_dir_name, $p_subdir_index)
    {
        $absolute_path = "";
        $root_path = $_SERVER["DOCUMENT_ROOT"] . "\php-mysql\mysql\mvc_blog\\";
        $absolute_path .= $root_path;

        if($p_is_mvc_dir_name_included)
        {
            $absolute_path .= $p_mvc_dir_name . "/";
        }

        $subdir_name = get_subdir_name($p_subdir_index, $p_is_mvc_dir_name_included);
        $absolute_path .= $subdir_name;

        return $absolute_path;
    }

    
    function get_path($is_path_absolute,
                        $p_path_level_count=0, 
                        $p_is_mvc_dir_name_included = false, 
                        $p_mvc_dir_name, 
                        $p_subdir_index=0, 
                        $p_file_name_key
                    )
    {
        // (arg % 2 = 0)=$path_level. This tells us if we'll add to the path a /, ../ or ../../
        // arg1=$first_id_dir_name
        // arg2=$second_path_level
        $path = "";

        if($is_path_absolute)
        {
            $path = create_absolute_path($p_is_mvc_dir_name_included, $p_mvc_dir_name, $p_subdir_index);
        }
        else
        {
            $path = create_relative_path($p_path_level_count, $p_is_mvc_dir_name_included, $p_mvc_dir_name, $p_subdir_index);
        }           

        $path .= get_file_name($p_file_name_key, $p_mvc_dir_name);
  
        return $path;
    }//method get_url()

    function get_data_array()
    {
        return 
        [
            array(
                "db_name"=>"db_blog",
                "db_user"=>"root",
                "db_tables"=>array(
                                    "0"=>"tb_content",
                                    "1"=>"tb_user_blog"
                                    ),
                "db_charset"=>"SET CHARACTER SET utf8",
                )                                                                      
        ];
    }
?>
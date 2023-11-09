<?php

class Post_Update_Model
{
    // properties
    private $db_connection;
    private $db_table = "tb_content";

    public function __construct()
    {
        require_once(get_path(true, 0, true, "model", 0, "connection_file"));
        require_once(get_path(false, 0, false, "model", 0, "properties"));

        $this->db_connection = Connection::connect_mysqli();
    }

    function update_post_content(Post_Properties_Model $blog_post, $p_is_picture_uploaded)
    {
       if($p_is_picture_uploaded){
        $mysql_script = "update $this->db_table set content_title = '" . $blog_post->get_content_title() . "', 
                                                    content_comment = '" . $blog_post->get_content_comment() . "',	
                                                    content_picture = '" . $blog_post->get_content_picture() . "', 
                                                    content_picture_type = '" . $blog_post->get_content_picture_type() . "', 
                                                    content_picture_name = '" . $blog_post->get_content_picture_name() . "' 
                                                    where content_id = '" . $blog_post->get_content_id() . "'";
       }
       else
       {
        $mysql_script = "update $this->db_table set content_title = '" . $blog_post->get_content_title() . "', 
        content_comment = '" . $blog_post->get_content_comment() . "' 
        where content_id = " . $blog_post->get_content_id();
       }      

       $result = mysqli_query($this->db_connection, $mysql_script);

       $affected_rows_count = mysqli_affected_rows($this->db_connection);

       if ($affected_rows_count > 0) {
           echo "<h2 class='add-green-color'>Post was edited</h2>";
       } else {
            echo "<h2 class='add-orange-color'>Post wasn't edited</h2>";
       }

       mysqli_close($this->db_connection);
    }
}

?>


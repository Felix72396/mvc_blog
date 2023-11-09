<?php

class Post_Selection_Model
{
    // properties
    private $db_connection;
    private $db_table = "tb_content";

    public function __construct()
    {
       require_once(get_path(true, 0, true, "model", 0, "connection_file"));
       require_once(get_path(false, 0, false, "model", 0, "properties"));

       $this->db_connection = Connection::connect_pdo();
    }

    function get_record_count(){
        $mysql_script = "select * from $this->db_table";
        $result = $this->db_connection->prepare($mysql_script);
        $result->execute(array());
        return $result->rowCount();
    }

    function get_post($p_content_id){
        $mysql_script = "select * from $this->db_table where content_id = ?";
        
        $result = $this->db_connection->prepare($mysql_script);
        $result->execute(array($p_content_id));
        

        while($db_record = $result->fetch(PDO::FETCH_OBJ)){
            $blog_content = new Post_Properties_Model();
            $blog_content->set_content_id($db_record->content_id);
            $blog_content->set_content_title($db_record->content_title);
            $blog_content->set_content_date($db_record->content_date);
            $blog_content->set_content_comment($db_record->content_comment);
            $blog_content->set_content_picture($db_record->content_picture);
            $blog_content->set_content_picture_type($db_record->content_picture_type);
            $blog_content->set_content_picture_name($db_record->content_picture_name);
            $blog_content->set_author_name($this->get_author($blog_content->get_content_id()));
            $blog_post_obj = $blog_content;
        }      

        $result->closeCursor();
        $this->db_connection = null;

        return $blog_post_obj;
    }
    
    function get_posts($p_start_from, $p_row_count)
    {
        $blog_post_array = array();

        $mysql_script = "select * from $this->db_table order by content_id desc limit $p_start_from, $p_row_count";
        
        $result = $this->db_connection->prepare($mysql_script);
        $result->execute(array());
        

        while($db_record = $result->fetch(PDO::FETCH_OBJ)){
            $blog_content = new Post_Properties_Model();
            $blog_content->set_content_id($db_record->content_id);
            $blog_content->set_content_title($db_record->content_title);
            $blog_content->set_content_date($db_record->content_date);
            $blog_content->set_content_comment($db_record->content_comment);
            $blog_content->set_content_picture($db_record->content_picture);
            $blog_content->set_content_picture_type($db_record->content_picture_type);
            $blog_content->set_content_picture_name($db_record->content_picture_name);
            $blog_post_array[] = $blog_content;
        }      

        $result->closeCursor();
        $this->db_connection = null;

        return $blog_post_array;
    }

    function get_author($p_content_id)
    {
        $mysql_script = "select tb_user_blog.username from $this->db_table 
                        inner join tb_user_blog on $this->db_table.user_id = tb_user_blog.user_id 
                        where content_id=$p_content_id";
        
        $result = $this->db_connection->prepare($mysql_script);
        $result->execute(array());
        $db_column_value = $result->fetch(PDO::FETCH_OBJ)->username;
        return $db_column_value;
    }


}

?>

<!-- https://www.youtube.com/watch?v=OaYBzTMljCY&list=PLU8oAlHdN5BkinrODGXToK9oPAlnJxmW_&index=94&ab_channel=pildorasinformaticas -->
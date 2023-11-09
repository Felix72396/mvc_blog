<?php

class Post_Insertion_Model
{
    // properties
    private $connection;
    private $db_table = "tb_content";


    public function __construct()
    {
        // $root_path = $_SERVER["DOCUMENT_ROOT"] . "/mvc_blog";
        // require("$root_path/config.php");
      
        require_once(get_path(true, 0, true, "model", 0, "connection_file"));

        require_once(get_path(false, 0, false, "model", 0, "properties"));
        // require_once($this->config["urls"]["model"]["insert"][1]);
        $this->connection = Connection::connect_mysqli();
    }

    function insert_post_content(Post_Properties_Model $blog_post)
    {
        $mysql_script = "insert into $this->db_table (content_title, content_date, content_comment,	
            content_picture, content_picture_type, content_picture_name, user_id) values ('" . $blog_post->get_content_title() . "', '"
            . $blog_post->get_content_date() . "', '"
            . $blog_post->get_content_comment() . "', '"
            . $blog_post->get_content_picture() . "', '"
            . $blog_post->get_content_picture_type() . "', '"
            . $blog_post->get_content_picture_name() . "', '"
            . $blog_post->get_user_id() . "')";

        mysqli_query($this->connection, $mysql_script);

        $affected_rows_count = mysqli_affected_rows($this->connection);

        mysqli_close($this->connection);

        if ($affected_rows_count > 0) return true;
        else return false;
    }
}

?>


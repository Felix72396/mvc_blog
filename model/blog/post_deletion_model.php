<?php

class Post_Delection_Model
{
    // properties
    private $db_connection;
    private $db_table = "tb_content";

    public function __construct()
    {
       require_once(get_path(true, 0, true, "model", 0, "connection_file"));
       $this->db_connection = Connection::connect_pdo();
    }

    function delete_post($p_content_id){
        $mysql_script = "delete from $this->db_table where content_id = ?";
        
        $result = $this->db_connection->prepare($mysql_script);
        $result->execute(array($p_content_id));
        
        $result->closeCursor();
        $this->db_connection = null;
    }
}

?>


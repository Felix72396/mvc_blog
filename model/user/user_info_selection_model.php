<?php
class User_Info_Selection_Model
{
    private $connection;
    private $db_table = "tb_user_blog";


    public function __construct()
    {
        require_once(get_path(true, 0, true, "model", 0, "connection_file"));
        
        $this->connection = Connection::connect_pdo();
    }

    function get_author_id($p_username)
    {
        $mysql_script = "select user_id from $this->db_table where username = ?";
        
        $result = $this->connection->prepare($mysql_script);
        $result->execute(array($p_username));
        $db_column_value = $result->fetch(PDO::FETCH_OBJ)->user_id;
        return $db_column_value;
    }

    function get_profile_picture($p_username)
    {
        $mysql_script = "select user_picture_data, user_picture_type, user_picture_name from $this->db_table where username = ?";
        
        $result = $this->connection->prepare($mysql_script);
        $result->execute(array($p_username));
        $user_picture_array = [];

        while($db_record = $result->fetch(PDO::FETCH_OBJ))
        {
            $user_picture_array[] = $db_record;
        }      

        $result->closeCursor();
        $this->db_connection = null;

        return $user_picture_array;
    }
}

?>
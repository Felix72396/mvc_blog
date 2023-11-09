<?php
    class User_Role_Change_Model
    {
        private $connection;
        private $db_table = "tb_user_blog";

        public function __construct()
        {
            require_once(get_path(true, 0, true, "model", 0, "connection_file"));

            $this->connection = Connection::connect_mysqli();
        }

        public function change_user_role($p_username, $p_user_role)
        {
            $mysql_script = "update $this->db_table set user_role='".$p_user_role."' where username='".$p_username."'";

            mysqli_query($this->connection, $mysql_script);
            $affected_rows_count = mysqli_affected_rows($this->connection);

            mysqli_close($this->connection);

            if($affected_rows_count>0) return true;
            else return false;
        }
    } //class

?>
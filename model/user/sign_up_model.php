<?php
    class Sign_Up_Model
    {
        private $connection;
        private $db_table = "tb_user_blog";

        public function __construct()
        {
            require_once(get_path(true, 0, true, "model", 0, "connection_file"));

            $this->connection = Connection::connect_pdo();
        }

        public function check_if_user_exists($p_username)
        {
            $mysql_script = "select * from $this->db_table where username = ?";

            $result = $this->connection->prepare($mysql_script);

            $result->execute(array($p_username));

            $record_count = $result->rowCount();

            if ($record_count != 0) {
                return true;
            } else {
                return false;
            }
        }

        public function register_user($p_email, $p_username, $p_encrypted_password)
        {
            $mysql_script = "insert into $this->db_table (username, user_password, user_role, user_email) values (?, ?, ?, ?)";

            $result = $this->connection->prepare($mysql_script);

            $result->execute(array($p_username, $p_encrypted_password, "user", $p_email));

            $record_count = $result->rowCount();

            $this->connection = null;

            if ($record_count != 0) return true;
            else return false;
        }
    } //class

?>

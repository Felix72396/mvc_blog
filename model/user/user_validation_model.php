<?php
    // $root_path = $_SERVER["DOCUMENT_ROOT"] . "/mvc_blog";
    // require("$root_path/config.php");

    class User_Validation_Model
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

            if ($record_count > 0) 
            {
                return true;
            } 
            else 
            {
                return false;
            } 
        }


        function verify_password($p_password, $p_username)
        {
            $mysql_script = "select user_password from $this->db_table where username=?";

            $result = $this->connection->prepare($mysql_script);
            $result->execute(array($p_username));
            $data_array = $result->fetch();

            $is_password_valid = false;
            if (password_verify($p_password, $data_array["user_password"])) $is_password_valid = true;
            else $is_password_valid = false;

            return $is_password_valid;
        }

        public function get_user_role($p_username)
        {
            $mysql_script = "select user_role from $this->db_table where username=?";

            $result = $this->connection->prepare($mysql_script);
            $result->execute(array($p_username));
            $data_array = $result->fetch();

            return $data_array["user_role"];
        }

        function log_in($p_username, $p_password)
        {
            $is_validation_successful = false;

            $mysql_script = "select * from $this->db_table where username = ?";

            $result = $this->connection->prepare($mysql_script);
            $result->execute(array($p_username));

            $record_count = $result->rowCount();
            $is_user_valid = ($record_count > 0) ? true : false;
            $is_password_valid = $this->verify_password($p_password, $p_username);

            if ($is_user_valid && $is_password_valid) 
            {
                session_start();
                $_SESSION["blog_username"] = $p_username;

                header("Location:" . get_path(false, 2, true, "view", 0, "index"));
             
            } 
            // else {
            //     $this->check_if_user_exists($p_username);
            // }

            $result->closeCursor();
            // $this->connection = null;

            return $is_validation_successful;
        }
    } //class

?>

<!-- https://www.youtube.com/watch?v=BGY-SQtVzJU&list=PLU8oAlHdN5BkinrODGXToK9oPAlnJxmW_&index=59&t=3s&ab_channel=pildorasinformaticas -->
<!-- https://www.youtube.com/watch?v=R18w3gHAVeA&list=PLU8oAlHdN5BkinrODGXToK9oPAlnJxmW_&index=61&ab_channel=pildorasinformaticas -->
<!-- https://www.youtube.com/watch?v=x29Twvcr6lg&list=PLU8oAlHdN5BkinrODGXToK9oPAlnJxmW_&index=67&ab_channel=pildorasinformaticas -->
<!-- https://www.youtube.com/watch?v=UsfOT0esKBk&list=PLU8oAlHdN5BkinrODGXToK9oPAlnJxmW_&index=68&ab_channel=pildorasinformaticas -->
<!-- https://www.youtube.com/watch?v=XfOxyQcbawc&list=PLU8oAlHdN5BkinrODGXToK9oPAlnJxmW_&index=69&ab_channel=pildorasinformaticas -->
<!-- https://www.php.net/manual/es/function.password-hash.php -->

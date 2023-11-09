<?php
    class User_Picture_Insertion_Model
    {
        private $connection;
        private $db_table = "tb_user_blog";

        public function __construct()
        {
            require_once(get_path(true, 0, true, "model", 0, "connection_file"));

            $this->connection = Connection::connect_mysqli();
        }

        public function update_profile_picture($p_username, $p_user_picture_data, $p_user_picture_type, $p_user_picture_name)
        {
            $mysql_script = "update $this->db_table set user_picture_data='".$p_user_picture_data."', 
                                                        user_picture_type='".$p_user_picture_type."', 
                                                        user_picture_name='".$p_user_picture_name."' 
                                                        where username='".$p_username."'";
            
            mysqli_query($this->connection, $mysql_script);
            mysqli_affected_rows($this->connection);
            // // echo $p_username, $p_user_picture_data, $p_user_picture_type, $p_user_picture_name;
            // $mysql_script = "update $this->db_table set user_picture_data=?, user_picture_type=?, user_picture_name=? where username=?";
            // $result = $this->connection->prepare($mysql_script);
            // $result->bind_param("ssss", $p_user_picture_data, $p_user_picture_type, $p_user_picture_name, $p_username);
            // $result->execute();
            mysqli_close($this->connection);
        }
    } //class


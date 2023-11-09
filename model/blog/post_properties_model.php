<?php
    class Post_Properties_Model{
        private $content_id;
        private $content_title;
        private $content_date;
        private $content_comment;
        private $content_picture;
        private $content_picture_type;
        private $content_picture_name;
        private $user_id;
        private $author_name;

        // encapsulation (getters and setters)
        public function get_content_id(){
            return $this->content_id;
        }

        public function set_content_id($p_content_id){
            $this->content_id = $p_content_id;
        }

        public function get_content_title(){
            return $this->content_title;
        }

        public function set_content_title($p_content_title){
            $this->content_title = $p_content_title;
        }

        public function get_content_date(){
            return $this->content_date;
        }

        public function set_content_date($p_content_date){
            $this->content_date = $p_content_date;
        }

        public function get_content_comment(){
            return $this->content_comment;
        }

        public function set_content_comment($p_content_comment){
            $this->content_comment = $p_content_comment;
        }

        public function get_content_picture(){
            return $this->content_picture;
        }

        public function set_content_picture($p_content_picture){
            $this->content_picture = $p_content_picture;
        }

        public function get_content_picture_type(){
            return $this->content_picture_type;
        }

        public function set_content_picture_type($p_content_picture_type){
            $this->content_picture_type = $p_content_picture_type;
        }

        public function get_content_picture_name(){
            return $this->content_picture_name;
        }

        public function set_content_picture_name($p_content_picture_name){
            $this->content_picture_name = $p_content_picture_name;
        }

        public function get_user_id(){
            return $this->user_id;
        }

        public function set_user_id($p_user_id){
            $this->user_id = $p_user_id;
        }

        public function get_author_name(){
            return $this->author_name;
        }

        public function set_author_name($p_author_name){
            $this->author_name = $p_author_name;
        }

    }
?>

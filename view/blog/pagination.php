<?php    
    class Pagination{
        
        private $record_count;
        private $row_count;
        private $page_index;
        private $start_from;
        private $btn_count;
        private $total_record_count;
        private $total_pages;
        private $page_index_start;
        private $page_path;

        public function __construct($p_record_count, $p_page_path)
        {
            // $root_path = $_SERVER["DOCUMENT_ROOT"] . "/mvc_blog";
            // require("$root_path/config.php");
            
            require_once(get_path(true, 0, true, "controller", 1, "select"));
           
            require_once(get_path(true, 0, true, "model", 1, "select"));

            $blog_post_object = new Post_Selection_Model();

            $this->set_record_count($p_record_count);

            $this->set_row_count($this->get_record_count());
            
            $this->set_page_index(isset($_GET["page_index"]) ? $_GET["page_index"] : 1);

            $start_from_index = ($this->get_page_index() - 1) * $this->get_record_count();
            $this->set_start_from($start_from_index);

            $this->set_btn_count(21);
       
            $this->set_total_record_count($blog_post_object->get_record_count());

            $this->set_total_pages(ceil($this->get_total_record_count() / $this->get_record_count()));

            if ($this->get_total_pages() > $this->get_btn_count()) {
                if ($this->get_page_index() >= $this->get_btn_count()) {
                    if (isset($_GET["index_jump"])) {
                        $this->set_page_index_start($_GET["page_index_start"] + $_GET["index_jump"]);
                    } else {
                        $this->set_page_index_start($_GET["page_index_start"]);
                    }
                }
                else{
                    $this->set_page_index_start(1);
                }
            }
            else{
                $this->set_page_index_start(1);
            }

            $this->set_page_path($p_page_path);
        }
      
        public function get_record_count(){
            return $this->record_count;
        }

        public function set_record_count($p_record_count){
            $this->record_count = $p_record_count;
        }

        public function get_row_count(){
            return $this->row_count;
        }

        public function set_row_count($p_row_count){
            $this->row_count = $p_row_count;
        }

        public function get_page_index()
        {
            return $this->page_index;
        }

        public function set_page_index($p_page_index){
            $this->page_index = $p_page_index;
        }

        public function get_start_from(){
            return $this->start_from;
        }

        public function set_start_from($p_start_from){
            $this->start_from = $p_start_from;
        }

        public function get_btn_count(){
            return $this->btn_count;
        }

        public function set_btn_count($p_btn_count){
            $this->btn_count = $p_btn_count;
        }

        public function get_total_record_count(){
            return $this->total_record_count;
        }

        public function set_total_record_count($p_total_record_count){
            $this->total_record_count = $p_total_record_count;
        }

        public function get_total_pages(){
            return $this->total_pages;
        }

        public function set_total_pages($p_total_pages){
            $this->total_pages = $p_total_pages;
        }

        public function get_page_index_start(){
            return $this->page_index_start;
        }

        public function set_page_index_start($p_page_index_start){
            $this->page_index_start = $p_page_index_start;
        }

        public function get_page_path(){
            return $this->page_path;
        }

        public function set_page_path($p_page_path){
            $this->page_path = $p_page_path;
        }

        function create_btn_back()
        {
            echo "<div class='pagination-container'><div class='btn-back-container'>";
            if ($this->get_page_index() > 1) {
                if (($this->get_page_index() - 1) == $this->get_page_index_start()) {
                    echo "<a href='" . $this->get_page_path() . "?page_index=" . ($this->get_page_index() - 1) . "&index_jump=-7&page_index_start=" . $this->get_page_index_start() . "'><input class='btn-back' type='button' value='<' title='Back'></a>";
                } else {
                    echo "<a href='" . $this->get_page_path() . "?page_index=" . ($this->get_page_index() - 1) . "&page_index_start=" . $this->get_page_index_start() . "'><input class='btn-back' type='button' value='<' title='Back'></a>";
                }
            }
            else{
                echo "<a disabled><input class='btn-disabled' type='button' value='<' disabled></a>";
            }

            echo "</div>";
        }
    
        function create_btn_forward($p_last_index)
        {
            echo "<div class='btn-forward-container'>";
    
            if ($this->get_page_index() < $this->get_total_pages()) {
                if (($this->get_page_index() + 1) == $p_last_index) 
                {
                    echo "<a href='" . $this->get_page_path() . "?page_index=" . ($this->get_page_index() + 1) . "&index_jump=7&page_index_start=" . $this->get_page_index_start() . "'><input class='btn-forward' type='button' value='>' title='Forward'></a>";
                } else {
                    echo "<a href='" . $this->get_page_path() . "?page_index=" . ($this->get_page_index() + 1) . "&page_index_start=" . $this->get_page_index_start() . "'><input class='btn-forward' type='button' value='>' title='Forward'></a>";
                }
            }
            else{
                echo "<a disabled><input class='btn-disabled' type='button' value='>' disabled></a>";
            }
 
            echo "</div>";
        }
    
        function create_page_index_buttons()
        {
            $this->create_btn_back();

            $count = 0;
            $last_index = 0;
    
            echo "<div class='button-container'>";
            // echo $p_page_index_start . " d";
            for ($index = $this->get_page_index_start(); $index <= $this->get_total_pages(); $index++) {
                if (++$count == $this->get_btn_count()) {
                    $last_index = $index;
                    echo "<a href='" . $this->get_page_path() . "?page_index=$index&index_jump=7&page_index_start=" . $this->get_page_index_start() . "'><input class='btn-pagination' type='button' value='$index' title='Page $index'></a>";
                    break;
                } else if ($index == $this->get_page_index()) {
                    echo "<input class='pressed-button' type='button' value='$index' title='Page $index'>";
                } else if ($index == $this->get_page_index_start()) {
                    echo "<a href='" . $this->get_page_path() . "?page_index=$index&index_jump=-7&page_index_start=" . $this->get_page_index_start() . "'><input class='btn-pagination' type='button' value='$index' title='Page $index'></a>";
                } else {
                    echo "<a href='" . $this->get_page_path() . "?page_index=$index&page_index_start=" . $this->get_page_index_start() . "'><input class='btn-pagination' type='button' value='$index' title='Page $index'></a>";
                }
            }
  
            echo "</div>";
            $this->create_btn_forward($last_index);
            echo "</div></div></div>";
        }

    }
?>

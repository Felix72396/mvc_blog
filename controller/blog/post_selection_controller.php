<?php   
      // $root_path = $_SERVER["DOCUMENT_ROOT"] . "/mvc_blog";
      // require("$root_path/config.php");

 
      require_once(get_path(true, 0, true, "model", 1, "select"));
 
      require_once(get_path(false, 2, true, "view", 1, "pagination"));   


 
      if(isset($_POST["page"]))
      {
            $record_count = $_POST["page"]=="select"? 10 : 45;
            $pagination = new Pagination($record_count, get_path(false, 0, false, "view", 0, $_POST["page"]));
      }

      $blog_post_object = new Post_Selection_Model();

      if(isset($_GET["content_id"])) 
      {
            $content_id = $_GET["content_id"];
            $blog_post_object_view = $blog_post_object->get_post($content_id);
            // $post_author_name = $blog_post_object_view->get_author_name();
            // echo $post_author_name;
      }
      else
      {
            $post_count = $blog_post_object->get_record_count();
            $blog_post_array_view = $blog_post_object->get_posts($pagination->get_start_from(), $pagination->get_row_count());
      }
 
?>

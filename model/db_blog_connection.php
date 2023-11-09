<?php
     error_reporting(0);

     define("DB_HOST", $_SERVER["SERVER_NAME"]);
     define("DB_USER", "root"); 
     define("DB_PASSWORD", ""); 
     define("DB_NAME", "db_blog"); 
    //  define("DB_CHARSET", "utf8"); 
 
     class Connection
     {
         public static function connect_pdo(){
             try{
                 $db_connection = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
                 $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 $db_connection->exec("SET CHARACTER SET utf8");
             }
             catch(Exception $e){
                 die("<h2 class='add-red-color no-selectable'>Error: " . $e->getMessage() . "</h2>");
             }
             finally{
                 $db_connection==null;
             }      
             return $db_connection; 
         }

         public static function connect_mysqli()
         {  
            try{
                $db_host = $_SERVER["SERVER_NAME"];
                $db_user = "root";
                $db_password = "";
                $db_name = "db_blog";
                $db_connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);
    
                $db_connection->set_charset('utf8');
            }
            catch(Exception $e){
                die("<h2 class='add-red-color no-selectable'>Error: " . $e->getMessage() . "</h2>");
            }
            finally{
                $db_connection==null;
            }      
            return $db_connection; 
        }
     } 
?>
<?php
require_once __DIR__.'./config.php';

class Connect
{
   public static $conn = null ;
   public static function make($host,string $db, string $user, string $password)
   {

     $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
     try {
               $option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
               return new PDO($dsn,$user,$password,$option);

     } catch (\Exception $e) {
         echo "An error occured ".$e->getMessage();
     }
   }
}
return Connect::make($host,$db,$user,$password);
 ?>

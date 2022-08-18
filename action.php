<?php

// This is where php action takes place to search related keywords on the database using SQL query. 
$pdo = require_once __DIR__."./connect.php";
// this statment checks for Ajax request variable
if (isset($_POST['query'])) {
   $inpText = $_POST['query'];

   $sql = 'SELECT country_name FROM countries WHERE country_name LIKE :country';
// The pdo extension is used with php to pull out data and insert data to the database 
   $stmt = $pdo->prepare($sql);
   $stmt->execute(['country'=> '%'.$inpText.'%']);
   $result = $stmt->fetchAll();
   if ($result) {
        foreach ($result as $row) {
          // code.
           echo '<a href="#" class="list-group-item list-group-item-action border-1" >'.$row['country_name'].'</a>';
        }
   } else {
      echo '<p class="list-group-item border-1">No Record</p>';
   }

}

 ?>

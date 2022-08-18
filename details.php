<?php
//this script checks for the submitted data from the form and then pull out the item from
//database using pdo, it brings out all information about the submitted  text on the form as
//an array, so you loop if you want to, but this fetch only realeases one column data unlike fecth all. 
$pdo = require_once __DIR__."./connect.php";


if (isset($_POST['submit'])) {
  $countryName = $_POST['search'];

  $sql ='SELECT * FROM countries WHERE country_name = :country_name';
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['country_name' => $countryName]);
  $row = $stmt->fetch();
} else {
   header('location: .');
   exit();
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Details</title>
    <script type="text/javascript" src="./bootstrap/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./bootstrap/jquery-3.6.0.min.js">
    </script>
<link rel="stylesheet" href="./bootstrap/bootstrap/css/bootstrap.min.css">
  </head>
  <body>
  <?php print_r($row); ?>
</body>
</html>

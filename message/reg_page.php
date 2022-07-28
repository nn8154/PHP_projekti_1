<?php
require 'reg_config.php';

if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: reg_login.php");
}
?>
<!DOCTYPE html>
<html lang="fi" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Oma tietokanta</title>
  </head>
  <body>
    <h1>Tervetuloa <?php echo $row["name"]; ?></h1>
    <a href="reg_logout.php">Kirjaudu ulos</a>
  </body>
</html>


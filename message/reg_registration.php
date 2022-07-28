<?php include 'inc/header.php'; ?>

<?php
include 'reg_config.php';

if(!empty($_SESSION["id"])){
  header("Location: reg_page.php");
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Käyttäjätunnus tai sähköpostiosoite on jo varattu'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO user VALUES('','$name','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Rekisteröinti onnistui'); </script>";
    }
    else{
      echo
      "<script> alert('Salasana ei täsmää'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="fi" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Rekisteröinti</title>
  </head>
  <body>
    <h2>Rekisteröinti</h2>
    <form class="" action="" method="post" autocomplete="off">

      <label for="name" class="form-label">Nimi: </label>
      <input type="text" class="form-control" name="name" id = "name" required value=""> <br>

      <label for="username" class="form-label">Käyttäjätunnus: </label>
      <input type="text" class="form-control" name="username" id = "username" required value=""> <br>

      <label for="email" class="form-label">Sähköposti: </label>
      <input type="email" class="form-control" name="email" id = "email" required value=""> <br>

      <label for="password" class="form-label">Salasana: </label>
      <input type="password" class="form-control" name="password" id = "password" required value=""> <br>

      <label for="confirmpassword" class="form-label">Vahvista salasana:</label>
      <input type="password" class="form-control" name="confirmpassword" id = "confirmpassword" required value=""> <br>
      <button type="submit" name="submit">Rekisteröidy</button>
    </form>
    <br>
    <a href="reg_login.php">Kirjaudu sisään</a>
  </body>
</html>

<?php include 'inc/footer.php'; ?>
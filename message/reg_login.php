<?php include 'inc/header.php'; ?> 

<?php
include 'reg_config.php';

if(!empty($_SESSION["id"])){
  header("Location: owndb.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: reg_page.php");
    }
    else{
      echo
      "<script> alert('Väärä salasana'); </script>";
    }
  }
  else{
    echo
    "<script> alert('Käyttäjä ei ole rekisteröitynyt'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="fi" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Kirjaudu sisään</title>
  </head>
  <body>
    <h2>Kirjaudu sisään</h2>
    <form class="" action="" method="post" autocomplete="off">
      <label for="usernameemail" class="form-label">Käyttäjätunnus tai sähköpostiosoite: </label>
      <input type="text" class="form-control" name="usernameemail" id = "usernameemail" required value=""> <br>

      <label for="password" class="form-label">Salasana: </label>
      <input type="password" class="form-control" name="password" id = "password" required value=""> <br>

      <button type="submit" name="submit">Kirjaudu sisään</button>
    </form>
    <br>
    <a href="reg_registration.php">Rekisteröinti</a>
  </body>
</html>

<?php include 'inc/footer.php'; ?>
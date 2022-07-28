<?php include 'inc/header.php'; ?>

<?php
// Set vars to empty values
$name = $email = $body = '';
$nameErr = $emailErr = $bodyErr = '';

// Form submit
if (isset($_POST['submit'])) {
  // Validate name
  if (empty($_POST['name'])) {
    $nameErr = 'Nimi vaaditaan';
  } else {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  // Validate email
  if (empty($_POST['email'])) {
    $emailErr = 'Sähköposti vaaditaan';
  } else {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  }

  // Validate body
  if (empty($_POST['body'])) {
    $bodyErr = 'Viesti vaaditaan';
  } else {
    $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  if (empty($nameErr) && empty($emailErr) && empty($bodyErr)) {
    // add to database
    $sql = "INSERT INTO message (name, email, body) VALUES ('$name', '$email', '$body')";
    if (mysqli_query($conn, $sql)) {
      // success
      header('Location: mes_message.php');
    } else {
      // error
      echo 'Error: ' . mysqli_error($conn);
    }
  }
}
?>

    <img src="/php_projekti_1/message/img/logo.jpg" class="w-25 mb-3" alt="">
    <h2>Viesti</h2>
    <?php echo isset($name) ? $name : ''; ?>
    <p class="lead text-center">Lähetä viesti yritykselle</p>

    <form method="POST" action="<?php echo htmlspecialchars(
      $_SERVER['PHP_SELF']
    ); ?>" class="mt-4 w-75">
      <div class="mb-3">
        <label for="name" class="form-label">Nimi</label>
        <input type="text" class="form-control <?php echo !$nameErr ?:
          'is-invalid'; ?>" id="name" name="name" placeholder="Kirjoita nimesi" value="<?php echo $name; ?>">
        <div class="invalid-feedback">
          <?php echo $nameErr; ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Sähköposti</label>
        <input type="email" class="form-control <?php echo !$emailErr ?:
          'is-invalid'; ?>" id="email" name="email" placeholder="Syötä sähköpostiosoitteesi" value="<?php echo $email; ?>">
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Viesti</label>
        <textarea class="form-control <?php echo !$bodyErr ?:
          'is-invalid'; ?>" id="body" name="body" placeholder="Kirjoita viestisi"><?php echo $body; ?></textarea>
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Lähetä" class="btn btn-dark w-100">
      </div>
    </form>
<?php include 'inc/footer.php'; ?>
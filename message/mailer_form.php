<?php include 'inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
</head>
<body>
    <form class ="" action="mailer_send.php" method="post">
        <label for="name" class="form-label">Sähköposti</label>
        <input type="email" class="form-control" name="email" value=""> <br>
        <label for="name" class="form-label">Otsikko</label>
        <input type="text" class="form-control" name="subject" value=""> <br>
        <label for="name" class="form-label">Viesti</label>
        <input type="text" class="form-control" name="message" value=""> <br>
        <button type="submit" name="send">Lähetä</button>
    </form>
    
</body>
</html>

<?php include 'inc/footer.php'; ?>


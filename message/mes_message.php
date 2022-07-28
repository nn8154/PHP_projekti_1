<?php include 'inc/header.php'; ?>
   
<?php
$sql = 'SELECT * FROM message';
$result = mysqli_query($conn, $sql);
$message = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

  <h2>Viesti</h2>

  <?php if (empty($message)): ?>
    <p class="lead mt-3">Viestiä ei ole</p>
  <?php endif; ?>

  <?php foreach ($message as $item): ?>
    <div class="card my-3 w-75">
     <div class="card-body text-center">
       <?php echo $item['body']; ?>
       <div class="text-secondary mt-2">Asiakas <?php echo $item['name']; ?> päivä 
       <?php echo $item['date']; ?>
      </div>
     </div>
   </div>
  <?php endforeach; ?>

    <div class="card my-3">
     <div class="card-body">
       Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta molestias animi earum eos dolorem repellat a quibusdam, aperiam vero repellendus voluptatibus natus deserunt sed doloribus inventore, totam labore maxime perferendis!
     </div>
   </div>


<?php include 'inc/footer.php'; ?>
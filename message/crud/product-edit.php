<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="fi">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tilaus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title> Muokkaa tilaus </title>
</head>
  <body>
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Muokkaa tilaus
                            <a href="index.php" class="btn btn-danger float-end">Takaisin</a>
                        </h4>
                        <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            //echo $product_id = $_GET['id'];
                            $product_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM products WHERE id='$product_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $product = mysqli_fetch_array($query_run);
                                //print_r($product);
                                ?>
                                <form action="code.php" method="POST">
                                <input type="hidden" name="product_id" value="<?= $product['id']; ?>">

                                    <div class="mb-3">
                                        <lebel>Nimi</lebel>
                                        <input type="text" name="name" value="<?=$product['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <lebel>Email</lebel>
                                        <input type="text" name="email" value="<?=$product['email'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <lebel>Puhelin</lebel>
                                        <input type="text" name="phone" value="<?=$product['phone'];?>" class="form-control">
                                    </div>                                
                                    <div class="mb-3">
                                        <lebel>Product</lebel>
                                        <input type="text" name="product" value="<?=$product['product'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <lebel>Hinta</lebel>
                                        <input type="text" name="price" value="<?=$product['price'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <lebel>Päivä</lebel>
                                        <input type="date" name="date" value="<?=$product['date'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_product" class="btn btn-primary">Tallenna tilaus</button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4> Sellaista tunnusta ei löytynyt </h4>";

                            }
                        }
                        ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
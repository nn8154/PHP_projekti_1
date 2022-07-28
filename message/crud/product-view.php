<?php
require 'dbcon.php';
?>

<!doctype html>
<html lang="fi">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tilaus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title> Näytä tilaus </title>
</head>
  <body>
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Tilaus 
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
                                    <div class="mb-3">
                                        <lebel>Nimi</lebel>
                                        <p class="form-control">
                                           <?=$product['name'];?> 
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <lebel>Email</lebel>
                                        <p class="form-control">
                                           <?=$product['email'];?> 
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <lebel>Puhelin</lebel>
                                        <p class="form-control">
                                           <?=$product['phone'];?> 
                                        </p>
                                    </div>                                
                                    <div class="mb-3">
                                        <lebel>Tuote</lebel>
                                        <p class="form-control">
                                           <?=$product['product'];?> 
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <lebel>Hinta</lebel>
                                        <p class="form-control">
                                           <?=$product['price'];?> 
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <lebel>Päivä</lebel>
                                        <p class="form-control">
                                           <?=$product['date'];?> 
                                        </p>
                                    </div>

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
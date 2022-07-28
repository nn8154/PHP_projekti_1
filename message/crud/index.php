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
  </head>
  <body>
      
    <div class="container mt-4">
        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tilaus
                            <a href="product-create.php" class="btn btn-primary float-end">Luo tilaus</a> <br>
                        </h4>
                    </div>
                    <div class="card-header">
                        <h4>
                           <a href="/php_projekti_1/message/home.php" class="btn btn-danger float-end">Takaisin</a> 
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Numero</th>
                                        <th>Nimi</th>
                                        <th>Sähköposti</th>
                                        <th>Puhelin</th>
                                        <th>Tuote</th>
                                        <th>Hinta</th>
                                        <th>Päivä</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $query = "SELECT * FROM products";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $product)
                                            {
                                                //echo $product['name'];
                                                ?>
                                                <tr>
                                                    <td><?= $product['id']; ?></td>
                                                    <td><?= $product['name']; ?></td>
                                                    <td><?= $product['email']; ?></td>
                                                    <td><?= $product['phone']; ?></td>
                                                    <td><?= $product['product']; ?></td>
                                                    <td><?= $product['price']; ?></td>
                                                    <td><?= $product['date']; ?></td>
                                                    <td>
                                                        <a href="product-view.php?id=<?= $product['id']; ?>" class="btn btn-primary btn-sm">Näytä</a>
                                                        <a href="product-edit.php?id=<?= $product['id']; ?>" class="btn btn-success btn-sm">Muokkaa</a>
                                                        <form action="code.php" method="POST" class="d-inline">
                                                            <button type="submit" name="delete_product" value="<?=$product['id'];?>" class="btn btn-danger btn-sm">Poista</button>
                                                        </form>
                                                    </td>
                                                </tr>

                                                <?php

                                            }
                                        }
                                        else
                                        {
                                            echo "<h5> Tietuetta ei löydy </h5>";
                                        }     
                                    ?>

                                </tbody>
                        </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
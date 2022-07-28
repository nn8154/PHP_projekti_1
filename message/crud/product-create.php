<?php
session_start();
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
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Tee tilaus
                            <a href="index.php" class="btn btn-danger float-end">Takaisin</a>
                        </h4>
                        <div class="card-body">
                            <form action="code.php" method="POST">

                                <div class="mb-3">
                                    <lebel>Nimi</lebel>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <lebel>Email</lebel>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <lebel>Puhelin</lebel>
                                    <input type="text" name="phone" class="form-control">
                                </div>                                
                                <div class="mb-3">
                                    <lebel>Tuote</lebel>
                                    <input type="text" name="product" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <lebel>Hinta</lebel>
                                    <input type="text" name="price" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <lebel>Hinta</lebel>
                                    <input type="text" name="price" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <lebel>Päivä</lebel>
                                    <input type="date" name="date" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <button type="submit" name="save_product" class="btn btn-primary">Tallenna lilaus</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
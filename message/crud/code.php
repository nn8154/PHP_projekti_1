<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_product']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['delete_product']);

    $query = "DELETE FROM products WHERE id='$product_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Tuote poistettu onnistuneesti";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Tuote ei poistettu";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_product']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $product = mysqli_real_escape_string($con, $_POST['product']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $date = mysqli_real_escape_string($con, $_POST['date']);

    $query = "UPDATE products SET name='$name', email='$email', phone='$phone', product='$product', price='$price', date='$date' WHERE id='$product_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Tuote päivitetty onnistuneesti";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Tuote ei ole päivitetty";
        header("Location: index.php");
        exit(0);
    }

}

if(isset($_POST['save_product']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $product = mysqli_real_escape_string($con, $_POST['product']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $date = mysqli_real_escape_string($con, $_POST['date']);

    $query = "INSERT INTO products (name,email,phone,product,price,date) VALUES ('$name','$email','$phone','$product','$price','$date')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Tilaus luotu onnistuneesti";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Tilausta ei luotu";
        header("Location: student-create.php");
        exit(0);
    }
}

?>
<?php
include ('db.php');
if($_SERVER["REQUEST_METHOD"]== "POST"){
    $order_id = $_POST['order_id'];
    $product_id = $_POST['product_id'];
    $qty = $_POST['qty'];
    $unit_price = $_POST['unit_price'];
    $amount = $_POST['amount'];
    $sql = "INSERT INTO orderdetails (order_id, product_id, qty, unit_price, amount)
    VALUE ('$order_id', '$product_id', '$qty', '$unit_price', '$amount')";
    if ($conn->query($sql)=== TRUE){
        header("Location: index.php");
        exit();
    }
    else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
    //$conn->close();
    //exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h2>Create New Order Detail</h2>
    <form action="" method="POST">
        <div class="form-element my-4">
        <label >Order ID:</label><br>
        <input type="text" name="order_id"  class="form-control">
        </div>
        <div class="form-element my-4">
        <label >Product ID:</label><br>
        <input type="text"  name="product_id" class="form-control" >
        </div>
        <div class="form-element my-4">
        <label >Quantity:</label><br>
        <input type="text"  name="qty" class="form-control" >
        </div>
        <div class="form-element my-4">
        <label >Unit Price:</label><br>
        <input type="text"  name="unit_price" class="form-control" >
        </div>
        <div class="form-element my-4">
        <label >Amount:</label><br>
        <input type="text"  name="amount" class="form-control" >
        </div>
        <div class="form-element">
        <input type="submit" value="Submit" class="btn btn-success">
        </div>
    </form>
</div>
</body>
</html>
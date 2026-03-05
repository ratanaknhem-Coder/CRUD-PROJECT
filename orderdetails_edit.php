<?php
include('db.php');
if (!isset($_GET['order_id']) & !isset($_GET['product_id'])){
    header("Location: index.php"); exit();
}
$order_id = intval($_GET['order_id']);
$product_id = intval($_GET['product_id']);
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $order_id = $_POST['order_id'];
    $product_id = $_POST['product_id'];
    $qty = $_POST['qty'];
    $unit_price = $_POST['unit_price'];
    $amount = $_POST['amount'];
    $sql = "UPDATE orderdetails SET order_id='$order_id', product_id='$product_id', qty='$qty', unit_price='$unit_price', amount='$amount' WHERE order_id=$order_id AND product_id=$product_id";
    if($conn->query($sql)===TRUE){
        header("Location: index.php");
        exit();
    } else {
        echo "Error:". $conn->error;
    }
}
$sql = "SELECT * FROM orderdetails WHERE order_id = $order_id AND product_id = $product_id";
$result = $conn->query($sql);
$orderdetail = $result->fetch_assoc();
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
    <h2>Edit Order Detail</h2>
    <a href="index.php" class= "btn btn-info">Back to List</a>
    <form action="" method="POST">
        <div class="form-element my-4">
        <label >Order ID:</label><br>
        <input type="text" name="order_id" value="<?= htmlspecialchars($orderdetail['order_id']); ?>" class="form-control">
        </div>
        <div class="form-element my-4">
        <label >Product ID:</label><br>
        <input type="text"  name="product_id"  value="<?= htmlspecialchars($orderdetail['product_id']); ?>" class="form-control" >
        </div>
        <div class="form-element my-4">
        <label >Quantity:</label><br>
        <input type="text"  name="qty" value="<?= htmlspecialchars($orderdetail['qty']); ?>" class="form-control" >
        </div>
        <div class="form-element my-4">
        <label >Unit Price:</label><br>
        <input type="text"  name="unit_price" value="<?= htmlspecialchars($orderdetail['unit_price']); ?>" class="form-control" >
        </div>
        <div class="form-element my-4">
        <label >Amount:</label><br>
        <input type="text"  name="amount" value="<?= htmlspecialchars($orderdetail['amount']); ?>" class="form-control" >
        </div>
        <div class="form-element">
        <input type="submit" value="Submit" class="btn btn-success">
        </div>
    </form><br>
    
</div>
</body>
</html>
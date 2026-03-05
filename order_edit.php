<?php
include('db.php');
if (!isset($_GET['order_id'])){
    header("Location: index.php"); exit();
}
$id = intval($_GET['order_id']);
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $date = $_POST['date'];
    $total_amount = $_POST['total_amount'];
    $sql = "UPDATE orders SET order_date='$date', total_amount='$total_amount' WHERE order_id=$id";
    if($conn->query($sql)===TRUE){
        header("Location: index.php");
        exit();
    } else {
        echo "Error:". $conn->error;
    }
}
$sql = "SELECT * FROM orders WHERE order_id = $id";
$result = $conn->query($sql);
$order = $result->fetch_assoc();
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
    <h2>Edit Order</h2>
    <a href="index.php" class= "btn btn-info">Back to List</a>
    <form action="" method="POST">
        <div class="form-element my-4">
        <label >Order Date:</label><br>
        <input type="date" name="date" value="<?= htmlspecialchars($order['order_date']); ?>" class="form-control">
        </div>
        <div class="form-element my-4">
        <label >Total Amount:</label><br>
        <input type="number" name="total_amount" value="<?= htmlspecialchars($product['total_amount']); ?>"  class="form-control" >
        </div>
        <div class="form-element">
        <input type="submit" value="Update" class="btn btn-success">
        </div>
    </form><br>
    
</div>
</body>
</html>
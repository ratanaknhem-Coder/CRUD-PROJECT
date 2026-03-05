<?php
include ('db.php');
if($_SERVER["REQUEST_METHOD"]== "POST"){
    $date = $_POST['date'];
    $total_amount = $_POST['total_amount'];
    $sql = "INSERT INTO orders (order_date, total_amount)
    VALUE ('$date', '$total_amoun')";
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
    <h2>Create New Order</h2>
    <form action="" method="POST">
        <div class="form-element my-4">
        <label >Order Date:</label><br>
        <input type="date" name="date"  class="form-control">
        </div>
        <div class="form-element my-4">
        <label >Total Amount:</label><br>
        <input type="number"  name="total_amount" class="form-control" >
        </div>
        <div class="form-element">
        <input type="submit" value="Submit" class="btn btn-success">
        </div>
    </form>
</div>
</body>
</html>
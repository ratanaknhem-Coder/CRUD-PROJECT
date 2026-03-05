<?php
include ('db.php');
if($_SERVER["REQUEST_METHOD"]== "POST"){
    $name = $_POST['name'];
    $unit_price = $_POST['unit_price'];
    $description = $_POST['description'];
    $sql = "INSERT INTO products (name, unit_price, description)
    VALUE ('$name', '$unit_price', '$description')";
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
    <h2>Create New Product</h2>
    <form action="" method="POST">
        <div class="form-element my-4">
        <label >Product Name:</label><br>
        <input type="text" name="name"  class="form-control">
        </div>
        <div class="form-element my-4">
        <label >Unit Price:</label><br>
        <input type="text" name="unit_price" class="form-control" >
        </div>
        <div class="form-element my-4">
        <label >Description:</label><br>
        <textarea name="description"  class="form-control"></textarea>
        </div>
        <div class="form-element">
        <input type="submit" value="Submit" class="btn btn-success">
        </div>
    </form>
</div>
</body>
</html>
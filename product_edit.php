<?php
include('db.php');
if (!isset($_GET['product_id'])){
    header("Location: index.php"); exit();
}
$id = intval($_GET['product_id']);
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $unit_price = $_POST['unit_price'];
    $description = $_POST['description'];
    $sql = "UPDATE products SET name='$name', unit_price='$unit_price', description='$description' WHERE product_id=$id";
    if($conn->query($sql)===TRUE){
        header("Location: index.php");
        exit();
    } else {
        echo "Error:". $conn->error;
    }
}
$sql = "SELECT * FROM products WHERE product_id = $id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
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
    <h2>Edit Product</h2>
    <a href="index.php" class= "btn btn-info">Back to List</a>
    <form action="" method="POST">
        <div class="form-element my-4">
        <label >Product Name:</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($product['name']); ?>" class="form-control">
        </div>
        <div class="form-element my-4">
        <label >Unit Price:</label><br>
        <input type="text" name="unit_price" value="<?= htmlspecialchars($product['unit_price']); ?>"  class="form-control" >
        </div>
        <div class="form-element my-4">
        <label >Description:</label><br>
        <input type="text" name="description" value="<?= htmlspecialchars($product['description']); ?>" class="form-control"></textarea>
        </div>
        <div class="form-element">
        <input type="submit" value="Update" class="btn btn-success">
        </div>
    </form><br>
    
</div>
</body>
</html>
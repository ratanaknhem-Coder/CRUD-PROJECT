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
    <h2>Product List</h2>
    <a href="product.php" class="btn btn-success">Add New Products</a><br><br>
    <table border="1" cellpadding="10" cellspacing="0" class="table table-bordered">
        <tr><th>Product ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Action</th>
        </tr>
        <?php
        include ('db.php');
        $sql = "SELECT * FROM products WHERE is_delete = 0";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo"<tr>";
                echo"<td>{$row['product_id']}</td>";
                echo"<td>" . $row["name"]."</td>";
                echo"<td>" . $row["unit_price"]."</td>";
                echo"<td>" . $row["description"]."</td>";
                echo"<td><a href='product_edit.php?product_id=".$row["product_id"]."' class='btn btn-warning' >Edit</a>
                <a href='product_delete.php?product_id=".$row["product_id"]."' class='btn btn-danger'>Delete</a></td> ";
                echo "</tr>";
            }
        }
        else {
            echo "<tr><td colspan='5'>NO products found</td></tr>";
        }
        ?>
    </table>
    <h2>Order List</h2>
    <a href="order.php" class="btn btn-success">Add New Order</a><br><br>
    <table border="1" cellpadding="10" cellspacing="0" class="table table-bordered">
        <tr><th>Order ID</th>
        <th>Order Date</th>
        <th>Total Amount</th>
        <th>Action</th>
        </tr>
        <?php
        include ('db.php');
        $sql = "SELECT * FROM orders WHERE is_delete = 0";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo"<tr>";
                echo"<td>{$row['order_id']}</td>";
                echo"<td>" . $row["order_date"]."</td>";
                echo"<td>" . $row["total_amount"]."</td>";
                echo"<td><a href='order_edit.php?order_id=".$row["order_id"]."' class='btn btn-warning' >Edit</a>
                <a href='order_delete.php?order_id=".$row["order_id"]."' class='btn btn-danger'>Delete</a></td> ";
                echo "</tr>";
            }
        }
        else {
            echo "<tr><td colspan='4'>NO products found</td></tr>";
        }
        ?>
    </table>
    <h2>Order Detail List</h2>
    <a href="orderdetails.php" class="btn btn-success">Add New Order Detail</a><br><br>
    <table border="1" cellpadding="10" cellspacing="0" class="table table-bordered">
        <tr><th>Order ID</th>
        <th>Product ID</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Amount</th>
        <th>Action</th>
        </tr>
        <?php
        include ('db.php');
        $sql = "SELECT * FROM orderdetails WHERE is_delete = 0";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo"<tr>";
                echo"<td>{$row['order_id']}</td>";
                echo"<td>" . $row["product_id"]."</td>";
                echo"<td>" . $row["qty"]."</td>";
                echo"<td>" . $row["unit_price"]."</td>";
                echo"<td>" . $row["amount"]."</td>";
                echo"<td><a href='orderdetails_edit.php?order_id=".$row["order_id"]."&product_id=".$row["product_id"]."' class='btn btn-warning' >Edit</a>
                <a href='orderdetails_delete.php?order_id=".$row["order_id"]."&product_id=".$row["product_id"]."' class='btn btn-danger'>Delete</a></td> ";
                echo "</tr>";
            }
        }
        else {
            echo "<tr><td colspan='6'>NO products found</td></tr>";
        }
        ?>
    </table>
    </div>
</body>
</html>
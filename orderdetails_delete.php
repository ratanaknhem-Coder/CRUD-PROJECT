<?php
include('db.php');
if (isset($_GET['order_id']) & isset($_GET['product_id'])){
    $order_id = intval($_GET['order_id']);
    $product_id = intval($_GET['product_id']);
    $sql = "UPDATE orderdetails SET is_delete = 1 WHERE product_id = $product_id AND order_id=$order_id";
    if($conn->query($sql)===TRUE){
        header("Location: index.php");
        exit();
    }else {
        echo "Error: ". $conn->error;
    }
}else {
    header("Location: index.php");
    exit();
}
?>
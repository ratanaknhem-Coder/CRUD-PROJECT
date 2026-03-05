<?php
include('db.php');
if (isset($_GET['order_id'])){
    $id = intval($_GET['order_id']);
    $sql = "UPDATE orders SET is_delete = 1 WHERE order_id = $id";
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
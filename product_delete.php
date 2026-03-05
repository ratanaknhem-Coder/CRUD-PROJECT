<?php
include('db.php');
if (isset($_GET['product_id'])){
    $id = intval($_GET['product_id']);
    $sql = "UPDATE products SET is_delete = 1 WHERE product_id =$id";
    if($conn->query($sql)===TRUE){
        header("Location: index.php");
        echo "delete";
        exit();
    }else {
        echo "Error: ". $conn->error;
    }
}else {
    header("Location: index.php");
    
    exit();
}
?>
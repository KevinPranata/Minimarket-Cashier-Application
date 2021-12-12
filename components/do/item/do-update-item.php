<?php
include "../../../config/config.php";

$conn = sqlsrv_connect($serverName, $dbName);

$id = $_POST['id'];
$supplier_id = $_POST['supplier_id'];
$item_name = $_POST['item_name'];
$item_price = (int)$_POST['item_price'];
$stock_remaining = (int)$_POST['stock_remaining'];

    echo var_dump($id);
    echo var_dump($supplier_id);
    echo var_dump($item_name);
    echo var_dump($item_price);
    echo var_dump($stock_remaining);

$query = "UPDATE Item SET 
FK_SupplierID = '$supplier_id', ItemName='$item_name',Price='$item_price',StockRemaining='$stock_remaining'
WHERE ItemID='$id'"; 

$do=sqlsrv_query($conn, $query) or die(sqlsrv_errors());

// if($do){
//     echo "Successed";
header('location:../../../item.php');

 // sqlsrv_free_do($do);
 // sqlsrv_close($conn);
// }
?>
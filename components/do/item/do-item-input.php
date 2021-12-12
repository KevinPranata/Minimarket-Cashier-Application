<?php
include "../../../config/config.php";

$conn = sqlsrv_connect($serverName, $dbName);

$supplier_id = $_POST['supplier_id'];
$item_name = $_POST['item_name'];
$item_price =  $_POST['item_price'];
$stock_remaining =  $_POST['stock_remaining'];



echo var_dump($supplier_id);
echo var_dump($item_name);
echo var_dump($item_price);
echo var_dump($stock_remaining);

$query = "INSERT INTO Item (FK_SupplierID, ItemName, Price, StockRemaining) 
VALUES('$supplier_id','$item_name','$item_price','$stock_remaining')";


$do=sqlsrv_query($conn, $query) or die(sqlsrv_errors());

if($query){
    echo "Successed";
    header('location:../../../item.php');

// sqlsrv_free_do($do);
// sqlsrv_close($conn);
}else{
    echo "failed";
}
?>
<?php
include "../../../config/config.php";

$conn = sqlsrv_connect($serverName, $dbName);

$store_address = $_POST['store_address'];
$store_phone_number = $_POST['store_phone_number'];


echo $store_address;
echo $store_phone_number;

$query = "INSERT INTO Store (StoreAddress, StorePhoneNumber) 
VALUES('$store_address','$store_phone_number')";



$do=sqlsrv_query($conn, $query) or die(sqlsrv_errors());

if($query){
    echo "Successed";
    header('location:../../../store.php');

// sqlsrv_free_do($do);
// sqlsrv_close($conn);
}
?>
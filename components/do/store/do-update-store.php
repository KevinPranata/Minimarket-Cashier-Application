<?php
include "../../../config/config.php";

$conn = sqlsrv_connect($serverName, $dbName);

$id = $_POST['id'];
$store_address = $_POST['store_address'];
$store_phone_number = $_POST['store_phone_number'];

    echo var_dump($id);
    echo var_dump($store_address);
    echo var_dump($store_phone_number);

$query = "UPDATE Store SET 
StoreAddress = '$store_address', StorePhoneNumber='$store_phone_number'
WHERE StoreID='$id'"; 

$do=sqlsrv_query($conn, $query) or die(sqlsrv_errors());

// if($do){
//     echo "Successed";
header('location:../../../store.php');

 // sqlsrv_free_do($do);
 // sqlsrv_close($conn);
// }
?>
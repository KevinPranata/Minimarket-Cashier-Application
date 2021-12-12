<?php
include "../../../config/config.php";

$conn = sqlsrv_connect($serverName, $dbName);

$store_id = $_GET['id'];

$query = "DELETE FROM Store 
WHERE StoreID='$store_id'"; 



$do=sqlsrv_query($conn, $query) or die(sqlsrv_errors());

// -- if($query){
// --     echo "Successed";
header('location:../../../store.php');

 // sqlsrv_free_do($do);
 // sqlsrv_close($conn);
// -- }
?>
<?php
include "../../../config/config.php";

$conn = sqlsrv_connect($serverName, $dbName);

$customer_id = $_GET['id'];

$query = "DELETE FROM Customer 
WHERE CustomerID='$customer_id'"; 



$do=sqlsrv_query($conn, $query) or die(sqlsrv_errors());

// -- if($query){
// --     echo "Successed";
header('location:../../../customer.php');

 // sqlsrv_free_do($do);
 // sqlsrv_close($conn);
// -- }
?>
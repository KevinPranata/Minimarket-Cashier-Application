<?php
include "../../../config/config.php";

$conn = sqlsrv_connect($serverName, $dbName);

$supplier_id = $_GET['id'];

$query = "DELETE FROM Supplier 
WHERE SupplierID='$supplier_id'"; 



$do=sqlsrv_query($conn, $query) or die(sqlsrv_errors());

// -- if($query){
// --     echo "Successed";
header('location:../../../supplier.php');

 // sqlsrv_free_do($do);
 // sqlsrv_close($conn);
// -- }
?>
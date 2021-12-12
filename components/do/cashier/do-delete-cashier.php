<?php
include "../../../config/config.php";

$conn = sqlsrv_connect($serverName, $dbName);

$cashier_id = $_GET['id'];

$query = "DELETE FROM Cashier 
WHERE CashierID='$cashier_id'"; 



$do=sqlsrv_query($conn, $query) or die(sqlsrv_errors());

// -- if($query){
// --     echo "Successed";
header('location:../../../cashier.php');

 // sqlsrv_free_do($do);
 // sqlsrv_close($conn);
// -- }
?>
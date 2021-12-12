<?php
include "../../../config/config.php";

$conn = sqlsrv_connect($serverName, $dbName);

$item_id = $_GET['id'];

$query = "DELETE FROM Item 
WHERE ItemID='$item_id'"; 



$do=sqlsrv_query($conn, $query) or die(sqlsrv_errors());

// -- if($query){
// --     echo "Successed";
header('location:../../../item.php');

 // sqlsrv_free_do($do);
 // sqlsrv_close($conn);
// -- }
?>
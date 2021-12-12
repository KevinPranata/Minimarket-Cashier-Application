<?php
include "../../../config/config.php";

$conn = sqlsrv_connect($serverName, $dbName);

$supplier_id = $_POST['id'];
$supplier_name = $_POST['supplier_name'];
$supplier_address = $_POST['supplier_address'];
$supplier_phone_number = $_POST['supplier_phone_number'];
$supplier_email = $_POST['supplier_email'];

// echo $supplier_id;
echo $supplier_id;
echo $supplier_name;
echo $supplier_address;
echo $supplier_phone_number;
echo $supplier_email;

$query = "UPDATE Supplier SET 
SupplierName='$supplier_name',
SupplierAddress='$supplier_address',
SupplierPhoneNumber='$supplier_phone_number',
SupplierEmail='$supplier_email'
WHERE SupplierID='$supplier_id'"; 



$do=sqlsrv_query($conn, $query) or die(sqlsrv_errors());

// -- if($query){
// --     echo "Successed";
header('location:../../../supplier.php');

 // sqlsrv_free_do($do);
 // sqlsrv_close($conn);
// -- }
?>
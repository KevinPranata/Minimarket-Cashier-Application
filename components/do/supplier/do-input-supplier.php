<?php
include "../../../config/config.php";

$conn = sqlsrv_connect($serverName, $dbName);

$supplier_name = $_POST['supplier_name'];
$supplier_address = $_POST['supplier_address'];
$supplier_phone_number = $_POST['supplier_phone_number'];
$supplier_email = $_POST['supplier_email'];


echo $supplier_name;
echo $supplier_address;
echo $supplier_phone_number;
echo $supplier_email;

$query = "INSERT INTO Supplier (SupplierName, SupplierAddress, SupplierPhoneNumber, SupplierEmail) 
VALUES('$supplier_name','$supplier_address','$supplier_phone_number','$supplier_email')";



$do=sqlsrv_query($conn, $query) or die(sqlsrv_errors());

if($query){
    echo "Successed";
    header('location:../../../supplier.php');

// sqlsrv_free_do($do);
// sqlsrv_close($conn);
}
?>
<?php
include "../../../config/config.php";

$conn = sqlsrv_connect($serverName, $dbName);

$customer_name = $_POST['customer_name'];
$customer_address = $_POST['customer_address'];
$customer_gender = $_POST['customer_gender'];
$customer_phone_number = $_POST['customer_phone_number'];
$customer_email = $_POST['customer_email'];

echo $customer_name;
echo $customer_address;
echo $customer_gender;
echo $customer_phone_number;
echo $customer_email;



$query = "INSERT INTO Customer (
    customerName, 
    customerAddress, 
    customerGender, 
    customerPhoneNumber, 
    customerEmail) 
VALUES
(
'$customer_name',
'$customer_address',
'$customer_gender',
'$customer_phone_number',
'$customer_email')";



$do=sqlsrv_query($conn, $query) or die(sqlsrv_errors());

if($query){
    echo "Successed";
    header('location:../../../customer.php');

// sqlsrv_free_do($do);
// sqlsrv_close($conn);
}
?>
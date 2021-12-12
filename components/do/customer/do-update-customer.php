<?php
include "../../../config/config.php";

$conn = sqlsrv_connect($serverName, $dbName);

    $id = $_POST['id'];
    $customer_name = $_POST['customer_name'];
    $customer_address = $_POST['customer_address'];
    $customer_gender = $_POST['customer_gender'];
    $customer_phone_number = $_POST['customer_phone_number'];
    $customer_email = $_POST['customer_email'];
    
    $query = "UPDATE Customer SET 
    CustomerName='$customer_name', 
    CustomerAddress='$customer_address',
     CustomerGender='$customer_gender', 
     CustomerPhoneNumber='$customer_phone_number',
      CustomerEmail='$customer_email'
    WHERE ID='$id'"; 

$do=sqlsrv_query($conn, $query) or die(sqlsrv_errors());

// if($do){
//     echo "Successed";
header('location:../../../customer.php');

 // sqlsrv_free_do($do);
 // sqlsrv_close($conn);
// }
?>
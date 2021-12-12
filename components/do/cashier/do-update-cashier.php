<?php
include "../../../config/config.php";

$conn = sqlsrv_connect($serverName, $dbName);

$idC= $_POST['id_c'];
$id = $_POST['id'];
$cashier_name = $_POST['cashier_name'];
$cashier_address = $_POST['cashier_address'];
$cashier_gender = $_POST['cashier_gender'];
$cashier_phone_number = $_POST['cashier_phone_number'];
$cashier_email = $_POST['cashier_email'];

    // echo var_dump($id);
    // echo var_dump($store_address);
    // echo var_dump($store_phone_number);
    echo $idC;
    echo $id;
    echo $cashier_name;
    echo $cashier_address;
    echo $cashier_gender;
    echo $cashier_phone_number;
    echo $cashier_email;


$query = "UPDATE Cashier SET 
FK_StoreID = '$id',
CashierName='$cashier_name', 
CashierAddress='$cashier_address',
 CashierGender='$cashier_gender', 
 CashierPhoneNumber='$cashier_phone_number',
  CashierEmail='$cashier_email'
WHERE ID='$idC'"; 

$do=sqlsrv_query($conn, $query) or die(sqlsrv_errors());

// if($do){
//     echo "Successed";
header('location:../../../cashier.php');

 // sqlsrv_free_do($do);
 // sqlsrv_close($conn);
// }
?>
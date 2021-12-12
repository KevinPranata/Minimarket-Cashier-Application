<?php
include "../../../config/config.php";

$conn = sqlsrv_connect($serverName, $dbName);

$store_id = $_POST['store_id'];
$cashier_name = $_POST['cashier_name'];
$cashier_address = $_POST['cashier_address'];
$cashier_gender = $_POST['cashier_gender'];
$cashier_phone_number = $_POST['cashier_phone_number'];
$cashier_email = $_POST['cashier_email'];

echo $store_id;
echo $cashier_name;
echo $cashier_address;
echo $cashier_gender;
echo $cashier_phone_number;
echo $cashier_email;



$query = "INSERT INTO Cashier (
    FK_StoreID, 
    CashierName, 
    CashierAddress, 
    CashierGender, 
    CashierPhoneNumber, 
    CashierEmail) 
VALUES
('$store_id',
'$cashier_name',
'$cashier_address',
'$cashier_gender',
'$cashier_phone_number',
'$cashier_email')";



$do=sqlsrv_query($conn, $query) or die(sqlsrv_errors());

if($query){
    echo "Successed";
    header('location:../../../cashier.php');

// sqlsrv_free_do($do);
// sqlsrv_close($conn);
}
?>
<?php
include "../../../config/config.php";

$conn = sqlsrv_connect($serverName, $dbName);
$totalData=count($_POST['item_list']);
$customer_id=$_POST['customer_id'];
$transaction_date=$_POST['transaction_date'];
echo $customer_id."onnne uid";
// echo $totalData;


echo "<br.";
// echo "Here".$_POST['qty'][0];
$query = "INSERT INTO [Transaction] (FK_CustomerID, TransactionDate) 
VALUES('$customer_id','$transaction_date')";

print_r($_POST);

for ($i=0;$i<count($_POST['item_list']);$i++) {
    
    echo "<p>".$_POST['item_list'][$i]."</p>";
    echo "<p>".$_POST['qty'][$i]."</p>";
    echo "<hr />";
    
} 

$do=sqlsrv_query($conn, $query) or die(sqlsrv_errors());
// GET LATEST DATA

$latest = "SELECT TOP 1 ID FROM [Transaction] WHERE FK_CustomerID='$customer_id' ORDER BY TransactionDate DESC";
// $row= sqlsrv_query($conn, $latest) or die(sqlsrv_errors());
// echo $dd = (int)sqlsrv_fetch_array($row);echo "done";
// echo $row;
// print_r($row);

$query = sqlsrv_query($conn,$latest) or die(sqlsrv_errors());
while($data=sqlsrv_fetch_array($query)){
    echo $dd=$data['ID'],"done";
}

if ($totalData > 0) {
    for ($i=0;$i<count($_POST['item_list']);$i++) {
        $ild   = (int)$_POST["item_list"][$i];
        $qld  = (int)$_POST["qty"][$i];
        echo $ild;
        echo "<br>,".$qld."-----";
        $queue  = "INSERT INTO TransactionDetail (FK_TransactionID, FK_CashierID, FK_ItemID, QuantityBought) 
        VALUES ('$dd',2,'$ild','$qld')";
        $result = sqlsrv_query($conn, $queue) or die(sqlsrv_errors());
        if($result){
            echo "success";
        }
    }
    echo "Data inserted successfully";
}else{
    echo "Please Enter user name";
}
header('location:../../../transaction.php');


?>
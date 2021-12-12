<?php

$serverName = ".";
$dbName = array("Database"=>"Indomaret","UID"=>"","PWD"=>"");
$conn = sqlsrv_connect( $serverName, $dbName );

if( $conn ){
    // echo "connection did it.<br>";
}else{
    echo "connection didn't make it<br> ";
    die(print_r(sqlsrv_errors(),true));
}
?>
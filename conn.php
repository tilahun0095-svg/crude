<?php
$servername="localhost";
$username="root";
$passward="";
$conn=new mysqli ($servername,$username,$passward);
if($conn->connect-error){
    die("connct-error".$conn->connect-error);
}
?>
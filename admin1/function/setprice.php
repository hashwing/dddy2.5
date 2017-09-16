<?php
session_start();
$sid=$_SESSION['sid'];
$dprice=$_POST['dprice'];
$sprice=$_POST['sprice'];
include '../../inc.php';
$sql="update dy_price set price='$dprice' where pid='1' and sid='$sid' ";
if(mysql_query($sql))
{
    $sql="update dy_price set price='$sprice' where pid='2' and sid='$sid' ";
    if(mysql_query($sql))
    echo 1;
}
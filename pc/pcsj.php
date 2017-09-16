<?php
header("Content-Type: text/html;charset=utf-8"); 
$sid=$_POST['sid'];
$zx=$_POST['zx'];
$time=$_POST['time'];
$name=$_POST['name'];
$phone=$_POST['phone'];
$adr=$_POST['adr'];
include('../inc.php');
$sql="UPDATE dy_sj SET name='$name',phone='$phone' WHERE sid='$sid'";
            if(mysql_query($sql))
            {
                 echo 1;       
            }
            else{
                    echo 0;
                } 

?>
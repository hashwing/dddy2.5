<?php
session_start();
$sid=$_SESSION['sid'];
$zx=$_POST['zx'];
include '../../inc.php';
if(mysql_query("UPDATE dy_sj SET zx = '$zx' WHERE sid='$sid'"))
{
    echo 1;
}
else{
    echo 0;
}

?>
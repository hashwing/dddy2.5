<?php
session_start();
$sid=$_SESSION['sid'];
include '../../inc.php';
//$sid="20160326215638075814";
$rel= array();
$time=array();
$psadr=array();
$sql="select * from dy_time ";
    $result=mysql_query($sql);
    $i=0;
    while($row=mysql_fetch_array($result))
    {
        $time[$i]=$row['time'];
        $i++;
    }
    $sql="select * from dy_ssq ";
    $result=mysql_query($sql);
    $i=0;
    while($row=mysql_fetch_array($result))
    {
        $psadr[$i]=$row['adr'];
        $i++;
    }
    $rel["time"]=$time;
    $rel["psadr"]=$psadr;
    echo json_encode($rel)

?>
<?php
include 'inc.php';
$sid=$_POST['dyadr'];
//$sid="20160326215638075814";
$rel= array();
$st=array();
$dt=array();
$psadr=array();
$sql="select * from dy_st where sid='$sid' order by zt asc ";
    $result=mysql_query($sql);
    $i=0;
    while($row=mysql_fetch_array($result))
    {
        $st[$i]=$row['time'];
        $i++;
    }
$sql="select * from dy_dt where sid='$sid' order by zt asc ";
    $result=mysql_query($sql);
    $i=0;
    while($row=mysql_fetch_array($result))
    {
        $dt[$i]=$row['time'];
        $i++;
    }
    $sql="select * from dy_psadr where sid='$sid' ";
    $result=mysql_query($sql);
    $i=0;
    while($row=mysql_fetch_array($result))
    {
        $psadr[$i]=$row['adr'];
        $i++;
    }
    $rel["st"]=$st;
    $rel["dt"]=$dt;
    $rel["psadr"]=$psadr;
    echo json_encode($rel)
?>
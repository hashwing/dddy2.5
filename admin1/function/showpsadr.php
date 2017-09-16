<?php
session_start();
$sid=$_SESSION['sid'];
include '../../inc.php';
//$sid=$_POST['sid'];
//$sid="20160326215638075814";
$rel= array();
$st=array();
$dt=array();
$psadr=array();
$dtnr=array();
$stnr=array();
$psdznr=array();
$sql="select * from dy_st where sid='$sid' order by zt asc ";
    $result=mysql_query($sql);
    $i=0;
    while($row=mysql_fetch_array($result))
    {
        $stnr[0]=$row['time'];
        $stnr[1]=$row['id'];
        $st[$i]=$stnr;
        $i++;
    }
$sql="select * from dy_dt where sid='$sid' order by zt asc ";
    $result=mysql_query($sql);
    $i=0;
    while($row=mysql_fetch_array($result))
    {
        $dtnr[0]=$row['time'];
        $dtnr[1]=$row['id'];
        $dt[$i]=$dtnr;
        $i++;
    }
    $sql="select * from dy_psadr where sid='$sid' ";
    $result=mysql_query($sql);
    $i=0;
    while($row=mysql_fetch_array($result))
    {
        $psdznr[0]=$row['adr'];
        $psdznr[1]=$row['id'];
        $psadr[$i]=$psdznr;
        $i++;
    }
    $rel["st"]=$st;
    $rel["dt"]=$dt;
    $rel["psadr"]=$psadr;
    echo json_encode($rel)
?>
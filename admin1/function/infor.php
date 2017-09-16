<?php
session_start();
$sid=$_SESSION['sid'];
include '../../inc.php';
$res=array();
$sql="select * from dy_sj where sid='$sid'";
$result=mysql_query($sql);
if($rows=mysql_fetch_array($result))
{
    $res['name']=$rows['name'];
    $res['phone']=$rows['phone'];
    $res['ssq']=$rows['ssq'];
    $res['ssh']=$rows['ssh'];
    $res['zx']=$rows['zx'];
    $sql="select * from dy_price where pid='1' and sid='$sid'";
    $result=mysql_query($sql);
    if($rows=mysql_fetch_array($result))
    {
        $res['dprice']=$rows['price'];
    }
    $sql="select * from dy_price where pid='2' and sid='$sid'";
    $result=mysql_query($sql);
    if($rows=mysql_fetch_array($result))
    {
        $res['sprice']=$rows['price'];
    }
    echo json_encode($res);
}
else{
    echo 0;
}
?>
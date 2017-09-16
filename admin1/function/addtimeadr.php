<?php
session_start();
$sid=$_SESSION['sid'];
include '../../inc.php';
if(!empty($_POST['psadr']))
{
$psadr=$_POST['psadr'];
$sql="insert into dy_psadr(sid,adr,zt) values ('$sid','$psadr','1') ";
if(mysql_query($sql))
{
   echo 1; 
}
else
{
    echo 0;
} 
}
if(!empty($_POST['st']))
{
$st=$_POST['st'];
$sql="select * from dy_time where time='$st' ";
    $result=mysql_query($sql);
    while($row=mysql_fetch_array($result))
    $zt=$row['tid'];
$sql="insert into dy_st(sid,time,zt) values ('$sid','$st','$zt') ";
if(mysql_query($sql))
{
   echo 1; 
}
else
{
    echo 0;
} 
}
if(!empty($_POST['dt']))
{
$dt=$_POST['dt'];
$sql="select * from dy_time where time='$dt' ";
    $result=mysql_query($sql);
    if($row=mysql_fetch_array($result))
    $zt=$row['tid'];
$sql="insert into dy_dt(sid,time,zt) values ('$sid','$dt','$zt') ";
if(mysql_query($sql))
{
   echo 1; 
}
else
{
    echo 0;
} 
}


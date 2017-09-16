<?php
include '../../inc.php';
if(!empty($_POST['pid']))
{
 $pid=$_POST['pid'];
 if(mysql_query("DELETE FROM dy_psadr WHERE id='$pid'"))
 {
    echo 1;
 }
 else
 {
    echo 0;
 }  
}
if(!empty($_POST['stid']))
{
 $stid=$_POST['stid'];
 if(mysql_query("DELETE FROM dy_st WHERE id='$stid'"))
 {
    echo 1;
 }
 else
 {
    echo 0;
 }  
}
if(!empty($_POST['dtid']))
{
 $dtid=$_POST['dtid'];
 if(mysql_query("DELETE FROM dy_dt WHERE id='$dtid'"))
 {
    echo 1;
 }
 else
 {
    echo 0;
 }  
}
?>
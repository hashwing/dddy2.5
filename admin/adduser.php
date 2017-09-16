<?php
include '../inc.php';
$user=$_POST['user'];
$password=$_POST['password'];
$email=$_POST["email"];
$phone=$_POST['phone'];
$ssqid=$_POST['ssqid'];
$ssh=$_POST['ssh'];
date_default_timezone_set('PRC');
function trade_no() {
    list($usec, $sec) = explode(" ", microtime());
    $usec = substr(str_replace('0.', '', $usec), 0 ,4);
    $str  = rand(10,99);
    return date("YmdHis").$usec.$str;
}
$sql="select * from dy_ssq where ssqid='$ssqid'";
    $result=mysql_query($sql);
   $row=mysql_fetch_array($result);
   $ssq=$row['adr'];
$sid=trade_no();
$sql="insert into dy_sj (sid,user,pwd,phone,email,zx,ssq,ssh) values ('$sid','$user','$password','$phone','$email','0','$ssq','$ssh') ";
echo $sid;
if(mysql_query($sql))
{
    $sql="select * from dy_cprice ";
    $result=mysql_query($sql);
    while($row=mysql_fetch_array($result))
    {
        $pid=$row['pid'];
        $sql= "insert into dy_price (sid,pid,price,zt)value ('$sid','$pid','0.2','0') ";
        if(mysql_query($sql))
        {
           echo $row['pclass']."价格设置成功"; 
        }else{
             echo $row['pclass']."价格设置失败";
        }
        
    }
     
    
}

?>
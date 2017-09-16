<?php
include('inc.php');
$count= json_decode($_POST['wid'],true);
date_default_timezone_set('PRC');
function trade_no() {
    list($usec, $sec) = explode(" ", microtime());
    $usec = substr(str_replace('0.', '', $usec), 0 ,4);
    $str  = rand(10,99);
    return date("YmdHis").$usec.$str;
}
$ddh=trade_no();
$sid=$_POST['sid'];
$sh=$_POST['sh'];
$ssh=$_POST['ssh'];
$ssq=$_POST['ssq'];
$dt=$_POST['dt'];
$st=$_POST['st'];
$bz=$_POST['bz'];
$phone=$_POST['phone'];
$dtime=date('Y-m-d H:i:s',time());
$sql="select *from dy_price where sid='$sid' and pid='1'";
$result=mysql_query($sql);
if($rows=mysql_fetch_array($result))
{
    $dprice=$rows['price'];
}
else {
    $dprice=0.1;
}
$sql="select *from dy_price where sid='$sid' and pid='2'";
$result=mysql_query($sql);
if($rows=mysql_fetch_array($result))
{
    $sprice=$rows['price'];
}
else {
    $sprice=0.15;
}

$dtotal=0;
$stotal=0;
$dsl=0;
$ssl=0;
$rel=array();
for($i=0;$i<count($count);$i++)
{
    $wid=$count[$i];
    $sql="UPDATE dy_wj SET ddh='$ddh' WHERE wid='$wid'";
    mysql_query($sql);
    $sql="select *from dy_wj where wid='$wid'";
    $result=mysql_query($sql);

    if($rows=mysql_fetch_array($result))
    {
		$zys=$rows['mys']-$rows['sys']+1;
		if($rows['jb']==2)
		{
			if($zys%2==0)
			{
				$zys=$zys/2;
			}
			else{
				$zys=($zys+1)/2;
			}
		}
        if($rows['dsm']==1)
        {
            $dsl+=$zys*$rows['fs'];
             
        }
        else {
            if($zys%2==0)
            {
            $ssl+=(($zys/2)*$rows['fs']);
            }
            else {
                $ssl+=(($zys-1)/2)*$rows['fs'];
                $dsl+=1;
            }
            }

        }
        

    }
$adr=$ssq."-".$ssh;
$price=($dprice*$dsl)+($sprice*$ssl);
$sql="INSERT INTO dy_dd (ddh,sid,adr,sh,price,time,zt,zf,zs,dt,st,phone,bz) VALUES ('$ddh', '$sid', '$adr','$sh','$price','$dtime','0','0','0','$dt','$st','$phone','$bz')";
if(mysql_query($sql))
{
    $ret=array();
    $ret['wds']=count($count);
    $ret['price']=$price;
    $ret['ddh']=$ddh;
    echo json_encode($ret);
}
else {
    echo 0;
}
 
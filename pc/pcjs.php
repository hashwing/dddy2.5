1<?php
header("Content-Type: text/html;charset=utf-8"); 
$sid=$_POST['sid'];
include('../inc.php');
$sql="select * from dy_dd where sid='$sid' and zs='1' and zt='1' and (zf='1' or zf='2') ";
$result=mysql_query($sql);
$xh=1;
while($rows=mysql_fetch_array($result))
{
    echo "aaacc".$xh."dd";
    echo "cc".$rows['ddh']."dd";
    echo "cc".$rows['phone']."dd";
    echo "cc".$rows['adr']."dd"; 
    echo "cc".$rows['price']."dd";
    if($rows['sh']==1){echo "cc�ͻ�dd";}else{echo "cc����dd";} 
    if($rows['zf']==1)echo "cc�Ѹ���ddbbb";else echo "ccδ����ddbbb";
    $xh++;
}

?>
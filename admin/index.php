<?php 
include '../inc.php';
$sql="select *from dy_ssq";
$result=mysql_query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>肇庆学院校园打印服务</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<meta name ="keywords" content="肇庆学院,打印,校园,服务"/>
	<meta name="description" content="专属肇庆学院的校园打印服务,倾心为每位同学服务在线下单，在线付款/货到付款，送货上门无须拥挤，无须排队，10s完成注册，通通在线完成"/>
	
</head>
<body >
    <form action="adduser.php" method="post">
       账号 <input type="text" name="user" />密码：<input type="password" name="password" /> 邮箱：<input name="email" type="text" /> 电话：<input name="phone" type="text" />
 宿舍区 <select name="ssqid"><?php 
    while($rows=mysql_fetch_array($result))
    {
    ?>
      <option value="<?php echo $rows['ssqid'];?>"><?php echo $rows['adr'];?></option>
     <?php }?></select> 宿舍号 <input type="text" name="ssh" />
<br />
<input type="submit" value="提交" />
    </form>

</body>
</html>
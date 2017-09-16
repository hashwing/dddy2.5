<?php
include('inc.php');
//宿舍区
$sql = "CREATE TABLE dy_ssq
(
ssqid int NOT NULL auto_increment,
adr varchar(50),
 PRIMARY KEY  (`ssqid`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_ssq sucessful</br>";
}
else{echo "dy_ssq bad!</br>";}
//商家
$sql = "CREATE TABLE dy_sj
(
id int NOT NULL auto_increment,
sid varchar(30),
ssq varchar(50),
ssh  varchar(20),
user varchar(30),
pwd varchar(20),
name varchar(30),
phone varchar(20),
email varchar(20),
zx int(2),
 PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_sj sucessful</br>";   
}
else{echo "dy_sj bad!</br>";}


//订单
$sql = "CREATE TABLE dy_dd
(
id int NOT NULL auto_increment,
ddh varchar(30),
sid varchar(30),
price double,
zf int(2),
zfddh varchar(30),
sh  int(2),
adr varchar(255),
phone varchar(20),
st varchar(30),
dt varchar(30),
bz varchar(255),
zt int(2),
zs int(2),
time datetime,
PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_dd sucessful</br>";
}
else{echo "dy_dd bad!</br>";} 
//文件
 $sql = "CREATE TABLE dy_wj
(
id int NOT NULL auto_increment,
wid varchar(30),
ddh varchar(30),
wjm varchar(255),
url varchar(255),
size varchar(30),
color int(2),
dsm int(2),
jb int(2),
sys int(5),
mys int(5),
fs int(5),
zd int(2),
bz varchar(255),
zt int(2),
 PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_wj sucessful</br>";
}
else{echo "dy_wj bad!</br>";} 

//价格
$sql = "CREATE TABLE dy_price
(
id int NOT NULL auto_increment,
sid varchar(30),
pid int(11),
zt int(2),
price double,
 PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_price sucessful</br>";
}
else{echo "dy_price bad!</br>";}
//
$sql = "CREATE TABLE dy_cprice
(
pid int NOT NULL auto_increment,
pclass varchar(20),
 PRIMARY KEY  (`pid`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_cprice sucessful</br>";
      mysql_query("INSERT INTO dy_cprice (pclass) VALUES ('单面')"); 
      mysql_query("INSERT INTO dy_cprice (pclass) VALUES ('双面')"); 
      mysql_query("INSERT INTO dy_cprice (pclass) VALUES ('黑白')"); 
      mysql_query("INSERT INTO dy_cprice (pclass) VALUES ('彩色')"); 
      
}
else{echo "dy_cprice bad!</br>";}
//
$sql = "CREATE TABLE dy_time
(
tid int NOT NULL auto_increment,
time varchar(30),
 PRIMARY KEY  (`tid`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_time sucessful</br>";
      for($i=7;$i<24;$i++)
    {
        $time=$i.":00-".($i+1).":00";
        
      mysql_query("INSERT INTO dy_time (time) VALUES ('$time')");
      }
}
else{echo "dy_time bad!</br>";}

//
$sql = "CREATE TABLE dy_psadr
(
id int NOT NULL auto_increment,
sid varchar(30),
adr varchar(50),
zt int(2),
 PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_psadr sucessful</br>";
}
else{echo "dy_psadr bad!</br>";}
//
$sql = "CREATE TABLE dy_st
(
id int NOT NULL auto_increment,
sid varchar(30),
time varchar(30),
zt int(2),
 PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_st sucessful</br>";
}
else{echo "dy_st bad!</br>";}
//
$sql = "CREATE TABLE dy_dt
(
id int NOT NULL auto_increment,
sid varchar(30),
time varchar(30),
zt int(2),
 PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_dt sucessful</br>";
}
else{echo "dy_dt bad!</br>";}
//
$sql = "CREATE TABLE dy_jsdd
(
id int NOT NULL auto_increment,
sid varchar(30),
time datetime,
price double,
 PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_jsdd sucessful</br>";
}
else{echo "dy_jsdd bad!</br>";}
?>
﻿<?php 
include 'inc.php';
$sql="select *from dy_sj where zx='1'";
$result=mysql_query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>校园打印</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<meta name ="keywords" content="肇庆学院,打印,校园,服务"/>
	<meta name="description" content="专属肇庆学院的校园打印服务,倾心为每位同学服务在线下单，在线付款/货到付款，送货上门无须拥挤，无须排队，10s完成注册，通通在线完成"/>
	<script type="text/javascript" src="js/common-header.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link rel=stylesheet href="css/jquery.mobile-1.4.5.css"/>
	<link rel=stylesheet href="css/mdy.css"/>
	<script src="js/jquery.mobile-1.4.5.js"></script>
	<script type="text/javascript" src="js/dy.js"></script>
</head>
<body onload="showwj()">
<div data-role="page">

  <div data-role="header" style="background:#0080FF;color:#fff">
    <h1>肇庆学院校园打印</h1>
  </div>
  <div data-role="navbar">
<ul>
<li><a href="#anylink">配送打印</a></li>
<li><a href="#anylink">自助打印</a></li>
<li><a href="#wyjm" data-rel="popup" class="ui-btn" data-position-to="window" data-transition="slidedown">我要加盟</a></li>
</ul>
</div>
<div data-role="popup" id="wyjm" class="ui-content">
      <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-right">关闭</a>
       <H1>欢迎加盟</h1>
      <p>联系电话：15361710334</p>
	<p>联系QQ： 617708958</p>
    </div>
  <div data-role="main" class="ui-content">
   <div class="jbxx">
<h2>基本信息</h2>
<form name="jbxxf">
<div class="adr">
  <span class="wz1">打印地点：</span>
    <span class="dropdown">
      <select name="one" id="dyadr" class="dropdown-select" onchange="time()">
        <option value="">请选择打印地点</option>
        <?php 
    while($rows=mysql_fetch_array($result))
    {
    ?>
      <option value="<?php echo $rows['sid'];?>"><?php echo $rows['ssq']."-".$rows['ssh'];?></option>
     <?php }?>
      </select>
    </span>
	<span>是否配送：</span>
	 <fieldset data-role="controlgroup">
          <label for="sh">是否配送</label>
		  <input type="checkbox"  id="sh" value="1" name="sh" onchange="issh()"  >
      </fieldset>
      <span id="dtq">
    <span class="wz1">自提时间：</span>
    <select name="one" id="dt"   >
        <option value="0">请选择自提时间</option>
      </select>
    </span>
	<span id="psdz" style="display:none;">
	<span class="wz1">配送地址：</span>
    <span class="dropdown">
      <select name="one" id="ssq" class="dropdown-select">
        <option value="">请选择配送宿舍区</option>
      </select>
    </span>
	<span class="wz1">宿舍号：</span>
	<input id="ssh" type="text"/>
	</span>
      <span id="stq" style="display: none;">
    <span class="wz1">配送时间：</span>
      <select name="st" id="st"  >
        <option value="0">请选择送货时间</option>
      </select>
      </span>
      <span class="wz1">备注：</span>
    <input id="ddbz" type="text"/>
	<div id="psdz" style="display:none;">
	<span class="wz1">配送地址：</span>
      <select name="one" id="ssq">
        <option value="0">请选择配送宿舍区</option>
      </select>
	<span class="wz1">宿舍号：</span>
	<input id="ssh" type="text"/>
    <span class="wz1">手机：</span>
    <input id="phone" type="text"/>
	</div>
	<br/>
	<span id="shtime"></span>
</div>
</form>
</div >
<div class="dywj" >
<h2>上传文件</h2>
<span id="wjlist" ></span>
<div class="upwj">
<a role="button" data-category="UserAccount" data-action="login" data-toggle="modal" href="#signup-modal">
		<a href="#scwjtc" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all" data-position-to="window" data-transition="slidedown">添加打印文件</a>
		</div>
		</a>
		支持：doc、docx、jpg、pdf 格式
</div>
<div  class="js">
<h2 style="text-align:center;">结算</h2>
<hr/>
<br/>
<div class="djxq">
<table>
<tr>
<td style="width:150px;">项目</td>
<td style="width:150px;">单价(元/张）</td>
<td style="width:150px;">数量（张）</td>
<td style="width:150px;">总价（元） </td>
</tr>
<tr>
<td>单面</td>
<td><span id="dprice"></span></td>
<td><span id="dsl"></span></td>
<td><span id="dtotal"></span></td>
</tr>
<tr>
<td>双面</td>
<td><span id="sprice"></span></td>
<td><span id="ssl"></span></td>
<td><span id="stotal"></span></td>
</tr>
</table>
</div>

<div class="tjbn">
<p style="font-size:18px; color:red;"> 合计：<span id="total"></span>元</p>
<br/>
<a onclick="ddtj()" href="#ddtj" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all" data-position-to="window" data-transition="slidedown" id="ddtj" >提交订单</a><span id="ddtjtip"></span> 
</div>
<div style="clean:both;"></div>
<br/>
<br/>
<br/>
<br/>
<br/>
</div>

   
   
	

	
  </div>

  <div data-role="footer">
    <h6>Copyright © 2015.肇庆学院校园打印服务团队 所有</h6>
	<h6>备案号：粤ICP备15113762-1</h6>
  </div>
 <div data-role="popup" id="scwjtc" class="ui-content" data-overlay-theme="b">
      <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-right">关闭</a>
  <form class="signup-form clearfix" name="ddf" id="ddf" >
  <div id="wjxx">
    <p class="error"></p>
<table><tr><td width="25%">选择文件</td><td><input name="wd" id="wd" type="file"   /></td></tr></table>
	
	<select name="sc" id="sc">
              <option value="0" selected="">A4黑白</option>
         </select>
	<select name="dsm" id="dsm">
              <option value="1" selected="">单面</option>
		<option value="2" >双面</option>
         </select>

	<select name="jb" id="jb">
              <option value="1" selected="">1页1版</option>
		<option value="2" >1页2版</option>
         </select>
         <select name="zd" id="zd">
              <option value="1" selected="">装订</option>
		<option value="0" >不装订</option>
         </select>
		 <table>
        <tr>
          <td>
		<label for="sys">打印范围：</label> 
		</td>
		<td>
		<input name="sys" id="sys" type="number" min="1" value="1" style="width:50px; display:inline;" onkeypress="return IsNum(event)" />
		</td>
		<td>
		页至
		</td>
		<td>
		<input name="mys" id="mys" type="number" min="1" value="" style="width:50px;display:inline;" onkeypress="return IsNum(event)"/ >
		</td>
		<td>
		页
		</td>
		</tr>
		</table>
		

	<table>
        <tr>
          <td>
	打印份数：</td><td><input name="fs" id="fs" type="number" min="1" value="1" style="width:50px;" onkeypress="return IsNum(event)" />
	</td>
	</tr>
	</table>
	</div>
    <div style="width:100px; margin:0 auto;" ><span id="tjz" style="height:100px; font-size:20px; color:red;"></span></div>
    <br/>
    <div style="width:150px; margin:0 auto; " id="tj" ><input type="button" onclick="UpladFile()"  class="button-blue reg" value="添加" /></div>
    <div style="width:25%;  margin:0 auto; display:none;" id="qd"  ><a  data-rel="back"  onclick="qdb()" class="button-blue reg" >点击完成</a></div>
  </form>
    </div>
</div>

</body>
</html>
<script src="static/js/landing-min.js"></script>
	<script src="js/wjsq.js"></script>

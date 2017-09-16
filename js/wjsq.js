
var wid=new Array();//使用数组存储文件id
var yss=0;//文件数
var json;//存储刚上传文件名的对象
var yssbt=0;//识别文件的类型1.word 2.pdf 3.png jpg

//提交文件设置信息
function wjxxtj(){
     var dsm=$("#dsm").val();
    var jb=$("#jb").val();
	var sys=$("#sys").val();
    var mys=$("#mys").val();
    var fs=$("#fs").val();
    var zd=$("#zd").val();
     if(fs==""||fs==0)
   {
    alert("份数不能为空或0！");
    ddf.fs.focus();
    return false;
   }
     if(sys==""||sys==0)
   {
    alert("开始页码不能为空或0！");
    ddf.sys.focus();
    return false;
   }
   if(mys==""||mys==0)
   {
    alert("结束页码不能为空或0！");
    ddf.mys.focus();
    return false;
   }
   $("#tj").hide();
   $("#ddf").hide();
            $.ajax({
			type:"post",
			data: { "zd":zd,"dsm":dsm,"jb":jb,"fs":fs,"sys":sys,"mys":mys,"doc":json.file,"ofilename":json.ofile},
			url:"wjtj.php",
			beforeSend:function(){
				$("#tjz").html("提交订单信息中...");
		    },
		    success:function(msg){	
                    if(msg!=0)
                    {
                    	wid[yss]=msg;
                    	yss++;
                        $("#tjz").html("完成");
                        document.getElementById("ddf").reset();
                        var inputobj= document.getElementById('qd');
                        eval("inputobj.style.display=\"\"");
                        showwj();
                    }
                    else{
                    	var inputobj= document.getElementById('tjz');
                        $("#tjz").html("提交出错");    
                        var inputobj= document.getElementById('wjxx');
                        eval("inputobj.style.display=\"\"");
                        var inputobj= document.getElementById('tj');
                        eval("inputobj.style.display=\"\"");
                        eval("inputobj.value=\"重新提交\"");
                        return false;                    }
			  }
		});
    
    }

//验证文件
function checkreg(){
   var inputobj= document.getElementById('tj');
    var inputobj1= document.getElementById('wjxx');
    var obj = document.getElementById('wd');  
    if(obj.value=='') 
    { 
        alert('请选择要打印的文档文件');
        return false; 
    }
    var FileName=new String(obj.value);//文件名 
    $("#wjm").html(obj.value);
     var stuff=new String (FileName.substring(FileName.lastIndexOf(".")+1,FileName.length));//文件扩展名
    if(stuff=='doc'||stuff=='docx'||stuff=='pdf'||stuff=='jpg'||stuff=='png') 
    { 
        if(stuff=='doc'||stuff=='docx')
     {
        yssbt=1;
        }
     if(stuff=='pdf')
     {
        yssbt=2;
     }
     if(stuff=='jpg'||stuff=='png'){
        yssbt=3;
     }
        var obj = document.getElementById('wd');  
         var fileSize = obj.files[0].size;//文件的大小，单位为字节B
        if((fileSize/1024/1024)>30)
        {
        alert('文件大小不能超过30M');
        return false; 
        }
        else{
        return true; 
        }
         
    } 
    else{
        alert('文件类型不正确，请选择doc、docx、pdf、jpg、png文件'); 
        eval("inputobj.style.display=\"\"");
        $("#wd").val('');
        return false;
    }
   
  
}
//文件上传
    var xhr;
    
    function createXMLHttpRequest()
    {
        if(window.ActiveXObject)
        {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        else if(window.XMLHttpRequest)
        {
            xhr = new XMLHttpRequest();
        }
    }
    function UpladFile()
    {
        if(checkreg())
        {
            $("#wd").hide();
            $("#wjm").show();
            $("#tjz").html("上传文档中...");
           var fileObj = document.getElementById("wd").files[0];
            var FileController = '1.php';
            var form = new FormData();
            form.append("myfile", fileObj);
            createXMLHttpRequest();
            xhr.onreadystatechange = handleStateChange;
            xhr.open("post", FileController, true);
            xhr.send(form); 
        }
        
    }
    function handleStateChange()
    {
        if(xhr.readyState == 4)
        {
            if (xhr.status == 200 || xhr.status == 0)
            {
                var result = xhr.responseText;
                json = eval("(" + result + ")");
                $("#tjz").html("计算文件页数中");
                $(".fwtip").html("计算文件页数中");
                if(yssbt==1)//文件是word文档
                {
                   $.ajax({
  			type:"get",
  			url:"pages.ashx?url="+json.file,
  			beforeSend:function(){
  		    },
            error: function (XMLHttpRequest, textStatus, errorThrown)
            {
            alert('页数识别失败，请自行填写！' );
            $(".fwtip").hide();
            $(".dyfw").show();
            $("#tjz").html("文件上传成功，请点添加文件");
            },
  		    success:function(msg){
                      if(msg){
                      $("#mys").val(msg);
                      $(".fwtip").hide();
                      $(".dyfw").show();
                      $("#tjz").html("文件上传成功，请点添加文件");
  		            }
                      else{
                        $(".fwtip").hide();
                        $(".dyfw").show();
                         $("#tjz").html("文件上传成功，请点添加文件");
                         
                      }
                     
  			  },
              complete : function(XMLHttpRequest,status){ 
　　　　        if(status=='timeout'){
 　　　　　          ajaxTimeoutTest.abort();
　　　　　           alert("页数识别失败，请自行填写");
                    $(".fwtip").hide();
                    $(".dyfw").show();
                    $("#tjz").html("文件上传成功，请点添加文件");
　　　　            }
                }
  	     	}); 
                }
                if(yssbt==2)//文件是pdf
                {
                   $.ajax({
  			type:"get",
  			url:"pdfpage.php?url="+json.file,
  			beforeSend:function(){
  		    },
            error: function (XMLHttpRequest, textStatus, errorThrown)
            {
            alert("页数识别失败，请自行填写");
                    $(".fwtip").hide();
                    $(".dyfw").show();
                    $("#tjz").html("文件上传成功，请点添加文件");
            },
  		    success:function(msg){
                      if(msg){
                      $("#mys").val(msg);
                      $(".fwtip").hide();
                      $(".dyfw").show();
                      $("#tjz").html("文件上传成功，请点添加文件");
  		            }
                      else{
                        $(".fwtip").hide();
                        $(".dyfw").show();
                         $("#tjz").html("文件上传成功，请点添加文件");
                          
                         
                      }
                     
  			  }
            
            
  		}); 
                }
               if(yssbt==3){
                    $("#mys").val(1);
                    $(".fwtip").hide();
                      $(".dyfw").show();
                      $("#tjz").html("文件上传成功，请点完成添加");
                }
                
                
            }
        }
    }
    
   //完成一份文件添加恢复原来
    function qdb()
    {
    	showwj();
    	var inputobj= document.getElementById('wjxx');
        eval("inputobj.style.display=\"\"");
        var inputobj= document.getElementById('qd');
        eval("inputobj.style.display=\"none\"");
        var inputobj= document.getElementById('tj');
        eval("inputobj.style.display=\"\"");
        $("#wd").show();
        $("#wjm").val('');
        $("#wjm").hide();
        $(".dyfw").hide();
        $(".fwtip").show();
        $("#ddf").show();
        $("#tjz").html("");
    }
    //获取已添加文件
    function showwj()
    {
    	var json = {};
    	  var j=0;
    	  for (var i = 0; i < wid.length; i++) {
    	      json[j]=wid[i];
    	      j++;
    	  }
    	  $.ajax({
  			type:"post",
  			data: {"wid":JSON.stringify(json) },
  			url:"wjlist.php",
  			beforeSend:function(){
  		    },
  		    success:function(msg){
                      if(msg){
  		              $("#wjlist").html(msg);
  		            }
                      else{
                          $("#wjlist").html('暂无文件，请添加');
                         
                      }
                     
  			  }
  		});
    	  price();
    	  
    }
    
    //删除文件
    function clear1(swid)
    {
    	$.ajax({
  			type:"post",
  			data: {"swid":swid },
  			url:"clean.php",
  			beforeSend:function(){
  		    },
  		    success:function(msg){
                      if(msg){

  		              alert(msg);
  		            Array.prototype.indexOf = function(val) {
  		              for (var i = 0; i < this.length; i++) {
  		                  if (this[i] == val) return i;
  		              }
  		              return -1;
  		          };
  		          Array.prototype.remove = function(val) {
  		              var index = this.indexOf(val);
  		              if (index > -1) {
  		                  this.splice(index, 1);
  		              }
  		          };
  		          wid.remove(swid);
  		          yss--;
  		        showwj();
  		            }
                      else{
                          
                    	  alert("网络错误");
                      }
                     
  			  }
  		});
    	return false;
    }
    //判断是否送货
  function issh()
  {
    if(document.getElementById("sh").checked){
                    $("#psdz").show();
                    $("#dtq").hide();
                    $("#stq").show();
                }
                else{
                    $("#psdz").hide();
                    $("#stq").hide();
                    $("#dtq").show();
                }
  }
  
  //获取价格
    function price()
        {
    	
    		var sid=document.jbxxf.dyadr.value;
    		var json = {};
  	  		var j=0;
  	  		for (var i = 0; i < wid.length; i++) {
  	  			json[j]=wid[i];
  	  			j++;
  	  		}
  	  		$.ajax({
  	  				type:"post",
  	  				data: {"wid":JSON.stringify(json),"sid":sid},
  	  				url:"price.php",
  	  				beforeSend:function(){
  	  				//$("#wjlist").html(m);
  	  			},
  	  			success:function(msg){
                    if(msg){
                    	var obj=eval("("+msg+")");
		              $("#dprice").html(obj.dprice);
		              $("#sprice").html(obj.sprice);
		              $("#dsl").html(obj.dsl);
		              $("#ssl").html(obj.ssl);
		              $("#dtotal").html(obj.dtotal);
		              $("#stotal").html(obj.stotal);
		              $("#total").html(obj.total);
		            }
                    else{
                    }
                   
			  }
		});
        }
        //获取送货时间和可配送宿舍区
        function time()
        {
            price();
             var dyadr=$('#dyadr').val();
            $("#st,#dt,#ssq").empty();
            $("#st").empty();
            var option = $("<option>").val(0).text("请选择配送时间");
            $("#st").append(option);
            var option = $("<option>").val(0).text("请选择提货时间");
            $("#dt").append(option);
            var option = $("<option>").val(0).text("请选择配送宿舍区");
            $("#ssq").append(option);
            if(dyadr==0)
            {
                return false;
            }
            $.ajax({
			type:"post",
			data: { "dyadr":dyadr},
			url:"time.php",
			beforeSend:function(){
				//$("#shtime").html("加载中...");
		    },
		    success:function(msg){	
		      var obj=eval("("+msg+")");
                       $.each(obj.st, function(i,val){     
                        var option = $("<option value=\""+val+"\">").val(val).text(val);
                        $("#st").append(option);  
                        });  
                       $.each(obj.dt, function(i,val){     
                        var option = $("<option value=\""+val+"\">").val(val).text(val);
                        $("#dt").append(option);     
                        });  
                       $.each(obj.psadr, function(i,val){     
                        var option = $("<option value=\""+val+"\">").val(val).text(val);
                        $("#ssq").append(option);
                            
                        }); 
                     
                    //$("#shtime").html(msg);
			  }
		});
        }
        //订单提交 
        function ddtj()
        {
        	var inputobj= document.getElementById('ddtj');
            eval("inputobj.style.display=\"none\"");
            var dyadr=document.jbxxf.dyadr.value;
            var ssq=document.jbxxf.ssq.value;
        	var ssh=document.jbxxf.ssh.value;
            var st=$("#st").val();
            var dt=$("#dt").val(); 
            var bz=$("#ddbz").val(); 
            var phone=$("#phone").val(); 
        	if(dyadr==0)
            {
             alert("请选择打印地点！");
             jbxxf.dyadr.focus();
             eval("inputobj.style.display=\"\"");
             return false;
            }
        	if(wid.length==0)
            {
             alert("请添加要打印的文档！");
             eval("inputobj.style.display=\"\"");
             return false;
            }
        	if(document.getElementById("sh").checked){
                var sh=1;
                if(st==0)
                {
                 alert("请选择配送时间！");
                 jbxxf.ssq.focus();
                 eval("inputobj.style.display=\"\"");
                 return false;
                }
                if(ssq==0)
                {
                 alert("请选择配送宿舍区！");
                 jbxxf.ssq.focus();
                 eval("inputobj.style.display=\"\"");
                 return false;
                }
                if(ssh=="")
                {
                 alert("请填写配送宿舍号！");
                 jbxxf.ssh.focus();
                 eval("inputobj.style.display=\"\"");
                 return false;
                }
              }
              else{
            	  var sh=0;
                  if(dt==0)
                {
                 alert("请选择提货时间！");
                 jbxxf.ssq.focus();
                 eval("inputobj.style.display=\"\"");
                 return false;
                }
            	  ssq=0;
            	  ssh=0;
                  phone=0;
            	  
                
              }
        	var json = {};
  	  		var j=0;
  	  		for (var i = 0; i < wid.length; i++) {
  	  			json[j]=wid[i];
  	  			j++;
  	  		}
        	
        	$.ajax({
    			type:"post",
    			data: { "wid":JSON.stringify(json),"sid":dyadr,"sh":sh,"ssq":ssq,"ssh":ssh ,"st":st,"dt":dt,"bz":bz,"phone":phone},
    			url:"dd.php",
    			beforeSend:function(){
    				$("#ddtjtip").html("提交中……");
    		    },
    		    success:function(msg){	
                        $("#ddtjtip").html("完成");
                        var obj=eval("("+msg+")");
                        $("#wds").html(obj.wds);
                        $("#zfprice").html(obj.price);
                        document.getElementById("ddh").value =obj.ddh;
                        document.getElementById("zongjia").value =obj.price;
                        document.getElementById("spxq").value =obj.wds+"份打印文档打印";
                        EV_modeAlert('envon');
                         
    			  }
    		});
             
        }
        
        

$(document).ready(function(){
            
    show();          
   $.ajax({
			type:"post",
			data: { "dyadr":1},
			url:"function/timeadr.php",
			beforeSend:function(){
		    },
		    success:function(msg){	
		      var obj=eval("("+msg+")");
                       $.each(obj.time, function(i,val){     
                        var option = $("<option value=\""+val+"\">").val(val).text(val);
                        $("#st").append(option);  
                        });  
                       $.each(obj.time, function(i,val){     
                        var option = $("<option value=\""+val+"\">").val(val).text(val);
                        $("#dt").append(option);     
                        });  
                       $.each(obj.psadr, function(i,val){     
                        var option = $("<option value=\""+val+"\">").val(val).text(val);
                        $("#ssq").append(option);
                        });
                            
                        }
                        });
                        
      $.ajax({
			type:"post",
			data: { "wid":1},
			url:"function/infor.php",
			beforeSend:function(){
		    },
		    success:function(msg){
		      var obj=JSON.parse(msg);
                $("#name").val(obj.name);
                $("#phone").val(obj.phone);
                $("#ssqs").val(obj.ssq);
                $("#ssh").val(obj.ssh); 
                $("#dprice").val(obj.dprice);
                $("#sprice").val(obj.sprice);
                if(obj.zx==1)
                {
                    $('#zx option[value=1]').attr('selected',true);
                } 
                else{
                    $('#zx option[value=0]').attr('selected',true);
                }    
                        }
                        });
});
function show()
{
   $("#shtime,#dhtime,#addpsadr").empty();
  
    $.ajax({
			type:"post",
			data: { "dyadr":1},
			url:"function/showpsadr.php",
			beforeSend:function(){
		    },
		    success:function(msg){	
		      var obj=eval("("+msg+")");
                       $.each(obj.psadr, function(i,val){     
                        $("#addpsadr").append("<tr class=\"text-c\"><td>"+(i+1)+"</td><td>"+val[0]+"</td><td><a href='#' onclick=\"deladr("+val[1]+")\">删除</a></td></tr>"); 
                        });  
                        $.each(obj.st, function(i,val){     
                        $("#shtime").append("<tr class=\"text-c\"><td>"+(i+1)+"</td><td>"+val[0]+"</td><td><a href='#' onclick=\"delst("+val[1]+")\">删除</a></td></tr>"); 
                        });  
                         $.each(obj.dt, function(i,val){     
                        $("#dhtime").append("<tr class=\"text-c\"><td>"+(i+1)+"</td><td>"+val[0]+"</td><td><a href='#' onclick=\"deldt("+val[1]+")\">删除</a></td></tr>"); 
                        }); 
			  }
		});
    
}
  function deladr(val)
    {
        $.ajax({
			type:"post",
			data: { "pid":val},
			url:"function/del.php",
			beforeSend:function(){
			
		    },
		    success:function(msg){
		      if(msg==1)
              {
                 show();
                alert("删除成功");
                
              }
              else
              {
                show();
                 alert("删除失败");
              }
                    
			  }
		});
       
    }
      function delst(val)
    {
        $.ajax({
			type:"post",
			data: { "stid":val},
			url:"function/del.php",
			beforeSend:function(){
			
		    },
		    success:function(msg){
		      if(msg==1)
              {
                show();
                alert("删除成功");
              }
              else
              {
                 show();
                 alert("删除失败");
              }
                    
			  }
		});


    }
      function deldt(val)
    {
        $.ajax({
			type:"post",
			data: { "dtid":val,},
			url:"function/del.php",
			beforeSend:function(){
			
		    },
		    success:function(msg){
		      if(msg==1)
              {
                show();
                alert("删除成功");
              }
              else
              {
                show();
                 alert("删除失败");
              }
                    
			  }
		});
        
    }
    
      function addpsadr()
    {
        var psadr=$("#ssq").val();
        
         $.ajax({
			type:"post",
			data: { "psadr":psadr},
			url:"function/addtimeadr.php",
			beforeSend:function(){
			
		    },
		    success:function(msg){
		      if(msg==1)
              {
                show();
                alert("添加成功");
              }
              else
              {
                show();
                 alert("添加失败");
              }
                    
			  }
		});
        
    }
    
      function addst()
    {
        var st=$("#st").val();
        
         $.ajax({
			type:"post",
			data: { "st":st,},
			url:"function/addtimeadr.php",
			beforeSend:function(){
			
		    },
		    success:function(msg){
		      if(msg==1)
              {
                show();
                alert("添加成功");
              }
              else
              {
                show();
                 alert("添加失败");
              }
                    
			  }
		});
        
    }
     function adddt()
    {
        var dt=$("#dt").val();
        
         $.ajax({
			type:"post",
			data: { "dt":dt,},
			url:"function/addtimeadr.php",
			beforeSend:function(){
			
		    },
		    success:function(msg){
		      if(msg==1)
              {
                show();
                alert("添加成功");
              }
              else
              {
                show();
                 alert("添加失败");
              }
                    
			  }
		});
        
    }
    function kg()
    {
        var zx=$("#zx").val();
        
         $.ajax({
			type:"post",
			data: { "zx":zx,},
			url:"function/switch.php",
			beforeSend:function(){
			
		    },
		    success:function(msg){
		      if(msg==1)
              {
                show();
                alert("更改成功");
              }
              else
              {
                show();
                 alert("更改失败");
              }
                    
			  }
		});
        
    }
    
    function setprice()
    {
        var dprice=$("#dprice").val();
        var sprice=$("#sprice").val();
         $.ajax({
			type:"post",
			data: { "dprice":dprice,"sprice":sprice},
			url:"function/setprice.php",
			beforeSend:function(){
			
		    },
		    success:function(msg){
		      if(msg==1)
              {
                show();
                alert("更改成功");
              }
              else
              {
                show();
                 alert("更改失败");
              }
                    
			  }
		});
        
    }
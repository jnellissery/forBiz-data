				
							<form id="loginform" method="post" >
							<div style="margin-left:30%; margin-top:25px; color:#800000;">Password
							<input style="margin-left:5%;" type="password"  name="password" size="15" id="password" />	
							</div>
							<div >
							<input style="margin-left:50%; margin-top:3%" type="button"  value="Login" name="login" onClick="loginchk()"/>
							</div>
							<div id="invalid" style="color:#400000; margin-left:30%;"></div>
							</form>
							
  <script language="javascript1.5" type="text/javascript">
  function loginchk()
  {
	   $.ajax
  	({
  	type:'POST',
	url:"<?php echo base_url();?>admin/chk_cookies_count",
	data:'password='+$("#password").val(),
	datatype:'json',
		success: function(data)
		{
				
/*				if ( data=="SUCCESS")
				{
				$.cookie("password","YES");
				TINY.box.show ( {html:'Successfully Added Cookies', animate:false, close:true, boxid:'success', top:100,openjs:function(){remove_overflow()}});
				}
				else
				{
				$.cookie("password","NO");
				TINY.box.show ( {html:'Invaild Cookies', animate:false, close:true, boxid:'success', top:100,openjs:function(){remove_overflow()}});
				}  */   
				$.cookie("password","YES");
				TINY.box.show ( {html:'Successfully Added Cookies', animate:false, close:true, boxid:'success', top:100,openjs:function(){remove_overflow()}});
		},
		error :function()
		{
			//alert("error");
		}
	});

  }

  
  </script>
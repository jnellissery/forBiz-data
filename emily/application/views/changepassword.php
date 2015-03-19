<form id="loginform" method="post" >
							<div style="margin-left:25%; margin-top:6%;">New Password
							<input style="margin-left:6%;" type="password"  name="npassword" size="15" id="npassword" />	
							</div>
							<div style="margin-left:25%; margin-top:5%;">Confirm Password
							<input style="margin-left:3%;" type="password"  name="cpassword" size="15" id="cpassword" />	
							</div>
							<div >
							<input style="margin-left:40%;  margin-top:2%; font-size:18px" type="button"  value="Change" name="Save" onClick="changepassword()"/>
							</div>
							<div id="invalid" style="color:#FF0000; margin-left:30%;"></div>
							</form>
							
							<script language="javascript1.5" type="text/javascript">	
	  $(".inline").colorbox({inline:true, width:"40%", height:"40%",href:"#log"});
	  
	  function changepassword()
	  {
	
			var password=$('#npassword').val();
			if(password=='')
			{
			$("#Splan_name").remove();
			var timeOut = 1;
			$('#invalid').append("<span id='Splan_name'>Please enter the password</span>").fadeIn();
			setTimeout(function()
			{
			jQuery('#Splan_name').fadeOut('3000')
			}
			, timeOut * 3500);
			return false;
			}
			var cpassword=$('#cpassword').val();
			if(cpassword=='')
			{
			$("#Splan_name").remove();
			var timeOut = 1;
			$('#invalid').append("<span id='Splan_name'>Re-enter the password</span>").fadeIn();
			setTimeout(function()
			{
			jQuery('#Splan_name').fadeOut('3000')
			}
			, timeOut * 3500);
			return false;
			}
			if(password!=cpassword)
			{
			$("#Splan_name").remove();
			var timeOut = 1;

			$('#invalid').append("<span id='Splan_name'>Password Mismatch</span>").fadeIn();
			setTimeout(function()
			{
			jQuery('#Splan_name').fadeOut('3000')
			}
			, timeOut * 3500);
				return false;
			}

	

	 var params = "password="+password;
		var url = "<?php echo base_url(); ?>login/changepassword";
		$.ajax({
		type: 'POST',
		url: url,
		data: params,
		success: function(data)
		{
		alert(data);
		},
		error :function(XMLHttpRequest, textStatus, errorThrown)
		{
			alert(XMLHttpRequest.responseText);
		}

	});
	
	  }
	</script>
<link type='text/css' href='<?php echo base_url(); ?>css/basic.css' rel='stylesheet' media='screen' />
<link href="<?php echo base_url(); ?>admin/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>admin/js/jquery.js" type="text/javascript"></script>
<script>
    var jq4map = jQuery.noConflict();
</script>
<script src="<?php echo base_url(); ?>admin/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>admin/jqvmap/maps/jquery.vmap.india.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>admin/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script type='text/javascript' src='<?php echo base_url(); ?>admin/js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>admin/js/basic.js'></script>

<table width="100%"> 
<th style=" padding-left:100px;font-size:20px">Indian States & Union Territories     </th>
<tr>
	<td>
	<div id="map" align="left" style="vertical-align:top;width:300px">
	</div>
	</td>
	<td>
	<div id="map1" align="left" style="vertical-align:top;width:300px">
	</div>
	</td>
</tr>
</table>
<script language="javascript1.5" type="text/javascript">
{
var i=0;
 $.ajax
  	({
  	type:'POST',
	url:"<?php echo base_url();?>admin/state_list",
	datatype:'json',
		success: function(data)
		{
			var obj = jQuery.parseJSON (data);
			
			$.each
			(
				obj.states_list_array,
				function(index, value) 
				{
				if(index<=16)
					{
					
					var str=obj.states_list_array[index].city_state;
					str=str.replace(/\s/g, '#');
					$("#map").append("<a onclick=showmappopup('"+str+"')>"+obj.states_list_array[index].city_state+"</a><br>")
					}
				else  
					{
					var str1=obj.states_list_array[index].city_state;
					str1=str1.replace(/\s/g, '#');
					$("#map1").append("<a onclick=showmappopup('"+str1+"')>"+obj.states_list_array[index].city_state+"</a><br>")
					}
					
				
				}
			);
		},
		error :function()
		{
			//alert("error");
		}
	});
}
</script>
<script type="text/javascript" language="javascript1.5">
function showmappopup(str)
	{
			state=str.replace(/\#/g, ' ');
			var pageUrl=siteUrl+"/admin/map_popup";
		$.ajax
			({   
			url: pageUrl, //The url where the server req would we made.
			async: false,
			type: "POST", //The type which you want to use: GET/POST
			data: 'state='+state,//The variables which are going.
			dataType: "html", //Return data type (what we expect).
			success: function(data) 
				{
				jq4map('#basic-modal-content').html(data);
				jq4map('#basic-modal-content').modal();
				return false;
				},
			error: function(e) 
				{
				alert(ed);
				}
			});
		
	}
</script>

<div id="vmap" style="width: 600px; height: 50px;">

</div>
<div id="basic-modal-content">
    <p>
       
    </p>


</div>  
<div id="vmap" style="width: 600px; height: 50px;"></div>
<div id="basic-modal-content">
    <p>
       

    </p>


</div>  
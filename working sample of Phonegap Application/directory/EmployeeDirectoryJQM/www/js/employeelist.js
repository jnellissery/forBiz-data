var serviceURL = "http://emily.org.in/directory/services/";

var employees;

$('#employeeListPage').bind('pageinit', function(event) {
	getEmployeeList();
});

function getEmployeeList() {
	$.getJSON(serviceURL + 'getemployees.php', function(data) {
		$('#employeeList li').remove();
		employees = data.items;
		$.each(employees, function(index, employee) {

			
			$('#employeeList').append('<li><a href="employeedetails.html?id=' + employee.id + '">' +
					'<img src="pics/' + employee.picture + '"/>' +
					'<h4>' + employee.firstName + ' ' + employee.lastName + '</h4>' +
					'<p>' + employee.title + '</p>' +
					'<span class="ui-li-count">' + employee.reportCount + '</span></a><input type="checkbox"  id="'+employee.id+'"></li>');
		});
 		$("#employeeList").append('<input type="button" id="btnplaceorder" value="Place Order" onclick=PlaceOrder()>')
		$('#employeeList').listview('refresh');
	});
}



function PlaceOrder()
{
		 var selected=""
		$('#employeeList').find('input[type=checkbox]').each(
			function () 
			{
				
				if (this.checked)
					{
					selected=selected+$(this).attr('id') +","
					}
			});

			load_order_details(selected.substring(0, selected.length-1))
}

function load_order_details(selected)
{
 		var jsonString =   JSON.stringify(selected) ;
 
 alert(jsonString );
$.ajax({
        url:"http://localhost/directory/services/getemployee1.php",
        type:'POST',
        data:{'id':jsonString},
        dataType: 'json',
        crossDomain:true,
        complete: function(){$.mobile.hidePageLoadingMsg();},
        beforeSend: function(){$.mobile.showPageLoadingMsg();},
        error:function(XMLHttpRequest, textStatus, errorThrown)
         	{
           		alert(text_status);
            },
        timeout:60000,
        success:function(data)
             {
        	 
        	employees = data.items; 
         	$("#employeeList'").empty();
        
            }
		
        });

}
function remove1(obj)
{
$("#li"+obj).remove();
	
}

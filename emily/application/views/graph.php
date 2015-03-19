<script src="<?php echo base_url(); ?>js/highcharts.js"></script>
<script src="<?php echo base_url(); ?>js/exporting.js"></script>
<div class="content_wrapper">
    <h1>Bleeding Information</h1>
    <div id="container1" style="width: 700px; height: 600px; margin: 0 auto"></div>
        <div id="container" style="width: 700px; height: 600px; margin: 0 auto"></div>
        
</div>
<?php
    $count = 0;
    $dates = "";
    $scores = "";
	 $scores1 = "";
   echo($allscore_array[$count]["user_id"]);
    foreach ($allscore_array as $score) {
        
           if ($count % 2)
		   {
		      $month_label = "'  " . $score["Cycle"];
        
        $dates.= $month_label . "',";
     
        switch(intval(trim($allscore_array[$count]["score"]))){
            
            case intval(100):
                $str = "{color: '#b40000', y: 100
                },";
             break;
             case intval(75):
                $str = "{color: '#d90303', y: 75
                },";
             break; 
         case intval(50):
                $str = "{color: '#FF0000', y: 50
                },";
             break; 
         case intval(25):
                $str = "{color: '#fe4a4a', y: 25
                },";
             break;
          case intval(0):
                $str = "{color: '#f9d8d8', y: 1
                },";
             break;
        }
         $scores.=$str;
       
        $count++;
	}
	else
	{
		 $month_labe2 = "'  " . $score["Cycle"];
        
        $dates1.= $month_labe2 . "',";
    
        switch(intval(trim($allscore_array[$count]["score"]))){
            
            case intval(100):
                $str = "{color: '#b40000', y: 100
                },";
             break;
             case intval(75):
                $str = "{color: '#d90303', y: 75
                },";
             break; 
         case intval(50):
                $str = "{color: '#FF0000', y: 50
                },";
             break; 
         case intval(25):
                $str = "{color: '#fe4a4a', y: 25
                },";
             break;
          case intval(0):
                $str = "{color: '#f9d8d8', y: 1
                },";
             break;
        }
         $scores1.=$str;
       
        $count++;
		}
       
    }
    $dates.=" ";
    $scores.=" ";
	 $scores1.= "  ";
//print_r($scores);die();
?>
<script type="text/javascript" >
    $(function () {
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Monthly Bleeding Score'
            }, colors: [
                '#EB0808'
            ],
            subtitle: {
                text: 'Source: emily.org.in'
            },
            xAxis: {
                categories: ['Before Using Emily',<?php echo $dates ?> ]
            },
            yAxis: {
                min: 0, tickInterval: 25,
                title: {
                    text: 'Bleeding Score (%)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} %</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    pointWidth :40	
                }
            },
            series: [{
                    name: 'Bleeding Score',
                    data: [100,<?php echo $scores; ?>]
                    
                },{
                    name: 'Amenorrhea',
                    color:'#f9d8d8'
                    
                }]
        });
		 $('#container1').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Monthly Bleeding Score'
            }, colors: [
                '#EB0808'
            ],
            subtitle: {
                text: 'Source: emily.org.in'
            },
            xAxis: {
                categories: ['Before Using Emily',<?php echo $dates1 ?> ]
            },
            yAxis: {
                min: 0, tickInterval: 25,
                title: {
                    text: 'Bleeding Score (%)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} %</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    pointWidth :40	
                }
            },
            series: [{
                    name: 'Bleeding Score',
                    data: [100,<?php echo $scores1; ?>]
                    
                },{
                    name: 'Amenorrhea',
                    color:'#f9d8d8'
                    
                }]
        });
    });
    
</script>
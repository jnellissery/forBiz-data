<script type="text/javascript" src="<?php echo base_url(); ?>admin/js/jquery-1.7.1.min.js"></script>
<script src="<?php echo base_url(); ?>js/highcharts.js"></script>
<script src="<?php echo base_url(); ?>js/exporting.js"></script>

        <div id="container1" style="width: 700px; height: 600px; margin: 0 auto"></div>
        <div id="container" style="width: 700px; height: 600px; margin: 0 auto"></div>
</div>
<?php
    $count = 0;
    $dates = "";
    $scores = "";
    $month_count = 1; //print_r($score_array);die();
    foreach ($score_array as $score) {
        if ($count % 2)
		   { 
             $month_label = "'  " . $score["Cycle"];
        
        $dates.= $month_label . "',";
    
        if(intval(trim($score["avg"])) == 100){
             $str = "{color: '#b40000', y:".$score["avg"]."
      },";
        }else if(intval(trim($score["avg"])) >= 75 ){
             $str = "{color: '#d90303', y:".$score["avg"]."
      },";
        }else if(intval(trim($score["avg"])) >= 50 && intval(trim($score["avg"] <=75)) ){
             $str = "{color: '#FF0000', y:".$score["avg"]."
      },";
        }else if(intval(trim($score["avg"])) >= 25 && intval(trim($score["avg"] <=50))){
             $str = "{color: '#fe4a4a', y:".$score["avg"]."
      },";
        }else if(intval(trim($score["avg"])) >= 1 && intval(trim($score["avg"] <=25))){
             $str = "{color: '#fe4a4a', y:".$score["avg"]."
      },";
        }else if(intval(trim($score["avg"])) >= 0 && intval(trim($score["avg"] <=1))){
             $str = "{color: '#f9d8d8', y:1
      },";
        }

         $scores.=$str;
         
        $count++;
        $month_count++;
		   }
		   else
		   {
			       $month_label1 = "'  " . $score["Cycle"];
        
        $dates1.= $month_label1 . "',";
    
        if(intval(trim($score["avg"])) == 100){
             $str = "{color: '#b40000', y:".$score["avg"]."
      },";
        }else if(intval(trim($score["avg"])) >= 75 ){
             $str = "{color: '#d90303', y:".$score["avg"]."
      },";
        }else if(intval(trim($score["avg"])) >= 50 && intval(trim($score["avg"] <=75)) ){
             $str = "{color: '#FF0000', y:".$score["avg"]."
      },";
        }else if(intval(trim($score["avg"])) >= 25 && intval(trim($score["avg"] <=50))){
             $str = "{color: '#fe4a4a', y:".$score["avg"]."
      },";
        }else if(intval(trim($score["avg"])) >= 1 && intval(trim($score["avg"] <=25))){
             $str = "{color: '#fe4a4a', y:".$score["avg"]."
      },";
        }else if(intval(trim($score["avg"])) >= 0 && intval(trim($score["avg"] <=1))){
             $str = "{color: '#f9d8d8', y:1
      },";
        }

         $scores1.=$str;
         
        $count++;
        $month_count++;
			   }
    }
    $dates.=" ";
    $scores.=" ";
	 $dates1.=" ";
    $scores1.=" ";
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
                headerFormat: '<span style="font-size:10px">{point.key}</span><table >',
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
                headerFormat: '<span style="font-size:10px">{point.key}</span><table >',
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
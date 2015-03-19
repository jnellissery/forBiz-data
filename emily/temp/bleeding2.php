
<script src="<?php echo base_url(); ?>js/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
    
    
jQuery(function ($) {
		$('.bleeding_score').on("click",  function() {
                    var val=$(this).attr('id');
                
		
 $.ajax({   
                        url: "<?php echo base_url();?>bleedingscore/rate", //The url where the server req would we made.
                        async: false,
                        type: "POST", //The type which you want to use: GET/POST
                        data: 'bleeding_rate='+val,//The variables which are going.
                        dataType: "html", //Return data type (what we expect).
                         
                        //This is the function which will be called if ajax call is successful.
                        success: function(data) {
                          							TINY.box.show ( {html:'Successfully added the Score', animate:false, close:true, boxid:'success', top:100,openjs:function(){remove_overflow()}});


		return false;
	
						   // $('#city').html(data);
                        },
						error: function(e) {
							
						}
                    });
		return false;
	});
});
</script>

		<div class="content_wrapper">

        		<h1>Enter your monthly Bleeding score by clicking on the respective button</h1>
                  <?php 
                 
  // echo $lastScoredMonth;
   $scoreddate_array=explode('-',$lastScoredMonth); $today = date("Y-m-d");
  // print_r($scoreddate_array);
   $today_array=explode('-',$today);//echo $scoreddate_array[0].$today_array[0].$scoreddate_array[1].$today_array[1];
   if($scoreddate_array[0]==$today_array[0] && $scoreddate_array[1]==$today_array[1] && ONEENTRYPERMONTH=='TRUE'){
           /* Graph Start */   
       //print_r($lastscore_array);
                  $currentmonth=date("F",strtotime($lastscore_array["date_added"]));//date("M",$lastscore_array["date_added"]);
                 $currentmonthscore=$lastscore_array["score"];//echo $currentmonth.$currentmonthscore;
?>
<div id="graph_container" style="width: 600px; height: 400px; margin: 0 auto"></div>
<?php
/* Graph End*/
   }else{
       
   
   
   //echo $today;?>
                <div class="bleedingPart">
                	<div class="bleedingPartRow">
                    	<div class="bleedingPartRow1">Very High Bleeding</div>
                    	<div class="bleedingPartRow2">100%&nbsp;-</div>
                        <div class="bleedingPartRow3"><a href="#"><img src="<?php echo base_url(); ?>images/red_5.png" class="bleeding_score" id="100"></a></div>
                    </div>
                	<div class="bleedingPartRow">
                    	<div class="bleedingPartRow1">High Bleeding</div>
                    	<div class="bleedingPartRow2">75%&nbsp;-</div>
                        <div class="bleedingPartRow3"><a href="#"><img src="<?php echo base_url(); ?>images/red_4.png" class="bleeding_score" id="75"></a></div>
                    </div>
                	<div class="bleedingPartRow">
                    	<div class="bleedingPartRow1">Moderate Bleeding</div>
                    	<div class="bleedingPartRow2">50%&nbsp;-</div>
                        <div class="bleedingPartRow3"><a href="#"><img src="<?php echo base_url(); ?>images/red_3.png" class="bleeding_score" id="50"></a></div>
                    </div>
                	<div class="bleedingPartRow">
                    	<div class="bleedingPartRow1">Mild Bleeding</div>
                    	<div class="bleedingPartRow2">25%&nbsp;-</div>
                        <div class="bleedingPartRow3"><a href="#"><img src="<?php echo base_url(); ?>images/red_2.png" class="bleeding_score" id="25"></a></div>
                    </div>
                	<div class="bleedingPartRow">
                    	<div class="bleedingPartRow1">Amenorrhea</div>
                    	<div class="bleedingPartRow2">0&nbsp;-</div>
                        <div class="bleedingPartRow3"><a href="#"><img src="<?php echo base_url(); ?>images/red_1.png" class="bleeding_score" id="0"></a></div>
                    </div>
                </div>

            <!-- End of Side Bar --><?php } ?>
	</div>
   <div id="basic-modal-content">
                    <p>
                     
                    </p>
			
                        
		</div>
<script type="text/javascript" >$(function () {
        $('#graph_container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Your Current Month Bleeding'
            },colors: [
            '#EB0808'
            ],
            subtitle: {
                text: 'Source: emily.org.in'
            },
            xAxis: {
                categories: [
                    '<?php echo $currentmonth;?>'
                ]
            },
            yAxis: {
                min: 0,tickInterval: 25,
                title: {
                    text: 'Bleeding Score (%)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
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
                name: 'Bleeding Score %',
                data: [<?php echo $currentmonthscore; ?>]
    
            }]
        });
    });
    
</script>
<script src="<?php echo base_url(); ?>js/highcharts.js"></script>

<script src="<?php echo base_url(); ?>js/modules/exporting.js"></script>



<script type="text/javascript">

   jQuery(function ($) {

        $('.bleeding_score').on("click",  function() {

            var val=$(this).attr('id');

			var val1='<?php echo  $lastscore_array["user_id"];?>';
			
			var sel_cycle=$("#sel_cycle").val();
		
			if (sel_cycle==0)
			{
			 TINY.box.show ( {html:'Please select cycle', animate:false, close:true, boxid:'success', top:100,openjs:function(){remove_overflow()}});
        
				return false;
				}
            
			$.ajax({   

                url: "<?php echo base_url(); ?>bleedingscore/rate", //The url where the server req would we made.

                async: false,

                type: "POST", //The type which you want to use: GET/POST

               data: 'bleeding_rate='+val+'&user_id='+val1+'&Cycle='+sel_cycle,//The variables which are going.

                dataType: "json", //Return data type (what we expect).

                

                //This is the function which will be called if ajax call is successful.

                success: function(data) {

			if (data=="U")

			{

                    TINY.box.show ( {html:'Successfully Updated the Score', animate:false, close:true, boxid:'success', top:100,openjs:function(){remove_overflow()}});

               }
 				else if(data=="UU")
			   {
				  TINY.box.show ( {html:'Successfully Updated the Score Corresponding to the selected Cycle', animate:false, close:true, boxid:'success', top:100,openjs:function(){remove_overflow()}});
         		}
			   else

			   {

			   			 
		      	TINY.box.show ( {html:'Successfully added the Score', animate:false, close:true, boxid:'success', top:100,openjs:function(){remove_overflow()}});

			   }     

                    

                    return false;

                    

                    // $('#city').html(data);

                },

                error: function(XMLHttpRequest, textStatus, errorThrown) {

                    alert(XMLHttpRequest.responseText);
				  // var_dump(errorThrown);
				 //var car= Array("car1","car2");
				//alert( );
                }

            });

            return false;

	});

    });


$.ajax
  	({
  	type:'POST',
	url:"<?php echo base_url();?>bleedingscore/cycle_count",
	datatype:'json',
		success: function(data)
		{
			var obj = jQuery.parseJSON (data);
			
			$.each
			(
				obj.cycle_count,
				function(index, value) 
				{
					var str=obj.cycle_count[index].id;
					
					str=str.replace(/\s/g, '#');
					
					//$("#sel_cycle").append("<option value="+str+">Cycle   "+parseInt(index+1)+"</option>")
					 
				}
			);
			
			for (var i=1;i<=24;i++)
			{
			$("#sel_cycle").append("<option value=Cycle"+i +">Cycle "+i+"</option>")
			}
			
			
		},
		error :function()
		{
		alert("error");
		}
	});

</script>

<?php $this->load->helper('sample'); ?>
<div class="content_wrapper">

        		<h1 style="text-align:left">Enter your monthly Bleeding score by clicking on the respective button</h1>
                  <?php 
                      
						              
                        $scoreddate_array = explode('-', $lastScoredMonth);
                        $today = date("Y-m-d");
                        // print_r($scoreddate_array);
                        $today_array = explode('-', $today); 
                        if ($scoreddate_array[0] == $today_array[0] && $scoreddate_array[1] == $today_array[1] && ONEENTRYPERMONTH=='TRUE') {
                            /* Graph Start */

                            $currentmonth = date("F", strtotime($lastscore_array["date_added"])); 
                            $currentmonthscore = $lastscore_array["score"]; 
                            ?>
                            <div id="graph_container" style="width: 600px; height: 400px; margin: 0 auto"></div>
                            <?php
                            /* Graph End */
                        } else {
?>
            
			<?php 
		
			 testhelper();
			?>
			 <h1 style="color:#CC0000">Enter  Your Cycle For update</h1>
			  <select id="sel_cycle"  name="sel_cycle"  style="">
                 <option value="0">Select Cycle....</option>
               </select>
			<div style="width: 960px; height: auto; overflow:auto;"> 
			    <div class="bleedingPart">
				
                	<div class="bleedingPartRow">
                    	<div class="bleedingPartRow1">Very High Bleeding</div>
                    	<div class="bleedingPartRow2 f15">100%&nbsp;-</div>
                        <div class="bleedingPartRow3"><a href="#"><img src="<?php echo base_url(); ?>images/red_5.png" class="bleeding_score" id="100"></a></div>
                    </div>
                	<div class="bleedingPartRow">
                    	<div class="bleedingPartRow1">High Bleeding</div>
                    	<div class="bleedingPartRow2 f15">75%&nbsp;-</div>
                        <div class="bleedingPartRow3"><a href="#"><img src="<?php echo base_url(); ?>images/red_4.png" class="bleeding_score" id="75"></a></div>
                    </div>
                	<div class="bleedingPartRow">
                    	<div class="bleedingPartRow1">Moderate Bleeding</div>
                    	<div class="bleedingPartRow2 f15" >50%&nbsp;-</div>
                        <div class="bleedingPartRow3"><a href="#"><img src="<?php echo base_url(); ?>images/red_3.png" class="bleeding_score" id="50"></a></div>
                    </div>
                	<div class="bleedingPartRow">
                    	<div class="bleedingPartRow1">Mild Bleeding</div>
                    	<div class="bleedingPartRow2 f15">25%&nbsp;-</div>
                        <div class="bleedingPartRow3"><a href="#"><img src="<?php echo base_url(); ?>images/red_2.png" class="bleeding_score" id="25"></a></div>
                    </div>
                	<div class="bleedingPartRow">
                    	<div class="bleedingPartRow1">Amenorrhea</div>
                    	<div class="bleedingPartRow2 f15">0&nbsp;-</div>
                        <div class="bleedingPartRow3"><a href="#"><img src="<?php echo base_url(); ?>images/red_1.png" class="bleeding_score" id="0"></a></div>
                    </div>
                 </div>   
                     <div style="float: left; width: 389px;">	
					 <h1 style="text-align:center">Instruction to the User</h1>
	  			
                 <ul> <p style="margin:0 0 15px">You have been inserted with Emily for the treatment of heavy menstrual bleeding. You can now follow the instructions given below to to record the changes in your condition after inserting Emily.</p>
				  <li>The Initial Stage of your Bleeding is indicated in an Intense Red Color button in the below   diagram and which is been given a score of 100%. Please click on the button before the insertion of Emily. Please don't click this button again till the end of the study.</li>
<li>After the insertion of Emily you have to clearly observe the bleeding rate during your monthly periods.</li> <li>Based on the bleeding pattern there are remaining four buttons, if you think that at the first month your bleeding is slightly reduced to around 75% you can click the second button or if it is reduced to around 50% you can click the respective button.</li>
<li>If you find there is no bleeding at al after the insertion of Emily, click the button which is in white color.</li>
<li>Please do not press more than one button in the same month. </li>
                    	</ul>



            <!-- End of Side Bar -->
	</div>
                </div><!-- <div class="bleedingPartBn"><a href="<?php echo base_url();?>instruction"><img src="images/readinstruction.png"></a></div>-->

            <!-- End of Side Bar --><?php } ?>
	</div>
        <div id="basic-modal-content">
          <p>
        
           </p>
        
        
        </div>
		
<script>

    $(".bleedingPartBn a").click(function() 	{

        window.location.href=$("#submit").attr('href');

    });

</script>



<script type="text/javascript" >

    $(function () {

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

                    '<?php echo $currentmonth; ?>'

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

<!--<div class="content_wrapper">-->



        

    
<style>#pagination a, #pagination strong {

	 background: #e3e3e3;

	 padding: 4px 7px;

	 text-decoration: none;

	border: 1px solid #cac9c9;

	color: #09578B;

	font-size: 13px;

	}



	#pagination strong, #pagination a:hover {

	 font-weight: normal;

	 background: #ec86ad;

        }

        div.dataTables_wrapper .dataTables_paginate  {

            background-image: url("../../images/core/mws-inset.png");

            background-repeat: repeat;

            border-radius: 4px 4px 4px 4px;

            box-shadow: 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 2px rgba(0, 0, 0, 0.5) inset;

            color: #FFFFFF;

            float: left;

            margin: 2px 588px 2px 9px;

        }.checkbox{

            width: 50px;

        }

</style>

<div class="mws-panel grid_8  mws-collapsible" id="doctor_list">

                	<div class="mws-panel-header">

                    	<span class="mws-i-24 i-group">Manage Doctors</span><div class="mws-collapse-button mws-inset"><span></span></div>

                    </div>

                    <div class="mws-panel-body"><div class="mws-panel-toolbar top clearfix">

                        	<ul>

                            	<li><a class="mws-ic-16 ic-accept" href="#" title="Accept">Activate</a></li>

                            	<li><a class="mws-ic-16 ic-cross" href="#" title="Reject">Suspend</a></li>
                               <!--new delete method-->
								 <li><a class="mws-ic-16 ic-delete" href="#" title="Delete">Delete</a></li>
                                 
                            	<li><a class="mws-ic-16 ic-printer" href="#" title="Print">Print</a></li>

<!--                            <li><a class="mws-ic-16 ic-arrow-refresh" href="#" title="Renew">Renew</a></li>-->

                            	<li><a class="mws-ic-16 ic-edit" href="#" title="Update">Update</a></li>

                                <li class="mws-searchboxmws-searchbox">

                                   <div class="mws-inset" id="mws-searchbox">

            	<form action="">

                	<input type="text" class="mws-search-input" id="search_doctor" name="search_doctor">

                    <input type="button" id="search" name="search" class="mws-search-submit">

                </form>

            </div>

                                </li>

                            </ul>

                        </div>

                        <div class="dataTables_wrapper">

                            

                      <?php // echo "----------".count($viewdoctors);print_r($doctors_list);?>

                            <table class="mws-datatable mws-table">

                            <thead>

                                <tr>

                                    <th style="width: 50px;"></th>

                                    <!--                        Example for Ussing Sorting           

                                    <th title="Patients Name" class="sorting" rowspan="1" colspan="1" style="width: 150px;">Patients Name</th>-->

                                    <th title="Patients Name"  rowspan="1" colspan="1" style="width: 150px;">Name</th>

 <!--                                   <th title="Doctor_Name"  rowspan="1" colspan="1" style="width: 200px;">Specialisation</th>

									<th title="registration_number"  rowspan="1" colspan="1" style="width: 75px;">Medical Registration Number</th>
-->
                                    <th title="Email"  rowspan="1" colspan="1" style="width: 75px;">Email</th>

                                    <th title="Addres"  rowspan="1" colspan="1" style="width: 128px;">Address</th>

                                    <th title="Contact" rowspan="1" colspan="1" style="width: 100px;">Contact</th>

                                    <th title="State" rowspan="1" colspan="1" style="width: 100px;">State</th>                       

                                    

                                    <th title="Status"  rowspan="1" colspan="1" style="width: 100px;">

                                Status

                            </th>   </tr>

                            </thead>

                            

                        <tbody>

                            <?php 

                       

                        if(!empty($viewdoctors['doctors_list'])){

                            foreach($viewdoctors['doctors_list'] as $list){ ?>

                          

                            <tr class="gradeA odd">  <td  class="checkbox"><input type="checkbox" value="<?php echo $list['id']; ?>"></td>

                                    <td><?php echo $list['name']; ?></td>

                                   
                                    <td><?php echo  $list['email'];?></td>

                                    <td class="center"><?php echo $list['address']; ?></td>

                                    <td class="center"><?php echo $list['phone']; ?></td>

                                    <td class="center"><?php echo $list['state']; ?></td>

                                    <td class="center"><?php if( $list['bit_active']==0){ 

                                        ?>

                                        <input class="mws-button green" type="button" value="Active">

                                        <?php

                                    }else{

                                        ?>

                                        <input class="mws-button red" type="button" value="Suspended">

                                        <?php

                                    }                                  

                                    

                                    ?></td>

                                </tr>

                                

                                <?php }

                                

                            }else{

                               

                                ?>  <tr class="gradeA odd">  <td colspan="7">No Record Found</td></tr>

                                    

                                

                            <?php    

                            

                            }

                                ?>

                                </tbody></table>

<!--                        <div class="dataTables_paginate paging_full_numbers"><span class="first paginate_button paginate_button_disabled">First</span><span class="previous paginate_button paginate_button_disabled">Previous</span><span><span class="paginate_active">1</span><span class="paginate_button">2</span><span class="paginate_button">3</span><span class="paginate_button">4</span><span class="paginate_button">5</span></span><span class="next paginate_button">Next</span><span class="last paginate_button">Last</span></div>-->

                      <div class="dataTables_paginate"><?php  echo $this->pagination->create_links();  $this->config->set_item('base_url', base_url().'admin/dashboard');  $config['base_url'] = base_url().'admin/dashboard'; ?></div>

                        </div>

                    

                </div>

    <script>

        jq4map(function(){

            

        jq4map(".container").on("click", ".ic-edit", function(event){

           

        var selected = new Array();var doctor_id ;

        jq4map("input:checkbox:checked").each(function(){

           // var val = $jq4map(this).closest("li").text();

             doctor_id = jq4map(this).val();

            

          selected.push(doctor_id);

        });

        if(selected.length>1){

            alert('Select Only 1 Record For Update');return false;

        }else{

            window.location.href=siteUrl+"admin/update_doctor/"+doctor_id;

        }

            });

        

       $(".container").on("click", ".ic-accept", function(event){

        var selected = new Array();var doctor_id ="";

        jq4map("input:checkbox:checked").each(function(){

           // var val = $(this).closest("li").text();

            var val =jq4map(this).val()+',';

            doctor_id +=val;

         //   selected.push(patient_id);

        });

         var params = "doctors_id="+doctor_id;//alert(params);

         jq4map.ajax({   

                url: siteUrl+"admin/active_doctor", //The url where the server req would we made.

               

                type: "POST",

                data: params,

                //The type which you want to use: GET/POST

                //The variables which are going.

              

                        

                //This is the function which will be called if ajax call is successful.

                success: function(data) {

                    //alert(data);

                   jq4map('#doctor_list').html(data);

                    // $('#city').html(data);

                }

            })

    });

        jq4map(".container").on("click", ".ic-cross", function(event){

        var selected = new Array();var doctor_id ="";

        jq4map("input:checkbox:checked").each(function(){

           // var val = $(this).closest("li").text();

            var val =jq4map(this).val()+',';

            doctor_id +=val;

         //   selected.push(patient_id);

        });

         var params = "doctor_id="+doctor_id;

         jq4map.ajax({   

                url: siteUrl+"admin/delete_doctors/", //The url where the server req would we made.

               

                type: "POST",

                data: params,

                //The type which you want to use: GET/POST

                //The variables which are going.

              

                        

                //This is the function which will be called if ajax call is successful.

                success: function(data) {

                  

                   jq4map('#doctor_list').html(data);

                   

                    // $('#city').html(data);

                }

            })

    });

    //harddelettion 
	
	 jq4map(".container").on("click", ".ic-delete", function(event){
        var selected = new Array();var doctor_id ="";
        jq4map("input:checkbox:checked").each(function(){
           // var val = $(this).closest("li").text();
            var val =jq4map(this).val()+',';
            doctor_id +=val;
         //   selected.push(patient_id);
        });
         var params = "doctor_id="+doctor_id;
         jq4map.ajax({   
                url: siteUrl+"admin/hard_delete_doctor/", //The url where the server req would we made.
               
                type: "POST",
                data: params,
                //The type which you want to use: GET/POST
                //The variables which are going.
              
                        
                //This is the function which will be called if ajax call is successful.
                success: function(data) {
                  
                   jq4map('#doctor_list').html(data);
                   
                    // $('#city').html(data);
                }
            })
    });

    ////search patients

    jq4map(".container").on("click", "#search", function(event){

   

        var search_doctor=$('#search_doctor').val();

        

         var params = "search_doctor="+search_doctor;

         jq4map.ajax({   

                url: siteUrl+"admin/search_doctors/", //The url where the server req would we made.

               

                type: "POST",

                data: params,

                //The type which you want to use: GET/POST

                //The variables which are going.

              

                        

                //This is the function which will be called if ajax call is successful.

                success: function(data) {

                

                 if(data!=" "){

                   jq4map('#doctor_list').html(data);

                 }else{

                       TINY.box.show ( {html:'No Doctor Found', animate:false, close:true, boxid:'success', top:100,openjs:function(){remove_overflow()}});					

                 }

                 

                    // $('#city').html(data);

                }

            })

    });

    

});

    </script>
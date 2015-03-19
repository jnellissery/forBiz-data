
<h1><?php echo $state; ?></h1><br/>
 
<?php echo "Users = ".$state_users; ?>

<br/>
<?php echo "No of Doctors = ".$state_doctors_count; 
// print_r($state_list);
?>
<br/>   
<input type="hidden" name="state" id="state" value="<?php echo $state;?>"/>
<select id="sel_doctor" name="sel_doctor">
 			<option value="select">select..</option>
               <?php foreach($state_doctors as $doctor){ ?>
                <option value="<?php echo $doctor['id'] ?>"><?php echo $doctor['name'] ?></option>
             <?php } ?>
            </select>


        <div id="patient_lists"
        </div>
        <script>
            
                $('#sel_doctor').change(function(){
              var state= $('#state').val();     
             var doctor_id= $('#sel_doctor').val();
            $.ajax({   
                    url: "<?php echo base_url(); ?>admin/selectpatient", //The url where the server req would we made.
                   async: false,
                   type: "POST", //The type which you want to use: GET/POST
                   data: 'state='+state+'&doctor='+doctor_id,//The variables which are going.
                    dataType: "html", //Return data type (what we expect).,
//                         
//                    //This is the function which will be called if ajax call is successful.
                    success: function(data) 
					{
                  	
    $('#patient_lists').html(data);
 // jq4map('#basic-modal-content').modal();

                      return false;

                        // $('#city').html(data);
                    },
                                    error: function(e) {
                                                        alert(ed);
                    }
                });
               } );
        </script>
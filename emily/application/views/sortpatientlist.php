<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1><label><?php echo "Welcome ".ucfirst($this->session->userdata('username')); //print_r($this->session->all_userdata('username'));?>
</label>My Patient List</h1><div class="PatientList"><div class="PatientListHRow">
                    	<div class="PatientListHRow1 roundbody">Subject ID<a href="#" title="login/sort_patient_list/id/up" class="sort"><img  src="<?php echo base_url();?>/images/icon_up.png" /></a><a class="sort" href="#" title="login/sort_patient_list/id/down"><img src="<?php echo base_url();?>images/icon_down.png" /></a></div>
                    	<div class="PatientListHRow2 roundbody">Name<a href="#" title="login/sort_patient_list/name/up" class="sort"><img  src="<?php echo base_url();?>images/icon_up.png" /></a><a class="sort" href="#" title="login/sort_patient_list/sname/down"><img src="<?php echo base_url();?>images/icon_down.png" /></a></div>
                        
                    	<div class="PatientListHRow3 roundbody">Age<a href="#" title="login/sort_patient_list/age/up" class="sort"><img  src="<?php echo base_url();?>images/icon_up.png" /></a><a class="sort" href="#" title="login/sort_patient_list/age/down"><img src="<?php echo base_url();?>images/icon_down.png" /></a></div>
                    	<div class="PatientListHRow4 roundbody">Place<a href="#" title="login/sort_patient_list/place/up" class="sort"><img  src="<?php echo base_url();?>images/icon_up.png" /></a><a class="sort" href="#" title="login/sort_patient_list/place/down"><img src="<?php echo base_url();?>images/icon_down.png" /></a></div>
                    	<div class="PatientListHRow5 roundbody">Actions</div>
                    </div><div class="sandbox">	</div><?php //print_r($list_array);
                foreach($list_array as $list){
                ?>


<div class="PatientListRow popup">	<div class="PatientListRow1 roundbody"><a href="<?php echo base_url(); ?>login/detailedprofile/<?php echo $list["id"];?>"><?php echo $list["id"];?></a></div>
                    	<div class="PatientListRow2 roundbody"><a href="<?php echo base_url(); ?>login/detailedprofile/<?php echo $list["id"];?>"><?php echo $list["name"];?></a></div>
                    	<div class="PatientListRow3 roundbody"><a href="<?php echo base_url(); ?>login/detailedprofile/<?php echo $list["id"];?>"><?php echo $list["age"];?></a></div>
                    	<div class="PatientListRow4 roundbody"><a href="<?php echo base_url(); ?>login/detailedprofile/<?php echo $list["id"];?>"><?php echo $list["address"];?></a></div>
                    	<div class="PatientListRow5 roundbody"><a href="<?php echo base_url(); ?>login/delete_patient/<?php echo $list["id"];?>"><img src="<?php echo base_url(); ?>images/closebn.png"></a></div>
                    </div>
                

            <!-- End of Side Bar -->
	
    <?php }?></div>	 
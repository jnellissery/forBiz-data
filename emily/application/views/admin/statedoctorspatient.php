<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//print_r($patients);
foreach ($patients as $patient){
?>
<p  ><a style="font-size:18px ;color:#0033FF"  href="<?php echo base_url();?>login/detailedprofile1/<?php echo $patient["id"]; ?>">Name : <?php echo $patient["name"]; ?></a></p>
<!--<p><a href="<?php //echo base_url();?>bleedingscore/graph/<?php //echo $patient["id"]; ?>"   ><?php //echo $patient["name"]; ?></a></p>
--><?php } ?>
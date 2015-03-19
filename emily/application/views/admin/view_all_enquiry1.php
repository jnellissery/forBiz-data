<style>
    table td{
        width: 250px;
    }
</style>

<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
foreach ($enquiry_list as $enquiry) {
    ?>
    <div class="mws-panel grid_4 mws-collapsible mws-collapsed enquiries" id="<?php echo $enquiry['id'] ?>">
        <div class="mws-panel-header">
            <span 
                <?php if($enquiry['admin_read']==0) { ?>
                class="mws-i-24 i-alert-2"
                <?php }else{ ?>
                
                <?php } ?>
                ><?php echo $enquiry['name']; ?><label style="margin-left:20px;">
                    <a href="mailto:<?php echo $enquiry['email']; ?>" style="color:#c5d52b;text-decoration: none"><?php echo $enquiry['email']; ?></a>
                </label>
            <label style="margin-left:20px;"><?php echo $enquiry['send_date']; ?></label>
            </span>
            <div class="mws-collapse-button mws-inset"><span></span></div></div>
        <div class="mws-panel-body" style="display: block;">
            <div class="mws-panel-content">
                <table width="500px">
                    <tr>
                        <td>Age</td>
                        <td ><?php echo $enquiry['age']; ?><td>
                        
                    </tr><tr>
                        <td>State</td>
                       <td> <?php echo $enquiry['state']; ?><td>
                        
                    </tr><tr>
                        <td>Symptoms</td>
                         <td ><?php echo $enquiry['symptoms']; ?><td>
                        
                    </tr>
                </table>
                
                       </div>
        </div>
    </div>
<?php } ?>
<script>
    $('.enquiries').click(function (e) {
        var enquiry_id=$(this).attr('id');
               
        $.ajax({   
            url: "<?php echo base_url(); ?>admin/enquiry_status/", //The url where the server req would we made.
            async: false,
            type: "POST", //The type which you want to use: GET/POST
            data: 'enquiry_id='+enquiry_id,//The variables which are going.
            dataType: "html", //Return data type (what we expect).
                
            //This is the function which will be called if ajax call is successful.
            success: function(data) {
                    
                 
                    
                // $('#city').html(data);
            },
            error: function(e) {
                    
            }
        });
    });
</script>
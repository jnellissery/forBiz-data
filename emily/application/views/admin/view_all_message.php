<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

foreach ($messages_list as $message) {
    ?>
    <div class="mws-panel grid_4 mws-collapsible mws-collapsed messages" id="<?php echo $message['id'] ?>">
        <div class="mws-panel-header">
            <span 
                <?php if($message['admin_read']==0) { ?>
                class="mws-i-24 i-alert-2"
                <?php }else{ ?>
                
                <?php } ?>
                ><?php echo $message['name']; ?><label style="margin-left:20px;">
                    <a href="mailto:<?php echo $message['email']; ?>" style="color:#c5d52b;text-decoration: none"><?php echo $message['email']; ?></a>
                </label>
            <label style="margin-left:20px;"><?php echo $message['date_added']; ?></label>
            </span>
            <div class="mws-collapse-button mws-inset"><span></span></div></div>
        <div class="mws-panel-body" style="display: block;">
            <div class="mws-panel-content">
                <p><?php echo $message['message']; ?></p>
            </div>
        </div>
    </div>
<?php } ?>
<script>
    $('.messages').click(function (e) {
        var message_id=$(this).attr('id');
               alert("testing");
        $.ajax({   
            url: "<?php echo base_url(); ?>admin/messsage_status/", //The url where the server req would we made.
            async: false,
            type: "POST", //The type which you want to use: GET/POST
            data: 'message_id='+message_id,//The variables which are going.
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
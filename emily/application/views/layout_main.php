 <?php if(!strstr($content,'<input type="hidden"/>')){?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta charset="UTF-8" /><title>
            <?php echo $page = $this->uri->segment(1);
           
            echo ucfirst($page); ?></title>
        <link rel="icon" type="image/ico" href="favicon.ico"/><meta name="Description" content="description here" />
        <meta name="keywords" content="keywords seperated by coma" /><meta name="author" content="author name" />
        <meta name="generator" content=" " />
        <meta name="robots" content="All" />
        <meta name="google-site-verification" content=" " />
       
        <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
		
<?php /*?><link rel="stylesheet" href="<?php echo base_url(); ?>/css/nivo-slider.css" type="text/css" media="screen" /><?php */?>           
			 <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>  
            <script src="<?php echo base_url(); ?>js/html5.js"></script> 
            <script type="text/javascript">var siteUrl = '<?php echo base_url() ?>'; </script>
            <link rel="stylesheet" href="<?php echo base_url(); ?>/css/tiny_styles.css" type="text/css" media="screen" />
            <script type="text/javascript" src="<?php echo base_url(); ?>/js/tinybox.js"></script></head>
			
		
    <body><div id="wrapper">  <!-- HEADER --> 
            <?php echo $header_content ?>  <!-- HEADER -->  <!-- CONTENT -->
<?php echo $content ?>  <!-- CONTENT -->  <!-- FOOTER -->	<?php echo $footer_content ?>  <!-- FOOTER END -->
        </div></body></html>	
		<?php } else{
		echo $content;
			
		}?>	
        
        
<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Layout {

  var $obj;
  var $layout;

  function Layout($layout = "layout_main") {
    $this->obj = & get_instance();
   $this->layout = $layout;
  }
  
  function setLayout($layout) {
    $this->layout = $layout;
  }

  function view($view, $data=null, $return=false) {

    $view_header = 'header.php';
    $view_footer = 'footer.php';

    // load view data
    $loadedData['header_content'] = $this->obj->load->view($view_header,$data,TRUE);
    $loadedData['content'] = $this->obj->load->view($view,$data,TRUE);
    $loadedData['footer_content'] = $this->obj->load->view($view_footer,$data,TRUE);

    // load view
    $this->obj->load->view($this->layout, $loadedData);
  }
  
  function view_new($view, $data=null, $return=false) {
	 $loadedData['content'] = $this->obj->load->view($view,$data,TRUE); 
	 
	 $this->obj->load->view($this->layout, $loadedData);
  }

}
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['post_system'][] =  array('class' => 'Usertracking', 
                                               'function' => 'auto_track',
                                               'filename' => 'Usertracking.php',
                                               'filepath' => 'libraries');

$hook['pre_controller'][] = array(
 'class'    => 'testing',
 'function' => 'test',
 'filename' => 'testing.php',
 'filepath' => 'controllers',
 'params'=>array()
 );
 $hook['pre_controller'][] = array(
 'class'    => 'testing1',
 'function' => 'test',
 'filename' => 'testing1.php',
 'filepath' => 'controllers',
 'params'=>array()
 );
/* End of file hooks.php */
/* Location: ./application/config/hooks.php */
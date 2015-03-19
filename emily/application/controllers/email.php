<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Email extends  CI_Controller
{
	public function Index()
	{
	 $config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'jnellissery1230@gmail.com',
    'smtp_pass' => 'JOIN12300' 
);
$this->load->library('email', $config);
$this->email->set_newline("\r\n");

$this->email->from('jnellissery1230@gmail.com', 'JOJO');
$this->email->to('jnellissery@yahoo.com');

$this->email->subject('CodeIgniter Rocks Socks ');
$this->email->message('Hello World');


if (!$this->email->send())
    show_error($this->email->print_debugger());
else
    echo 'Your e-mail has been sent!';  
	
	}

}

?>

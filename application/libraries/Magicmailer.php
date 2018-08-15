<?php

class Magicmailer extends \PHPMailer{

	function __construct() {
		parent::__construct();
		$this->isSMTP();                                      // Set mailer to use SMTP
		$this->setFrom('cakcode@gmail.com', 'Nexapp');
		$this->Host       = 'smtp.gmail.com';  				// Specify main and backup SMTP servers
		$this->SMTPAuth   = true;                               // Enable SMTP authentication
		$this->Username   = 'cakcode@gmail.com';                 // SMTP username
		$this->Password   = 'qwerty01';                           // SMTP password
		$this->SMTPSecure = 'ssl'; 
		$this->SMTPDebug = false;                           // Enable TLS encryption, `ssl` also accepted
		$this->isHTML(true); 
		$this->Port       = '465';
	}
}
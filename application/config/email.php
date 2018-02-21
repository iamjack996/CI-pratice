<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $config['protocol'] = 'smtp';
// $config['mailpath'] = '/usr/sbin/sendmail';
// $config['charset'] = 'iso-8859-1';
// $config['wordwrap'] = TRUE;
//
// $config['bot_email'] = 'iamjack996@gmail.com' ;

$config['protocol']     = 'smtp';
$config['smtp_host']    = 'ssl://smtp.gmail.com';
$config['smtp_port']    = '465';
$config['smtp_timeout'] = '30';
$config['smtp_user']    = 'iamjack996@gmail.com';    // 填 Google App Domain Mail 也可以
$config['smtp_pass']    = 'genius0173w';
$config['charset']      = 'utf-8';
$config['newline']      = "\r\n";
$config['mailtype']     = 'html';
$config['wordwrap']     = true;

// $this->email->initialize($config);

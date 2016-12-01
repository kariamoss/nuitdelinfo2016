<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Mailer Configuration
$config['mail_mailer']          = 'PHPMailer';
$config['mail_debug']           = 2; // default: 0, debugging: 2, 'local'
$config['mail_debug_output']    = 'html';
$config['mail_smtp_auth']       = true;
$config['mail_smtp_secure']     = 'tls'; // default: '' | tls | ssl |
$config['mail_charset']         = 'utf-8';

// Templates Path and optional config
$config['mail_template_folder'] = 'templates/email';
$config['mail_template_options'] = array(
                                       'SITE_NAME' => 'Codeigniter Mail Plugin',
                                       'SITE_LOGO' => 'http://localhost/images/logo.jpg',
                                       'BASE_URL'  => 'http://localhost',
                                    );
// Server Configuration
$config['mail_smtp']            = 'smtp.gmail.com';
$config['mail_port']            = 587; // for gmail default 587 with tls
$config['mail_user']            = 'mailtointerlink@gmail.com';
$config['mail_pass']            = 'interlink!';

// Mailer config Sender/Receiver Addresses
$config['mail_admin_mail']      = 'mailtointerlink@gmail.com';
$config['mail_admin_name']      = 'WebMaster';

$config['mail_from_mail']       = 'mailtointerlink@gmail.com';
$config['mail_from_name']       = 'Interlink Pro';

$config['mail_replyto_mail']    = 'mailtointerlink@gmail.com';
$config['mail_replyto_name']    = 'Interlink Pro';

// BCC and CC Email Addresses
$config['mail_bcc']             = 'mailtointerlink@gmail.com';
$config['mail_cc']              = 'mailtointerlink@gmail.com';

// BCC and CC enable config, default disabled;
$config['mail_setBcc']          = false;
$config['mail_setCc']           = false;


/* End of file mail_config.php */
/* Location: ./application/config/mail_config.php */

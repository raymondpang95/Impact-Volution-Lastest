<?php
/**
 * Remember to put the instance of class Email inside try-catch block
 * Pages which use email function:
 * index.php, forgotpassword.php, addNewAgent.php
 */
//------------------------------------
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
//------------------------------------

class Email
{
    private $mail;

    private $mail_host          = 'smtp.gmail.com';
    private $mail_username      = 'ImpactVolution.IT@gmail.com';
    private $mail_password      = '01111081333';
    private $mail_SMTPSecure    = 'tls';
    private $mail_port          = 587;

    private $mail_address       = 'info@impact-volution.com';

    function __construct($bool)
    {  
        // 'true' to enable exception
        $this->mail = new PHPMailer($bool);
    }

    // Setup email server
    function readyMail()
    {
        $this->mail->isSMTP();                              // Set mailer to use SMTP
        $this->mail->Host       = $this->mail_host;         // Specify main and backup SMTP servers
        $this->mail->SMTPAuth   = true;                     // Enable SMTP authentication
        $this->mail->Username   = $this->mail_username;     // Your email
        $this->mail->Password   = $this->mail_password;     // Your email password
        $this->mail->SMTPSecure = $this->mail_SMTPSecure;   // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port       = $this->mail_port;         // TCP port to connect to


        // Must put to avoid connection error
        $this->mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
    }

    //@ String only
    function senderName($mail_addr, $name)
    {
        $this->mail->setFrom($mail_addr, $name);
        $this->mail->addReplyTo($mail_addr, $name);
    }

    //@ String only
    function toAddress($email)
    {
        $this->mail->addAddress($email);
    }

    //@ Bool only
    function isHTML($bool)
    {
        $this->mail->isHTML = $bool;
    }

    //@ String only, email subject
    function setSubject($subject)
    {
        $this->mail->Subject = $subject;
    }

    //@ String only, email body
    function setBody($body)
    {
        $this->mail->Body = $body;
    }

    //@ String only, alternate email body when html unavailable
    function setAltBody($alt)
    {
        $this->mail->AltBody = $alt;
    }

    // Send the email, throw if error found.
    function sendMail()
    {
        $this->mail->send();
    }

    // Return exception message
    function ErrorInfo()
    {
        return $this->mail->ErrorInfo;
    }

}
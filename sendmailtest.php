<?php

//require 'addaccount.php';

require 'phpmailer.github/PHPMailerAutoload.php';

if(isset($_POST['email'])){ 
    $email = $_POST['email'];

    $request = array(
    'email' => $email
);


$mail = new PHPMailer;

//  $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'pcnpipls@gmail.com';                 // SMTP username
$mail->Password = 'pcnp!p78';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$message ="noreply: Registration Password and Pincode"; 	 

$mail->SetFrom("pcnpipls@gmail.com"); 
$mail->Subject="Registration Password and Pincode";
$mail->Body = "Hi User! 
<br>Welcome to PCN Project Liquidation System! NOTICE! 
<br>Once Logged In please immediately change your password!
Here is your current login Password and Pincode. 
<br> PASSWORD: Welcome01! PINCODE: 10011001";

$mail->AddAddress("$email");
if(!$mail->Send()){
echo "<script> alert('Something went wrong \\n Please try again'); </script>";
}
else
{
echo "<script> alert('Mail Sent!'); </script>";
}
}
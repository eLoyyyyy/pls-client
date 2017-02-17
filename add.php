<?php

require 'phpmailer.github/PHPMailerAutoload.php';
include 'RestRequest.php';
$app_id = 'jennifer.pcnpipls';



if(isset($_POST['lname'],$_POST['fname'],$_POST['mname'],$_POST['suffix'],$_POST['position'],$_POST['username'],$_POST['email'])){ 
	$lname = $_POST['lname'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$suffix = $_POST['suffix'];
	$position = $_POST['position'];
	$username = $_POST['username'];
    $email = $_POST['email'];

	$controller = 'User';
	$action = 'add_account';


$request = array(
    'controller' => $controller,
    'action' => $action,
    'lname' => $lname,
    'fname' => $fname,
    'mname' => $mname,
    'suffix' => $suffix,
	'position' => $position,
    'username' => $username,
    'email' => $email
);

try
{
    $params = array(
         'app_id' => $app_id,
         'request' => json_encode($request)
    );
    $rest = new RestRequest('http://api.pcnpipls.com/', 'POST', $params);
    $rest->execute();
	//var_dump($rest);
    $reply = json_decode($rest->getResponseBody(), true);
    //var_dump($reply);
    if ($reply['success'])
    {
        $data = $reply['data'];
        //echo '<script type="text/javascript">'; 
        //echo 'alert("Add Employee Successful!");'; 
        //echo 'window.location = "manage_accounts.php";';
        //echo '</script>';
            //header('Location: addaccount.php');

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
        $mail->Subject="Registration Login Cedentials and Pincode";
        $mail->Body = "Good Day $fname! 

        Welcome to PCN Project Liquidation System! 
        
        NOTICE! 
        
            Once Logged In please immediately change your password! Here is your current login credentials and pincode. 


                    PASSWORD: Welcome01! 
                    PINCODE: 10011001
                    USERNAME: $username

            Thank You!

            -PCN Management";

        $mail->AddAddress("$email");
        if(!$mail->Send()){
        echo "<script> alert('Something went wrong \\nPlease try again'); </script>";
        }
        else
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Account Added Successfully! \\nAn email is sent into the user account.");'; 
            echo 'window.location = "manage_accounts.php";';
            echo '</script>';
            //echo "<script> alert('Account Added Successfully! \\nAn email is sent into the user account.'); </script>";
        }

            die();
    }
} 
catch (Exception $e) 
{
    echo $e->getMessage();
}



}


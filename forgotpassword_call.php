<?php

include 'RestRequest.php';
$app_id = 'jennifer.pcnpipls';

$controller = 'user';
$action = 'forgot_password';
$empid = $_POST['emp_id'];
$pincode = $_POST['pin_code'];
//$old_pass = $_POST['old_pass'];
$new_pass = $_POST['new_pass'];
//$empid = $_POST['login_user'];

$request = array(
    'controller' => $controller,
    'action' => $action,
    'emp_id' => $empid,
    //'old_pass' => $old_pass,
    'new_pass' => $new_pass,
    'pincode' => $pincode
);

try
{
    $params = array(
         'app_id' => $app_id,
         'request' => json_encode($request)
    );
    $rest = new RestRequest('http://api.pcnpipls.com/', 'POST', $params);
    $rest->execute();
    $reply = json_decode($rest->getResponseBody(), true);
    $rest = null;
    if ($reply['success'])
    {
        $data = $reply['data'];
        if ($data['successful'] == 1)
        {   
            echo '<script type="text/javascript">'; 
            echo 'alert("Change Password Successful! You will be logged out of this Account");'; 
            echo 'window.location = "index.php";';
            echo '</script>';
            //header('Location: logout.php');
            die();
        }
        else
        {
            //echo '<script type="text/javascript">'; 
            //echo 'alert("Error!");'; 
            //echo 'window.location = "forgotpassword.php";';
            //echo '</script>';
            header('Location: change_password.php?error changing password');
            die();
        }
        
    }
} 
catch (Exception $e) 
{
    echo $e->getMessage();
}




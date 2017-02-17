<?php

include 'RestRequest.php';
$app_id = 'jennifer.pcnpipls';



if(isset($_POST['id'],$_POST['lname'],$_POST['fname'],$_POST['mname'],$_POST['suffix'],$_POST['position'],$_POST['username'],$_POST['email'])){
	$lname = $_POST['lname'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$suffix = $_POST['suffix'];
	$position = $_POST['position'];
	$username = $_POST['username'];
    $email = $_POST['email'];
	$id = $_POST['id'];

	$controller = 'User';
	$action = 'edit_account';


$request = array(
    'controller' => $controller,
    'action' => $action,
    'lname' => $lname,
    'fname' => $fname,
    'mname' => $mname,
    'suffix' => $suffix,
	'position' => $position,
    'username' => $username,
    'email' => $email,
	'id' => $id
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
            echo '<script type="text/javascript">'; 
            echo 'alert("Edit Done!");'; 
            echo 'window.location = "manage_accounts.php";';
            echo '</script>';
        //header('Location: editaccount.php?id='.$id);
        die();
    }
} 
catch (Exception $e) 
{
    echo $e->getMessage();
}

}
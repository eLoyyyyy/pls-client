<?php

include 'RestRequest.php';

    $app_id = 'jennifer.pcnpipls';
    
    $controller = 'Admin';
    $action = 'assign_project_employee';
	$empid = $_POST['empid'];
	$projid = $_POST['projid'];
	
if(isset($_POST['empid'],$_POST['projid'])){
    $request = array(
        'controller' => $controller,
        'action' => $action,
		'empid' => $empid,
        'projid' => $projid
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
		//var_dump($reply);
        if ($reply['success'] == 1)
        {
            $data = $reply['data'];
            echo '<script type="text/javascript">'; 
            echo 'alert("Project Assigned!");'; 
            echo 'window.location = "manage_accounts.php";';
            echo '</script>';
			//header('Location: manage_accounts.php');
			die();
        }
        else
        {
            return $reply['message'];
        }
    } 
    catch (Exception $e) 
    {
        return $e->getMessage();
    }
}

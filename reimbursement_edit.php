<?php

include 'RestRequest.php';


    $app_id = 'jennifer.pcnpipls';
    
    $controller = 'Edit';
    $action = 'edit_reimbursement';
	
	if(isset($_GET['id'])){
		$reimb_id = $_GET['id'];
	}
	
    $request = array(
        'controller' => $controller,
        'action' => $action,
        'id' => $_POST
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
            //echo '<script type="text/javascript">'; 
            //echo 'alert("Edit Done!");'; 
            //echo 'window.location = 'reimbursementform.php?id='.$reimb_id";'; 
            //echo '</script>';
			header('Location: reimbursementform.php?id='.$reimb_id);  // <-- babalik sa page reimbursements.php
            //echo('window.location = "reimbursementform.php?id=".+$reimb_id+');
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
	

	



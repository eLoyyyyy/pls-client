<?php

include 'RestRequest.php';

    $app_id = 'jennifer.pcnpipls';
    
    $controller = 'Approval';
    $action = 'disapprove_reimbursement';  
    $reimb_id = (isset($_POST['reimb']) ? $_POST['reimb'] : "");
    
    $request = array(
        'controller' => $controller,
        'action' => $action,
        'reimb_id' => $reimb_id
    );

    try
    {
        $params = array(
             'app_id' => $app_id,
             'request' => json_encode($request)
        );
        $rest = new RestRequest('http://api.pcnpipls.com/', 'POST', $params);
        $rest->execute();
		//var_dump($params);
        //var_dump($rest);
        $reply = json_decode($rest->getResponseBody(), true);
        //var_dump($reply);
        if ($reply['success'])
        {
            $data = $reply['data'];
            
            //echo '<script type="text/javascript">'; 
            //echo 'alert("Request Disapproved!");'; 
            //echo 'window.location = "reimbursementform.php?id=".$reimb_id";';
            //echo '</script>';
            header('Location: reimbursementform.php?id='.$reimb_id);  // <-- babalik sa page create_expense.php
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


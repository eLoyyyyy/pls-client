<?php

include 'RestRequest.php';

function get_projects($employee_id)
{
    $app_id = 'jennifer.pcnpipls';
    
    $controller = 'Project';
    $action = 'get_projects';

    $request = array(
        'controller' => $controller,
        'action' => $action,
        'employee_id' => $employee_id
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
        if ($reply['success'])
        {
            $data = $reply['data'];
            
            return $data; //<- dito nag rereturn siya ng null
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

function get_types()
{
    $app_id = 'jennifer.pcnpipls';
    
    $controller = 'Expense';
    $action = 'get_types';

    $request = array(
        'controller' => $controller,
        'action' => $action
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
        if ($reply['success'])
        {
            $data = $reply['data'];
            
            return $data; //<- dito nag rereturn siya ng null
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


function get_reimbursements($employee_id, $project_id)
{
    $app_id = 'jennifer.pcnpipls';
    
    $controller = 'Reimbursement';
    $action = 'get_reimbursements';
    

    $request = array(
        'controller' => $controller,
        'action' => $action,
        'employee_id' => $employee_id,
        'project_id' => $project_id
    );
	

    try
    {
        $params = array(
             'app_id' => $app_id,
             'request' => json_encode($request)
        );
        $rest = new RestRequest('http://api.pcnpipls.com/', 'POST', $params);
		//var_dump($rest);
        $rest->execute();
        $reply = json_decode($rest->getResponseBody(), true);
		//var_dump($reply);
        if ($reply['success'])
        {
            $data = $reply['data'];
            
            return $data; //<- dito nag rereturn siya ng null
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





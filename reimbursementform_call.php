<?php

include 'RestRequest.php';

function get_reimbursementform_details ($employee_id,$reimb_id)
{
    $app_id = 'jennifer.pcnpipls';
    
    $controller = 'Reimbursement';
    $action = 'get_reimbursementform_details';

    $request = array(
        'controller' => $controller,
        'action' => $action,
        'employee_id' => $employee_id,
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
        //var_dump($rest);
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


function get_reimbursementform_expenses ($employee_id,$reimb_id)
{
    $app_id = 'jennifer.pcnpipls';
    
    $controller = 'Reimbursement';
    $action = 'get_reimbursementform_expenses';

    $request = array(
        'controller' => $controller,
        'action' => $action,
        'employee_id' => $employee_id,
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
        //var_dump($rest);
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


// for acct userlvl
function get_reimbursement_acct ($reimb_id)
{
    $app_id = 'jennifer.pcnpipls';
    
    $controller = 'Reimbursement';
    $action = 'get_reimbursementformdetails_acct';

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
        //var_dump($rest);
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

function get_expenses_acct ($reimb_id)
{
    $app_id = 'jennifer.pcnpipls';
    
    $controller = 'Reimbursement';
    $action = 'get_reimbursementformexpense_acct';

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
        //var_dump($rest);
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

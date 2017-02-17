<?php

include 'RestRequest.php';

function get_reimb_acct()
{
    $app_id = 'jennifer.pcnpipls';
    
    $controller = 'SummaryExpensesacct';
    $action = 'get_summary_expenses';

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

function get_reimb_mgmt()
{
    $app_id = 'jennifer.pcnpipls';
    
    $controller = 'SummaryExpensesacct';
    $action = 'get_summary_expenses_mgmt';

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
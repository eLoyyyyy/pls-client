<?php

include 'RestRequest.php';

function get_projects()
{
    $app_id = 'jennifer.pcnpipls';
    
    $controller = 'Admin';
    $action = 'get_unassigned_project';

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

function get_area_executive()
{
    $app_id = 'jennifer.pcnpipls';
    
    $controller = 'Admin';
    $action = 'get_area_executive';

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

function get_all_user_account()
{
    $app_id = 'jennifer.pcnpipls';
    
    $controller = 'Admin';
    $action = 'get_all_user_account';

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





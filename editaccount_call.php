<?php

include 'RestRequest.php';

function edit_employee_get_details($empid)
{
    $app_id = 'jennifer.pcnpipls';
    
    $controller = 'Admin';
    $action = 'get_employee_details';
	
	
	if(!empty($empid)){
	
		$request = array(
			'controller' => $controller,
			'action' => $action,
			'empid' => $empid
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
}







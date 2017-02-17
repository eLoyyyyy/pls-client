<?php
    session_start(); //<-- nid neto para makuha mo ung mga values ng session mo
	
    include 'RestRequest.php';

    $app_id = 'jennifer.pcnpipls';
    
    $controller = 'Reimbursement';
    $action = 'insert_reimbursement';
    
    $request = array(
        'controller' => $controller,
        'action' => $action,
        'emp_id' => (int)$_SESSION['login_user'],
        'proj_id' => $_POST['projectSelect'],
        'dateprepd' => $_POST['date'],
        'desc' => $_POST['desc'],
        'amount' => $_POST['amount'],
        'type' => $_POST['typeSelect'],
        'reimb_id' => (int)$_SESSION['login_user'].$_POST['projectSelect'] // <-- pang generate ng reimbursement id
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
            //$data = $reply['data'];
            //return $data;
			echo '<script type="text/javascript">'; 
            echo 'alert("Expense Submitted!");'; 
            echo 'window.location = "create_expense.php#summary";';
            echo '</script>';
            //header('Location: create_expense.php');  // <-- babalik sa page create_expense.php
			die();
        }
        else
        {
            return $reply['message']; // <-- dapat may error message sa page ng create_expense.php if not success
        }
    } 
    catch (Exception $e) 
    {
        return $e->getMessage();
    }



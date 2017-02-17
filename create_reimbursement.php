<?php
date_default_timezone_set("Asia/Bangkok");
include 'RestRequest.php';

    $app_id = 'jennifer.pcnpipls';
    
    $controller = 'Reimbursement';
    $action = 'create_reimbursement';
    $current_date = date("njY");
    
    $request = array(
        'controller' => $controller,
        'action' => $action,
        'u_reimb_id' => $current_date.$_POST['reimb_id'],
        'reimb_id' => $_POST['reimb_id'],
        'proj_id' => $_POST['proj_id'],
        'i_date' => date("Y-m-d")
    );
    try
    {
        $params = array(
             'app_id' => $app_id,
             'request' => json_encode($request)
        );
        //var_dump($params);
        $rest = new RestRequest('http://api.pcnpipls.com/', 'POST', $params);
        //var_dump($rest);
        $rest->execute();
        $reply = json_decode($rest->getResponseBody(), true);
        //var_dump($reply);
        if ($reply['success'])
        {
            //$data = $reply['data'];
            //return $data;
            echo '<script type="text/javascript">'; 
            echo 'alert("Reimbursement Created!");'; 
            echo 'window.location = "reimbursements.php";';
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

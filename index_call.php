<?php
session_start();
include 'RestRequest.php';
$app_id = 'jennifer.pcnpipls';

$controller = 'user';
$action = 'login';
$username = $_POST['username'];
$password = $_POST['password'];
//$pincode = $_POST['pincode'];

$request = array(
    'controller' => $controller,
    'action' => $action,
    'username' => $username,
    'password' => $password,
   // 'pincode' => $pincode
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
    $rest = null;
    if ($reply['success'])
    {
        if (!isset($_SESSION['login_user']))
        {
            $data = $reply['data'];
            $_SESSION['login_user'] = $data['employee_id'];
            
        }
       
    }
} 
catch (Exception $e) 
{
    echo $e->getMessage();
}



# USER LEVEL SELECTION

    $app_id = 'jennifer.pcnpipls';

    $controller = 'user';
    $action = 'userlvl';
    $username = $_POST['username'];
    $password = $_POST['password'];
   // $pincode = $_POST['pincode'];

    $request = array(
        'controller' => $controller,
        'action' => $action,
        'username' => $username,
        'password' => $password,
    //    'pincode' => $pincode
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
        $rest = null;
        if ($reply['success'])
        {
            if (!isset($_SESSION['user_lvl']))
            {
                $data = $reply['data'];
                $_SESSION['user_lvl'] = $data['userlvl'];
                
            }
            header('Location: main.php');
            die();
        }
    } 
    catch (Exception $e) 
    {
        echo $e->getMessage();
    }
    

    
    
    if(isset($_SESSION['login_user'],$_SESSION['user_lvl'])){
        header('Location: main.php');
        die();
    }else{
        echo '<script type="text/javascript">'; 
        echo 'alert("Username or password is wrong! \\n Please try again!");'; 
        echo 'window.location = "index.php";';
        echo '</script>';
        //header('Location: index.php');
         
    }





// register user - eto pala ung insert user .
// update user
// archive user
// insert expense
// create reimbursement
// delete expense from reimbursement
// approve summary
// decline summary (with comment)
// CRUD project 
// assign project (pls_empproj)
// 


<?php
//session_start();
require 'lockout.php';

require 'header.php';

require 'navigation.php';

include 'reimbursementform_call.php';

//Determine user level
$buttons = "";
if(isset($_SESSION['user_lvl'])){
    $level = $_SESSION['user_lvl'];
    if($level == 1){
        $reimb_id = (isset($_GET['id']) ? $_GET['id'] : '');
        $employee_id = (int)$_SESSION['login_user'];
        $reimb_details = get_reimbursementform_details ($employee_id,$reimb_id);
        $reimb_expenses = get_reimbursementform_expenses ($employee_id,$reimb_id);
    }elseif($level == 2){
        $reimb_id = (isset($_GET['id']) ? $_GET['id'] : '');
        $employee_id = (int)$_SESSION['login_user'];
        $reimb_details = get_reimbursement_acct ($reimb_id);
        $reimb_expenses = get_expenses_acct ($reimb_id);
        
        //function of acctg
        $buttons .= "   
                        <form action='disapprove.php' method='POST'>
                            <input type='hidden' name='reimb' value='{$reimb_id}'>
                            <button type='button' onclick='submit();' class='col-lg-6 btn btn-primary'>Disapprove</button>
                        </form>
                    ";
        
    }elseif($level == 3){
        $reimb_id = (isset($_GET['id']) ? $_GET['id'] : '');
        $employee_id = (int)$_SESSION['login_user'];
        $reimb_details = get_reimbursement_acct ($reimb_id);
        $reimb_expenses = get_expenses_acct ($reimb_id);
    }else{

    }




	$ref_no = "";
	$ref_no_display = "";
	$details = "";
	$date = "";
	if(is_array($reimb_details)){
		foreach($reimb_details as $reimb_detail){
		
		$ref_no = "<h4 class='page-header'>Ref. No. {$reimb_detail['reimbid']}</h4>";
		$ref_no_display = "<b>Ref. No. {$reimb_detail['reimbid']}</b>";
		$status = ($reimb_detail['status'] == 0 ? "Processing..." : "Done");
		$acctapprove = ($reimb_detail['approvedacctg'] == 0 ? "" : "Approved.");
		$mgmtapprove = ($reimb_detail['approvedmgmt'] == 0 ? "" : "Approved.");
		$date = date_create($reimb_detail['datesubmitted']);
		$date = date_format($date,"M d, Y");
		$details = "                               <div class='row'>
														<div class='col-lg-6'>
															<p>Project Name: <b>{$reimb_detail['projecttitle']}</b></p>
															<p>Project Manager: <b>{$reimb_detail['firstname']} {$reimb_detail['middlename']} {$reimb_detail['lastname']} {$reimb_detail['suffix']}</b></p>
															<p>Date filed: <b>{$date}</b></p>
														</div>
														<div class='col-lg-6'>
															<p>Status: <b>{$status}</b></p>
															<p>Accouting's validation: <b>{$acctapprove}</b></p>
															<p>Top Management's approval: <b>{$mgmtapprove}</b></p>
														</div>
													</div>";
		}
	}
}


$expense_details = "";
$expense_total = "";
$formatted_amount = "";
$expense = "";
$unique_value = "";
$reimbs = "";
$expensedesc = "";
$expenseamount = "";
if(is_array($reimb_expenses)){
    foreach($reimb_expenses as $reimb_expense){
		$reimb[] = $reimb_expense['typedesc'];
		sort($reimb);
		$unique_value = array_unique($reimb);
                
        $expense_total += $reimb_expense['expenseamount'];
        $expense_total = number_format((float)$expense_total, 2, '.', '');
        
        
	
	
	}
	
	// for unique value
		if(is_array($unique_value)){
		
                    foreach($unique_value as $value){
                        $expensedesc = "";
                        $expenseamount = "";
                        $total_cost = "";
                        foreach($reimb_expenses as $reimb_expense){
                        $formatted_amount = number_format((float)$reimb_expense['expenseamount'], 2, '.', '');
                        
                            if($reimb_expense['typedesc'] == $value){
                                $expensedesc .= "   <tr>
                                                        <td>
															<div class='input-group'>
																<input disabled type='text' class='form-control' value='{$reimb_expense['expensedesc']}'>
															</div>
														</td>
                                                    </tr>";
                                                        
                                $expenseamount .= " <tr>
                                                        <td>
															<div class='input-group'>
																<span class='input-group-addon'>Php</span>
																<input type='text' name={$reimb_expense['expenseid']} class='form-control' value='{$formatted_amount}'>
															</div>
														</td>
                                                    </tr>";
                                $total_cost += $formatted_amount;
                                $total_cost = number_format((float)$total_cost, 2, '.', '');
                            }
                            
                            
                        }
                        
                        
                        $expense_details .= "                   
                        <tr>
                            <td><b>{$value}</b>
                                    <div class='table-responsive'>
                                        <table class='table'>
                                            <tbody>
                                                {$expensedesc}
                                            </tbody>
                                        </table>
                                    </div>
                            </td>
                            <td>Cost
									<div class='table-responsive'>
										<table class='table'>
											<tbody>
												{$expenseamount}
											</tbody>
										</table>
									</div>
                            </td>
                        </tr>";
                    }
                }
        
}

echo <<< MAIN
        
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        {$ref_no}
                    </div>
                </div>
				<div class="alert alert-danger">
                        <h4>Notice:</h4>
                        You are now editting <b>Summary Expenses</b> with {$ref_no_display}
                    </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-10">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <b>Project Reimburstment Details</b>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            {$details}
                                            <br>
                                            <div class="table-responsive">
												<form action='reimbursement_edit.php?id={$reimb_id}' method='POST'>
													<table class='table'>
                                                        <thead>
                                                            <tr>
                                                                <th style='width:200px'>Type of Expense</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
															{$expense_details}
														</tbody>
													</table>
													<div class="">
														<div class="col-lg-3"></div>
														<div class="col-lg-6">
															<button type='button' onclick='submit();' class='col-lg-6 btn btn-primary'>Done</button>
												</form>
														{$buttons}
														</div>
														<div class="col-lg-3"></div>
														<br><br><br>
													</div>
												
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            
                            
                        </div>
                        </div>
						
                        
						</div>
                    </div>
                </div>
                
            </div>
        </div>
        
        
    </div>


MAIN;

require 'footer.php';


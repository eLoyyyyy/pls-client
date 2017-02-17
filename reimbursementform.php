<?php
//session_start();
require 'lockout.php';

require 'header.php';

require 'navigation.php';

include 'reimbursementform_call.php';

//Determine user level
$buttons = "";
$maybuttonbadapatowala = isset($_GET['prcxd']) ? $_GET['prcxd'] : false;
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
                        <form action='approve.php' method='POST'>
                            <input type='hidden' name='reimb' value='{$reimb_id}'>
                            <button type='button' onclick='submit();' class='col-lg-6 btn btn-primary'> Approve</button>
                        </form>
						
                        <!--<form action='print.php' method='POST'>
                            <button type='button' onclick='window.print();' class='col-lg-6 btn btn-primary'> Print</button>
                        </form>-->

						<form action='editreimbursement.php' method='GET'>
                            <input type='hidden' name='id' value='{$reimb_id}'>
                            <button type='button' onclick='submit();' class='col-lg-6 btn btn-primary'> Edit</button>
                        </form>
                    ";

        if($maybuttonbadapatowala == true) {
            $buttons = "";
          //  $checkbox = "";
        }
        
        
    }elseif($level == 3){
        $reimb_id = (isset($_GET['id']) ? $_GET['id'] : '');
        $employee_id = (int)$_SESSION['login_user'];
        $reimb_details = get_reimbursement_acct ($reimb_id);
        $reimb_expenses = get_expenses_acct ($reimb_id);
		
		//function of mgmt
        $buttons .= "   
                        <form action='approve1.php' method='POST'>
                            <input type='hidden' name='reimb' value='{$reimb_id}'>
                            <a href='#' class='approve' data-confirm='Approve this item?'>
                            <button type='button' onclick='submit();' class='col-lg-6 btn btn-primary'>Approve</button></a>
                        </form>
						
						<form action='disapprove1.php' method='POST'>
                            <input type='hidden' name='reimb' value='{$reimb_id}'>
                            <a href='#' class='disapprove' data-confirm='Disapprove this item?'>
                            <button type='button' onclick='submit();' class='col-lg-6 btn btn-primary'>Disapprove</button></a>
                        </form>
                    ";

        if($maybuttonbadapatowala == true) {
            $buttons = "";
          //  $checkbox = "";
        }
        
    }else{

    }




	$ref_no = "";
	$details = "";
	$date = "";
	if(is_array($reimb_details)){
		foreach($reimb_details as $reimb_detail){
		
		$ref_no = "<h4 class='page-header'>Ref. No. {$reimb_detail['reimbid']}</h4>";
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
$expense_total1 = "";
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
                
        $expense_total1 += $reimb_expense['expenseamount'];
        $expense_total = number_format((float)$expense_total1, 2, '.', ',');
        
        
	
	
	}
	
	// for unique value
		if(is_array($unique_value)){
		
                    foreach($unique_value as $value){
                        $expensedesc = "";
                        $expenseamount = "";
                        $total_cost1 = "";
                        foreach($reimb_expenses as $reimb_expense){
                        $formatted_amount1 = $reimb_expense['expenseamount'];
						$formatted_amount = number_format((float)$formatted_amount1, 2, '.', ',');
                        
                            if($reimb_expense['typedesc'] == $value){
                                $expensedesc .= "   <tr>
                                                        <td>{$reimb_expense['expensedesc']}</td>
                                                    </tr>";
                                                        
                                $expenseamount .= " <tr>
                                                        <td class='text-right'>Php {$formatted_amount}</td>
                                                    </tr>";
                                $total_cost1 += $formatted_amount1;
                                $total_cost = number_format((float)$total_cost1, 2, '.', ',');
                            }
                            
                            
                        }
                        
                        
                        $expense_details .= "                   
                        <tr>
                            <td><b>{$value}</b>
                                    <div class='table-responsive'>
                                        <table class='table'>
                                            <tbody>
                                                {$expensedesc}
												<tr>
                                                    <td><b>Total</b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                            </td>
                            <td>Cost
									<div class='table-responsive'>
										<table class='table'>
											<tbody>
													{$expenseamount}
												<tr>
													<td class='text-right'><b>Php {$total_cost}</b></td>
												</tr>
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
                                                <table class='table'>
                                                        <thead>
                                                            <tr>
                                                                <th>Type of Expense</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        {$expense_details}
                                                        <tr>
                                                            <td><b>Grand Total</b></td>
                                                            <td class='text-right'><b>Php {$expense_total}</b></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-4">
                                    {$buttons}
                                </div>
                                <div class="col-lg-4"></div>
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


MAIN;

require 'footer.php';


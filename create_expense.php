<?php
require 'lockout.php';

require 'header.php';

require 'navigation.php';

include 'create_expense_call.php';

$employee_id = (int)$_SESSION['login_user'];
$projects = get_projects($employee_id);
$option = "";
$tabs = "";
$table_long = "";
if (is_array($projects))
{
    $clicked = false;
    $tab_index = 1;
    foreach($projects as $project)
    {
        $option .= "<option value='{$project['id']}'>{$project['title']}</option>";  
        $reimbursements = get_reimbursements($employee_id, $project['id']);
        $proj_id = ($reimbursements != NULL ? $project['id'] : "");
        if (is_array($reimbursements))
        {
            $orwut = $clicked == false ? 'in active' : '';
            $table_long .= "<div class='tab-pane fade {$orwut}' id='project-{$project['id']}'>
                                <br>
                                        <div class='table-responsive'>
                                            <table class='table table-hover d-tables'>
                                                <thead>
                                                    <tr>
                                                        <th>#ID</th>
                                                        <th>Description</th>
                                                        <th>Type of Expense</th>
                                                        <th>Amount</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>";
            foreach($reimbursements as $reimbursement)
            {
                $table_long .= "<tr>
                                <td>{$reimbursement['id']}</td>
                                <td>{$reimbursement['desc']}</td>
                                <td>{$reimbursement['type']}</td>
                                <td>{$reimbursement['amount']}</td>
                                <td>
                                    <a href='edit.expense.php' class='fa fa-pencil'></a> 
                                    <a href='#' class='delete' data-confirm='Are you sure to delete this item?'><i class='fa fa-trash'></i></a>
                                </td>
                            </tr>"; 
            }
            $table_long .= "</tbody>
                    </table>
                </div>
               
                    <br><br>
                    <div class='row'>
                        <form role='form' action='create_reimbursement.php' method='POST'>
                            <input type='hidden' name='reimb_id' value='{$employee_id}{$project['id']}'>
                            <input type='hidden' name='proj_id' value='{$proj_id}'>

                            <div class='col-lg-4 col-lg-offset-5'>
                                <button type='submit' class='right btn btn-outline btn-primary'>Submit Expenses</button>
                            </div>
                        </form>
                    </div>
                
            </div>";
            
            
        }
        if ($clicked == false)
        {
             $tabs .= "<li class='active'><a href='#project-{$project['id']}' data-toggle='tab' project-id='{$project['id']}'>{$project['title']}</a></li>";
             $clicked = true;
        }
        else
        {
            $tabs .= "<li><a href='#project-{$project['id']}' data-toggle='tab' project-id='{$project['id']}'>{$project['title']}</a></li>";
        }
        $tab_index += 1; 
            
    }
}

$types = get_types();
$type_options = "";
if (is_array($types))
{
    foreach($types as $type)
    {
        $type_options .= "<option value='{$type['id']}'>{$type['desc']}</option>";
    }    
}

$current_date = date("Y-m-d");



echo <<< MAIN

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Create Expense</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info">
                            <h4>Notice:</h4>
                            Input all expenses and attach the receipt for evidence.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Input Expenses
                            </div>
                            <div class="panel-body">
                                <form role="form" action="submit_expense.php" method="POST">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Project Title</label>
                                                <select required="" class="form-control" name="projectSelect">
                                                   <option value="">-- Select --</option>
                                                    {$option}
                                                </select>
                                            </div>
                                        </div>    
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input type="text" value="{$current_date}" name="date" class="form-control datepicker" data-date-format="yyyy-mm-dd" placeholder="Date">     
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <label>Type of expense</label>
                                                <select class="form-control" name="typeSelect" required="">
                                                    <option value="">--Select--</option>
                                                    {$type_options}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <label>Type of expense</label>
                                            <div class="form-group input-group">
                                                <span class="input-group-addon"><i class="fa fa-rub"></i></span>
                                                <input required="" type="text" class="form-control" name="amount" placeholder="Amount">    
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Description</label>
                                            <div class="form-group">
                                                <textarea required="" id="desc" name="desc" class="form-control" rows="3"></textarea>  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-lg-offset-5">
                                            <button type="submit" class="right btn btn-outline btn-primary">Add</button>
                                            <button type="reset" class="right btn btn-outline btn-primary">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row" id='summary'>
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Summary
                            </div>

                            <div class="panel-body">
                                <ul class="nav nav-tabs">
                                    {$tabs}
                                </ul>
                                <div class="tab-content">
                                    {$table_long}
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



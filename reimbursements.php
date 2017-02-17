<?php

require 'lockout.php';

require 'header.php';

require 'navigation.php';

include 'reimbursements_call.php';

$employee_id = (int)$_SESSION['login_user'];
$projects = get_projects($employee_id);

$table_row = "";

    $data = get_created_reimbursements($employee_id);
    foreach($data as $table_data){
        $date = date_create($table_data['datesubmitted']);
        $date = date_format($date,"M d, Y");
        $stat = ($table_data['status'] != 0 ? "Done" : "Processing");
        $table_row .= " <tr>
                        <td>{$date}</td>
                        <td><a href='reimbursementform.php?id={$table_data['reimbid']}'>{$table_data['reimbid']}</a></td>
                        <td>{$table_data['projecttitle']}</td>
                        <td>{$stat}</td>
                    </tr>";
    }
    

echo <<< MAIN
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Reimbursements</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info">
                            List of Reimbursements
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Reimbursements
                            </div>
                            <div class="panel-body">
                                    <div class="dataTable_wrapper">
                                            <table class="table table-striped table-bordered table-hover d-tables" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th>Date Created</th>
                                                        <th>Ref. No.</th>
                                                        <th>Project Name</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   {$table_row}
                                                </tbody>
                                            </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        
    

MAIN;

require 'footer.php';



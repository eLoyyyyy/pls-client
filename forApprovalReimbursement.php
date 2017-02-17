<?php
require 'lockout.php';

require 'header.php';

include 'navigation.php';

include 'summary_expense_call.php';

$data = get_reimb_mgmt();
$table_rownew = "";
$table_rowold = "";
if(is_array($data)){
    foreach($data as $info){
        if($info['status'] == 0){
            $date = date_create($info['date']);
            $date = date_format($date,"M d, Y");
            $table_rownew .= " <tr>
                                <td><a href='reimbursementform.php?id={$info['reimbid']}'>{$info['reimbid']}</a></td>
                                <td>{$info['project']}</td>
                                <td>{$date}</td>
                            </tr>";
        }if($info['status'] == 1){
            $date = date_create($info['date']);
            $date = date_format($date,"M d, Y");
            $table_rowold .= " <tr>
                                <td><a href='reimbursementform.php?id={$info['reimbid']}&prcxd=true'>{$info['reimbid']}</a></td>
                                <td>{$info['project']}</td>
                                <td>{$date}</td>
                            </tr>";
        }
    }
}


echo <<< MAIN

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                            <h1 class="page-header">Summary Expenses</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#new" data-toggle="tab">For Approval Reimbursement Forms</a></li>
                            <li><a href="#old" data-toggle="tab">Approved Reimbursement Forms</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="new">
                                <br>
                                <div class="col-lg-12">
                                    <div class="dataTable_wrapper">
                                        <table class="table table-striped table-bordered table-hover d-tables">
                                            <thead>
                                                <tr>
                                                    <th>Ref. No.</th>
                                                    <th>Project Name</th>
                                                    <th>Date Created</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {$table_rownew}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="old">
                                <br>
                                <div class="col-lg-12">
                                    <div class="dataTable_wrapper">
                                        <table class="table table-striped table-bordered table-hover d-tables">
                                            <thead>
                                                <tr>
                                                    <th>Ref. No.</th>
                                                    <th>Project Name</th>
                                                    <th>Date Created</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {$table_rowold}
                                            </tbody>
                                        </table>
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
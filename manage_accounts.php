<?php

require 'lockout.php';

require 'header.php';

require 'navigation.php';

include 'manage_accounts_call.php';

$area_employee = get_area_executive();
$unassign_project = get_projects();
$all_employee = get_all_user_account();

$option_project = "";
$option_employee = "";
$long_table = "";
if(is_array($unassign_project)){
	foreach($unassign_project as $project){
		$option_project .= "<option value='{$project['id']}'>{$project['projtitle']}</option>";
	}
}

if(is_array($area_employee)){
	foreach($area_employee as $employee){
		$option_employee .= "<option value='{$employee['id']}'>{$employee['firstname']} {$employee['middlename']} {$employee['lastname']} {$employee['suffix']}</option>";
	}
}

if(is_array($all_employee)){
	foreach($all_employee as $employees){
		$long_table .= "
						<tr>
							<td>{$employees['id']}</td>
                            <td><a href='editaccount.php?id={$employees['id']}'>{$employees['acctuser']}</a></td>
                            <td>{$employees['firstname']} {$employees['middlename']} {$employees['lastname']} {$employees['suffix']}</td>
                            <td>{$employees['position']}</td>
                            <td><a href='#' class='delete' data-confirm='Are you sure to delete this user?'><i class='fa fa-trash'></i></a></td>
                        </tr>";
	}
}

echo <<< main

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                            <h1 class="page-header">Manage Account</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info">
                            <h4>Notice:</h4>
                            View/Edit/Delete User Account. Designate Project
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#new" data-toggle="tab">Account List</a></li>
                            <li><a href="#old" data-toggle="tab">Project Designation</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="new">
                                <br>
                                <div class="col-xs-12">
								<div class="col-lg-12">
                                    <div class="dataTable_wrapper">
                                        <table class="table table-striped table-bordered table-hover d-tables">
                                            <thead>
                                                <tr>
													<th>User ID</th>
                                                    <th>Username</th>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
												{$long_table}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
								</div>
                            </div>
                            <div class="tab-pane fade" id="old">
                            <br>
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        Project Assignment
                                    </div>
                                    <div class="panel-body">
									<form role='form' action='assign_project.php' method='POST'>
                                        <div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label>Employee Name</label>
													<select required="" class="form-control" name="empid">
														<option value="">-- Select --</option>
														{$option_employee}
													</select>
												</div>
											</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Project Title</label>
                                                    <input required class='form-control' name='projid' placeholder='Project Title'>
													<!--<select required="" class="form-control" name="projid">
														<option value="">-- Select --</option>
														{$option_project}
													</select>-->
                                                </div>
                                            </div>
                                        </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <button type="submit" class="btn btn-primary">Assign</button>
                                                    <button type="reset" class="btn btn-primary">Reset</button>
                                                </div>
                                            </div>
                                        </div>
									</form>
                                </div>
                            </div>
                        </div>         
                    </div>
                </div>
            </div>
        </div>


main;

require 'footer.php';
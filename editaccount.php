<?php

require 'lockout.php';

require 'header.php';

require 'navigation.php';

include 'editaccount_call.php';

	$input = "";
	$userlevel = "";
	$empid = (isset($_GET['id']) ? $_GET['id'] : '');
	$employee_details = edit_employee_get_details($empid);
	
	if(is_array($employee_details)){
		foreach($employee_details as $details){
			
			if($details['usrlvl'] == 1){
				$userlevel = "
					<option value=''>-- Select --</option>
					<option selected value='1'>Area Executive</option>
					<option value='2'>Accountant</option>
					<option value='3'>Top Management</option>
					<option value='4'>Administrator</option>
				";
			}elseif($details['usrlvl'] == 2){
				$userlevel = "
					<option value=''>-- Select --</option>
					<option value='1'>Area Executive</option>
					<option selected value='2'>Accountant</option>
					<option value='3'>Top Management</option>
					<option value='4'>Administrator</option>
				";
			}elseif($details['usrlvl'] == 3){
				$userlevel = "
					<option value=''>-- Select --</option>
					<option value='1'>Area Executive</option>
					<option value='2'>Accountant</option>
					<option selected value='3'>Top Management</option>
					<option value='4'>Administrator</option>
				";
			}elseif($details['usrlvl'] == 4){
				$userlevel = "
					<option value=''>-- Select --</option>
					<option value='1'>Area Executive</option>
					<option value='2'>Accountant</option>
					<option value='3'>Top Management</option>
					<option selected value='4'>Administrator</option>
				";
			}else{
				$userlevel = "";
			}
			$qt = '"';
			$input = "				<div class='row'>
                                        <div class='col-lg-5'>
                                            <h4>Personal Info</h4>
											<div class='row'>
												<div class='col-lg-12'>
													<div class='form-group'>
														<label>Last Name</label>
														<input required class='form-control' value='{$details['lastname']}' name='lname' placeholder='Last Name'>
													</div>
												</div>
											</div>
											<div class='row'>
												<div class='col-lg-12'>
													<div class='form-group'>
														<label>First Name</label>
														<input required class='form-control' value='{$details['firstname']}' name='fname' placeholder='First Name'>
													</div>
												</div> 
											</div>
											<div class='row'>
												<div class='col-lg-12'>
													<div class='form-group'>
														<label>Middle Name</label>
														<input class='form-control' value='{$details['middlename']}' name='mname' placeholder='Middle Name'>
													</div>
												</div> 
											</div>
											<div class='row'>
												<div class='col-lg-12'>
													<div class='form-group'>
														<label>Suffix</label>
														<input class='form-control' value='{$details['suffix']}' name='suffix' placeholder='Suffix'>
													</div>
												</div> 
											</div>
                                        </div>
										
										<div class='col-lg-5'>
										<h4>Account Info</h4>
                                            <div class='row'>
												<div class='col-lg-12'>
													<div class='form-group'>
														<label>Position</label>
														<select required class='form-control' name='position'>
														{$userlevel}
														</select>
													</div>
												</div>
											</div> 	
											<div class='row'>
												<div class='col-lg-12'>
													<div class='form-group'>
														<label>Username</label>
														<input required class='form-control' value='{$details['acctuser']}' name='username' placeholder='Username'>
														<input type='hidden' class='form-control' value='{$details['id']}' name='id'>
													</div>
												</div>
											</div> 
											<div class='row'>
												<div class='col-lg-12'>
													<div class='form-group'>
														<label>Email</label>
														<input required class='form-control' name='email' value='{$details['email']}' placeholder='Email'>
													</div>
												</div>
											</div>
                                        </div>	
                                    </div>
									
									<div class='row'>
                                    <div class='col-lg-4'>
                                        <button type='submit' class='btn btn-primary'>Save</button>
                                        <button type='button' onclick='location.href={$qt}manage_accounts.php{$qt}' class='btn btn-primary'>Cancel</button>
                                    </div>
                                </div>
			
			";
			
		}
	}else{
		
		$input = "There was an error while accessing this page.";
	}
	



echo <<< main


<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add User Account</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info">
                            <h4>Notice:</h4>
                            All fields are necessary.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Fill up credentials.
                            </div>
                            <div class="panel-body">
							<form action="edit.php" method="POST">
								{$input}
                                        									
                                
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
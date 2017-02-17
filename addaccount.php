<?php

require 'lockout.php';

require 'header.php';

require 'navigation.php';

//require 'sendmail.php';


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
							<form action="add.php" method="POST">
									<div class="row">
                                        <div class="col-lg-5">
                                            <h4>Personal Info</h4>
											<div class="row">
												<div class="col-lg-12">
													<div class="form-group">
														<label>Last Name</label>
														<input required class="form-control" name="lname" placeholder="Last Name">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div class="form-group">
														<label>First Name</label>
														<input required class="form-control" name="fname" placeholder="First Name">
													</div>
												</div> 
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div class="form-group">
														<label>Middle Name</label>
														<input class="form-control" name="mname" placeholder="Middle Name">
													</div>
												</div> 
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div class="form-group">
														<label>Suffix</label>
														<input class="form-control" name="suffix" placeholder="Suffix">
													</div>
												</div> 
											</div>
                                        </div>
										
										<div class="col-lg-5">
										<h4>Account Info</h4>
                                            <div class="row">
												<div class="col-lg-12">
													<div class="form-group">
														<label>Position</label>
														<select required class="form-control" name="position">
															<option value="">-- Select --</option>
															<option value="1">Area Executive</option>
															<option value="2">Accountant</option>
															<option value="3">Top Management</option>
															<option value="4">Administrator</option>
														</select>
													</div>
												</div>
											</div> 	
											<div class="row">
												<div class="col-lg-12">
													<div class="form-group">
														<label>Username</label>
														<input required class="form-control" name="username" placeholder="Username">
													</div>
												</div>
											</div> 
											<div class="row">
												<div class="col-lg-12">
													<div class="form-group">
														<label>Email</label>
														<input required class="form-control" name="email" placeholder="Email">
													</div>
												</div>
											</div> 
                                        </div>	
                                    </div>
                                        									
                                <div class="row">
                                    <div class="col-lg-4">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
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
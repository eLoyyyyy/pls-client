<?php

require 'lockout.php';

require 'header.php';

require 'navigation.php';

echo <<< MAIN
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Change Password</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Fill up to change password.
                            </div>
                            <div class="panel-body">
                                 <form role='form' action='change_password_call.php' method='POST' id="myForm">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="old_pass" placeholder="Old Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="pin_code" placeholder="Pin Code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="New Password" name="pwd1" id="field_pwd1" 
                                                title="Password must contain at least 6 characters, including UPPER/lowercase and numbers."
                                                 required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" >
                                                 <span id="passstrength"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Confirm Password" name="new_pass" 
                                                required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
                                                id="field_new_pass" title="Please enter the same Password as above." >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <button type="submit" class="btn btn-primary">Change</button>
                                            <button type="reset" class="btn btn-primary">Reset</button>
                                            <input type="hidden" name="login_user" value="{$_SESSION['login_user']}"/>
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
        
    

MAIN;

require 'footer.php';



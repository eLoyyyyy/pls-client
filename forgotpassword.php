<?php

require 'header1.php';

echo <<< MAIN
<!-- Page Content -->
        <div id="page-wrapper">

                <br><br>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <h1 class="heading-primary">Forgot Password</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="panel panel-primary">

                                <div class="panel-heading">
                                    Fill up to Reset Password.
                                </div>

                                <div class="panel-body">

                                    <form role='form' action='forgotpassword_call.php' method='POST' id='myForm'>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="emp_id" placeholder="Employee ID"
                                                    title="Please enter your Employee ID">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="password"  class="form-control" name="pin_code" placeholder="Pin Code"
                                                    title=" Please Key in the company Pincode.">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="password"  class="form-control" placeholder="New Password" name="pwd1" id="field_pwd1" 
                                                title="Password must contain at least 6 characters, including UPPER/lowercase and numbers."
                                                 required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" >
                                                 <span id="passstrength"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="password"  class="form-control" name="new_pass" placeholder="Confirm Password"
                                                    required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" id="field_new_pass" 
                                                    title="Please enter the same Password as above." >
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">Send</button>
                                                <!--<button type="reset" class="btn btn-primary">Reset</button>-->
                                                <a type='button' class='btn btn-primary' href='index.php'> Cancel</a>
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

require 'footer1.php';



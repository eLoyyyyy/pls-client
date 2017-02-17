<?php
session_start();
session_destroy();
#THIS PAGE SHOULD NOT BE UP IF THERE'S STILL A LOGIN USER
require 'header1.php';

echo <<< MAIN

    <!--main-->

	<!--login-->
            <br><br><br><br>
            <div class="container">
                <div class="row">
                    <div class="panel-body">
                        <div class="form-body">
                            <div class="col-md-1"></div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-xs-2 col-sm-3 col-md-3 col-lg-4"></div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <form class="form-signin" action="index_call.php" method="POST">        
                                            <h2 class="heading-tertiary">Sign in</h2>
                                            <div class=" input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                                <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
                                            </div> <br>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-lock"></i>
                                                </span>
                                                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                            </div>
                                            <!--<div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                                <input type="password" name="pincode" id="inputPassword" class="form-control" placeholder="Pin Code" required>
                                            </div>--> <br>
                                            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                                            <br><br>
                                        </form>
                                            <b style="margin:95px;">Forgot Password?<a href="forgotpassword.php"> Click Here!</a></b>
                                    </div>
                                    <!-- <div class="col-xs-2 col-sm-3 col-md-3 col-lg-4"></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--login-->

MAIN;

require 'footer1.php';

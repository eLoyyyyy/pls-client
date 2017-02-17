<?php
session_start();
session_destroy();
#THIS PAGE SHOULD NOT BE UP IF THERE'S STILL A LOGIN USER

require 'header.php';

    echo <<< MAIN
        <body style="background-color:#f8f8f8">
            <div class="container-fluid">
                <nav class="navbar navbar-default navbar-fixed-top" style="background-color:#222">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#">Liquidation Portal</a>
                        <div id="navbar" class="navbar-collapse collapse" role="navigation">
                            <ul class="nav nav-pills">
                                <li><a href="about.html"><h5><i class="fa fa-question-circle fa-fw"></i>About</h5></a></li>
                                <li><a href="contact.html"><h5><i class="fa fa-phone-square fa-fw"></i>Contact Us</h5></a></li>
                                <li><a href="service.html"><h5><i class="fa fa-cogs fa-fw"></i>Services</h5></a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </nav>
            </div>
            <br><br><br><br><br><br><br><br>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-xs-2 col-sm-3 col-md-3 col-lg-4"></div>
                                <div class="col-xs-8 col-sm-6 col-md-6 col-lg-4">
                                    <form class="form-signin" action="index_call.php" method="POST">
                                        <div class="row">
                                            <div class="col-xs-6 col-md-12">
                                                <a href="about.html"><img alt="pcppipls" width="100%" height="100" src="PCN.Logo.png"></a>
                                            </div>
                                        </div>
                                    <br><br>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-info-circle"></i>
                                        </span>
                                        <input type="password" name="pincode" id="inputPassword" class="form-control" placeholder="Pin Code" required>
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                                </form>
                            </div>
                            <!-- <div class="col-xs-2 col-sm-3 col-md-3 col-lg-4"></div> -->
                        </div>

                        <hr>
                        <div class="row text-center">
                            <div class="col-xs-2 col-sm-3 col-md-3 col-lg-4"></div>
                                <div class="col-xs-8 col-sm-6 col-md-6 col-lg-4">
                                        Liquidation Portal © 2015
                                </div>
                            <div class="col-xs-2 col-sm-3 col-md-3 col-lg-4"></div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
MAIN;

require 'footer.php';


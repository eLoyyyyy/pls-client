<?php
require 'lockout.php';

include 'RestRequest.php';

require 'header.php';

require 'navigation.php';



echo <<< MAIN

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
                            All fields are necessary.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#new" data-toggle="tab"> Add Account</a></li>
                            <li><a href="#old" data-toggle="tab"> Account List</a></li>
                            <li><a href="#old1" data-toggle="tab"> Project Designation</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="new">
                                <br>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Fill up credentials.
                                            </div>
                                            <div class="panel-body">
                                                <form role="form" action="admintest.php" method="POST">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Employee Number</label>
                                                                <input class="form-control" placeholder="Employee Number" required autofocus>
                                                            </div>
                                                        </div>    
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Pin Code</label>
                                                                <input type="text" class="form-control" placeholder="Pin Code" required>    
                                                            </div>    
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input class="form-control" placeholder="Last Name" required>
                                                            </div>
                                                        </div>    
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Confirm Pin Code</label>
                                                                <input type="text" class="form-control" placeholder="Confirm Pin Code" required>  
                                                            </div>    
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input class="form-control" placeholder="First Name" required>
                                                            </div>
                                                        </div>    
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="text" class="form-control" placeholder="Password" required>    
                                                            </div>    
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Middle Name</label>
                                                                <input class="form-control" placeholder="Middle Name" required>
                                                            </div>
                                                        </div>    
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Confirm Password</label>
                                                                <input type="text" class="form-control" placeholder="Confirm Password" required>    
                                                            </div>    
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Position</label>
                                                                <input class="form-control" placeholder="Position" required>
                                                            </div>
                                                        </div>
                                                    </div>    
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <button type="button" class="btn btn-primary">Add</button>
                                                            <button type="button" class="btn btn-primary">Reset</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>

MAIN;

require 'footer.php';
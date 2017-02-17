<?php

require 'lockout.php';
require 'header.php';
include 'navigation.php';
include 'reports_call.php';


echo <<< MAIN

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Weekly Report</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#new" data-toggle="tab">Reports</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="new">
                                <br>
                                <div class="col-lg-12">
                                    <div class="dataTable_wrapper">
                                        <table class="table table-striped table-bordered table-hover d-tables">
                                            <thead>
                                                <tr>
                                                    <th>Employee Name</th>
                                                    <th>Project Title</th>
                                                    <th>Liquidation Amount</th>
                                                    <th>Date Covered</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Juan Tamad</td>
                                                    <td>PREORAL</td>
                                                    <td>12300</td>
                                                    <td>22-Feb-16 to 26-feb-16</td>
                                                </tr>
                                                <tr>
                                                    <td>Juan Tamad</td>
                                                    <td>PREORAL</td>
                                                    <td>12300</td>
                                                    <td>22-Feb-16 to 26-feb-16</td>
                                                </tr>
                                                <tr>
                                                    <td>Juan Tamad</td>
                                                    <td>PREORAL</td>
                                                    <td>12300</td>
                                                    <td>22-Feb-16 to 26-feb-16</td>
                                                </tr>
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

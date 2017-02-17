<?php
require 'lockout.php';

require 'header.php';

include_once 'navigation.php';

echo <<< MAIN
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Home</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p>Hi User,</p>
                    <p>Welcome to Liquidation Portal!</p>
                    <br>
                    <div class="alert alert-danger">
                        <h4>Notice:</h4>
                        Never share your domain account password to anyone.
                    </div>
                </div>
            </div>
        </div>
    </div>
MAIN;

require 'footer.php';

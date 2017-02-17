<?php
	require 'lockout.php';

	require 'header.php';

	require 'navigation.php';

	//include 'editcreatedexpense_call.php';


echo<<<main

<!--main-->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9">
				<br><br><br>
                <div class="panel panel-primary">
                	<div class="panel-heading">
                		Edit Queued Expense
                	</div>
                	<div class="panel-body">
                		<form role="form" action=" " method="POST">

	                		<div class="row">
	                			<div class="form-group">
	                				<div class="col-md-3">
		                				<label>#ID : </label>
		                			</div>
	                				<div class="col-md-9">
		                            	<input disabled type="number"  class="form-control" name="id" placeholder="ID"><br>
		                        	</div>
	                			</div>
	                		</div>

                			<div class="row">
	                			<div class="form-group">
	                				<div class="col-md-3">
		                				<label>Description : </label>
		                			</div>
	                				<div class="col-md-9">
	                					<textarea class="form-control" rows="4" placeholder="Description"></textarea>
	                            		<!--<input type="text"  class="form-control" name="expensedesc" placeholder="Description" style="height:100px">--><br>
	                        		</div>
	                			</div>
	                		</div>

                			<div class="row">
	                			<div class="form-group">
	                				<div class="col-md-3">
		                				<label>Type of Expense : </label>
		                			</div>
	                				<div class="col-md-9">
	                            		<input disabled type="text" class="form-control" name="typeofexpense" placeholder="Type of Expense"><br>
	                        		</div>
	                			</div>
	                		</div>

                			<div class="row">
	                			<div class="form-group">
	                				<div class="col-md-3">
		                				<label>Amount : </label>
		                			</div>
	                				<div class="col-md-9">
	                					<input type="text" class="form-control" name="Amount" placeholder="Amount"><br>
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

main;


require 'footer.php';

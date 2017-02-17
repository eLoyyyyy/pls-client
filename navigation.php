<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<nav class='navbar navbar-default navbar-static-top' role='navigation' style='margin-bottom: 0'>
            <div class='navbar-header'>
                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
                    <span class='sr-only'>Toggle navigation</span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
                <a class='navbar-brand' href='main.php'>Liquidation Portal</a>
            </div>
            
                       
            <div class='navbar-side sidebar' role='navigation'>
                <div class='sidebar-nav navbar-collapse'>
                    <br>
                    <img alt='pcn' width='111' height='54' data-sticky-width='82' data-sticky-height='40' data-sticky-top='33' src='image/logo.png' 
                    style='margin-left:40px'>
                    <br><br>

                    <ul class='nav navbar-top-links'>
                        <li>
                            <h5><i class='fa fa-user'></i> Current Employee ID:
                             <?php
                                if(isset($_SESSION['user_lvl'],$_SESSION['login_user'])){
                                    echo sprintf('%05d', $_SESSION['login_user']); 
                                }
                            ?></h5>
                        </li>
                    </ul>
                    
                    <hr>
                    
                    
<?php
    if(isset($_SESSION['user_lvl'],$_SESSION['login_user'])){
        $user = $_SESSION['login_user'];
        $level = $_SESSION['user_lvl'];
        
        if($level == '1'){
            echo "  <ul class='nav' id='side-menu'>
                        <li>
                            <a href='main.php'><i class='fa fa-home fa-fw'></i> Home</a>
                        </li>
                        <li>
                            <a href='create_expense.php'><i class='fa fa-bar-chart-o fa-fw'></i> Create Expense</a>
                        </li>
                        <li>
                            <a href='reimbursements.php'><i class='fa fa-bar-chart-o fa-fw'></i> Reimbursements</a>
                        </li>
                        <li>
                            <a href='change_password.php'><i class='fa fa-gear fa-fw'></i> Change Password</a>
                        </li>
                        <li>
                            <a href='logout.php'><i class='fa fa-sign-out fa-fw'></i> Logout</a>
                        </li>
                    </ul>";
        }elseif($level == '2'){
            echo "  <ul class='nav' id='side-menu'>
                        <li>
                            <a href='main.php'><i class='fa fa-home fa-fw'></i> Home</a>
                        </li>
                        <li>
                            <a href='summary_expense.php'><i class='fa fa-bar-chart-o fa-fw'></i> Summary Expense</a>
                        </li>
                        <li>
                            <a href='reports.php'><i class='fa fa-area-chart fa-fw'></i> Weekly Report</a>
                        </li>
                        <li>
                            <a href='change_password.php'><i class='fa fa-gear fa-fw'></i> Change Password</a>
                        </li>
                        <li>
                            <a href='logout.php'><i class='fa fa-sign-out fa-fw'></i> Logout</a>
                        </li>
                    </ul>";
        }elseif ($level == '3') {
            echo "  <ul class='nav' id='side-menu'>
                        <li>
                            <a href='main.php'><i class='fa fa-home fa-fw'></i> Home</a>
                        </li>
                        <li>
                            <a href='forApprovalReimbursement.php'><i class='fa fa-bar-chart-o fa-fw'></i> Reimbursement Forms</a>
                        </li>
                        <li>
                            <a href='change_password.php'><i class='fa fa-gear fa-fw'></i> Change Password</a>
                        </li>
                        <li>
                            <a href='logout.php'><i class='fa fa-sign-out fa-fw'></i> Logout</a>
                        </li>
                    </ul>";
        }elseif ($level == '4'){
            echo "  <ul class='nav' id='side-menu'>
                        <li>
                            <a href='main.php'><i class='fa fa-home fa-fw'></i>Home</a>
                        <li>
                            <a href='addaccount.php'><i class='fa fa-plus fa-fw'></i> Add Account</a>
                        </li>
                        <li>
                            <a href='manage_accounts.php'><i class='fa fa-cogs fa-fw'></i> Manage Accounts</a>
                        </li>
                        <li>
                            <a href='change_password.php'><i class='fa fa-gear fa-fw'></i> Change Password</a>
                        </li>
                        <li>
                            <a href='logout.php'><i class='fa fa-sign-out fa-fw'></i> Logout</a>
                        </li>
                    </ul>";
        }else{
			
		}
        
    }
    
?>
                    
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
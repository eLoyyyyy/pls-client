<?php
session_start();
session_destroy();

echo '<script type="text/javascript">'; 
echo 'alert("You are being logged out of the system.... \\nPress OK to continue.");'; 
echo 'window.location = "index.php";';
echo '</script>';
//header('Location: index.php');
die();
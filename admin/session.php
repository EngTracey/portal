<?php
session_start();

//Check whether the session variable SESS_account_no is present or not
if (!isset($_SESSION['adminid']) || (trim($_SESSION['adminid']) == '')) { 

header('location:index.php');
}//223108
$adminsession_id=$_SESSION['adminid'];
?>
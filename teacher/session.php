<?php
session_start();

//Check whether the session variable SESS_account_no is present or not
if (!isset($_SESSION['teacherid']) || (trim($_SESSION['teacherid']) == '')) { 

header('location:index.php');
}
$session_id=$_SESSION['teacherid'];
?>
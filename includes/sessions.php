<?php
session_start();
function message() {
	if (isset($_SESSION["message"])) {
		//$msg = '<div class="col-md-6 col-md-offset-3">';
		$msg .=  '<div class="alert alert-success">';
		$msg .= '<strong>Message!</strong>&nbsp;';
		$msg .= htmlentities($_SESSION["message"]);
		$msg .= '.</div>';
		//$msg .= '.</div>';
		// Clear message after use
		$_SESSION["message"] = null;
		return $msg;
	}
}
function errors() {
	if (isset($_SESSION["error"])) {
		//$output = '<div class="col-md-6 col-md-offset-3">';
		$output =  '<div class="alert alert-warning">';
		$output .= '<strong>Error!</strong>&nbsp;';
		$output .= $_SESSION["error"];
		$output .= '.</div>';
		//$output .= '.</div>';
		// Clear message after use
		$_SESSION["error"] = null;
		return $output;
	}
}
?>
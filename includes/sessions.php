<?php
session_start();
$errors = array();
//isset($_SESSION["messages"]) ? $_SESSION["messages"] : "";
function messages() {
	if (isset($_SESSION["messages"])) {
		$msg =  '<div class="alert alert-success">';
		$msg .= '<strong>Success!</strong>&nbsp;';
		$msg .= htmlentities($_SESSION["messages"]);
		$msg .= '.</div>';
		// Clear message after use
		$_SESSION["messages"] = null;
		return $msg;
	}
}
function errors() {
	if (isset($_SESSION["errors"])) {
		$output =  '<div class="alert alert-danger">';
		$output .= '<strong>Error!</strong>&nbsp;';
		$output .= $_SESSION["errors"];
		$output .= '.</div>';
		// Clear message after use
		$_SESSION["errors"] = null;
		return $output;
	}
}
?>
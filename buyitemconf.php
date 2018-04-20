<?php
session_start();
ob_start();
header("LOCATION: buyitem.php?done=<div class='alert alert-success text-success text-center mr-auto'>now you own it :)</div>");
ob_end_flush();
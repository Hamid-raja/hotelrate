<?php
$filepath = realpath(dirname(__FILE__));
include($filepath."/../config/session.php");
session_start();

Session::destroy();
?>
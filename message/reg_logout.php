<?php
require 'reg_config.php';
$_SESSION = [];
session_unset();
session_destroy();
header("Location: reg_login.php");
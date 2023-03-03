<?php
session_start();
require_once '../../function/functions.php';
session_destroy();
header("Location: " . baseUrl() . "");
exit;

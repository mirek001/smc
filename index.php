<?php
session_start();
require_once 'mysql_data.php';
//require_once 'functions.php';
require_once 'load_lang.php';

$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
		$res = $con->query("SELECT * FROM settings WHERE id = 1");
				$row = mysqli_fetch_array($res);
				$header = $row['value'];

require_once "site/themes/$header/index.php";





?>
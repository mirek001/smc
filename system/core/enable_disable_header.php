
<?php
session_start();
if (!isset($_SESSION['id'])) exit();
require '../../mysql_data.php';

$type = $_GET['type'];
$type = htmlentities($type, ENT_QUOTES, "UTF-8");
$hidden = $_GET['hidden'];
$hidden = htmlentities($hidden, ENT_QUOTES, "UTF-8");


$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$con->query($q=("UPDATE site_map SET hidden='$hidden' WHERE type='$type'"));		
//echo $q;


			if ($hidden=="1") $_SESSION['note']=$_SESSION['changes_saved']."!";
			if ($hidden=="0") $_SESSION['note']=$_SESSION['changes_saved']."!";

			$header="index.php";
			header("Location: $header");

?>
<?php
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM site_map WHERE type='footer'"));
$row = mysqli_fetch_array($res);
$hidden = $row['hidden'];
if ($hidden=='0') {
show_headers("footer");
}
?>


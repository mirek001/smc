<?php require_once "header.php"; ?>


<?php 
$res = $con->query($q=("SELECT *  FROM settings WHERE name='disabled_menu'"));
$row = mysqli_fetch_array($res);
$disabled_menu = $row['int_value'];

if ($disabled_menu=="0"){
require_once "navhtml5.php"; 
}
?>

<?php require 'subpage.php'; // wczytywanie podstron ?>

<?php require_once "footer.php";?>

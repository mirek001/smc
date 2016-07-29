
<?php
require ('update.php');

if ($install_ver == $new_ver OR $install_ver > $new_ver){
	echo '<li><a href="system.php?page=license">'.$_SESSION['lg_license'].'</a></li>';

}
else if ($install_ver < $new_ver) {
	echo '<li  class="btn-primary" ><a href="system.php?page=license" style="color:white;">'.$_SESSION['lg_license'].'  <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a></li>';
		if (!isset($_SESSION['show_new_update'])){
		$_SESSION['note']="<b>".$_SESSION['lg_exist_new_update']."!</b>";
		$_SESSION['show_new_update']=1;
		}
}
?>

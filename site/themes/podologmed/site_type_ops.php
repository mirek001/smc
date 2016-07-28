<?php require_once "header.php"; ?>

<?php require_once "gallery.php"; ?>

<?php 
$res = $con->query($q=("SELECT *  FROM settings WHERE name='disabled_menu'"));
$row = mysqli_fetch_array($res);
$disabled_menu = $row['int_value'];

if ($disabled_menu=="0"){
require_once "navops.php"; 
}
?>




<span class="">

<?php /// przerobiony skrypt navigacji, wyświetla wszystkie strony po kolei

$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$res = $con->query($q=("SELECT * FROM site_map WHERE cat_id=1  ORDER BY position")); 
	echo "<ol>\n";
	while ($row = mysqli_fetch_array($res)) {
		if ($row['type']=="category"){
			$id=$row['id'];
			echo "<span id=\"section-$id\" href=\"#\" style=\"width:100%; float:left;\">";
			show_next_page($id);
		}
			else if ($row['type']=="page"){
			$id=$row['id'];
			echo "<span id=\"section-$id\" href=\"#\" style=\"width:100%; float:left;\">";
			show_ops_page($id);
			echo "</span>";
		}
		else return "";

	}
	echo "<ol>\n";

function show_next_page($id){
$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$res = $con->query($q=("SELECT * FROM site_map WHERE cat_id=$id  ORDER BY position")); 
	echo "<ol>\n";
	while ($row = mysqli_fetch_array($res)) {
		if ($row['type']=="category"){
			$name=$row['name'];
			$id=$row['id'];
			echo "<span id=\"section-$id\" href=\"#\" style=\"width:100%; float:left;\">";
			show_next_page($id);
			echo "</span>";
		}
		else if ($row['type']=="page"){
			$name=$row['name'];
			$id=$row['id'];
			echo "<span id=\"section-$id\" href=\"#\" style=\"width:100%; float:left;\">";
			show_ops_page($id);
			echo "</span>";
		}
		else return "";

	}
	echo "</ol>\n";
}

?>
</span>


<?php //pokazuje zawartość wszystkich stron
function show_ops_page($id){
$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
$res = $con->query("SELECT * FROM site_map WHERE cat_id = $id ORDER BY position");
	while ($row = mysqli_fetch_array($res)){
		$content=$row['content'];
		$code=$content;
		$content = html_entity_decode($content);
		$id=$row['id'];
		$section_type=$row['section_type'];
		$section_color=$row['section_color'];
		if ($section_type=="html") { //resetowanie CSS
			echo "<div style=\"background-color:$section_color; \"  >";
			echo "<div style=\"padding:20px 0; \" class=\"fr-view\" >";
			echo $content;
			echo "</div>";
			echo "</div>";
		}
		else if ($section_type=="gallery") {
			show_gallery($id, $section_color);
		}
		else if ($section_type=="code") {
			echo "<div style=\"background-color:$section_color; \"  >";
			echo "\n\r";
			$code=stripslashes($code); 
			$code='?>'.$code;
			eval($code);
			echo "</div>";

			//$content=nl2br($code);
			//$row['content']=stripslashes($row['content']); 
			
		}
	}
}
?>
<?php require_once "footer.php"; ?>

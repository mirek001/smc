<?php

function show_gallery($id, $section_color){
	$con = mysqli_connect($_SESSION['HOST'], $_SESSION['LOGIN'], $_SESSION['PASSWD'], $_SESSION['DB']);
	$res = $con->query("SELECT * FROM gallery WHERE sm_id= $id");
				$row = mysqli_fetch_array($res);
				$num_columns = $row['num_columns'];
				$thumb_width = $row['thumb_width'];
				$border = $row['border'];
				$border_radius = $row['border_radius'];
				$padding = $row['padding'];

$katalog    = "upload/$id/"; 
$pliki = scandir($katalog); 
//echo "test galerii";
$i=0;
echo "<div style=\"background-color:$section_color;\"  >";

echo "<center><table><tr>";
foreach($pliki as $plik) {
	if ($plik=="." || $plik=="..") {
		echo "";
	}
	else if ($plik=="thumb") {
		echo "";
	}
	else {
	$sciezka = "upload/$id/$plik";
	$sciezka_thumb = "upload/$id/thumb/$plik";

	if ($i==$num_columns) {
		echo "</tr><tr>";
		$i=0;
	}

	echo "<td style=\"padding:$padding\px;\"><a href=\"$sciezka\" data-lightbox=\"roadtrip\">";
	echo "<img style=\"border: $border\px solid; border-radius: $border_radius\px; max-width:300px; width:100%; height:auto; margin-left:auto; margin-right:auto; display:table; \" src=\"$sciezka_thumb\"  alt=\"\"/></a><br><div style=\"text-align:center\"><a href=\"system/core/delete_from_gallery.php?id=$id&plik=$plik\"></td>";
	$i++; 
	//echo "<img src=\"upload/$id/$plik\" alt=\"Tu podaj tekst alternatywny\" />";
	//echo '<p>'.$plik.'</p>'; 

	}
}

echo "</tr></table></center></div>";

}



?>
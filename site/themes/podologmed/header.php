

<?php

$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM site_map WHERE type='header'"));
$row = mysqli_fetch_array($res);
$disabled = $row['disabled'];
if ($disabled=='0') {
show_headers("header");
}



function show_headers($name){

$con = mysqli_connect($_SESSION['HOST'],$_SESSION['LOGIN'],$_SESSION['PASSWD'],$_SESSION['DB']);
$res = $con->query($q=("SELECT *  FROM site_map WHERE type='$name'"));
$row = mysqli_fetch_array($res);
$page_content = $row['content'];
$section_color = $row['section_color'];

$page_content = html_entity_decode($page_content);
$page_content = nl2br($page_content, true);

echo<<<END
<div style="background-color:$section_color; color:black; width:100%; padding: 0px 0;">

END;

echo ''.$page_content.'';

echo "</div>";

}


?>

    <?php
    if (isset($_GET['page'])) {
   			$subpage = strip_tags($_GET['page']);
   			$subpage = htmlentities($subpage, ENT_QUOTES, "UTF-8");
				if(empty($subpage) || !file_exists('site/themes/podologmed/'.$subpage.'.php'))
					$subpage = 'page';
				require 'site/themes/podologmed/'.$subpage.'.php'; 
	}
	//echo $subpage;
	else require 'page.php';
    ?>
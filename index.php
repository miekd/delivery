<?php

// 	Public root path.
	define("R", str_replace("index.php", "", $_SERVER['PHP_SELF']));

	include("core/init.php");

?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	
	<title>Delivery</title>
	
	<style>
		@import "<?=R; ?>assets/css/main.css";
	</style>
</head>
<body>
	
<div class="wrapper">
	
	<nav>
	
		<ul>
		<?
			$count = 0;
			
			foreach ($p_files as $preview) {
				$count++;
				$has_tooltip = false;
				$preview_class = '';
				$label = str_replace($prefix, "", $preview['filename']);
				
				if(strlen($label) > 21)
				{
					$has_tooltip = true;
					$preview_class .= "has-tooltip ";
				}
				
				if($cur_preview == false)
					$cur_preview = $preview['slug'];
			
				if($preview['slug'] == $cur_preview)
				{
					$current_preview = $preview;
					$preview_class .= 'active ';
				}
				?><li class="<?=$preview_class; ?>"><a href="<?=R.$cur_project."_/".$preview['slug']; ?>"><?=$label ?></a><? if($has_tooltip) { ?> <b class="tooltip"><?=htmlentities($label); ?><i></i></b><? } ?></li><?
			}
		?>
		</ul>
		
		<?
		$info_glob = glob($cur_project . "info.txt");
		
		if(count($info_glob) > 0)
		{
		?>
			<div class="info has-tooltip">
				<a href="#">More information ...</a>
				
				<div class="tooltip">
					<?=htmlentities(file_get_contents($info_glob[0])); ?>
					
					<i></i>
				</div>
			</div>
		<? } ?>
	</nav>


	<?
	if($current_preview)
	{
		$imagesize = getimagesize($current_preview['full']);
		$height = $imagesize[1];
		$width = $imagesize[0];
	?>
	<style type="text/css">
		body {
			background: url("<?=R.$current_preview['full']; ?>") no-repeat 50% 36px;
			
			height: <?=$height+40; ?>px;
		}
	</style>
	<?
	} else {
	?>
		<p class="notice informative">Please select a preview</p>
	<?
	}
	?>

</div>

</body>
</html>
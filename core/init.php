<?

//  Initialization.

	//	Variables
	$delivered = 		false;
	$cur_preview = 		false;
	$cur_project = 		false;
	$char_match_until = 0;
	$prefix = 			false;

	//	Get preview variables.
	if(isset($_GET["project"]))
	{
		$cur_project = $_GET["project"];
		$cur_preview = isset($_GET["preview"]) ? $_GET["preview"] : false;
	}

	//	Find files and create file arrays.
	$found_files = glob($cur_project . "*.{jpg,jpeg,png}", GLOB_BRACE);
	sort($found_files);

	foreach ($found_files as $file) {
		$pi = pathinfo($file);

		// Put pathinfo in files array.
		$p_files[] = $pi;
		$p_filenames[] = $pi["filename"];
		$p_fullnames[] = $file;
	}

	//	Nothing was found, bye.
	if(isset($p_files) && count($p_files) > 1)
		$delivered = true;

	if(!$delivered)
		die("No delivery today...");

	//	Match arrays to find prefix.
	for($i=0; $i<strlen($p_filenames[0]); $i++)
	{
		$char_match = true;
		$char_needed = $p_filenames[0]{$i};

		// Here we match chars.

		for($p=1; $p<(count($p_filenames)); $p++)
		{
			if($p_filenames[$p]{$i} != $char_needed)
				$char_match = false;
		}

		if(!$char_match){
			$i = strlen($p_filenames[0]);
			continue;
		}

		$char_match_until = $i;
	}

	$prefix = substr($p_filenames[0], 0, $char_match_until);

	//	Create slugs.
	for($i=0; $i<(count($p_filenames)); $i++)
	{
	 	$slug = str_replace($prefix, "", $p_filenames[$i]);
		$slug = strtolower(str_replace(array(" ", "--"), "-", trim(preg_replace('#[^A-Za-z0-9_-]#',' ',$slug))));

		$p_files[$i]["slug"] = $slug;
		$p_files[$i]["full"] = $p_fullnames[$i];
	}

?>
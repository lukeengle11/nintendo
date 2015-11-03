<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Search Results</title>
	<link rel="stylesheet" type="text/css" href="nintendo.css" />
</head>
<body>
<img src="img/nintendo_logo_trans.gif" alt="nintendo logo"/>
<p>
	<?php
		require('Parsing.class.php');
		$base_url = "http://nintendo.wikia.com/wiki/";
		$final_url;
		$game_title;

		if(count($_POST) > 0)
		{
			$parser = new Parsing;
			$game_title = str_replace(" ", "_", $_POST['title']);
			
			if($game_title)
				$final_url = $base_url . $game_title;
			else
				echo "Something went wrong.";

			try {
				$web_contents = file_get_contents($final_url);
				$parsed_contents = $parser->get_string_between($web_contents, "<p><i><b>", "</p>\n");
				if (empty($parsed_contents))
				{
					$parsed_contents = $parser->get_string_between($web_contents, "</table><i><b>", "</p>\n");
				}
				$final_contents = strip_tags($parsed_contents, '<p></p>');
				echo "<h1>" . $_POST['title'] . "</h1>";
				print $final_contents;
				print $final_url;
			} catch (Exception $e) {
				print $e;
			}

		}
		else
		{
		}
	?>
</p>
<a href="search_db.html">Back to Search</a>
</body>
</html>
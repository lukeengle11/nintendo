<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Search Results</title>
	<link rel="stylesheet" type="text/css" href="nintendo.css" />
</head>
<body>
	<div id="nav">
		<ul>
			<li><a href="main.html">Home Page</a></li>
			<li><a href="top_100.php">Top 100 Nintendo Games</a></li>
			<li><a href="nes.html">Search NES Games</a></li>
			<li><a href="snes.html">Search SNES Games</a></li>
			<li><a href="n64.html">Search N64 Games</a></li>
		</ul>
	</div>
	<img class="padding" src="img/nintendo_logo_trans.gif" alt="nintendo logo"/>
	<div class="search">
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
						
						if (empty($final_contents))
						{
							echo "Search returned 0 results";
						}
						else
						{
							echo "<h2>" . $_POST['title'] . "</h2>";
							print $final_contents;	
						}
					} catch (Exception $e) {
						print $e;
					}

				}
				else
				{
				}
			?>
		</p>
		<a href="main.html">Back to Home</a>
	</div>
</body>
</html>
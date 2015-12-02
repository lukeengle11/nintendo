<html>
<head>
	<meta charset="utf-8" />
	<title>Top 100</title>
	<link rel="stylesheet" type="text/css" href="nintendo.css"/>
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
	<img class="padding" src="img/nintendo_logo_trans.gif" alt="nintendo logo" />
	<div class="search">
		<h2>Top 100 Nintendo Games</h2>
		<ol>
		<?php
			require('Parsing.class.php');

			$parser = new Parsing;
			$url = "http://nintendo.wikia.com/wiki/Nintendo_Power's_100_Best_Games_of_All_Time";
			$web_contents = file_get_contents($url);

			$parsed_contents = $parser->get_string_between($web_contents, "<ol>", "<script>");
			print $parsed_contents;
		?>
		</ol>
	</div>
</body>
</html>
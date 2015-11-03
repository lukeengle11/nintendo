<html>
<head>
	<meta charset="utf-8" />
	<title>Top 100</title>
	<link rel="stylesheet" type="text/css" href="nintendo.css"/>
</head>
<body>
<a href="main.html"><img src="img/nintendo_logo_trans.gif" alt="nintendo logo" /></a>
<h1>Top 100 Nintendo Games</h1>
<ol>
<?php
	require('Parsing.class.php');

	$parser = new Parsing;
	$url = "http://nintendo.wikia.com/wiki/Nintendo_Power's_100_Best_Games_of_All_Time";
	$web_contents = file_get_contents($url);

	$parsed_contents = $parser->get_string_between($web_contents, "<ol>", "<script>");
	print $parsed_contents;
?>
</body>
</html>
#!/usr/bin/php
<?PHP
if ($argv[1])
{
	$file = file_get_contents($argv[1], true);
	preg_match_all("/<\/?a{1}(?:(?:\s+.*?(?:\s*=\si*(?:\".*?\"|'.*?'|[\^'\">\s]+))?)+\s*|\s*)\/?>/", $file, $match, PREG_OFFSET_CAPTURE);
	echo $file;
	print_r($match);
	$i = 0;
	while ($match[$i])
	{
		preg_match("/"$title
	}
}

?>

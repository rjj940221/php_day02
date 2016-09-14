#!/usr/bin/php
<?PHP
if ($argv[1])
{
	$file = file_get_contents($argv[1], true);
	preg_match_all("/(?:<\/?a{1}(?:(?:\s+.*?(?:\s*=\s*(?:\".*?\"|'.*?'|[\^'\">\s]+))?)+\s*|\s*)\/?(>))/", $file, $match, PREG_OFFSET_CAPTURE);
	$i = 0;
	$j = 1;
	$end_tag = $match[1];
	$tag = $match[0];
	$size_e = count($end_tag);
	$size_s = count($tag);
	while ($i < $size_e && $j < $size_s)
	{
		$k = $end_tag[$i][1];
		while ($k < $tag[$j][1])
		{
			$file[$k] = strtoupper($file[$k]);
			$k++;
			if ($file[$k] == "<")
				break;
		}
		$i += 2;
		$j += 2;
	}
	preg_match_all("/(?:\stitle=(\")?)/", $file, $title, PREG_OFFSET_CAPTURE);
	$title = $title[1];
	$i = 0;
	$size_t = count($title);
	while ($i < $size_t)
	{
		$k = $title[$i][1];
		$qut = false;
		if ($file[$k] =='"')
			$qut = true;
		while ($k < strlen($file))
		{
			$file[$k] = strtoupper($file[$k]);
			$k++;
			if ($qut && $file[$k] == '"')
				break;
			elseif ($qut == false && ctype_space($file[$k]) == true)
				break;
		}
		$i++;
	}
	echo $file;
}

?>

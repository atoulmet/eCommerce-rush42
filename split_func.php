<?PHP
function ft_split($string) {
	$tab = explode(';', $string);
	$output = array();
	foreach($tab as $word) {
		$word = trim($word);
	}
	foreach($tab as $word) {
		if ($word != NULL) {
			array_push($output, $word);
		}
	}
	sort($output);
	return ($output);
}
?>

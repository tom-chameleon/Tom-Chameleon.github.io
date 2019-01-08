<?php

$count_file = 'countlog.txt';
$ip_file = 'ip_log.txt';

if(!file_exists($count_file)){
	fopen($count_file, 'w');
}

if(!file_exists($ip_file)){
	fopen($count_file, 'w');
}

$ip = $_SERVER['REMOTE_ADDR'];
$counter = fopen("countlog.txt", 'r');
$count = fgets($counter, 1000);
fclose($counter);

$count = $count +1;

echo $count . "Hits";

if(!in_array($ip, file($ip_file, FILE_IGNORE_NEW_LINES))){
	$hit_counter = (file_exists($count_file)) ? file_get_contents($count_file) : 0;
	
	file_put_contents($ip_file, $ip."\n", FILE_APPEND);
	file_get_contents($count_file, ++$hit_counter);
}

?>
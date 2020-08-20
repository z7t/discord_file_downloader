<?php
$spacechar = PHP_EOL;
$otherspace = " ";
$url = "https://cdn.discordapp.com/attachments/";
$fefe = glob("*");
$scan = 0;
$count = 0;
$link_array;
$filegot = 0;
header("user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36");

function femerla($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
foreach($fefe as $grocon){
$messages_filenames[] =  __DIR__ . "/" .  $grocon . "/messages.csv";
}
array_pop($messages_filenames);
array_pop($messages_filenames);
array_pop($messages_filenames);

print (count($messages_filenames) . " file found" . PHP_EOL);
foreach($messages_filenames as $file){
$text = file_get_contents($file);
preg_match_all("!https://cdn.discordapp.com/attachments/(.*?)$spacechar!", $text, $matches);
if (count($matches) == 0){
	preg_match_all("!https://cdn.discordapp.com/attachments/(.*?)$otherspace!", $text, $matches);
}
if (count($matches) != 0){
$filegot += count($matches[0]);
$result[] = $matches[0];
}
$scan++;
print("scanned $scan files \n");
}
echo $filegot . " files found \n";
sleep(2);
// exit;
foreach($result as $links){
	foreach($links as $link){
		$link_array[] = str_replace(PHP_EOL, "", $link);
	}
}
foreach($link_array as $download){
	printf("[%s] will download %s \n", $count++, $download);
	$string_lenght = strlen($download);
	$extention = substr($download, ($string_lenght - 4), 4);
	
	$content = file_get_contents($download);
	file_put_contents(__DIR__."/downloaded/" . femerla(40) . "." . $extention, $content);
	// exit;
}
?>
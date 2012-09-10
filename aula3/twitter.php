<?php
$dados = file_get_contents('http://api.twitter.com/1/statuses/user_timeline.xml?screen_name=x1s');
$xml = new SimpleXMLElement($dados);
$tweets = $xml->xpath('//status');
echo "<ul>";
foreach($tweets as $tweet) {
   echo "<li>{$tweet->text}</li>";
}
echo "</ul>";
?>
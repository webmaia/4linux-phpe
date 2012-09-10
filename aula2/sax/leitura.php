<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="../css/bootstrap.css">
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.8.1.min.js"><\/script>')</script>
        
    </head>
    <body>
<div class="container">
<div class="navbar">
  <div class="navbar-inner">
    <a class="brand" href="/">PHP Enterprise</a>
    <ul class="nav">
    		<li><a href="/">Home</a></li>
			<li><a href="/dom/">DOM</a></li>
			<li><a href="/simplexml/">SimpleXML</a></li>
			<li class="active"><a href="/sax/">SAX</a></li>
    </ul>
  </div>
</div>

        <h1>PHP e XML</h1>
		<h2>SAX</h2>
		
		  <ul class="nav nav-pills">
    		<li class="active"><a href="/sax/leitura.php">leitura</a></li>
			<li><a href="/sax/escrita.php">escrita</a></li>

    	</ul>
    	
	
		<p>

<?php 
class pc_RSS_parser {

	var $tag;
	var $item;
	var $channel;

	function start_element($parser, $tag, $attributes) {
		
		if('channel' == $tag) {
			$this->channel =  new pc_RSS_channel;
		}
		
		if ('item' == $tag) {
			$this->item = new pc_RSS_item;
			echo "<ul>";
		} 
		elseif (!empty($this->item)) {
			$this->tag = $tag;
		}
	}

	function end_element($parser, $tag) {
		if ('channel' == $tag) {
			$this->channel->display();
			unset($this->channel);
		}
		if ('item' == $tag) {
			$this->item->display();
			echo "</ul>";
			unset($this->item);
		}
	}

	function character_data($parser, $data) {
		if (!empty($this->item)) {
			if (isset($this->item->{$this->tag})) {
				$this->item->{$this->tag} .= trim($data);
			}
		}
		if (!empty($this->channel)) {
			if (isset($this->channel->{$this->tag})) {
				$this->channel->{$this->tag} .= trim($data);
			}
		}
	}
}

class pc_RSS_channel {

	var $title = '';
	var $description = '';
	var $link = '';
	var $image = '';

	function display() {
		printf('%s - %s - %s',
		$this->link,htmlspecialchars($this->title),
		htmlspecialchars($this->description));
	}
}
class pc_RSS_item {

	var $title = '';
	var $description = '';
	var $link = '';

	function display() {
		printf('<li><a href="%s">%s</a><br />%s</li>',
		$this->link,htmlspecialchars($this->title),
		htmlspecialchars($this->description));
	}
}

$feedUrl = 'http://www.ig.com.br/rss.xml';
$fileUrl = '../arquivos/feed.xml';

$xml = xml_parser_create();
$obj = new pc_RSS_parser;
xml_set_object($xml,$obj);
xml_set_element_handler($xml, 'start_element', 'end_element');
xml_set_character_data_handler($xml, 'character_data');
xml_parser_set_option($xml, XML_OPTION_CASE_FOLDING, false);

$fp = fopen($fileUrl, 'r') or die("Can't read XML data.");
while ($data = fread($fp, 4096)) {
	xml_parse($xml, $data, feof($fp)) or die("Can't parse XML data");
}
fclose($fp);

xml_parser_free($xml);
/*
?>

<a href="<?php echo $channel->getElementsByTagName("image")->item(0)->getElementsByTagName("link")->item(0)->nodeValue; ?>" class="thumbnail pull-left">
<img src="<?php echo $channel->getElementsByTagName("image")->item(0)->getElementsByTagName("url")->item(0)->nodeValue; ?>" alt="<?php echo $channel->getElementsByTagName("image")->item(0)->getElementsByTagName("title")->item(0)->nodeValue; ?>">
</a>
<h1><?php echo $channel->getElementsByTagName("title")->item(0)->nodeValue; ?></h1>
<a href="<?php echo $channel->getElementsByTagName("link")->item(0)->nodeValue; ?>"><?php echo $channel->getElementsByTagName("link")->item(0)->nodeValue; ?></a>
<p class="well"><?php echo $channel->getElementsByTagName("description")->item(0)->nodeValue; ?></p>

<ul>
<?php 

foreach ($channel->getElementsByTagName("item") as $item) {
	?>
	
	<li>
	<h3><?php echo $item->getElementsByTagName("title")->item(0)->nodeValue;?></h3>
	
	</li>
	
	<?php 
}

?>
</ul>
<?
*/
?>
		
		</p>
  </div>
    </body>
</html>
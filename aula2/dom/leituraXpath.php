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
			<li class="active"><a href="/dom/">DOM</a></li>
			<li><a href="/simplexml/">SimpleXML</a></li>
			<li><a href="/sax/">SAX</a></li>
    </ul>
  </div>
</div>

        <h1>PHP e XML</h1>
		<h2>DOM</h2>
		
		  <ul class="nav nav-pills">
    		<li class="active"><a href="/dom/leitura.php">leitura</a></li>
			<li><a href="/dom/escrita.php">escrita</a></li>

    	</ul>
		
		
		<p>

<?php 
$feedUrl = 'http://www.ig.com.br/rss.xml';
$fileUrl = '../arquivos/feed.xml';

$doc = new DOMDocument();
$doc->load($feedUrl);

$xpath = new DOMXPath($doc);

$channel = $xpath->query('channel');

$channel = $channel->item(0);

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

		
		</p>
		
		
  </div>
    </body>
</html>
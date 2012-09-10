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
			<li class="active"><a href="/simplexml/">SimpleXML</a></li>
			<li><a href="/sax/">SAX</a></li>
    </ul>
  </div>
</div>

        <h1>PHP e XML</h1>
		<h2>SimpleXML</h2>
		
		
<div>

<?php

$feedUrl = 'http://www.ig.com.br/rss.xml';
$fileUrl = '../arquivos/feed.xml';
$rawFeed = file_get_contents($feedUrl);


$xml = new SimpleXmlElement($rawFeed);
?>

<a href="<?php echo $xml->channel->image->link; ?>" class="thumbnail pull-left">
<img src="<?php echo $xml->channel->image->url; ?>" alt="<?php echo $xml->channel->image->title; ?>">
</a>
<h1><?php echo $xml->channel->title; ?></h1>
<a href="<?php echo $xml->channel->link; ?>"><?php echo $xml->channel->link; ?></a>
<p class="well"><?php echo $xml->channel->description; ?></p>

<ul>
<?php 

foreach ($xml->channel->item as $item) {
	?>
	
	<li>
	<h3><?php echo $item->title?></h3>
	
	</li>
	
	<?php 
}

?>
</ul>
</div>
		
		
  </div>
    </body>
</html>
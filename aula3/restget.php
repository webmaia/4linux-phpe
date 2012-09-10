<?php
header("Content-Type:text/xml");
$db = new PDO("mysql:host=localhost;dbname=garagesale", 'root', 'bacon');
switch($_SERVER['REQUEST_METHOD']) {
    case "GET":
       $dados = $db->query("SELECT * FROM pessoa");
       $dados = $dados->fetchAll();
       $xml = new SimpleXMLElement("<garagem></garagem>");
       foreach($dados as $dado) {
           $post = $xml->addChild('post');
           $post->addAttribute('id', $dado['id']);
           $post->addChild('nome', $dado['nome']);
           $post->addChild('garagem', $dado['garagem']);
}
       echo $xml->asXML();
    break;
}
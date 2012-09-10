<?php

function elementoInicial($parser, $nome, $atributos) {
	global $livros, $elemento;
	if($nome == 'LIVRO') {
		$livros[] = array();
	}
	$elemento = $nome;
}
function elementoFinal($parser, $nome) {
	global $elemento;
	$elemento = null;
}
function texto($parser, $texto){
	global $livros, $elemento;
	if($elemento == 'TITULO' || $elemento == 'ISBN' || $elemento == 'ENREDO') {
		$ultimoLivro = count($livros) - 1;
		$livros[$ultimoLivro][$elemento] = $texto;
	}
}

$parser = xml_parser_create();
xml_set_element_handler($parser, "elementoInicial", "elementoFinal");
xml_set_character_data_handler($parser, "texto");

$arquivo = fopen('../arquivos/livros.xml', 'r');
while($dados = fread($arquivo, 4096)) {
	xml_parse($parser, $dados);
}
xml_parser_free($parser);

foreach($livros as $livro) {
	echo "{$livro['TITULO']} ({$livro['ISBN']})\n{$livro['ENREDO']}\n\n";
}

<?php

if(!is_array($_POST['item'])) { fim('Lo sentimos, se produjo un error inesperado! Por favor, actualice la página y inténtelo de nuevo. #1'); }

require('private/classes/classGallery.php');

$itens = $_POST['item'];

$erros = 0;
$i = 1;
foreach ($itens as $itemID) {
	if(!Gallery::reorder($i, intval($itemID))) {
		$erros += 1;
	} else {
		$i += 1;
	}
}

if($erros == 0) {
	adminLog("¡Reordenó los itens de la galería!"); // Admin Log
	fim('', 'OK');
} else {
	fim('Lo sentimos, se produjo un error inesperado! Por favor, actualice la página y inténtelo de nuevo. #2');
}
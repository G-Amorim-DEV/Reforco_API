<?php

$url = "http://localhost/reforco_API/API_secreta/api_secreta.php?info=metodoPost";

// obtém a resposta JSON da API
$resposta = file_get_contents($url);

// decodifica o JSON em um array associativo 
$dados = json_decode($resposta, true);

// exibe a resposta original da API
echo $resposta;

?>

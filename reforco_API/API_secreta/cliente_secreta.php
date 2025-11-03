<?php

$url = "http://localhost/reforco_API/API_secreta/api_secreta.php";

$chave_secreta = [
    'chave' => 'CANTINHO_DO_CAFE_PHP'
];

$json_secreto = json_encode($chave_secreta);

$estrutura_http = [
    'http' => [
        'method' => "POST",
        'header' => "Content-Type: application/json\r\n",
        'content' => json_encode($chave_secreta)
    ]
];

$contexto = stream_context_create($estrutura_http);

$resposta = file_get_contents($url, false, $contexto);

echo $resposta;

?>

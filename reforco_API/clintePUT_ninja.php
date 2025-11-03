<?php
$url = "http://localhost/reforco_API/api_ninja.php?id=23";

$chave_ninja = [
    'codigo' => '23', 
    'nome' => 'Guilherme'
];

$estrutura_http = [
    'http' => [
        'method' => "PUT",
        'header' => "Content-Type: application/json\r\n",
        'content' => json_encode($chave_ninja)
    ]
];

$contexto = stream_context_create($estrutura_http);
$resposta = file_get_contents($url, false, $contexto);

echo $resposta;
?>

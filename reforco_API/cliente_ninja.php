<?php
$url = "http://localhost/reforco_API/api_ninja.php";

$ninja = [
    'id' => '23', 

];

$estrutura_http = [
    'http' => [
        'method' => "DELETE",
        'header' => "Content-Type: application/json\r\n",
        'content' => json_encode($ninja)
    ]
];

$contexto = stream_context_create($estrutura_http);
$resposta = file_get_contents($url, false, $contexto);

echo $resposta;
?>

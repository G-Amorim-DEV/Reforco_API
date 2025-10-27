<?php

//Saber na documentação qual a URL

$url = "http://localhost/reforco_API/comidasAPI.php?comida=feijoada";

//Requisitar uma resposta da URL

$resposta = file_get_contents($url);

$feijoada = json_decode($resposta, true);

echo "<h1> FEIJOADA </h1>";
echo "<h3> Ingredientes: ".$feijoada['ingredientes']."</h3>";
echo "<h3> Modo de preparo: ".$feijoada['modo de preparo']."</h3>";


?>
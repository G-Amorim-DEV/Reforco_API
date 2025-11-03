<?php

$url = "http://localhost/reforco_API/API_dos_elogio/api_elogios.php";


$chave_elogios = [
    'tipos_elogios' => 'agradecimento'
];

$feedback_recebidos = [
    "agradecimento" => [
        "O atendimento do garçom João foi impecável! Muito atencioso e nos deu ótimas sugestões de vinho. Voltaremos com certeza!",
        "A feijoada de sábado estava sensacional, a melhor que já comi na cidade. Parabéns ao Chef!",
        "Adorei a decoração nova do salão. O ambiente está muito mais aconchegante e a música estava no volume perfeito.",
        "Experiência incrível! Estava tudo maravilhoso, desde o couvert até a sobremesa. Cinco estrelas!",
        "Vocês possuem o melhor café expresso da região. Saímos daqui super satisfeitos com a qualidade geral."
    ],

    "reclamacao" => [
        "Houve uma demora de 45 minutos para o prato principal chegar à mesa, e ele veio frio. Precisamos de mais agilidade na cozinha.",
        "Pedi um bife ao ponto, mas ele veio quase cru. O garçom demorou a retornar, então acabei comendo assim mesmo.",
        "A limpeza do banheiro feminino estava a desejar. Havia lixo transbordando e o piso estava molhado e escorregadio.",
        "O preço da água mineral é um absurdo, muito acima da média dos concorrentes. Um roubo!",
        "Fiz a reserva para 20h e tivemos que esperar 15 minutos na porta, mesmo com a mesa já desocupada. Pouco respeito com o horário."
    ],

    "sugestao" => [
        "Acho que seria ótimo se vocês tivessem mais opções vegetarianas e veganas no menu principal, além da salada.",
        "Sugiro oferecerem um 'menu executivo' durante a semana no horário do almoço. Facilitaria para quem trabalha na região.",
        "Instalar um trocador de fraldas no banheiro masculino seria muito útil para pais que vêm com bebês.",
        "Poderiam criar um programa de fidelidade com acúmulo de pontos. Seria um incentivo a mais para visitarmos com frequência.",
        "A iluminação está um pouco escura na área de janelas. Talvez lâmpadas mais claras ajudem a valorizar o ambiente."
    ]
];

$estrutura_http = [
    'http' => [
        'method' => "POST",
        'header' => "Content-Type: application/json\r\n",
        'content' => json_encode($chave_elogios)
    ]
];

$contexto = stream_context_create($estrutura_http);

$resposta = file_get_contents($url, false, $contexto);

echo $resposta;

?>
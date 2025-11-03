<?php

header("Content-Type: application/json; charset = UTF-8");
header("Access-Control-Allow-Origin: *");

$metodo = $_SERVER['REQUEST_METHOD'];

switch($metodo){

    case "GET":
        echo json_encode("Método GET consultado com sucesso");
        break;

    case "POST":

        verificar_elogios();

        break;

    case "PUT":
        break;

    case "DELETE":
        break;

    default:
        break;

}

function verificar_elogios(){

    $chave_de_acesso = json_decode(file_get_contents("php://input"),true);

    if ($chave_de_acesso['tipos_elogios'] == "agradecimento")
        echo json_encode("🥳 Que notícia maravilhosa! Agradecemos imensamente seu elogio e por dedicar seu tempo para nos avaliar. É para proporcionar experiências como a sua que toda a nossa equipe se dedica diariamente. Esperamos revê-lo(a) em breve para mais momentos especiais!", JSON_UNESCAPED_UNICODE);

    elseif ($chave_de_acesso['tipos_elogios'] == "reclamacao")
        echo json_encode("😔 Lamentamos profundamente que sua experiência não tenha atingido o nível que você merece e que nós nos esforçamos para oferecer. Seu feedback é crucial e já o encaminhamos à gerência para que as medidas corretivas sejam aplicadas imediatamente. Gostaríamos de entrar em contato para entender melhor o ocorrido e ter a chance de reverter essa impressão.", JSON_UNESCAPED_UNICODE);

    elseif ($chave_de_acesso['tipos_elogios'] == "sugestao")
        echo json_encode("🙏 Agradecemos muito por compartilhar sua sugestão! Valorizamos sua criatividade e visão, pois é através de ideias como a sua que podemos aprimorar continuamente nossos serviços e o nosso menu. Sua proposta será analisada com carinho por nossa equipe. Muito obrigado(a) por nos ajudar a crescer!", JSON_UNESCAPED_UNICODE);

    else
        echo json_encode("🧐 Tipo de Feedback Não Reconhecido. Não foi possível processar sua solicitação, pois o 'tipo_elogio' enviado não corresponde a 'agradecimento', 'reclamacao' ou 'sugestao'. Por favor, verifique se a informação está correta e tente novamente.", JSON_UNESCAPED_UNICODE);
    
}

?>
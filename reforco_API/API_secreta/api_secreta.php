<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

$metodo = $_SERVER['REQUEST_METHOD'];

switch ($metodo) {
    case 'GET':
        metodoGET();
        break;

    case 'POST':
        metodoPOST();
        break;

    case 'PUT':
        break;

    case 'DELETE':
        break;

    default:
        break;
}

// função utilitária para enviar resposta JSON formatada
function resposta(array $dados): void {
    echo json_encode($dados, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}

function metodoGET(): void {

    // Se o usuário pedir a dica
    if (isset($_GET['info']) && $_GET['info'] === 'metodoPost') {
        resposta([
            "mensagem" => "🧩 Use o método POST para enviar sua chave secreta.",
            "instrucoes" => "Envie um JSON no corpo (body) da requisição POST.",
            "exemplo" => '{"chave": "SUA_CHAVE_SECRETA_AQUI"}',
            "chave para o acesso via POST é a seguinte" => "CANTINHO_DO_CAFE_PHP"
        ]);
    }

    // Mensagem padrão do GET
    resposta([
        "mensagem" => "👋 Bem-vindo à API Secreta!",
        "descricao" => "Use o método POST para descobrir a verdade secreta.",
        "como_obter_dica" => "Acesse com o seguinte endPoint: ?info=metodoPost"
    ]);
}

function metodoPOST(): void {

    $dados_recebidos = json_decode(file_get_contents("php://input"), true);

// Verifica se os dados são nulos (JSON inválido) ou se a chave não existe
    if (is_null($dados_recebidos) || !isset($dados_recebidos['chave'])) {
        resposta([
            "erro" => "❌ Chave não enviada ou JSON mal formatado.",
            "instrucoes" => [
                "mensagem" => "👋 Bem-vindo à API Secreta!",
                "descricao" => "Use o método POST para descobrir a verdade secreta.",
                "como_obter_dica" => "Acesse com o seguinte endPoint: ?info=metodoPost"
            ]
        ]);
    }

    $chave = $dados_recebidos['chave'];

    if ($chave === "CANTINHO_DO_CAFE_PHP") {
        resposta([
            "sucesso" => "Parabéns! Você conseguiu acessar com o Método POST.",
            "Segredo" => "Acesso Concedido! Você 'compilou' a chave secreta. O segredo é: Um bom código é como um bom café: curto, forte e sem bugs."
        ]);

    } else {
        resposta([
            "erro" => "❌ Chave de acesso negada!",
            "instrucoes" => [
                "mensagem" => "👋 Bem-vindo à API Secreta!",
                "descricao" => "Use o método POST para descobrir a verdade secreta.",
                "como_obter_dica" => "Acesse com o seguinte endPoint: ?info=metodoPost"
            ]
        ]);
        
    }
}
?>
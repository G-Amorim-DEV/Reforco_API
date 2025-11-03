<?php

header("Content-Type: application/json; charset = UTF-8");
header("Access-Control-Allow-Origin: *");

$metodo = $_SERVER['REQUEST_METHOD'];

switch($metodo){

    case "GET":
        echo json_encode("Método GET consultado com sucesso");
        break;

    case "POST":

        verificar_codigo_secreto();

        break;

    case "PUT":

        $id = $_GET['id'];

        atualizar_lista_ninjas($id);

        break;

    case "DELETE":

        $id = json_decode(file_get_contents("php://input"), true);
        
        deletar_ninja($id['id']);

        break;

    default:
        break;

}

function verificar_codigo_secreto(){

    $chave_de_acesso = json_decode(file_get_contents("php://input"),true);

    if ($chave_de_acesso['codigo'] == "ABCDE1234")
        echo json_encode("A mensagem secreta é:: Não existe mensagem secreta!HAHAHAHAHAHAHAHAHa!!!!!", JSON_UNESCAPED_UNICODE);
    else
        echo json_encode("Chave de acesso negada!", JSON_UNESCAPED_UNICODE);
    
}

function atualizar_lista_ninjas($id){

    $lista_ninjas = [

        'ninja' => [

            '01' => [
                'id' => '01',
                'nome' => 'Naruto Uzumaki',
                'idade' => 12,
            
            ],

            '23' => [
                'id' => '23',
                'nome' => 'Gabriel Jesus',
                'idade' => '21',
            ]
        ]
    ];

    if ($id == $lista_ninjas['ninja']['23']['id']){

        $ninja_atualizado = json_decode(file_get_contents("php://input"), true);

        $lista_ninjas['ninja']['23']['nome'] = $ninja_atualizado['nome'];

        echo json_encode($lista_ninjas['ninja']['23']);

    }else{

        echo json_encode(" Erro Nenhum ninja cadastrado com esse ID");

    }

}

function deletar_ninja($id){

        $lista_ninjas = [

        'ninja' => [

            '01' => [
                'id' => '01',
                'nome' => 'Naruto Uzumaki',
                'idade' => 12,
            
            ],

            '23' => [
                'id' => '23',
                'nome' => 'Gabriel Jesus',
                'idade' => '21',
            ]
        ]
    ];

    if ($id == $lista_ninjas['ninja']['23']['id']){

        unset($lista_ninjas['ninja']['23']);

        echo json_encode($lista_ninjas['ninja']);

    }else{
        echo json_encode("Erro: Ninja não encontrado");
    }

}

?>
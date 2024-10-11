<?php
// Configura os cabeçalhos da API
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Função para lidar com requisições GET
function handleGetRequest($params) {
        // Aqui você pode fazer qualquer processamento baseado nos parâmetros
        $data = array(
            'status' => 'sucesso',
            'message' => 'Dados obtidos com sucesso',
            'data' => $params
        );

    echo json_encode($data);
}


// Captura os parâmetros da URL
if (isset($_GET['params'])) {
    $params = explode('/', rtrim($_GET['params'], '/'));
} else {
    $params = array();
}

// Verifica o método da requisição
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        handleGetRequest($params);
        break;
    default:
        echo json_encode(array(
            'status' => 'falha',
            'message' => 'Método não suportado'
        ));
        break;
}
?>

<?php
// Configura os cabeçalhos da API
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Função para lidar com requisições GET
function handleGetRequest($params) {
    if (count($params) >= 1) {
        $param0 = $params[0];
        $param1 = isset($params[1]) ? $params[1] : null;
        $param2 = isset($params[2]) ? $params[2] : null;

        // Aqui você pode fazer qualquer processamento baseado nos parâmetros
        $data = array(
            'status' => 'sucesso',
            'message' => 'Dados obtidos com sucesso',
            'data' => array(
                'param0' => $param0,
                'param1' => $param1,
                'param2' => $param2
            )
        );
    } else {
        $data = array(
            'status' => 'falha',
            'message' => 'Nenhum parâmetro fornecido'
        );
    }

    echo json_encode($data);
}

// Função para lidar com requisições POST
function handlePostRequest($params) {
    // Obtém o corpo da requisição
    $input = json_decode(file_get_contents("php://input"), true);

    if (count($params) >= 1 && isset($input['nome']) && isset($input['idade'])) {
        $param0 = $params[0];
        $nome = $input['nome'];
        $idade = intval($input['idade']);

        // Aqui você pode salvar os dados no banco de dados ou processá-los
        $data = array(
            'status' => 'sucesso',
            'message' => 'Dados recebidos com sucesso',
            'data' => array(
                'param0' => $param0,
                'nome' => $nome,
                'idade' => $idade
            )
        );
    } else {
        $data = array(
            'status' => 'falha',
            'message' => 'Dados incompletos fornecidos'
        );
    }

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
    case 'POST':
        handlePostRequest($params);
        break;
    default:
        echo json_encode(array(
            'status' => 'falha',
            'message' => 'Método não suportado'
        ));
        break;
}
?>

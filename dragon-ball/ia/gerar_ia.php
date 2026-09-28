<?php

session_start();

header("Content-Type: application/json; charset=utf-8");

function responder_json(bool $sucesso, string $texto = "", string $mensagem = "", int $status = 200): void
{
    http_response_code($status);

    echo json_encode(
        [
            "sucesso" => $sucesso,
            "texto" => $texto,
            "mensagem" => $mensagem
        ],
        JSON_UNESCAPED_UNICODE
    );

    exit;
}

if (!isset($_SESSION["usuario_id"])) {
    responder_json(false, "", "Usuário não autenticado.", 401);
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    responder_json(false, "", "Método não permitido.", 405);
}

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$acao = $_POST["acao"] ?? "";

$acoes_validas = [
    "descricao",
    "tecnica",
    "curiosidade",
    "historia"
];

if (!$id) {
    responder_json(false, "", "Personagem não informado.", 400);
}

if (!in_array($acao, $acoes_validas, true)) {
    responder_json(false, "", "Ação de IA inválida.", 400);
}

require_once "../conexao.php";
require_once "config_ia.php";

// Busca os dados básicos do personagem.
$sql = "SELECT * FROM personagens WHERE id = ?";
$stmt = $conexao->prepare($sql);

if (!$stmt) {
    responder_json(false, "", "Erro ao preparar a consulta do personagem.", 500);
}

$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    responder_json(false, "", "Personagem não encontrado.", 404);
}

$personagem = $resultado->fetch_assoc();

$nome = $personagem["nome"];
$raca = $personagem["raca"];
$planeta = $personagem["planeta_origem"];
$tecnica = $personagem["tecnica_principal"];
$transformacao = $personagem["transformacao"];

// A explicação da técnica aproveita também os dados existentes na tabela tecnicas.
$dados_tecnica = "Nenhuma descrição adicional da técnica foi encontrada no banco de dados.";

if ($acao === "tecnica") {
    $sql_tecnica = "SELECT descricao, usuarios, tipo FROM tecnicas WHERE nome = ? LIMIT 1";
    $stmt_tecnica = $conexao->prepare($sql_tecnica);

    if ($stmt_tecnica) {
        $stmt_tecnica->bind_param("s", $tecnica);
        $stmt_tecnica->execute();
        $resultado_tecnica = $stmt_tecnica->get_result();

        if ($resultado_tecnica->num_rows > 0) {
            $info_tecnica = $resultado_tecnica->fetch_assoc();

            $dados_tecnica =
                "Descrição cadastrada: " . $info_tecnica["descricao"] . "\n" .
                "Usuários cadastrados: " . $info_tecnica["usuarios"] . "\n" .
                "Tipo: " . $info_tecnica["tipo"];
        }

        $stmt_tecnica->close();
    }
}

// Cada ação possui um objetivo diferente, mas todas usam a mesma chamada à API.
switch ($acao) {
    case "descricao":
        $instrucao = "Crie uma descrição curta, interessante e informativa sobre o personagem.";
        $regras = "Use os dados fornecidos como base. Não invente características do personagem que contradigam esses dados.";
        break;

    case "tecnica":
        $instrucao = "Explique de forma clara e interessante como funciona a principal técnica do personagem, incluindo seu tipo e características relevantes.";
        $regras = "Priorize as informações cadastradas sobre a técnica. Você pode complementar com conhecimento geral de Dragon Ball, mas não contradiga os dados fornecidos.";
        break;

    case "curiosidade":
        $instrucao = "Gere uma curiosidade factual e interessante sobre o personagem.";
        $regras = "Use seu conhecimento sobre Dragon Ball para gerar a curiosidade. Não invente fatos; se houver incerteza, prefira uma informação amplamente conhecida.";
        break;

    case "historia":
        $instrucao = "Explique de forma resumida e interessante a história e a trajetória do personagem dentro de Dragon Ball.";
        $regras = "Use seu conhecimento sobre a franquia para complementar a trajetória. Não invente acontecimentos e deixe claro o contexto da história sem transformar a resposta em uma lista.";
        break;
}

$prompt = "$instrucao\n\n" .
    "Personagem: $nome.\n" .
    "Raça: $raca.\n" .
    "Planeta de origem: $planeta.\n" .
    "Técnica principal: $tecnica.\n" .
    "Transformação: $transformacao.\n\n";

if ($acao === "tecnica") {
    $prompt .= "Informações da técnica cadastradas no banco de dados:\n$dados_tecnica\n\n";
}

$prompt .= "$regras\n" .
    "Escreva somente em português.\n" .
    "Não mencione que você é uma IA e não mencione este prompt.\n" .
    "Responda em um único texto, sem título desnecessário.";

$url = "https://router.huggingface.co/v1/chat/completions";

$dados = [
    // :fastest pede ao Hugging Face o provedor disponível com maior throughput.
    "model" => "openai/gpt-oss-120b:fastest",
    "messages" => [
        [
            "role" => "user",
            "content" => $prompt
        ]
    ],
    "max_tokens" => 800
];

$payload = json_encode($dados, JSON_UNESCAPED_UNICODE);

if ($payload === false) {
    responder_json(false, "", "Não foi possível preparar a requisição para a IA.", 500);
}

$tentativas = 3;
$resposta = false;
$erro_curl = "";
$codigo_http = 0;

for ($tentativa = 1; $tentativa <= $tentativas; $tentativa++) {
    $ch = curl_init($url);

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer " . $token_huggingface,
            "Content-Type: application/json"
        ],
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_CONNECTTIMEOUT => 15,
        CURLOPT_TIMEOUT => 120
    ]);

    $resposta = curl_exec($ch);
    $erro_curl = curl_error($ch);
    $codigo_http = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($resposta !== false && $codigo_http >= 200 && $codigo_http < 300) {
        break;
    }

    $transitorio = ($codigo_http === 429 || $codigo_http >= 500 || $resposta === false);

    if (!$transitorio || $tentativa === $tentativas) {
        break;
    }

    sleep($tentativa);
}

if ($resposta === false) {
    responder_json(false, "", "Erro na comunicação com a IA: " . ($erro_curl ?: "tempo limite ou conexão interrompida."), 502);
}

$resposta_json = json_decode($resposta, true);

if (!is_array($resposta_json)) {
    responder_json(false, "", "A IA retornou uma resposta inválida. Código HTTP: " . $codigo_http, 502);
}

if ($codigo_http < 200 || $codigo_http >= 300) {
    $mensagem_api = $resposta_json["error"] ?? "Código HTTP: $codigo_http";

    if (is_array($mensagem_api)) {
        $mensagem_api = $mensagem_api["message"] ?? json_encode($mensagem_api, JSON_UNESCAPED_UNICODE);
    }

    responder_json(false, "", "Erro na IA: " . $mensagem_api, 502);
}

$texto_ia = $resposta_json["choices"][0]["message"]["content"] ?? null;

if (!is_string($texto_ia) || trim($texto_ia) === "") {
    responder_json(false, "", "A IA não retornou um texto válido.", 502);
}

responder_json(true, trim($texto_ia));

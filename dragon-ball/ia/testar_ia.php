<?php

require_once "config_ia.php";

$url = "https://router.huggingface.co/v1/chat/completions";

$dados = [
   "model" => "openai/gpt-oss-120b",
    "messages" => [
        [
            "role" => "user",
            "content" => "Escreva uma frase curta em português sobre Goku."
        ]
    ],
    "max_tokens" => 100
];

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer " . $token_huggingface,
    "Content-Type: application/json"
]);

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dados));

$resposta = curl_exec($ch);

$codigo_http = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

$resposta_json = json_decode($resposta, true);

$texto_ia = $resposta_json["choices"][0]["message"]["content"];

echo "<h2>Resposta da IA</h2>";

echo "<p>" . htmlspecialchars($texto_ia) . "</p>";

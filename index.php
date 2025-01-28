<?php
// Configurações da API
$apiUrl = 'https://api.evolution-api.com/v2/messages'; // URL da API
$apiKey = '90DD3F2173ED-4423-825C-C71488FAA4E8'; // Seu token de API

// Dados da mensagem
$data = [
    'phone' => '556186535340@s.whatsapp.net', // Número de telefone com DDI e DDD
    'message' => 'Olá, esta é uma mensagem de teste enviada via Evolution API!',
    'isGroup' => false // Indica se o número é um grupo
];

// Configuração da requisição cURL
$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey
]);

// Executa a requisição e obtém a resposta
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Verifica se a requisição foi bem-sucedida
if ($httpCode == 200) {
    echo "Mensagem enviada com sucesso!<br>";
    echo "Resposta da API: " . $response;
} else {
    echo "Erro ao enviar mensagem. Código HTTP: " . $httpCode . "<br>";
    echo "Resposta da API: " . $response;
}

// Fecha a conexão cURL
curl_close($ch);
?>

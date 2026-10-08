<?php
$host = getenv('DB_HOST') ?: 'db';
$database = getenv('DB_NAME') ?: 'helpdesk';
$user = getenv('DB_USER') ?: 'helpdesk_user';
$password = getenv('DB_PASSWORD');
if ($password === false || $password === '') {
    http_response_code(500);
    exit('Configuração ausente: defina DB_PASSWORD no ambiente.');
}
try {
    $pdo = new PDO("mysql:host={$host};dbname={$database};charset=utf8mb4", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    http_response_code(503);
    exit('Não foi possível conectar ao banco de dados. Verifique a configuração dos serviços.');
}

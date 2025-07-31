<?php
require 'db.php';

$data = json_decode(json_encode($_POST));

if (!isset($data->id, $data->nome, $data->preco)) {
    echo json_encode(['success' => false, 'message' => 'Dados incompletos.']);
    exit;
}

$stmt = $pdo->prepare("UPDATE produtos SET nome = ?, preco = ? WHERE id = ?");
$result = $stmt->execute([$data->nome, $data->preco, $data->id]);

echo json_encode(['success' => $result]);

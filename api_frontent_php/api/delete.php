<?php
require 'db.php';

$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'] ?? null;

echo ($id);

if ($id) {
    $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = ?");
    $success = $stmt->execute([$id]);

    echo json_encode(['success' => $success]);
} else {
    echo json_encode(['success' => false, 'message' => 'ID não fornecido.']);
}

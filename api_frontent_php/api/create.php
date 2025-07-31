<?php
// Configuração do banco de dados
require 'db.php';
// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $preco = $_POST['preco'] ?? '';

    // Validação simples
    if (empty($nome) || empty($preco)) {
        echo json_encode(['success' => false, 'message' => 'Nome e preço são obrigatórios.']);
        exit;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO produtos (nome, preco) VALUES (?, ?)");
        $stmt->execute([$nome, $preco]);

        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Erro ao salvar: ' . $e->getMessage()]);
    }
}

<?php
// Configuração do banco de dados
require 'db.php';

// Busca todos os produtos
$stmt = $pdo->query("SELECT * FROM produtos ORDER BY id DESC");
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Retorna como JSON
header('Content-Type: application/json');
echo json_encode($produtos);

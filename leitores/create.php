<?php

include '../config/conexacao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $stmt = $pdo->prepare('INSERT INTO leitores (nome, email, telefone) VALUES (?, ?, ?)');
    $stmt->execute([$nome, $email, $telefone]);
    header('Location: index.php');
    exit;
}
?>

<form method="post">
Nome: <input name="nome" required><br>
Email: <input name="email" type="email" required><br>
Telefone: <input name="telefone"><br>
<button type="submit">Salvar</button>
</form>
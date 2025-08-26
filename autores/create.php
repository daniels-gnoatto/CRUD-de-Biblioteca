<?php
require_once '../config/conexacao.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $nacionalidade = $_POST['nacionalidade'];
    $ano = $_POST['ano_nascimento'];
    $stmt = $pdo->prepare('INSERT INTO autores (nome, nacionalidade, ano_nascimento) VALUES (?, ?, ?)');
    $stmt->execute([$nome, $nacionalidade, $ano]);
    header('Location: index.php');
    exit;
}
?>
<form method="post">
Nome: <input name="nome" required><br>
Nacionalidade: <input name="nacionalidade"><br>
Ano de nascimento: <input name="ano_nascimento" type="number"><br>
<button type="submit">Salvar</button>
</form>
<?php

include '../config/conexacao.php';

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM leitores WHERE id_leitor = ?');
$stmt->execute([$id]);
$leitor = $stmt->fetch();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $stmt = $pdo->prepare('UPDATE leitores SET nome=?, email=?, telefone=? WHERE id_leitor=?');
    $stmt->execute([$nome, $email, $telefone, $id]);
    header('Location: index.php');
    exit;
}
?>
<form method="post">
Nome: <input name="nome" value="<?= $leitor['nome'] ?>" required><br>
Email: <input name="email" type="email" value="<?= $leitor['email'] ?>" required><br>
Telefone: <input name="telefone" value="<?= $leitor['telefone'] ?>"><br>
<button type="submit">Salvar</button>
</form>
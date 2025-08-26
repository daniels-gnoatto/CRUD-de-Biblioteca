<?php

include '../config/conexacao.php';

$id = $_GET['id'];
// Verifica se o livro está vinculado a algum empréstimo
$stmt = $pdo->prepare('SELECT COUNT(*) FROM emprestimos WHERE id_livro = ?');
$stmt->execute([$id]);
if ($stmt->fetchColumn() > 0) {
    echo "Não é possível excluir: o livro está vinculado a um ou mais empréstimos.";
    echo '<br><a href="index.php">Voltar</a>';
    exit;
}
// Se não estiver vinculado, pode excluir
$stmt = $pdo->prepare('DELETE FROM livros WHERE id_livro = ?');
$stmt->execute([$id]);
header('Location: read.php');
exit;
?>
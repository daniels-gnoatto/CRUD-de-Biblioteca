<?php
require_once '../config/conexacao.php';
$tipo = $_GET['tipo'] ?? 'ativos';
if ($tipo === 'ativos') {
    $sql = 'SELECT e.*, l.titulo, r.nome as leitor FROM emprestimos e JOIN livros l ON e.id_livro=l.id_livro JOIN leitores r ON e.id_leitor=r.id_leitor WHERE e.data_devolucao IS NULL';
} else {
    $sql = 'SELECT e.*, l.titulo, r.nome as leitor FROM emprestimos e JOIN livros l ON e.id_livro=l.id_livro JOIN leitores r ON e.id_leitor=r.id_leitor WHERE e.data_devolucao IS NOT NULL';
}
$stmt = $pdo->query($sql);
$emprestimos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<title>Empréstimos</title>
</head>
<body>

<h1>Empréstimos <?= $tipo === 'ativos' ? 'Ativos' : 'Concluídos' ?></h1>
<a href="create.php">Novo Empréstimo</a> |
<a href="?tipo=ativos">Ativos</a> |
<a href="?tipo=concluidos">Concluídos</a>

<table border="1">
<tr><th>ID</th><th>Livro</th><th>Leitor</th><th>Data Empréstimo</th><th>Data Devolução</th><th>Ações</th></tr>
<?php foreach ($emprestimos as $e): ?>
<tr>

<td><?= $e['id_emprestimo'] ?></td>
<td><?= $e['titulo'] ?></td>
<td><?= $e['leitor'] ?></td>
<td><?= $e['data_emprestimo'] ?></td>
<td><?= $e['data_devolucao'] ?></td>

<td>
<a href="update.php?id=<?= $e['id_emprestimo'] ?>">Devolução</a> |
<a href="delete.php?id=<?= $e['id_emprestimo'] ?>">Excluir</a>
</td>
</tr>

<?php endforeach; ?>
</table>
</body>
</html>
<?php

include '../config/conexacao.php';

// Filtros
$filtro = [];
$where = [];
if (!empty($_GET['genero'])) {
    $where[] = 'genero = ?';
    $filtro[] = $_GET['genero'];
}
if (!empty($_GET['id_autor'])) {
    $where[] = 'id_autor = ?';
    $filtro[] = $_GET['id_autor'];
}
if (!empty($_GET['ano_publicacao'])) {
    $where[] = 'ano_publicacao = ?';
    $filtro[] = $_GET['ano_publicacao'];
}
$sql = 'SELECT * FROM livros';
if ($where) $sql .= ' WHERE ' . implode(' AND ', $where);
$stmt = $pdo->prepare($sql);
$stmt->execute($filtro);
$livros = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<title>Livros</title>

</head>
<body>
<h1>Livros</h1>
<a href="create.php">Novo Livro</a>
<form method="get">
Gênero: <input name="genero">
Autor: <input name="id_autor" type="number">
Ano: <input name="ano_publicacao" type="number">
<button type="submit">Filtrar</button>
</form>
<table border="1">
<tr><th>ID</th><th>Título</th><th>Gênero</th><th>Ano</th><th>Autor</th><th>Ações</th></tr>
<?php foreach ($livros as $l): ?>
<tr>
<td><?= $l['id_livro'] ?></td>
<td><?= $l['titulo'] ?></td>
<td><?= $l['genero'] ?></td>
<td><?= $l['ano_publicacao'] ?></td>
<td><?= $l['id_autor'] ?></td>
<td>
<a href="update.php?id=<?= $l['id_livro'] ?>">Editar</a> |
<a href="delete.php?id=<?= $l['id_livro'] ?>">Excluir</a>
</td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>
<?php
include '../config/conexacao.php';

$stmt = $pdo->query('SELECT * FROM autores');
$autores = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<title>Autores</title>
</head>
<body>
<h1>Autores</h1>
<a href="create.php">Novo Autor</a>
<table border="1">
<tr><th>ID</th><th>Nome</th><th>Nacionalidade</th><th>Ano Nascimento</th><th>Ações</th></tr>
<?php foreach ($autores as $a): ?>
<tr>
<td><?= $a['id_autor'] ?></td>
<td><?= $a['nome'] ?></td>
<td><?= $a['nacionalidade'] ?></td>
<td><?= $a['ano_nascimento'] ?></td>
<td>
<a href="update.php?id=<?= $a['id_autor'] ?>">Editar</a> |
<a href="delete.php?id=<?= $a['id_autor'] ?>">Excluir</a>
</td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>
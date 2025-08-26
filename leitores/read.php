<?php

include '../config/conexacao.php';

$stmt = $pdo->query('SELECT * FROM leitores');
$leitores = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<title>Leitores</title>

</head>
<body>
<h1>Leitores</h1>
<a href="create.php">Novo Leitor</a>
<table border="1">
<tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Ações</th></tr>
<?php foreach ($leitores as $l): ?>
<tr>

<td><?= $l['id_leitor'] ?></td>
<td><?= $l['nome'] ?></td>
<td><?= $l['email'] ?></td>
<td><?= $l['telefone'] ?></td>

<td>
<a href="update.php?id=<?= $l['id_leitor'] ?>">Editar</a> |
<a href="delete.php?id=<?= $l['id_leitor'] ?>">Excluir</a>
</td>
</tr>

<?php endforeach; ?>
</table>
</body>
</html>
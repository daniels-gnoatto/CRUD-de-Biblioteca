<?php

include '../config/conexacao.php';

$id = $_GET['id'];
$stmt = $pdo->prepare('DELETE FROM emprestimos WHERE id_emprestimo = ?');
$stmt->execute([$id]);
header('Location: read.php');

exit;
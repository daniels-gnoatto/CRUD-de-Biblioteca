<?php

include '../config/conexacao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $ano = $_POST['ano_publicacao'];
    $id_autor = $_POST['id_autor'];
    $ano_atual = date('Y');
    if ($ano > 1500 && $ano <= $ano_atual) {
        $stmt = $pdo->prepare('INSERT INTO livros (titulo, genero, ano_publicacao, id_autor) VALUES (?, ?, ?, ?)');
        $stmt->execute([$titulo, $genero, $ano, $id_autor]);
        header('Location: read.php');
        exit;
    } else {
        echo "Ano de publicação inválido.";
    }
}
?>
<form method="post">
Título: <input name="titulo" required><br>
Gênero: <input name="genero"><br>
Ano de publicação: <input name="ano_publicacao" type="number" required><br>
Autor (ID): <input name="id_autor" type="number" required><br>
<button type="submit">Salvar</button>
</form>
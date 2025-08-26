<?php
include '../config/conexacao.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_livro = $_POST['id_livro'];
    $id_leitor = $_POST['id_leitor'];
    $data_emprestimo = $_POST['data_emprestimo'];
    
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM emprestimos WHERE id_livro=? AND data_devolucao IS NULL');
    $stmt->execute([$id_livro]);
    if ($stmt->fetchColumn() > 0) {
        echo 'Livro já emprestado!';
        exit;
    }
    
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM emprestimos WHERE id_leitor=? AND data_devolucao IS NULL');
    $stmt->execute([$id_leitor]);
    if ($stmt->fetchColumn() >= 3) {
        echo 'Leitor já possui 3 empréstimos ativos!';
        exit;
    }
    $stmt = $pdo->prepare('INSERT INTO emprestimos (id_livro, id_leitor, data_emprestimo) VALUES (?, ?, ?)');
    $stmt->execute([$id_livro, $id_leitor, $data_emprestimo]);
    header('Location: index.php');
    exit;
}
?>
<form method="post">
ID do Livro: <input name="id_livro" type="number" required><br>
ID do Leitor: <input name="id_leitor" type="number" required><br>
Data do Empréstimo: <input name="data_emprestimo" type="date" required><br>
<button type="submit">Salvar</button>
</form>
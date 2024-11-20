<?php

include('database.php');


function listarTarefas() {
    global $pdo;
    $sql = "SELECT * FROM tarefas ORDER BY data_vencimento";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$tarefas = listarTarefas();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Tarefas</title>
</head>
<body>
    <h1>Lista de Tarefas</h1>

    
    <form action="add_tarefa.php" method="post">
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" required><br>
        <label for="data_vencimento">Data de Vencimento:</label>
        <input type="date" name="data_vencimento" required><br>
        <button type="submit">Adicionar Tarefa</button>
    </form>

    <h2>Tarefas Não Concluídas</h2>
    <ul>
        <?php foreach ($tarefas as $tarefa): ?>
            <?php if ($tarefa['concluida'] == 0): ?>
                <li>
                    <?= htmlspecialchars($tarefa['descricao']) ?> - <?= $tarefa['data_vencimento'] ?>
                    <a href="update_tarefa.php?id=<?= $tarefa['id'] ?>">Marcar como concluída</a> |
                    <a href="delete_tarefa.php?id=<?= $tarefa['id'] ?>">Excluir</a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <h2>Tarefas Concluídas</h2>
    <ul>
        <?php foreach ($tarefas as $tarefa): ?>
            <?php if ($tarefa['concluida'] == 1): ?>
                <li>
                    <?= htmlspecialchars($tarefa['descricao']) ?> - <?= $tarefa['data_vencimento'] ?>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

</body>
</html>

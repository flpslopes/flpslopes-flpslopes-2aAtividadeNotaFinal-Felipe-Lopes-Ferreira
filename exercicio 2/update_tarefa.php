<?php
include('database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $sql = "UPDATE tarefas SET concluida = 1 WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header('Location: index.php');
}
?>

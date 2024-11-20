<?php
include('database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

  
    $sql = "DELETE FROM tarefas WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header('Location: index.php'); 
}
?>

<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $autor = trim($_POST['autor']);
    $ano = (int) $_POST['ano'];

    if ($titulo && $autor && $ano) {
        
        $stmt = $db->prepare("INSERT INTO livros (titulo, autor, ano_publicacao) VALUES (?, ?, ?)");
        $stmt->execute([$titulo, $autor, $ano]);
    }

    
    header('Location: index.php');
    exit;
}
?>

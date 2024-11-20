<?php
try {

    $db = new PDO('sqlite:D:/Area de Trabalho/Nova pasta (3)/livraria.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexão bem-sucedida!<br>";


    $result = $db->query("SELECT * FROM livros");


    foreach ($result as $row) {
        echo "ID: " . $row['id'] . " | Título: " . $row['titulo'] . " | Autor: " . $row['autor'] . " | Ano: " . $row['ano'] . "<br>";
    }

} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>
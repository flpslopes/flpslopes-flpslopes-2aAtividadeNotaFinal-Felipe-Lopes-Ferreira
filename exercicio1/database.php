<?php

try {
   
    $db = new PDO('sqlite:D:/Area de Trabalho/Nova pasta (3)/livraria.db');
    
   
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   
    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    
    echo "Erro na conexão: " . $e->getMessage();
}
?>

<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=projet_sql', 'root', '');

} catch (PDOException $e) {
    file_put_contents('dblogs.log', $e->getMessage().PHP_EOL, FILE_APPEND);
    echo 'Une erreur est survenue';
}
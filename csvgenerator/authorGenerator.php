<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador CSV - Autor</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
</head>

<body>
    <div class="container">
        <img src="../img/bookImage.png">
        <h2>Gerador de Arquivo CSV</h2>

        <p>Arquivo CSV gerado com sucesso!</p><br>

        <input type="button" value="Página Inicial" onclick="window.open('../index.html', '_top');">
    </div>
</body>

</html>


<?php

include('../connection/connectionBD.php');

try {
    $stmt = $pdo->prepare('SELECT * FROM authorPhp ORDER BY nome');
    $stmt->execute();

    $fp = fopen('../csvFile/author.csv', 'w');

    $titleColumns = array('nome', 'livro');

    fputcsv($fp, $titleColumns);

    while ($row = $stmt->fetch()) {
        $nome = $row['nome'];
        $livro = $row['livro'];

        $list = array(
            array($nome, $livro)
        );

        foreach ($list as $line) {
            fputcsv($fp, $line);
        }
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

?>
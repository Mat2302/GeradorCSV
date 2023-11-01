<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon"  type="image/x-icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../style/style.css">
    <title>Gerador de CSV - Livros</title>
</head>

<body>
    <div class="container">
        <img src="../img/bookImage.png">
        <h2>Gerador de Arquivo CSV</h2>

        <p>Arquivo CSV gerado com sucesso!</p>

        <input type="button" value="Página Inicial" onclick="window.open('../index.html', '_top');">
    </div>
</body>

</html>

<?php

include('../connection/connectionBD.php');

try {
    $stmt = $pdo->prepare('SELECT * FROM bookPhp ORDER BY editora');
    $stmt->execute();

    $fp = fopen('../csvFile/book.csv', 'w');

    $titleColumns = array('livro', 'autor', 'paginas', 'editora', 'valor', 'ano');

    fputcsv($fp, $titleColumns);

    while ($row = $stmt->fetch()) {
        $livro = $row['livro'];
        $autor = $row['autor'];
        $paginas = $row['paginas'];
        $editora = $row['editora'];
        $valor = $row['valor'];
        $ano = $row['ano'];

        $list = array(
            array($livro, $autor, $paginas, $editora, $valor, $ano),
        );

        foreach ($list as $line) {
            fputcsv($fp, $line);
        }
    }

    $msg = 'Arquivo gerado: book.csv';
    fclose($fp);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
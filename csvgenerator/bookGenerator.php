<?php

include('Connection/connectionBD.php');

try {
    $stmt = $pdo->prepare('select * from bookPhp order by editora');
    $stmt->execute();

    $fp = fopen('CSVFile/book.csv', 'w');

    $titleColumns = array('livro', 'autor', 'sexo', 'pagina', 'editora', 'valor', 'uf', 'ano');

    fputcsv($fp, $titleColumns);

    while ($row = $stmt->fetch()) {
        $livro = $row['livro'];
        $autor = $row['autor'];
        $sexo = $row['sexo'];
        $pagina = $row['pagina'];
        $editora = $row['editora'];
        $valor = $row['valor'];
        $uf = $row['uf'];
        $ano = $row['ano'];

        $list = array(
            array($livro, $autor, $sexo, $pagina, $editora, $valor, $uf, $ano),
        );

        foreach ($list as $line) {
            fputcsv($fp, $line);
        }
    }
    
    $msg = 'Arquivo gerado: book.csv';
    fclose($fp);
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
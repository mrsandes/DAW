<?php
    try {
        $pdo = new PDO("mysql:host=127.0.0.1; dbname=CidadesEstados", "a2022951047@teiacoltec.org", "coltec2024");
    } catch (PDOException $e) {
        echo "erro ao conectar com BD :" . $e->getMessage();
        exit;
    }

    //-----------------------------------------------------------
    $sql = 'SELECT uf, nome FROM estados limit 5;';
    $stmt = $pdo->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_BOTH);
    $stmt->execute();

    echo "<br>";
    while ($row = $stmt->fetch()) {
        echo $row[0] . " = " . $row[1] . "<br>";
        echo $row['uf'] . " = " . $row['nome'] . "<br>";
    }

    // --------------------------------------------------------------
    $sql = 'SELECT uf, nome FROM estados limit 5;';
    $stmt = $pdo->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    echo "<br>";
    while ($row = $stmt->fetch()) {
        echo $row['uf'] . " = " . $row['nome'] . "<br>";
    }

    //------------------------------------------------------------
    $sql = 'SELECT uf, nome FROM estados limit 5;';
    $stmt = $pdo->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    echo "<br>";
    while ($row = $stmt->fetch()) {
        echo $row->uf . " = " . $row->nome . "<br>";
    }

    //------------------------------------------------------------
    class estados {
        public $uf;
        public $nome;
    }

    $sql = 'SELECT uf, nome FROM estados limit 5;';
    $stmt = $pdo->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'estados');
    $stmt->execute();

    echo "<br>";
    while ($obj = $stmt->fetch()) {
        echo $obj->uf . " = " . $obj->nome . "<br>";
    }

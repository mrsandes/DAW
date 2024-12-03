<?php
    session_start();
    require_once("functions.php");
?>

<!DOCTYPE html>

<html>
<head>
    <title>Area do aluno</title>
</head>

<body>
    <h2 style="text-align: center;">Ola <?php echo $_SESSION['usuarioAtual']['nome'] ?></h2>

    <form method="POST" action="index.php" style="text-align: center;">
        <input type="submit" name="sair" value="Sair">
    </form>

    <?php
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=a2022951047@teiacoltec.org", "a2022951047@teiacoltec.org", "coltec2024");
        $tabela = 'Notas2024';

        printTable(selectFromTable($pdo, $tabela, ["Nome", "Matricula", "Turma"], "", "Nome='" . $_SESSION['usuarioAtual']['nome'] . "'", "", ""));        

        printNotes(
        [selectFromTable($pdo, $tabela, ["Matematica1b", "Matematica2b", "Matematica3b", "Matematica4b", "MatematicaT"], "", "Nome='" . $_SESSION['usuarioAtual']['nome'] . "'", "", ""),
        selectFromTable($pdo, $tabela, ["Portugues1b", "Portugues2b", "Portugues3b", "Portugues4b", "PortuguesT"], "", "Nome='" . $_SESSION['usuarioAtual']['nome'] . "'", "", ""),
        selectFromTable($pdo, $tabela, ["Historia1b", "Historia2b", "Historia3b", "Historia4b", "HistoriaT"], "", "Nome='" . $_SESSION['usuarioAtual']['nome'] . "'", "", ""),
        selectFromTable($pdo, $tabela, ["Geografia1b", "Geografia2b", "Geografia3b", "Geografia4b", "GeografiaT"], "", "Nome='" . $_SESSION['usuarioAtual']['nome'] . "'", "", ""),
        selectFromTable($pdo, $tabela, ["Quimica1b", "Quimica2b", "Quimica3b", "Quimica4b", "QuimicaT"], "", "Nome='" . $_SESSION['usuarioAtual']['nome'] . "'", "", ""),
        selectFromTable($pdo, $tabela, ["Fisica1b", "Fisica2b", "Fisica3b", "Fisica4b", "FisicaT"], "", "Nome='" . $_SESSION['usuarioAtual']['nome'] . "'", "", "")]);
    ?>
</body>
</html>

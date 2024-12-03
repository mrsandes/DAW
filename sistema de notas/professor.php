<?php
    session_start();
    require_once("functions.php");
?>

<!DOCTYPE html>

<html>
<head>
    <title>Professor</title>
</head>

<body>
    <h2>Ola <?php echo $_SESSION['usuarioAtual']['nome'] ?></h2>

    <form action="" method='post'>
        <input type="submit" name='tabelaCompleta' value="Mostrar toda tabela">
    </form>    

    <br>

    <form action="" method='post'>
        Selecionar por Nome
        <input type="text" name="nomeAluno" placeholder="Nome"> <br>
        <input type="submit" name="buscaPorNome" value="Buscar">
    </form>

    <br>
        
    <form action="" method='post'>
        Selecionar por Turma
        <select name="turma">
            <option value="none">None</option>
            <option value='101'>101</option>
            <option value='102'>102</option>
            <option value='103'>103</option>
            <option value='201'>201</option>
            <option value='202'>202</option>
            <option value='203'>203</option>
            <option value='301'>301</option>
            <option value='302'>302</option>
            <option value='303'>303</option>  
        </select> <br>
        <input type="submit" name="buscaPorTurma" value="Buscar">
    </form>

    <br>

    <form method="POST" action="">
        Modificar nota <br>
        
        Nome <input type="text" name="nome" placeholder="Nome"> <br>
        
        Disciplina
        <select name="disciplina">
            <option value='Matematica'>Matematica</option>
            <option value='Portugues'>Portugues</option>
            <option value='Historia'>Historia</option>
            <option value='Geografia'>Geografia</option>
            <option value='Quimica'>Quimica</option>
            <option value='Fisica'>Fisica</option> 
        </select> <br>

        Bimestre
        <select name="bimestre">
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
        </select> <br>

        Nova nota <input type="number" name="nota" placeholder="Nota"> <br>

        <input type="submit" name="modificarNota" value="Enviar">
    </form>

    <br>

    <form method="POST" action="index.php">
        <input type="submit" name="sair" value="Sair">
    </form>

    <?php
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=a2022951047@teiacoltec.org", "a2022951047@teiacoltec.org", "coltec2024");
        $tabela = 'Notas2024';
    
        if (isset($_POST['tabelaCompleta'])) {
            printTable(selectFromTable($pdo, $tabela, ["Nome", "Matricula", "Turma", "MatematicaT", "PortuguesT", "HistoriaT", "GeografiaT", "QuimicaT", "FisicaT"], "Turma, Nome", "", "", ""));             
        }

        else if (isset($_POST['buscaPorNome'])) {
            printTable(selectFromTable($pdo, $tabela, ["Nome", "Matricula", "Turma"], "", "Nome='" . $_POST['nomeAluno'] . "'", "", ""));        
            
            printNotes(
            [selectFromTable($pdo, $tabela, ["Matematica1b", "Matematica2b", "Matematica3b", "Matematica4b", "MatematicaT"], "", "Nome='" . $_POST['nomeAluno'] . "'", "", ""),
            selectFromTable($pdo, $tabela, ["Portugues1b", "Portugues2b", "Portugues3b", "Portugues4b", "PortuguesT"], "", "Nome='" . $_POST['nomeAluno'] . "'", "", ""),
            selectFromTable($pdo, $tabela, ["Historia1b", "Historia2b", "Historia3b", "Historia4b", "HistoriaT"], "", "Nome='" . $_POST['nomeAluno'] . "'", "", ""),
            selectFromTable($pdo, $tabela, ["Geografia1b", "Geografia2b", "Geografia3b", "Geografia4b", "GeografiaT"], "", "Nome='" . $_POST['nomeAluno'] . "'", "", ""),
            selectFromTable($pdo, $tabela, ["Quimica1b", "Quimica2b", "Quimica3b", "Quimica4b", "QuimicaT"], "", "Nome='" . $_POST['nomeAluno'] . "'", "", ""),
            selectFromTable($pdo, $tabela, ["Fisica1b", "Fisica2b", "Fisica3b", "Fisica4b", "FisicaT"], "", "Nome='" . $_POST['nomeAluno'] . "'", "", "")]);
        }

        else if (isset($_POST['buscaPorTurma'])) {
            printTable(selectFromTable($pdo, $tabela, ["Turma", "count(Nome) as 'Total de alunos'"], "", "Turma=" . $_POST['turma'], "", ""));       
            printTable(selectFromTable($pdo, $tabela, ["Nome", "Matricula", "Turma", "MatematicaT", "PortuguesT", "HistoriaT", "GeografiaT", "QuimicaT", "FisicaT"], "Nome", "Turma=" . $_POST['turma'], "", ""));             
        }

        else if (isset($_POST['modificarNota'])) {
            updateNote($pdo, $tabela, $_POST['nome'], $_POST['disciplina'], $_POST['bimestre'], $_POST['nota']);

            printTable(selectFromTable($pdo, $tabela, ["Nome", "Matricula", "Turma"], "", "Nome='" . $_POST['nome'] . "'", "", ""));        
            
            printNotes(
            [selectFromTable($pdo, $tabela, ["Matematica1b", "Matematica2b", "Matematica3b", "Matematica4b", "MatematicaT"], "", "Nome='" . $_POST['nome'] . "'", "", ""),
            selectFromTable($pdo, $tabela, ["Portugues1b", "Portugues2b", "Portugues3b", "Portugues4b", "PortuguesT"], "", "Nome='" . $_POST['nome'] . "'", "", ""),
            selectFromTable($pdo, $tabela, ["Historia1b", "Historia2b", "Historia3b", "Historia4b", "HistoriaT"], "", "Nome='" . $_POST['nome'] . "'", "", ""),
            selectFromTable($pdo, $tabela, ["Geografia1b", "Geografia2b", "Geografia3b", "Geografia4b", "GeografiaT"], "", "Nome='" . $_POST['nome'] . "'", "", ""),
            selectFromTable($pdo, $tabela, ["Quimica1b", "Quimica2b", "Quimica3b", "Quimica4b", "QuimicaT"], "", "Nome='" . $_POST['nome'] . "'", "", ""),
            selectFromTable($pdo, $tabela, ["Fisica1b", "Fisica2b", "Fisica3b", "Fisica4b", "FisicaT"], "", "Nome='" . $_POST['nome'] . "'", "", "")]);
        }
    ?>
</body>
</html>

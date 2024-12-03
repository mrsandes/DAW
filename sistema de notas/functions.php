<?php
    function selectPDO($pdo, $tabela) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM LoginSistemaDeNotas2024");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function insertUser($pdo, $tabela, $nome, $senha, $admin) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO LoginSistemaDeNotas2024(nome, senha, admin) VALUES(?, ?, ?)");
        $stmt->execute([$nome, $senha, $admin]);
    }

    function updateUser($pdo, $tabela, $antigoNome, $novoNome, $novaSenha, $novoAdmin) {
        global $pdo;

        if (!is_int($novoAdmin) && $novoAdmin) {
            $novoAdmin = 1;
        }

        else if (!is_int($novoAdmin) && !$novoAdmin) {
            $novoAdmin = 0;
        }

        $stmt = $pdo->prepare("UPDATE LoginSistemaDeNotas2024 SET nome = ?, senha = ?, admin = ? WHERE nome = ?");
        $stmt->execute([$novoNome, $novaSenha, $novoAdmin, $antigoNome]);
    }

    function deleteUser($pdo, $tabela, $nome) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM LoginSistemaDeNotas2024 WHERE nome = ?");
        $stmt->execute([$nome]);
    }

    function updateNote($pdo, $tabela, $nome, $disciplina, $bimestre, $nota) {
        $materia = $disciplina . $bimestre . "b";
                
        $stmt = $pdo->prepare("UPDATE Notas2024 SET " . $materia . " = ? WHERE Nome = ?;");
        $stmt->execute([$nota, $nome]);

        $stmt = $pdo->prepare("UPDATE " . $tabela . " SET MatematicaT = Matematica1b + Matematica2b + Matematica3b + Matematica4b, PortuguesT = Portugues1b + Portugues2b + Portugues3b + Portugues4b, HistoriaT = Historia1b + Historia2b + Historia3b + Historia4b, GeografiaT = Geografia1b + Geografia2b + Geografia3b + Geografia4b, QuimicaT = Quimica1b + Quimica2b + Quimica3b + Quimica4b, FisicaT = Fisica1b + Fisica2b + Fisica3b + Fisica4b WHERE Nome = ?;");
        $stmt->execute([$nome]);
    }

    function selectFromTable($pdo, $tabela, $campos, $orderby, $whereClause, $limit, $groupby) {
        $max = count($campos);
        $string = 'SELECT  ';

        for ($i = 0; $i < $max - 1; $i++) {
            $string .= ' ' . $campos[$i];
            $string .= ', ';
        }

        $string .= ' ' . $campos[$i];

        $string .= ' from ' . $tabela; 

        if (!empty($whereClause)) {
            $string .= ' where ' . $whereClause; 
        }

        if (!empty($groupby)) {
            $string .= ' group by ' . $groupby; 
        }

        if (!empty($orderby)) {
            $string .= ' order by ' . $orderby; 
        }

        if (!empty($limit)) {
            $string .= ' limit ' . $limit;
        }

        else {
            $string .= ';';
        }

        // echo $string;

        $stmt = $pdo->prepare($string);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute(); 
        
        return $stmt->fetchAll();
    }
    
    function printTable($table) {    
        echo '<table style="border-collapse: collapse; width: 80%; max-width: 800px; margin: auto; background-color: #f9f9f9;">';
    
        echo '<tr>';

        foreach (array_keys($table[0]) as $header) {
            echo '<th style="padding: 12px; text-align: left; border: 1px solid #cccccc; background-color: #e0e0e0;">' . htmlspecialchars($header) . '</th>';
        }
        
        echo '</tr>';
    
        foreach ($table as $row) {   
            echo '<tr>';

            foreach ($row as $data) {
                echo '<td style="padding: 12px; text-align: left; border: 1px solid #cccccc;">' . htmlspecialchars($data) . '</td>';
            }

            echo '</tr>';
        }
    
        echo '</table>';
    }

    function printNotes($tables) {
        echo '<table style="border-collapse: collapse; width: 80%; max-width: 800px; margin: auto; background-color: #f9f9f9;">';

        foreach ($tables as $table) {
            printLines($table);
        }

        echo '</table>';
    }

    function printLines($table) {  
        global $index;

        foreach ($table as $row) {   
            echo '<tr>';

            switch ($index) {
                case 0:
                    echo '<td style="padding: 12px; text-align: left; border: 1px solid #cccccc; background-color: #e0e0e0;"></td>';
                    echo '<td style="padding: 12px; text-align: left; border: 1px solid #cccccc; background-color: #e0e0e0;"> 1ºb</td>';
                    echo '<td style="padding: 12px; text-align: left; border: 1px solid #cccccc; background-color: #e0e0e0;"> 2ºb</td>';
                    echo '<td style="padding: 12px; text-align: left; border: 1px solid #cccccc; background-color: #e0e0e0;"> 3ºb</td>';
                    echo '<td style="padding: 12px; text-align: left; border: 1px solid #cccccc; background-color: #e0e0e0;"> 4ºb</td>';
                    echo '<td style="padding: 12px; text-align: left; border: 1px solid #cccccc; background-color: #e0e0e0;"> Total</td>';

                    echo '</tr>';

                    echo '<tr>';

                    echo '<td style="padding: 12px; text-align: left; border: 1px solid #cccccc; background-color: #e0e0e0;">Matemática</td>';
                break;

                case 1:
                    echo '<td style="padding: 12px; text-align: left; border: 1px solid #cccccc; background-color: #e0e0e0;">Português</td>';
                break;

                case 2:
                    echo '<td style="padding: 12px; text-align: left; border: 1px solid #cccccc; background-color: #e0e0e0;">História</td>';
                break;

                case 3:
                    echo '<td style="padding: 12px; text-align: left; border: 1px solid #cccccc; background-color: #e0e0e0;">Geografia</td>';
                break;

                case 4:
                    echo '<td style="padding: 12px; text-align: left; border: 1px solid #cccccc; background-color: #e0e0e0;">Química</td>';
                break;

                case 5:
                    echo '<td style="padding: 12px; text-align: left; border: 1px solid #cccccc; background-color: #e0e0e0;">Física</td>';
                break;
            }

            foreach ($row as $data) {
                echo '<td style="padding: 12px; text-align: left; border: 1px solid #cccccc;">' . htmlspecialchars($data) . '</td>';
            }

            echo '</tr>';

            $index++;
        }
    }


<?php
    function selectFromTable($campos, $orderby, $whereClause, $limit) {
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=a2022951047@teiacoltec.org", "a2022951047@teiacoltec.org", "coltec2024");
        $tabela = 'resultado_imiron';

        $max = count($campos);
        $string = 'SELECT  ';

        for ($i = 0; $i < $max - 1; $i++) {
            $string = $string . ' ' . $campos[$i];
            $string = $string . ', ';
        }

        $string = $string . ' ' . $campos[$i];

        $string = $string . ' from ' . $tabela; 

        if (!empty($whereClause)) {
            $string = $string . ' from ' . $tabela . ' where ' . $whereClause; 
        }

        if (!empty($orderby)) {
            $string = $string . ' order by ' . $orderby . ' asc'; 
        }

        if (!empty($limit)) {
            $string = $string . ' limit ' . $limit;
        }

        else {
            $string = $string . ';';
        }

        $stmt = $pdo->prepare($string);

        $stmt->execute(); 
        
        return $stmt->fetchAll();
        // return $string;
    }

    function printTable($table, $column_names) {
        echo '<table>';

        foreach ($column_names as $name) {
            echo '<th>' . $name. '</th>';
        }

        foreach ($table as $row) {   
            echo '<tr>';

            foreach ($row as $data) {
                echo '<td>' . $data . '</td>';
            }

            echo '</tr>';
        }
        
        echo '</table>';
    }

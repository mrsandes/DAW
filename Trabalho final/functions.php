<?php
    function selectFromTable($campos, $orderby, $whereClause, $limit, $groupby) {
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=a2022951047@teiacoltec.org", "a2022951047@teiacoltec.org", "coltec2024");
        $tabela = 'resultado_imiron';

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

        if (!empty($orderby)) {
            $string .= ' order by ' . $orderby; 
        }

        if (!empty($groupby)) {
            $string .= ' group by ' . $groupby; 
        }

        if (!empty($limit)) {
            $string .= ' limit ' . $limit;
        }

        else {
            $string .= ';';
        }

        echo $string;

        $stmt = $pdo->prepare($string);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute(); 
        
        return $stmt->fetchAll();
    }

    function printTable($table) {
        echo '<table>';

        echo '<tr>';

        foreach (array_keys($table[0]) as $value) {
            echo '<th>' . $value . '</th>';
        }

        echo '</tr>';

        foreach ($table as $row) {   
            echo '<tr>';

            foreach ($row as $data) {
                echo '<td>' . $data . '</td>';
            }

            echo '</tr>';
        }
        
        echo '</table>';
    }

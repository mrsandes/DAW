<?php
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

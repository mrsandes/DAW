<?php
    $arquivo = fopen("alunos.txt", "r") or die("Arquivo não existe");

    echo "<table border='1'>";

    echo "<tr>
            <th>Nome</th>
            <th>Nome da Mãe</th>
            <th>Nome do Pai</th>
            <th>Endereço</th>
            <th>Data de Nascimento</th>
            <th>Escolaridade da Mãe</th>
            <th>Escolaridade do Pai</th>
        </tr>";

    while (!feof($arquivo)) {
        $linha = fgets($arquivo);
        
        if (!empty(trim($linha))) {
            $dados = explode("|", $linha);

            echo "<tr>";

            foreach ($dados as $dado) {
                echo "<td>" . $dado . "</td>";
            }

            echo "</tr>";
        }
    }

    echo "</table>";

    fclose($arquivo);


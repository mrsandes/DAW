<!DOCTYPE html>

<html>
<head>
    <title>Questao 1.2</title>
</head>

<body>
    <h2>Questao 1.2</h2>

    <form method="post">
        Precisao: 
        <input type="number" step="any" name="precisao" required>

        <input type="submit" name="calcular" value="Calcular">
    </form>


    <br>

    <?php
        if (isset($_POST['calcular'])) {
            $precisao = $_POST['precisao'];
            $arquivo = fopen("erro.txt", "a");
            $pi = 0;
            $x = 1;
            $y = 1;

            do {
                $pi += $y * (4 / $x);
                $y = -$y;
                $x += 2;
                $diff = abs(M_PI - $pi);
                
                fwrite($arquivo, $diff . "\n");
            } while ($diff > $precisao);
            
            echo "O valor aproximado de Pi e: " . $pi;

            fclose($arquivo);
        }
    ?>
</body>
</html>

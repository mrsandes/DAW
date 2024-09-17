<!DOCTYPE html>

<html>
<head>
    <title>Exercicio 5</title>
</head>

<body>
    <h2>Exercicio 5</h2>

    <form method="post">
        Precisão: <input type="number" name="precisao" required>

        <input type="submit" name="calcular" value="Calcular">
    </form>

    <br>

    <?php
        if (isset($_POST['calcular'])) {
            $precisao = $_POST['precisao'];
            $pi = 0;
            $x = 1;
            $y = 1;

            do {
                $pi += $y * (4 / $x);
                $y = -$y;
                $x += 2;
                $diff = abs(M_PI - $pi);
            } while ($diff > $precisao);

            echo "O valor aproximado de Pi e: " . $pi;
        }
    ?>
</body>
</html>

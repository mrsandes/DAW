<!DOCTYPE html>

<html>
<head>
    <title>Exercicio 4</title>
</head>

<body>
    <h2>Exercicio 4</h2>

    <form method="post">
        <input type="submit" name="calcular" value="Calcular">
    </form>

    <br>

    <?php
        if (isset($_POST['calcular'])) {
            $pi = 0;
            $x = 1;
            $y = 1;

            do {
                $pi += $y * (4 / $x);
                $y = -$y;
                $x += 2;
            } while (abs(M_PI - $pi) > 0.0001);
            
            echo "O valor aproximado de Pi e: " . $pi;
        }
    ?>
</body>
</html>

<!DOCTYPE html>

<html>
<head>
    <title>Exercicio 2</title>
</head>

<body>
    <h2>Exercicio 2</h2>

    <form method="post">
        <input type="submit" name="calcular" value="Calcular">
    </form>

    <br>

    <?php
        if (isset($_POST['calcular'])) {
            $s = 0;
            $x = 2;
            $y = 50;

            for ($i = 1; $i <= 50; $i++) {
                $s += pow($x, $i) / $y;
                $y--;
            }

            echo "O valor de S e: " . $s;           
        }
    ?>
</body>
</html>

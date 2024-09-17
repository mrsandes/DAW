<!DOCTYPE html>

<html>
<head>
    <title>Exercicio 3</title>
</head>

<body>
    <h2>Exercicio 3</h2>

    <form method="post">
        <input type="submit" name="calcular" value="Calcular">
    </form>

    <br>

    <?php
        if (isset($_POST['calcular'])) {
            $s = 0;
            $x = 480;
            $y = 10;
            $z = 1;

            for ($i = 1; $i <= 30; $i++) {
                $s += $z * ($x / $y);
                $x -= 5;
                $y++;
                $z = -$z;
            }

            echo "O valor de S e: " . $s;
        }
    ?>
</body>
</html>

<!DOCTYPE html>

<html>
<head>
    <title>Exercicio 14</title>
</head>

<body>
    <h2>Exercicio 14</h2>

    <form method="post">
        <input type="submit" name="calcular" value="Calcular">
    </form>

    <br>

    <?php
        if (isset($_POST['calcular'])) {
            for ($i = 1000; $i < 10000; $i++) { 
                $j = (string) $i;

                $x = (int) $j[0] . $j[1];
                $y = (int) $j[2] . $j[3];

                $z = pow($x + $y, 2);

                if ($z == $i) {
                    echo $i . "\n";
                }
            }
        }
    ?>
</body>
</html>
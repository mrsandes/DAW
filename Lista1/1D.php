<!DOCTYPE html>

<html>
<head>
    <title>Exercicio 1</title>
</head>

<body>
    <h2>Exercicio 1</h2>

    <form method="post">
        <input type="submit" name="calcular" value="Calcular">
    </form>

    <br>

    <?php
        if (isset($_POST['calcular'])) {
            $s = 0;
            $x = 1;

            for ($i = 1; $i <= 50; $i++) {
                $s += $x / $i;
                $x += 2;
            }
           
            echo "O valor de S e: " . $s;
        }
    ?>
</body>
</html>

<!DOCTYPE html>

<html>
<head>
    <title>Exercicio 9</title>
</head>

<body>
    <h2>Exercicio 9</h2>

    <form method="post">
        <input type="submit" name="calcular" value="Calcular">
    </form>

    <br>

    <?php
        if (isset($_POST['calcular'])) {
            for ($i = 1; $i <= 10; $i++) { 
                echo "Tabuada do " . $i . ": <br>";

                for ($j = 1; $j <= 10; $j++) { 
                    echo $i * $j . " <br>";
                }
            }
        }
    ?>
</body>
</html>
<!DOCTYPE html>

<html>
<head>
    <title>Exercicio 10</title>
</head>

<body>
    <h2>Exercicio 10</h2>

    <form method="post">
        Digite o valor de n: 
        <input type="number" name="n" required>

        <input type="submit" name="calcular" value="Calcular">
    </form>

    <br>

    <?php
        if (isset($_POST['calcular'])) {
            for ($i = $_POST['n']; $i > 0 ; $i--) { 
                for ($j = $i; $j > 0 ; $j--) { 
                    echo $j . " ";
                }

                echo "<br>";
            }
        }
    ?>
</body>
</html>
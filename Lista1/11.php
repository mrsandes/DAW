<!DOCTYPE html>

<html>
<head>
    <title>Exercicio 11</title>
</head>

<body>
    <h2>Exercicio 11</h2>

    <form method="post">
        Digite um valor menor que 1000: 
        <input type="number" name="valor" required>

        <input type="submit" name="calcular" value="Calcular">
    </form>

    <br>

    <?php
        if (isset($_POST['calcular'])) {
            $valor = $_POST['valor'];

            if ($valor >= 1000) {
                echo "Digite um valor menor que 1000!";
            }

            else {
                echo "Numeros impares maiores que " . $valor . " e menores que 1000: <br>";

                for ($i = $valor + 1; $i < 1000; $i++) { 
                    if ($i % 2 != 0) {
                        echo $i . "<br>";
                    }
                } 
            }
        }
    ?>
</body>
</html>
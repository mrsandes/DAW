<!DOCTYPE html>

<html>
<head>
    <title>Exercicio 12</title>
</head>

<body>
    <h2>Exercicio 12</h2>

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
                echo "Multiplos de " . $valor . " ate 1000: <br>";

                $multiplo = "";
                $i = 0;
    
                do {   
                    if ($multiplo > $valor) {
                        echo $multiplo . "<br>";
                    }

                    $multiplo = $valor * $i;
                    $i++;

                } while ($multiplo < 1000);
            }
        }
    ?>
</body>
</html>
<!DOCTYPE html>

<html>
<head>
    <title>Exercicio 1</title>
</head>

<body>
    <h2>Exercicio 1</h2>

    <form method="post">
        Digite um numero: 
        <input type="number" name="valor" required>

        <input type="submit" name="calcular" value="Calcular">
    </form>

    <br>

    <?php
        function verificaPrimo($valor) {
            if ($valor < 2) {
                return FALSE;
            }

            for ($i = 2; $i < $valor; $i++) { 
                if ($valor % $i == 0) {
                    return FALSE;
                }
            }

            return TRUE;
        }

        if (isset($_POST['calcular'])) {
            if (verificaPrimo($_POST['valor'])) {
                echo "O valor e primo";
            }

            else {
                echo "O valor Nao e primo";
            }
        }
    ?>
</body>
</html>
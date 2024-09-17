<!DOCTYPE html>

<html>
<head>
    <title>Exercicio 7</title>
</head>

<body>
    <h2>Exercicio 7</h2>

    <form method="post">
        Digite 5 valores inteiros: 
        <input type="number" name="valores[]" required>
        <input type="number" name="valores[]" required>
        <input type="number" name="valores[]" required>
        <input type="number" name="valores[]" required>
        <input type="number" name="valores[]" required>

        <input type="submit" name="calcular" value="Calcular">
    </form>

    <br>

    <?php
        if (isset($_POST['calcular'])) {
            $valores = $_POST['valores'];
            $media = 0;

            foreach ($valores as $valor) {
                $media += $valor;
            }

            $media /= count($valores);

            echo "Valores acima da media: ";

            foreach ($valores as $valor) {
                if ($valor > $media) {
                    echo $valor . " ";
                }
            }
        }
    ?>
</body>
</html>

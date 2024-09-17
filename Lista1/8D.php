<!DOCTYPE html>

<html>
<head>
    <title>Exercicio 8</title>
</head>

<body>
    <h2>Exercicio 8</h2>

    <form method="post">
        Digite as 5 notas: 
        <input type="number" name="notas[]" required>
        <input type="number" name="notas[]" required>
        <input type="number" name="notas[]" required>
        <input type="number" name="notas[]" required>
        <input type="number" name="notas[]" required>

        <input type="submit" name="calcular" value="Calcular">
    </form>

    <br>

    <?php
        if (isset($_POST['calcular'])) {
            $notas = $_POST['notas'];
            $media = 0.0;

            foreach ($notas as $valor) {
                $media += $valor;
            }

            $media /= count($notas);

            if ($media >= 7.0) {
                echo "Aprovado";
            }

            else {
                echo "Reprovado";
            }
        }
    ?>
</body>
</html>
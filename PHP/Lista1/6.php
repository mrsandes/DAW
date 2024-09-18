<!DOCTYPE html>

<html>
<head>
    <title>Exercicio 6</title>
</head>

<body>
    <h2>Exercicio 6</h2>

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
            $maior = max($_POST['valores']);
            $menor = min($_POST['valores']);

            echo "O maior valor e: " . $maior . "<br>";
            echo "O menor valor e: " . $menor;
        }
    ?>
</body>
</html>

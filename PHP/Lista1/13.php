<!DOCTYPE html>

<html>
<head>
    <title>Exercicio 13</title>
</head>

<body>
    <h2>Exercicio 13</h2>

    <form method="post">
        Digite a base: 
        <input type="number" name="base" required>

        Digite a potencia: 
        <input type="number" name="potencia" required>

        <input type="submit" name="calcular" value="Calcular">
    </form>

    <br>

    <?php
        if (isset($_POST['calcular'])) {
            echo pow($_POST['base'], $_POST['potencia']);
        }
    ?>
</body>
</html>
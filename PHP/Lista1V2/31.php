<!DOCTYPE html>

<html>
<head>
    <title>Questao 2.1</title>
</head>

<body>
    <h2>Questao 2.1</h2>

    <form method="POST" action="">
        Nome:
        <input type="text" name="valores[]" required>
        <br>

        Nome da mae:
        <input type="text" name="valores[]" required>
        <br>

        Nome do pai:
        <input type="text" name="valores[]" required>
        <br>

        Endereco completo:
        <input type="text" name="valores[]" required>
        <br>

        Data de nascimento:
        <input type="date" name="valores[]" required>
        <br>

        Escolaridade da mae:
        <input type="text" name="valores[]" required>
        <br>

        Escolaridade do pai:
        <input type="text" name="valores[]" required>  
        <br>      

        <input type="submit" name="enviar" value="Enviar">
    </form>

    <br>

    <form method="POST" action="tabela.php">   
        Tabela de alunos:
        <input type="submit" name="calcular" value="Calcular">
    </form>

    <br>

    <?php
        if (isset($_POST['enviar'])) {          
            $arquivo = fopen("alunos.txt", "a");

            foreach ($_POST['valores'] as $valor) {
                fprintf($arquivo, "%s|", $valor);
            }

            fprintf($arquivo, "\n");

            fclose($arquivo);
        }
    ?>
</body>
</html>

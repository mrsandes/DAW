<?php
    session_start();
    require_once("functions.php");
?>

<!DOCTYPE html>

<html>
<head>
    <title>Usuario</title>
</head>

<body>
    <h2>Ola usuario <?php echo $_SESSION['usuarioAtual']['nome'] ?></h2>

    <form method="POST" action="">
        <input type="radio" name="opcoes" value="modificarUsuario"> Modificar nome e senha: <br>

        Novo nome:
        <input type="text" name="novoNome"> <br>
        Nova senha:
        <input type="text" name="novaSenha"> <br>

        <input type="submit" name="enviar" value="Enviar">
    </form>

    <form method="POST" action="index.php">
        <br>

        <input type="submit" name="sair" value="Sair">
    </form>

    <?php
        function modificarUsuario($antigoNome, $novoNome, $novaSenha) {
            foreach ($_SESSION['valores'] as $usuario) {
                if ($usuario['nome'] == $novoNome) {
                    return;
                }
            }

            if ($novoNome == "") {
                $novoNome = $antigoNome;
            } 

            if ($novaSenha == "") {
                foreach ($_SESSION['valores'] as $valor) {
                    if ($valor['nome'] == $antigoNome) {
                        $novaSenha = $valor['senha'];
                    }
                }
            } 

            updateUser($antigoNome, $novoNome, $novaSenha, 0);             

            if ($_SESSION['usuarioAtual']['nome'] == $antigoNome) {
                $_SESSION['usuarioAtual']['nome'] = $novoNome;
                $_SESSION['usuarioAtual']['senha'] = $novaSenha;
            }

            $_SESSION['valores'] = selectPDO();
        }

        if (isset($_POST['enviar']) && isset($_POST['opcoes'])) {
            switch ($_POST['opcoes']) {
                case "modificarUsuario":
                    modificarUsuario($_SESSION['usuarioAtual']['nome'], $_POST['novoNome'], $_POST['novaSenha'], $_SESSION['valores']);
                    header("Location:usuario.php");
                    // echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
                    Exit();
            }
        }
    ?>
</body>
</html>

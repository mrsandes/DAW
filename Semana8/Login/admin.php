<?php
    session_start();
    require_once("functions.php");
?>

<!DOCTYPE html>

<html>
<head>
    <title>Admin</title>
</head>

<body>
    <h2>Ola admin <?php echo $_SESSION['usuarioAtual']['nome'] ?></h2>

    <form method="POST" action="">
        <input type="radio" name="opcoes" value="removerUsuario"> Remover usuario: <br>
        Nome:
        <input type="text" name="remover"> <br> <br>
        
        <input type="radio" name="opcoes" value="modificarUsuario"> Modificar usuario: <br>
        Nome:
        <input type="text" name="antigoNome"> <br>
        Novo nome:
        <input type="text" name="novoNome"> <br>
        Nova senha:
        <input type="text" name="novaSenha"> <br>
        admin?
        <input type="checkbox" name="novoAdmin"> <br>

        <br> <input type="submit" name="enviar" value="Enviar">
    </form>

    <form method="POST" action="index.php">
        <br> <input type="submit" name="sair" value="Sair">
    </form>

    <?php
        function removerUsuario($nome) {    
            if ($_SESSION['usuarioAtual']['nome'] == $nome) {
                return;
            }

            deleteUser($nome);

            $_SESSION['valores'] = selectPDO();
        }

        function modificarUsuario($antigoNome, $novoNome, $novaSenha, $novoAdmin) {
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

            updateUser($antigoNome, $novoNome, $novaSenha, $novoAdmin);             

            if ($_SESSION['usuarioAtual']['nome'] == $antigoNome) {
                $_SESSION['usuarioAtual']['nome'] = $novoNome;
                $_SESSION['usuarioAtual']['senha'] = $novaSenha;
                $_SESSION['usuarioAtual']['admin'] = $novoAdmin;
            }

            $_SESSION['valores'] = selectPDO();
        }

        foreach ($_SESSION['valores'] as $valor) {
            echo $valor['nome'] . " | " . $valor['senha'] . " | " . $valor['admin'] . "<br>";
        }

        if (isset($_POST['enviar']) && isset($_POST['opcoes'])) {
            switch ($_POST['opcoes']) {
                case "removerUsuario":
                    removerUsuario($_POST['remover']);

                    header("Location:admin.php");
                    // echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
                    exit();

                case "modificarUsuario":
                    modificarUsuario($_POST['antigoNome'], $_POST['novoNome'], $_POST['novaSenha'], $_POST['novoAdmin']);

                    header("Location:admin.php");
                    // echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
                    exit();
            }
        }
    ?>
</body>
</html>

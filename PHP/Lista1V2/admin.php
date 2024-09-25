<?php
    session_start();
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
        <input type="text" name="remover"> <br>

        <br>

        <input type="radio" name="opcoes" value="modificarUsuario"> Modificar usuario: <br>

        Nome:
        <input type="text" name="antigoNome"> <br>

        Novo nome:
        <input type="text" name="novoNome"> <br>

        Nova senha:
        <input type="text" name="novaSenha"> <br>

        admin?
        <input type="checkbox" name="novoAdmin"> <br>

        <br>

        <input type="submit" name="enviar" value="Enviar">
    </form>

    <form method="POST" action="32.php">
        <br>

        <input type="submit" name="sair" value="Sair">
    </form>

    <?php
        function removerUsuario($nome, $usuarios) {    
            if ($_SESSION['usuarioAtual']['nome'] == $nome)        {
                return;
            }

            for ($i = 0; $i < count($usuarios); $i++) {
                if ($usuarios[$i]['nome'] == $nome) {
                    array_splice($usuarios, $i, 1);

                    $dados = json_encode($usuarios, JSON_PRETTY_PRINT);
                    file_put_contents(__DIR__ . '/usuarios.json', $dados);

                    break;
                }
            }
        }

        function modificarUsuario($antigoNome, $novoNome, $novaSenha, $novoAdmin, $usuarios) {
            foreach ($usuarios as $usuario) {
                if ($usuario['nome'] == $novoNome) {
                    return;
                }
            }

            for ($i = 0; $i < count($usuarios); $i++) { 
                if ($usuarios[$i]['nome'] == $antigoNome) {
                    if ($novoNome  != "") {
                        $usuarios[$i]['nome'] = $novoNome;
                    } 

                    if ($novaSenha != "") {
                        $usuarios[$i]['senha'] = $novaSenha;
                    } 

                    if ($usuarios[$i]['admin'] != $novoAdmin) {
                        $usuarios[$i]['admin'] = !$usuarios[$i]['admin'];
                    } 

                    $dados = json_encode($usuarios, JSON_PRETTY_PRINT);
                    file_put_contents(__DIR__ . '/usuarios.json', $dados);

                    break;
                }
            }   

            if ($_SESSION['usuarioAtual']['nome'] == $antigoNome) {
                $_SESSION['usuarioAtual']['nome'] = $novoNome;
                $_SESSION['usuarioAtual']['senha'] = $novaSenha;
                $_SESSION['usuarioAtual']['admin'] = $novoAdmin;
            }
        }

        function listaUsuarios($usuarios) {
            foreach ($usuarios as $usuario) {
                echo "Nome: " . $usuario['nome'] . "<br>";
                echo "Senha: " . $usuario['senha'] . "<br>";
                echo "Admin: " . $usuario['admin'] . "<br><br>";
            }
        }

        $usuarios = json_decode(file_get_contents(__DIR__ . '/usuarios.json'), true);

        listaUsuarios($usuarios);

        if (isset($_POST['enviar'])) {
            switch ($_POST['opcoes']) {
                case "removerUsuario":
                    removerUsuario($_POST['remover'], $usuarios);
                    header("Refresh: 0");

                case "modificarUsuario":
                    modificarUsuario($_POST['antigoNome'], $_POST['novoNome'], $_POST['novaSenha'], $_POST['novoAdmin'], $usuarios);
                    header("Refresh: 0");
            }
        }
    ?>
</body>
</html>

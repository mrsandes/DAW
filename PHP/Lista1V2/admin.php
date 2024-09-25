<!DOCTYPE html>

<html>
<head>
    <title>Admin</title>
</head>

<body>
    <h2>Pagina do Admin</h2>

    <form method="POST" action="">
        <input type="radio" name="opcoes" value="removerUsuario"> Remover usuario: <br>
        Nome:
        <input type="text" name="remover"> <br>

        <br>

        <input type="radio" name="opcoes" value="modificarUsuario"> Modificar usuario: <br>
        Antigo nome:
        <input type="text" name="antigoNome"> <br>
        Novo nome:
        <input type="text" name="novoNome"> <br>
        Nova senha:
        <input type="text" name="novaSenha"> <br>
        Novo admin:
        <input type="checkbox" name="novoAdmin"> <br>

        <br>

        <input type="submit" name="enviar" value="Enviar">
    </form>

    <?php
        function removerUsuario($nome, $usuarios) {    
            $usuarioEncontrado = false;
        
            for ($i = 0; $i < count($usuarios); $i++) {
                if ($usuarios[$i]['nome'] == $nome) {
                    array_splice($usuarios, $i, 1);

                    $usuarioEncontrado = true;
                    break;
                }
            }
        
            if ($usuarioEncontrado) {
                $dados = json_encode($usuarios, JSON_PRETTY_PRINT);
                file_put_contents(__DIR__ . '/usuarios.json', $dados);
            }
        }

        function modificarUsuario($antigoNome, $novoNome, $novaSenha, $novoAdmin, $usuarios) {
            foreach ($usuarios as $usuario) {
                if ($usuario['nome'] == $novoNome) {
                    return;
                }
            }

            $usuarioEncontrado = false;

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

                    $usuarioEncontrado = true;
               }
            }

            if ($usuarioEncontrado) {
                $dados = json_encode($usuarios, JSON_PRETTY_PRINT);
                file_put_contents(__DIR__ . '/usuarios.json', $dados);
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

<?php
    session_start();

    unset($_SESSION['usuarioAtual']);
?>

<!DOCTYPE html>

<html>
<head>
    <title>Questao 3.2</title>
</head>

<body>
    <main class="main">
        <h2>Questao 3.2</h2>

        <form method="POST" action="">
            <input type="text" name="nome" placeholder="Nome" required> <br>

            <input type="text" name="senha" placeholder="Senha" required> <br>     

            <div class="button">
                <input type="submit" name="cadastrar" value="Cadastrar">
                <input type="submit" name="entrar" value="Entrar">
            </div>
        </form>
    </main>
   
    <?php
        $usuarios = json_decode(file_get_contents(__DIR__ . '/usuarios.json'), true);

        if (isset($_POST['entrar']) || isset($_POST['cadastrar'])) {
            $_SESSION['usuarioAtual'] = [
                'nome' => $_POST['nome'],
                'senha' => $_POST['senha'],
                'admin' => false
            ];
        }

        if (isset($_POST['entrar'])) {
            $usuarioEncontrado = false;
        
            foreach ($usuarios as $usuario) {
                if ($_SESSION['usuarioAtual']['nome'] == $usuario['nome']) {
                    $usuarioEncontrado = true;
        
                    if ($_SESSION['usuarioAtual']['senha'] == $usuario['senha'] && $usuario['admin']) {
                        echo "<meta HTTP-EQUIV='refresh' CONTENT='0; URL=admin.php'>";
                        Exit();
                    } 
                    
                    elseif ($_SESSION['usuarioAtual']['senha'] == $usuario['senha'] && !$usuario['admin']) {
                        echo "<meta HTTP-EQUIV='refresh' CONTENT='0; URL=usuario.php'>";
                        Exit();
                    } 
                    
                    else {
                        echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
                        Exit();
                    }
        
                    break;
                }
            }

            if (!$usuarioEncontrado) {    
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
                Exit();
            }
        }

        if (isset($_POST['cadastrar'])) {
            $usuarioExiste = false;
            
            foreach ($usuarios as $usuario) {
                if ($_SESSION['usuarioAtual']['nome'] == $usuario['nome']) {
                    $usuarioExiste = true;

                    echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
                    Exit();
                }
            }

            if (!$usuarioExiste) {
                $usuarios[] = $_SESSION['usuarioAtual'];

                $dados = json_encode($usuarios, JSON_PRETTY_PRINT);
                file_put_contents(__DIR__ . '/usuarios.json', $dados);

                echo "<meta HTTP-EQUIV='refresh' CONTENT='0; URL=usuario.php'>";
                Exit();
            }
        }
    ?>
</body>
</html>

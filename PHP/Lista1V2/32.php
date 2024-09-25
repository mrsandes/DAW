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
    <h2>Questao 3.2</h2>

    <form method="POST" action="">
        Nome:
        <input type="text" name="nome" required>

        Senha:
        <input type="text" name="senha" required>      

        <input type="submit" name="cadastrar" value="Cadastrar">
        
        <input type="submit" name="entrar" value="Entrar">
    </form>

    <?php
        $usuarios = json_decode(file_get_contents(__DIR__ . '/usuarios.json'), true);

        if (isset($_POST['entrar']) || isset($_POST['cadastrar']))

        $_SESSION['usuarioAtual'] = [
            'nome' => $_POST['nome'],
            'senha' => $_POST['senha'],
            'admin' => false
        ];

        if (isset($_POST['entrar'])) {
            $usuarioEncontrado = false;
        
            foreach ($usuarios as $usuario) {
                if ($_SESSION['usuarioAtual']['nome'] == $usuario['nome']) {
                    $usuarioEncontrado = true;
        
                    if ($_SESSION['usuarioAtual']['senha'] == $usuario['senha'] && $usuario['admin']) {
                        header("location: admin.php");
                    } 
                    
                    elseif ($_SESSION['usuarioAtual']['senha'] == $usuario['senha'] && !$usuario['admin']) {
                        header("location: usuario.php");
                    } 
                    
                    else {
                        header("location: 32.php");
                    }
        
                    break;
                }
            }

            if (!$usuarioEncontrado) {    
                header("location: 32.php");
            }
        }

        if (isset($_POST['cadastrar'])) {
            $usuarioExiste = false;
            
            foreach ($usuarios as $usuario) {
                if ($_SESSION['usuarioAtual']['nome'] == $usuario['nome']) {
                    $usuarioExiste = true;

                    header("location: 32.php");
                }
            }

            if (!$usuarioExiste) {
                $usuarios[] = $_SESSION['usuarioAtual'];

                $dados = json_encode($usuarios, JSON_PRETTY_PRINT);
                file_put_contents(__DIR__ . '/usuarios.json', $dados);

                header("location: usuario.php");
            }
        }
    ?>
</body>
</html>

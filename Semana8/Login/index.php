<?php
    session_start();
    require_once("functions.php");

    unset($_SESSION['usuarioAtual']);
?>

<!DOCTYPE html>

<html>
<head>
    <title>Login</title>
</head>

<body>
    <main class="main">
        <p>Usuário root para teste: admin 123</p>

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
        $_SESSION['valores'] = selectPDO();

        foreach ($_SESSION['valores'] as $valor) {
            echo $valor['nome'] . " | " . $valor['senha'] . " | " . $valor['admin'] . "<br>";
        }
        
        if (isset($_POST['entrar']) || isset($_POST['cadastrar'])) {
            $_SESSION['usuarioAtual'] = [
                'nome' => $_POST['nome'],
                'senha' => $_POST['senha'],
                'admin' => 0
            ];
        }

        if (isset($_POST['entrar'])) {
            $usuarioEncontrado = false;

            foreach ($_SESSION['valores'] as $usuario) {
                if ($_SESSION['usuarioAtual']['nome'] == $usuario['nome']) {
                    $usuarioEncontrado = true;
        
                    if ($_SESSION['usuarioAtual']['senha'] == $usuario['senha'] && $usuario['admin']) {
                        // header("Location:admin.php");
                        echo "<meta HTTP-EQUIV='refresh' CONTENT='0; URL=admin.php'>";
                        exit();
                    } 
                    
                    elseif ($_SESSION['usuarioAtual']['senha'] == $usuario['senha'] && !$usuario['admin']) {
                        // header("Location:usuario.php");
                        echo "<meta HTTP-EQUIV='refresh' CONTENT='0; URL=usuario.php'>";
                        exit();
                    } 
                    
                    else {
                        header("Location:index.php");
                        // echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
                        exit();
                    }
        
                    break;
                }
            }

            if (!$usuarioEncontrado) {    
                header("Location:index.php");
                // echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
                exit();
            }
        }

        if (isset($_POST['cadastrar'])) {
            $usuarioExiste = false;
            
            foreach ($_SESSION['valores'] as $usuario) {
                if ($_SESSION['usuarioAtual']['nome'] == $usuario['nome']) {
                    $usuarioExiste = true;
                    
                    header("Location:index.php");
                    // echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
                    exit();
                }
            }

            if (!$usuarioExiste) {
                insertUser($_SESSION['usuarioAtual']['nome'], $_SESSION['usuarioAtual']['senha'], $_SESSION['usuarioAtual']['admin']);

                header("Location:usuario.php");
                // echo "<meta HTTP-EQUIV='refresh' CONTENT='0; URL=usuario.php'>";
                exit();
            }
        }
    ?>
</body>
</html>

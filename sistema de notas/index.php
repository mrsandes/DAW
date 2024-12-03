<?php
    session_start();
    require_once("functions.php");

    unset($_SESSION['usuarioAtual']);
?>

<!DOCTYPE html>

<html>
<head>
    <title>Sistema de notas</title>
</head>

<body>
    <main class="main">
        <form method="POST" action="" style="text-align: center;">
            <input type="text" name="nome" placeholder="Nome" required> <br>

            <input type="text" name="senha" placeholder="Senha" required> <br>      

            <div class="button">
                <input type="submit" name="cadastrar" value="Cadastrar">
                <input type="submit" name="entrar" value="Entrar">
            </div>
        </form>
    </main>
   
    <?php
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=a2022951047@teiacoltec.org", "a2022951047@teiacoltec.org", "coltec2024");
        $tabela1 = "LoginSistemaDeNotas2024";
        $tabela2 = "Notas2024";

        $_SESSION['logins'] = selectPDO($pdo, $tabela1);

        echo "<p style='text-align: center;'>Todos os alunos tem a senha padrão '123'<br>Para teste do sistema de professores utilize 'Professor' '123'</p>";

        printTable(selectFromTable($pdo, $tabela2, ["Nome", "Matricula", "Turma"], "Turma, Nome", "", "", ""));
        
        if (isset($_POST['entrar']) || isset($_POST['cadastrar'])) {
            $_SESSION['usuarioAtual'] = [
                'nome' => $_POST['nome'],
                'senha' => $_POST['senha'],
                'admin' => 0
            ];
        }

        if (isset($_POST['entrar'])) {
            $usuarioEncontrado = false;

            foreach ($_SESSION['logins'] as $usuario) {
                if ($_SESSION['usuarioAtual']['nome'] == $usuario['nome']) {
                    $usuarioEncontrado = true;
        
                    if ($_SESSION['usuarioAtual']['senha'] == $usuario['senha'] && $usuario['admin']) {
                        // header("Location:professor.php");
                        echo "<meta HTTP-EQUIV='refresh' CONTENT='0; URL=professor.php'>";
                        exit();
                    } 
                    
                    elseif ($_SESSION['usuarioAtual']['senha'] == $usuario['senha'] && !$usuario['admin']) {
                        // header("Location:aluno.php");
                        echo "<meta HTTP-EQUIV='refresh' CONTENT='0; URL=aluno.php'>";
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
            
            foreach ($_SESSION['logins'] as $usuario) {
                if ($_SESSION['usuarioAtual']['nome'] == $usuario['nome']) {
                    $usuarioExiste = true;
                    
                    header("Location:index.php");
                    // echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
                    exit();
                }
            }

            if (!$usuarioExiste) {
                insertUser($pdo, $tabela1, $_SESSION['usuarioAtual']['nome'], $_SESSION['usuarioAtual']['senha'], $_SESSION['usuarioAtual']['admin']);

                header("Location:aluno.php");
                // echo "<meta HTTP-EQUIV='refresh' CONTENT='0; URL=aluno.php'>";
                exit();
            }
        }
    ?>
</body>
</html>

<?php
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=a2022951047@teiacoltec.org", "a2022951047@teiacoltec.org", "coltec2024");

    function selectPDO() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM Login");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function insertUser($nome, $senha, $admin) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO Login(nome, senha, admin) VALUES(?, ?, ?)");
        $stmt->execute([$nome, $senha, $admin]);
    }

    function updateUser($antigoNome, $novoNome, $novaSenha, $novoAdmin) {
        global $pdo;
        $novoAdmin = ($novoAdmin !== 0 && $novoAdmin !== 1) ? 0 : $novoAdmin;

        $stmt = $pdo->prepare("UPDATE Login SET nome = ?, senha = ?, admin = ? WHERE nome = ?");
        $stmt->execute([$novoNome, $novaSenha, $novoAdmin, $antigoNome]);
    }

    function deleteUser($nome) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM Login WHERE nome = ?");
        $stmt->execute([$nome]);
    }

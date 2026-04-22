<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuarios = lerUsuarios();
    $novo = [
        "id" => time(),
        "nome" => $_POST['nome'],
        "email" => $_POST['email'],
        "cargo" => $_POST['cargo']
    ];
    $usuarios[] = $novo;
    salvarUsuarios($usuarios);
    header("Location: usuarios_listar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Cadastrar Gestor</title></head>
<body>
    <h2>Registar Novo Gestor</h2>
    <form method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>
        
        <label>E-mail:</label><br>
        <input type="email" name="email" required><br><br>
        
        <label>Cargo:</label><br>
        <input type="text" name="cargo" required><br><br>

        <button type="submit">Guardar Utilizador</button>
        <a href="index.php">Voltar</a>
    </form>
</body>
</html>

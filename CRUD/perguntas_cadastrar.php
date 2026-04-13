<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $perguntas = lerPerguntas();
    $nova = [
        "id" => time(),
        "tipo" => $_POST['tipo'],
        "enunciado" => $_POST['enunciado'],
        "respostas" => ($_POST['tipo'] == 'multipla') ? $_POST['opcoes'] : $_POST['resposta_texto']
    ];
    $perguntas[] = $nova;
    salvarPerguntas($perguntas);
    header("Location: perguntas_listar.php");
}

$tipo = $_GET['tipo'] ?? 'multipla';
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Cadastrar Pergunta: <?php echo ucfirst($tipo); ?></h2>
    <form method="POST">
        <input type="hidden" name="tipo" value="<?php echo $tipo; ?>">
        <label>Enunciado:</label><br>
        <textarea name="enunciado" required></textarea><br><br>

        <?php if ($tipo == 'multipla'): ?>
            <label>Opções (uma por linha):</label><br>
            <textarea name="opcoes[]" placeholder="Opção A"></textarea><br>
            <textarea name="opcoes[]" placeholder="Opção B"></textarea><br>
            <textarea name="opcoes[]" placeholder="Opção C"></textarea><br>
        <?php else: ?>
            <label>Resposta Correta (Texto):</label><br>
            <input type="text" name="resposta_texto" required><br>
        <?php endif; ?>

        <br><button type="submit">Salvar Pergunta</button>
        <a href="index.php">Voltar</a>
    </form>
</body>
</html>

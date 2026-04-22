<?php
require_once 'config.php';
$id = $_GET['id'] ?? null;
$pergunta = buscarPorId($id);

if (!$pergunta) {
    header("Location: perguntas_listar.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $perguntas = lerPerguntas();
    foreach ($perguntas as &$p) {
        if ($p['id'] == $id) {
            $p['enunciado'] = $_POST['enunciado'];
            $p['respostas'] = ($p['tipo'] == 'multipla') ? $_POST['opcoes'] : $_POST['resposta_texto'];
        }
    }
    salvarPerguntas($perguntas);
    header("Location: perguntas_listar.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Editar Pergunta</title></head>
<body>
    <h2>Editar Pergunta (<?php echo ucfirst($pergunta['tipo']); ?>)</h2>
    <form method="POST">
        <label>Enunciado:</label><br>
        <textarea name="enunciado" required><?php echo $pergunta['enunciado']; ?></textarea><br><br>

        <?php if ($pergunta['tipo'] == 'multipla'): ?>
            <label>Opções:</label><br>
            <?php foreach ($pergunta['respostas'] as $idx => $opcao): ?>
                <input type="text" name="opcoes[]" value="<?php echo $opcao; ?>" required><br>
            <?php endforeach; ?>
        <?php else: ?>
            <label>Resposta Correta (Texto):</label><br>
            <input type="text" name="resposta_texto" value="<?php echo $pergunta['respostas']; ?>" required><br>
        <?php endif; ?>

        <br><button type="submit">Salvar Alterações</button>
        <a href="perguntas_listar.php">Cancelar</a>
    </form>
</body>
</html>

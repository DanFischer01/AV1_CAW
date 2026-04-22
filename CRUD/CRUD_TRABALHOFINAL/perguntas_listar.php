<?php
require_once 'config.php';
$perguntas = lerPerguntas();
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Lista de Perguntas</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Enunciado</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($perguntas as $p): ?>
        <tr>
    <td><?php echo $p['id']; ?></td>
    <td><?php echo ($p['tipo'] == 'multipla' ? 'Múltipla' : 'Texto'); ?></td>
    <td><?php echo htmlspecialchars(substr($p['enunciado'], 0, 50)) . '...'; ?></td>
    <td>
        <a href="pergunta_detalhe.php?id=<?php echo $p['id']; ?>">Visualizar</a> | 
        <a href="perguntas_editar.php?id=<?php echo $p['id']; ?>">Editar</a> | 
        <a href="perguntas_excluir.php?id=<?php echo $p['id']; ?>" 
           onclick="return confirm('Tem certeza que deseja excluir esta pergunta?')">Excluir</a>
    </td>
</tr>
        <?php endforeach; ?>
    </table>
    <br><a href="index.php">Voltar ao Menu</a>
</body>
</html>

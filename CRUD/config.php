<?php
$arquivo = 'perguntas.txt';

function lerPerguntas() {
    global $arquivo;
    if (!file_exists($arquivo)) return [];
    $conteudo = file_get_contents($arquivo);
    return json_decode($conteudo, true) ?: [];
}

function salvarPerguntas($perguntas) {
    global $arquivo;
    file_put_contents($arquivo, json_encode(array_values($perguntas), JSON_PRETTY_PRINT));
}

function buscarPorId($id) {
    $perguntas = lerPerguntas();
    foreach ($perguntas as $p) {
        if ($p['id'] == $id) return $p;
    }
    return null;
}
?>

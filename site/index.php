<?php
require __DIR__ . '/conexao.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    if ($titulo !== '' && $descricao !== '') {
        $stmt = $pdo->prepare("INSERT INTO chamados (titulo, descricao, status) VALUES (?, ?, 'Aberto')");
        $stmt->execute([$titulo, $descricao]);
        header('Location: index.php');
        exit;
    }
}
$chamados = $pdo->query('SELECT * FROM chamados ORDER BY criado_em DESC, id DESC')->fetchAll();
$total = count($chamados);
$abertos = count(array_filter($chamados, fn($c) => $c['status'] === 'Aberto'));
$resolvidos = count(array_filter($chamados, fn($c) => $c['status'] === 'Resolvido'));
function e($x) { return htmlspecialchars((string)$x, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>HelpDesk Escolar</title><link rel="stylesheet" href="estilo.css"></head>
<body>
<header><h1>🖥️ HelpDesk Escolar</h1><p>Sistema de chamados de suporte técnico</p></header>
<main>
<section class="resumo"><div><strong><?= $total ?></strong><span>Total</span></div><div><strong><?= $abertos ?></strong><span>Abertos</span></div><div><strong><?= $resolvidos ?></strong><span>Resolvidos</span></div></section>
<section class="painel"><h2>Abrir chamado</h2><form method="post"><label>Título<input name="titulo" maxlength="150" required placeholder="Ex.: Impressora não imprime"></label><label>Descrição<textarea name="descricao" required placeholder="Descreva o problema"></textarea></label><button type="submit">Cadastrar chamado</button></form></section>
<section class="painel"><h2>Chamados registrados</h2><div class="lista"><?php foreach ($chamados as $c): ?><article><div><h3><?= e($c['titulo']) ?></h3><p><?= nl2br(e($c['descricao'])) ?></p><small>#<?= (int)$c['id'] ?> · <?= e($c['criado_em']) ?></small></div><span class="status"><?= e($c['status']) ?></span></article><?php endforeach; ?><?php if (!$chamados): ?><p>Nenhum chamado cadastrado.</p><?php endif; ?></div></section>
</main>
</body></html>

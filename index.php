<?php
$numero = isset($_POST['numero']) ? (int) $_POST['numero'] : rand(1, 100);
$acertos = isset($_POST['acertos']) ? (int) $_POST['acertos'] : 0;
$resultado = "";
$novo_numero = $numero;

if (isset($_POST['resposta'])) {
    $correto = ($numero % 2 === 0) ? "par" : "impar";
    if ($_POST['resposta'] === $correto) {
        $acertos++;
        $resultado = "Correto!";
    } else {
        $resultado = "Errado!";
    }
    $novo_numero = rand(1, 100);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Par ou Impar</title>
</head>
<body>

    <p>Acertos: <?= $acertos ?></p>

    <h1><?= $novo_numero ?></h1>

    <form method="POST">
        <input type="hidden" name="numero"   value="<?= $novo_numero ?>">
        <input type="hidden" name="acertos"  value="<?= $acertos ?>">
        <input type="hidden" name="resposta" value="par">
        <button type="submit">Par</button>
    </form>

    <form method="POST">
        <input type="hidden" name="numero"   value="<?= $novo_numero ?>">
        <input type="hidden" name="acertos"  value="<?= $acertos ?>">
        <input type="hidden" name="resposta" value="impar">
        <button type="submit">Impar</button>
    </form>

    <?php if ($resultado): ?>
        <p><?= $resultado ?></p>
    <?php endif; ?>

</body>
</html>
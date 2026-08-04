<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 2 - Cadastro</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 40px auto; padding: 0 20px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box; }
        button { margin-top: 20px; padding: 10px 20px; }
        a { display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Simulador de Cadastro</h1>

    <form method="POST" action="processar.php">
        <label for="nome">Nome completo:</label>
        <input type="text" name="nome" id="nome" required>

        <label for="email">E-mail:</label>
        <input type="text" name="email" id="email" required>

        <label for="idade">Idade:</label>
        <input type="text" name="idade" id="idade" required>

        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" id="cidade" required>

        <button type="submit">Cadastrar</button>
    </form>

    <a href="../index.php">&larr; Voltar ao menu</a>
</body>
</html>

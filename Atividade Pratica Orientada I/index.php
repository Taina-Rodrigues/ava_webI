<?php
// Página inicial - Menu de navegação entre as atividades
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>AVA Web I - Atividades PHP</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 700px; margin: 40px auto; padding: 0 20px; background: #f4f6f8; }
        h1 { color: #2c3e50; }
        ul { list-style: none; padding: 0; }
        li { margin: 10px 0; }
        a { display: block; padding: 15px 20px; background: #3498db; color: #fff; text-decoration: none; border-radius: 6px; transition: background 0.2s; }
        a:hover { background: #2980b9; }
    </style>
</head>
<body>
    <h1>AVA Web I - Atividades em PHP</h1>
    <p>Selecione uma atividade para acessar:</p>
    <ul>
        <li><a href="atividade1/index.php">Atividade 1 - Sistema de Classificação Acadêmica</a></li>
        <li><a href="atividade2/cadastro.php">Atividade 2 - Simulador de Cadastro via Formulário</a></li>
        <li><a href="atividade3/login.php">Atividade 3 - Sistema de Login com Área Restrita</a></li>
        <li><a href="atividade4/cookie.php">Atividade 4 - Controle de Acesso com Cookies</a></li>
        <li><a href="atividade5/login.php">Atividade 5 - Desafio Integrador</a></li>
    </ul>
</body>
</html>

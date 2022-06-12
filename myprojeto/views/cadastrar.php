<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="<?php echo BASE; ?>assets/css/login.css">
</head>
<body>
    <section>
        <h1 class="cadastrar_h1">Cadastrar</h1>
        <form method="post" enctype="multipart/form-data">
            <?php if(!empty($erro)): ?>
                <div class="erro"><?php echo $erro; ?></div>
            <?php endif; ?>
            <label for="nome">Nome</label><br>
            <input type="text" name="nome" id="nome" required><br>
            <label for="email">E-mail</label><br>
            <input type="email" name="email" id="email" required><br>
            <label for="password">Senha</label><br>
            <input type="password" name="password" id="password" required><br>
            
            <input type="submit" value="Cadastrar">
        </form>
        <div class="cadastrar"><a href="<?php echo BASE; ?>login">Fazer login ? </a></div>
    </section>
</body>
</html>
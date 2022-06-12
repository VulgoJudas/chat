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
        <h1 class="">Editar</h1>
        <form method="post" enctype="multipart/form-data">
            <label for="nome">Nome</label><br>
            <input type="text" name="nome" id="nome"><br>
            <label for="password">Senha</label><br>
            <input type="password" name="password" id="password"><br>
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto"><br><br>
            
            <input type="submit" value="Salvar">
        </form>
        <div class="cadastrar"><a href="<?php echo BASE; ?>home/perfil/<?php echo $id['id']; ?>">Voltar Para O perfil</a></div>
    </section>
</body>
</html>
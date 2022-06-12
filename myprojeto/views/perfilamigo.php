<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat</title>
    <link rel="stylesheet" href="<?php echo BASE; ?>assets/css/perfil.css">
</head>
<body>
    <section>
        <a class="back" href="<?php echo BASE; ?>home/usersearch/<?php echo $perfil['id']; ?>">Voltar</a>
        <img src="<?php echo BASE; ?>assets/images/media/<?php echo $perfil['photo']; ?>" alt="Foto Do Usuário">
        <span><?php echo $perfil['email']; ?></span>
        <span><?php echo $perfil['name']; ?></span>
        
    </section>
</body>
</html>
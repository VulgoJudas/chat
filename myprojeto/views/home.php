<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="<?php echo BASE; ?>assets/css/home.css">
</head>
<body>
    <main>
        <div class="user">
            <a href="<?php echo BASE; ?>home/perfil/<?php echo $infoUser['id']; ?>"><img src="<?php echo BASE; ?>assets/images/media/<?php echo $infoUser['photo']; ?>" alt="foto do Usuário"></a>
            <a href="<?php echo BASE; ?>home/perfil/<?php echo $infoUser['id']; ?>"><span class="nome"><?php echo $infoUser['name']; ?></span></a>
            <a class="sair" href="<?php echo BASE; ?>home/logout">Sair</a>
        </div>
        <div class="busca_div">
            <input type="text" name="busca" id="busca" data-type="search" placeholder="Pesquisar...">
            
        </div>
    </main>
    <script src="<?php echo BASE; ?>assets/js/jquery-3.3.1.min.js"></script>
    <script> var BASE='<?php echo BASE; ?>';</script>
    <script src="<?php echo BASE; ?>assets/js/search.js"></script>
</body>
</html>
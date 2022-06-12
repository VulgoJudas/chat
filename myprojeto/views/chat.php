<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="<?php echo BASE; ?>assets/css/chat.css">
</head>
<body>
    <section>
        <div class="infoFriend">
            <a href="<?php echo BASE; ?>">Voltar</a>
            <a href="<?php echo BASE; ?>home/userFriend/<?php echo $getinfoFriend['id']; ?>">
                <img src="<?php echo BASE; ?>assets/images/media/<?php echo $getinfoFriend['photo']; ?>" alt="Foto Do Usuário">
                <span><?php echo $getinfoFriend['name']; ?></span>
            </a>
        </div>
        <div class="conversa">
            <div class="start">Iniciar</div>
        </div>
        <div class="mensagens">
            <input type="text" name="msg" id="msg">
            <input type="submit" id="enter" value="Enviar">
        </div>
    </section>
    <script src="<?php echo BASE; ?>assets/js/jquery-3.3.1.min.js"></script>
    <script> var BASE='<?php echo BASE; ?>';</script>
    <script> var AMIGO='<?php echo $getinfoFriend['id']; ?>';</script>
    <script> var myhash='<?php echo $_SESSION['logado']; ?>';</script>
    <script src="<?php echo BASE; ?>assets/js/msg.js"></script>
</body>
</html>
<?php
session_start();
require_once('controles/usuarios.php');
if (!checarUsuario()) {
?>

<!doctype html>

<html lang="pt-BR">
<head><meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | TOP PREMIUM</title>
    <link href="css/login.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/logo.png">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <form id="login" class="form-signin">
        <img class="mx-auto d-block mb-4" src="https://i.imgur.com/3BIjpUt.png" alt="" height="108">
        <label for="inputEmail" class="sr-only">Usuário</label>
        <input name="usuario" type="text" id="inputEmail" class="form-control" placeholder="Usuário" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
        <!--<div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Lembre-se
        </label>
        </div> -->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    </form>
<!-- Alerta Inicio -->
<div class="modal fade" id="alerta" tabindex="-1" role="dialog" aria-labelledby="Alerta" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
      <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="text-center">
        <h5 id="textoAlerta" class="h5"></h5> 
        </div>
      </div>
    </div>
    
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e95f80635bcbb0c9ab109d7/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    
  </div>
</div>
<!-- Alerta Fim-->
</body>
<script>
// if (location.protocol != 'https:')
// {
//   location.href = 'https:' + window.location.href.substring(window.location.protocol.length);
// }

    $( "#login" ).submit(function( event ) {
        $.ajax({
            type: "POST",
            url: "controles/login.php",
            data: $("#login").serialize(),
            success: function(data) {
                location = "lista.php";
            },
            error: function(data) {
                $("#textoAlerta").text(data.responseText);
                $("#alerta").modal();
            }
        });
        event.preventDefault();
    });
</script>
</html>
<?php
} else {
    header("Location: lista.php");
    die();
}
?>
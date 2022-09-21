<?php
session_start();
require_once("controles/usuarios.php");
require_once("controles/listas.php");
if (checarUsuario()) {
require_once("cabecalho.php");
$logs = listarLogs($_GET['id_usuario']);
?>
        <div id="conteudo-painel" class="container">
<?php if ($logs) { ?>
                <div class="mb-5 form-group float-left">
                    <input type="text" class="pesquisar form-control" placeholder="Pesquisar...">
                </div>  
                <table class='table table-bordered table-hover'>
                    <caption>Usuários</caption>
                    <thead class="thead-light">
                        <tr>
                            <th class='nomecol' scope="col" >Canal</th>
                            <th class='nomecol' scope="col" >Data</th>
                        </tr>
                    </thead>
                <tbody id="conteudo">
<?php foreach($logs as $log) { ?>
                        <tr>
                            <td > <?=$log['canal']?> </td>
                            <td> <?=$log['data']?> </td>
                        </tr>
<?php } ?>
                    </tbody>
                </table>
        <?php
        }
        ?>
            <div class="h3 mt-5 row align-items-center justify-content-center">
                <i onclick="$('#cadastro').modal()" class="btn btn-outline-info text-dark fas fa-plus"></i>
            </div>
        </div>
    </div>

  </main>
  <!-- page-content" -->
</div>
</body>
<?php require_once("comum.php"); 
require_once("alerta.php");?>

</html>
<?php 
} else {
    header("Location: index.php");
    die();
}
?>
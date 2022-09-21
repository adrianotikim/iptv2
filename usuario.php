<?php
session_start();
require_once("controles/usuarios.php");
require_once("controles/listas.php");
if (checarUsuario()) {
require_once("cabecalho.php");
$usuarios = listarUsuarios();
$listas = listarListas();
?>
	<style id="checkme">
	.page-2content {
	    padding-left: 240px !important;
	}
	</style>
        <div id="conteudo-painel" style="padding-left: 0px;" class="table-responsive container">
<?php if ($usuarios) { ?>
                <div class="mb-5 form-group float-left">
                    <input type="text" class="pesquisar form-control" placeholder="Pesquisar...">
                </div>  
                <table class='table table-bordered table-hover'>
                    <caption>Usuários</caption>
                    <thead class="thead-light">
                        <tr>
                            <th class='nomecol' scope="col">Nome</th>
                            <th class='nomecol' scope="col">Login</th>
                            <th class='nomecol' scope="col">Estado</th>
                            <?php if($_SESSION['admin']) { ?> <th class='nomecol' scope="col" >Administrador</th> <?php } ?>
                            <th class='nomecol' scope="col">Contato</th>
                            <th class='nomecol' scope="col">Criador</th>
			    <th class='nomecol' scope="col">Vendedor<th>
			    <th class='nomecol' scope="col">Ações</th>
                        </tr>
                    </thead>
                <tbody id="conteudo">
<?php foreach($usuarios as $usuario) { ?>
                        <tr>
                            <td > <?=$usuario['nome_usuario']?> </td>
                            <td> <?=$usuario['login_usuario']?> </td>
                            <td> 
                                <?php if ($usuario['estado_usuario'] == 1) {echo "Ativo";} else {echo "Desativado";} ?> 
                            </td>
                            <?php if($_SESSION['admin']) { ?>
                            <td> 
                                <?php if ($usuario['admin'] == 1) {echo "Sim";} else {echo "Não";} ?> 
                            </td>
                            <?php } ?>
                            <td> 
                                <?=$usuario['contato_usuario']?> 
                            </td>
                            <td> 
                                <?php echo $usuario['criador'] ? $usuario['criador']['nome_usuario'] : 'Sistema'; ?> 
                            </td>
			    <td> <?php echo $usuario['vendedor'] == '1' ? "Sim" : "Nao"; ?> </td>
                            <td style="display: contents;">
<div class="dropdown">
<style>.no-zero { padding-top: 0px; padding-bottom: 0px; position: relative; }</style>
   <button class="btn" type="button" data-toggle="dropdown" aria-expanded="false" style="top: 3px; margin: 0 auto; position: relative; display: block">Ações<span class="fa fa-caret-down" style="left: 4px; position: relative" aria-hidden="true"></span></button>
   <style>.pointer { cursor: pointer; }</style>
   <ul class="no-zero dropdown-menu pointer" x-placement="bottom-start">
      <li><a onclick="editarConfirma('<?php echo $usuario['dia']; ?>', '<?=$usuario['id_usuario']?>','<?=$usuario['nome_usuario']?>','<?=$usuario['contato_usuario']?>','<?=$usuario['login_usuario']?>','<?=$usuario['estado_usuario']?>','<?=$usuario['admin']?>', '<?=$usuario['vendedor']?>', [<?php foreach (listasUsuario($usuario['id_usuario']) as $lista) echo $lista['id_lista'] .',' ?> ])" style="width: 100%;display: block;padding: 5px;top: -10px;">Editar</a></li>
      <li><a onclick="verLogs('<?=$usuario['id_usuario']?>')" style="width: 100%; display: block; padding: 5px">Logs</a></li>
      <?php if($usuario['vendedor'] == 1 || ($usuario['admin'] == '1' && $_SESSION['original'] == $usuario['id_usuario'] && $_SESSION['admin'] == '0')){ ?>
        <li><a onclick="logar(<?php echo $usuario['id_usuario']; ?>);" style="width: 100%; display: block; padding: 5px">Logar</a></li>
      <?php } ?>
      <li class="divider" style="
         border: 0.3px solid #9c9393;
      "></li>
      <?php if($usuario['admin'] == '0' && ($_SESSION['admin'] || $_SESSION['vendedor'])){ ?>
	<li><a onclick="removerConfirma('<?=$usuario['id_usuario']?>', '<?=$usuario['nome_usuario']; ?>')" style="width: 100%; display: block; padding: 5px">Remover</a></li>
      <?php } ?>
   </ul>
</div>
                            </td>
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
<!-- Cadastro Inicio -->
<div class="modal fade" id="cadastro" tabindex="-1" role="dialog" aria-labelledby="Cadastrar" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalLongoExemplo">Adicionar Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="cadastro-form">
            <div class="container">
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome do usuário" required autofocus>
                </div>
                <div class="form-group">
                    <label>Login:</label>
                    <input type="text" class="form-control" name="login" placeholder="Identificação do usuário" required>
                    <small class="form-text text-muted">Único para cada usuário!</small>
                </div>
                <div id="sC">
                    <div id="divSenhaC" class="form-group">
                        <label>Senha:</label>
                        <input type="password" class="form-control" name="senha" placeholder="Senha do usuário" required>
                    </div>
                </div>
		<div class="form-group" id="exdiaC" style="display: <?php echo $_SESSION['vendedor'] == '1' ? 'block' : 'none'; ?>">
		    <label>Dia de Expiração: </label>
		    <input type="number" class="form-control" name="dia" placebolder="Dia de Expiração">
		</div>
                <div class="form-group">
                    <label>Contato:</label>
                    <input type="text" class="form-control" name="contato" placeholder="Contato do usuário">
                </div>
                <div class="form-group">
                    <label>Nivel: </label>
                    <div class="ml-0 row">
                        <select id="nivelC" class="selectpicker">
                            <?php if($_SESSION['admin']) { ?>
                            <option value="admin">Administrador</option>
                            <option value="vendedor">Vendedor</option>
                            <?php } ?>
			    <?php if($_SESSION['vendedor']) { ?>
			    <option value="vendedor">Vendedor</option>
 			    <?php } ?>
                            <option value="cliente">Cliente</option>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="display: none">
                    <label>Administrador:</label>
                    <div class="ml-0 row">
                        <select value="0" id="adminC" class="selectpicker" title="Administrador..." name="admin" required>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="display: none">
                    <label>Vendedor:</label>
                    <div class="ml-0 row">
                        <select value="0" id="vendedorC" class="selectpicker" title="Administrador..." name="vendedor" required>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Listas:</label>
                    <div class="ml-0 row">
                        <select name="lista[]" class="selectpicker" title="Listas..." multiple>
                <?php if ($listas) { 
                    foreach ($listas as $lista) {?>
                        <option value="<?=$lista['id_lista']?>"><?=$lista['nome_lista']?></option>
                    <?php  } 
                    } ?>
                        </select>
                    </div>
                </div>
                <button type="none" onclick="addForce()" class="btn btn-primary">Adicionar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Cadastro Fim-->
<!-- Remove Inicio -->
<div class="modal fade" id="remover" tabindex="-1" role="dialog" aria-labelledby="Cadastrar" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tem certeza?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="remover-conteudo" class="modal-body"></div>
    </div>
  </div>
</div>
<!-- Remove Fim-->
<!-- Edita Inicio -->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="Cadastrar" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editar-form">
            <div class="container">
                <input type="hidden" id="idE" name="id">
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" class="form-control" id="nomeE" name="nome" placeholder="Nome do usuário" required autofocus>
                </div>
                <div class="form-group">
                    <label>Login:</label>
                    <input type="text" class="form-control" id="loginE" name="login" placeholder="Identificação do usuário" required>
                    <small class="form-text text-muted">Único para cada usuário!</small>
                </div>
                <div id="s">
                    <div id="divSenha" class="form-group">
                        <label>Senha:</label>
                        <input type="password" class="form-control" id="senhaE" name="senha" placeholder="Senha do usuário">
                        <small class="form-text text-muted">Deixa em branco se não quer trocar!</small>
                    </div>
                </div>
		<div class="form-group" id="exdiaE" style="display: none;">
		     <label>Dia de Expiração</label>
		     <input type="number" class="form-control" id="dia" name="dia"></input>
		</div>

                <div class="form-group">
                    <label>Contato:</label>
                    <input type="text" class="form-control" id="contatoE" name="contato" placeholder="Contato do usuário">
                </div>
                <div class="form-group">
                    <label>Estado:</label>
                    <div class="ml-0 row">
                        <select id="estadoE" class="selectpicker" title="Estado..." name="estado">
                            <option value="1">Ativo</option>
                            <option value="0">Desativado</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Nivel: </label>
                    <div class="ml-0 row">
                        <select id="nivelE" class="selectpicker">
                            <?php if($_SESSION['admin']) { ?>
                            <option value="admin">Administrador</option>
                            <option value="vendedor">Vendedor</option>
                            <?php } ?>
			    <?php if($_SESSION['vendedor']) { ?>
			    <option value="vendedor">Vendedor</option>
			    <?php } ?>
                            <option value="cliente">Cliente</option>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="display: none">
                    <label>Administrador:</label>
                    <div class="ml-0 row">
                        <select id="adminE" class="selectpicker" title="Administrador..." name="admin" required>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="display: none">
                    <label>Vendedor:</label>
                    <div class="ml-0 row">
                        <select id="vendedorE" class="selectpicker" title="Administrador..." name="vendedor" required>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Listas:</label>
                    <div class="ml-0 row">
                        <select id="listaE" name="lista[]" class="selectpicker" title="Listas..." multiple>
                <?php if ($listas) { 
                    foreach ($listas as $lista) {?>
                        <option value="<?=$lista['id_lista']?>"><?=$lista['nome_lista']?></option>
                    <?php  } 
                    } ?>
                        </select>
                    </div>
                </div>
                <button type="none" onclick="forceEdit()" class="btn btn-primary">Salvar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Edita Fim-->
</body>
<script>
    var clone = $("#divSenha").clone();
    var cloneC = $("#divSenhaC").clone();
    //$("#divSenhaC").remove();

    $("#cadastro").on('hidden.bs.modal', function (e) {
        if ($( "#adminC" ).val() != 1) {
            //$("#sC").empty();//DO_NOTHING
        }
    });

    $( "#adminC" ).change(function() {
        if ($( "#adminC" ).val() == 1) {
            $("#sC").append(cloneC);
        } else {
            $("#sC").empty();
        }
    });

    function removerConfirma(id,nome) {
        $('#remover-conteudo').html('<div class="alert alert-danger" role="alert"><strong> Remover </strong>' + nome + '?</div><button onclick="remover(' + id + ')" type="submit" class="btn btn-danger float-right">Remover</button>');
        $('#remover').modal();
    }

    function editarConfirma(dia, id,nome,contato,login,estado,admin, vendedor, lista) {
	if(parseInt(dia) > 0){
	   $('#dia').val(parseInt(dia));
	} else {
	   $('#dia').val('');
	}
        $('#idE').val(id);
        $('#nomeE').val(nome);
        $('#nivelE').val(parseInt(vendedor) == 1 ? 'vendedor' : (parseInt(admin) == 1) ? 'admin' : 'cliente');
        setTimeout(() => {
            $('#nivelE').val(parseInt(vendedor) == 1 ? 'vendedor' : (parseInt(admin) == 1) ? 'admin' : 'cliente');
            $('*[data-id=nivelE]').text(parseInt(vendedor) == 1 ? 'vendedor' : (parseInt(admin) == 1) ? 'admin' : 'cliente');
        }, 500);
        $('#contatoE').val(contato);
        $('#loginE').val(login);
        $('#estadoE').val(estado);
        $('#estadoE').selectpicker('render');
        $('#adminE').val(admin);
        $('#adminE').selectpicker('render');
        if (parseInt(admin) == 0) {
	    console.log(parseInt(vendedor) !== 1);
	    if(parseInt(vendedor) !== 1){
		$('#exdiaE').show();
	    } else {
		$('#exdiaE').hide();
	    }
            //$('#divSenha').remove();
        } else if ($('#divSenha').length < 1) {
            $('#s').append(clone);
        }
        $('#listaE').val(lista);
        $('#listaE').selectpicker('render');
        $('#editar').modal();
    }

    function remover(id) {
        $.ajax({
            type: "POST",
            url: "controles/remover-usuario.php",
            data: {usuario: id},
            success: function(data) {
                location.reload();
            }
        });
    }
    var addForce = function(){
        $( "#cadastro-form" ).trigger('submit');
    };
    var added = false;
    $( "#cadastro-form" ).submit(function( event ) {
        if(!added){
            added = true;
            if($('#cadastro-form select[name="vendedor"]').val().trim() == ""){
                $('#cadastro-form select[name="vendedor"]').val(0);
            }
            if($('#cadastro-form select[name="admin"]').val().trim() == ""){
                $('#cadastro-form select[name="admin"]').val(0);
            }
            $.ajax({
                type: "POST",
                url: "controles/adicionar-usuario.php",
                data: $("#cadastro-form").serialize(),
                success: function(data) {
                    location.reload();
                },
                error: function(data) {
                  resultado(data.responseText);
                }
            });
        }
        event.preventDefault();
    });
    var eddited = false;
    var forceEdit = function(){
        $( "#editar-form" ).trigger('submit');
    }
    $( "#editar-form" ).submit(function( event ) {
        if(!eddited){
            eddited = true;
            if($('#editar-form select[name="vendedor"]').val().trim() == ""){
                $('#editar-form select[name="vendedor"]').val(0);
            }
            if($('#editar-form select[name="admin"]').val().trim() == ""){
                $('#editar-form select[name="admin"]').val(0);
            }
            $.ajax({
                type: "POST",
                url: "controles/editar-usuario.php",
                data: $("#editar-form").serialize(),
                success: function(data) {
                    location.reload();
                },
                error: function(data) {
                  resultado(data.responseText);
                }
            });
        }
        event.preventDefault();
    });
    <?php if($_SESSION['admin']) { ?>
      $('#adminC').val(1);
      $('#vendedorC').val(0);
    <?php } ?>

    $('#nivelC').on('change', function(){
       var value = $(this).val();
       $('#sC').empty();
       if(value == 'vendedor'){
           $('#adminC').val(0);
           $('#vendedorC').val(1);
           $("#sC").append(cloneC);
	   $('#exdiaC').hide();
       } else if (value == 'admin'){
           $('#adminC').val(1);
           $('#vendedorC').val(0); 
           $("#sC").append(cloneC);
	   $('#exdiaC').hide();
       } else {
           $('#adminC').val(0);
           $('#vendedorC').val(0);
	   $("#sC").append(cloneC);	   
	   $('#exdiaC').show();
       }
    });
function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {   
    document.cookie = name+'=; Max-Age=-99999999;';  
}
    function logar(id){
	if(!getCookie('original')){
	   setCookie('original', <?php echo $_SESSION['id_usuario'] ?>, 1);	
	}
	$.get('/controles/forcar-login.php?id_usuario=' + id, function(){
	   window.location.reload();
        });
    }
    function verLogs(id){
        window.location.href = '/log.php?id_usuario=' + id;
    }
    $('#nivelE').on('change', function(){
       var value = $(this).val();
       if(value == 'vendedor'){
           $('#adminE').val(0);
           $('#vendedorE').val(1);
           $("#s").append(clone);
	   $('#exdiaE').hide();
       } else if (value == 'admin') {
           $('#adminE').val(1);
           $('#vendedorE').val(0); 
           $("#s").append(clone);
	   $('#exdiaE').hide();
       } else {
           $('#adminE').val(0);
           $('#vendedorE').val(0);
           $("#s").append(clone);
	   $('#exdiaE').show();
       }
    });
    if(window.mobilecheck()){
	$('#checkme').remove();
    }
    $('.thead-light th:not(".nomecol")').remove();
</script>
<?php require_once("comum.php"); 
require_once("alerta.php");?>

</html>
<?php 
} else {
    header("Location: index.php");
    die();
}
?>
v

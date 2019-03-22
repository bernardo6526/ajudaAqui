<?php
require_once("/../DAL/conexao.php");
$bd = new banco('ajudaaqui');
session_start();

$assistente = @$_SESSION['user']->fk;

$sql = "SELECT pedido.id, SUBSTRING(pedido.local,1,30) as nome FROM pedido INNER JOIN assistente
ON assistente.id = pedido.assistente_id
WHERE pedido.status = 1 AND assistente.id = $assistente";


$data = mysqli_query($bd->conexaobd, $sql);
if(mysqli_num_rows($data) > 1)
{
	$sql = "SELECT pedido.id, SUBSTRING(pedido.local,1,30) as nome FROM pedido INNER JOIN assistente
ON assistente.id = pedido.assistente_id
WHERE pedido.status = 1 AND assistente.id = $assistente ORDER BY pedido.id DESC";
}
$data = mysqli_query($bd->conexaobd, $sql);
$dados = mysqli_fetch_object($data);

$pedidoId = $dados->id;
$pedido = $dados->nome;

$sql = "SELECT cliente.nome,cliente.id, pedido.local FROM pedido INNER JOIN cliente ON cliente.id = pedido.cliente_id WHERE pedido.id = $pedidoId";
$data = mysqli_query($bd->conexaobd, $sql);
$dados = mysqli_fetch_object($data);

$sql = "SELECT data_hora as data FROM pedido WHERE id = $pedidoId";
$data = mysqli_query($bd->conexaobd, $sql);
$dados2 = mysqli_fetch_object($data);
$diaPedido = date_create($dados2->data);
$diaAtual = date_create(date("Y-m-d H:i:s"));

$dataHora = date_diff($diaPedido, $diaAtual);

$valor = $dataHora->h > 1? $dataHora->h*5:7;

?>

<div class="col-xs-12">
	<div class="content-box-header">
		<p>Pedido <i class="text-muted"><?php echo $pedido ?></i> Em Andamento</p>
	</div>
	<div class="content-box-large box-with-header">
		<p class="lead"><?php echo $dados->nome ?></p>
		<div>&nbsp;</div>
		<div class="form-horizontal">
			<div class="form-group">
				<div class="col-sm-12">
					<input type="text" class="form-control" id="us3-address" />
				</div>
			</div>
			<div id="us3" style="width: 100%; height: 400px;"></div>
			<div class="clearfix">&nbsp;</div>
		</div>
	<button class="btn btn-info col-xs-12" id="completar">Completar Pedido</button>
	<p class="text-right">Ajuda Aqui!</p>
	</div>
</div>
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Pagamento</h4>
      </div>
      <div class="modal-body">
        <h3 class="text-center">Valor Total do Pedido</h3>
				<h1 class="lead text-center">R$: <?= $valor ?>,00 </h1>
      </div>
      <div class="modal-footer">
      	<button class="btn btn-info col-xs-12" id="completarPedido">Completar Pedido</button>
      </div>
    </div>
    
  </div>
</div>
<script>
$(document).ready(function() {	

  $.ajax({
		url: "https://maps.googleapis.com/maps/api/geocode/json",
		data: {
			address: "<?php echo $dados->local ?>",
			key: "AIzaSyAHFQb-U9gOJUlA6jx_25oCqo8IXc-EXD8"
		},
		success: function(data) {
			loc = data.results[0].geometry.location;
		},
		async: false
	})

	$("#us3-address").on('keypress', function(ev) {
		ev.preventDefault();
	})

	$('#us3').locationpicker({
		location: {
			latitude: loc.lat,
			longitude: loc.lng
		},
		radius: 0,
		inputBinding: {
			locationNameInput: $('#us3-address')
		},
		enableAutocomplete: true,
  });


	$("#completar").on('click', function(ev) {
		$("#myModal").modal("show");
	});
  $("#completarPedido").on('click', function(event) {
  	event.preventDefault();

  	$.get({
  		url: "BLL/desativarPedido.php",
  		data: {
  			idPedido: "<?php echo $pedidoId ?>",
  			idAssistente: "<?php echo $assistente ?>",
  			valorPedido: "<?= $valor ?>"
  		},
  		success: function() {
  			window.location.replace('assistente.php');
  		}
  	});
  });
});
</script>
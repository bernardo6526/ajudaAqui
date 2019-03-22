<div class="col-xs-12">
	<div class="content-box-header">
		<h4>Escolha Sua Localização</h4>
	</div>
	<div class="content-box-large box-with-header">
		<form id="pedido">
			<div class="form-group">

				<div class="input-group">
					<div class="input-group-btn"><button data-target="#us6-dialog" type="button" data-toggle="modal" class="btn btn-info" style="text-decoration:none">Procurar</button></div>
					<input type="text" placeholder="Localização" required name="local" id="localizacao" class="readonly form-control">
				</div>

			</div>
			<p class="lead">Faça Um pedido</p>
			<table class="table" style="font-size:14px">
				<thead>
					<tr>
						<th>#</th>
						<th>Nome</th>
						<th>Telefone</th>
						<th>Nota</th>
					</tr>
				</thead>
				<tbody class="">
					<?php
					require_once("../DAL/conexao.php");
					$bd = new banco('ajudaaqui');

					$sql = "SELECT id, nome, telefone, nota FROM assistente ORDER BY nota DESC LIMIT 10";
					$result = mysqli_query($bd->conexaobd, $sql);

					for ($i=0; $i < mysqli_num_rows($result); $i++) { 
						$linha = mysqli_fetch_object($result);

						$table = "<tr class='assistente'><td class='id'>$linha->id</td>";
						$table .= "<td class='nome'>$linha->nome</td>";
						$table .= "<td class='telefone'>$linha->telefone</td>";
						$table .= "<td class='nota'>$linha->nota</td></tr>";

						echo utf8_encode($table);
					}
					?>
				</tbody>
			</table>
			<input id="selecionado" type="text" style="display:none" required class="readonly form-control" placeholder="Assistente Selecionado">
			<div class="">	
				<input type="submit" value="Pedir!" class="btn btn-info col-xs-12" style="margin-top:30px">
			</div>
			<p class="text-right">Ajuda Aqui!</p>
		</form>
		<div id="us6-dialog" style="z-index: 99999" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Ajuda Aqui! - Pedido</h4>
					</div>
					<div class="modal-body">
						<div class="form-horizontal" style="width: 550px">
							<div class="form-group">
								<label class="col-sm-2 control-label">Endereço:</label>

								<div class="col-sm-10">
									<input type="text" class="form-control" id="us6-address"/>
								</div>
							</div>
							<div id="us6" style="width: 100%; height: 400px;"></div>
							<div class="clearfix">&nbsp;</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" id="escolher" class="btn btn-info col-xs-12">Escolher</button>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
	</div>
</div>
<script src="js/locationpicker.jquery.min.js"></script>
<script>

var lat, lon;

	navigator.geolocation.getCurrentPosition(function(location) {
 		var lat = (location.coords.latitude);
 		var lon = (location.coords.longitude);

 		$('#us6').locationpicker({

			location: {latitude: lat, longitude: lon},
			radius: 0,
			inputBinding: {
				locationNameInput: $('#us6-address')
			},
			enableAutocomplete: true
		});
		$('#us6-dialog').on('shown.bs.modal', function () {
			$('#us6').locationpicker('autosize');
		});
	});

	

	$(document).ready(function() {

		$("td.telefone").mask("(00)0000-00000");

		$('tr.assistente').on('click', function() {
			$('tr.active').removeClass('active');
			$(this).addClass('active');
			$nome = $('tr.active td.nome').text();
			$('#selecionado').val($nome);
		});

		$(".readonly").keydown(function(e){
			e.preventDefault();
		});

		$("#escolher").on('click', function() {
			$endereco = $('#us6-address').val();
			$('#us6-dialog').modal('toggle');
			$('#localizacao').val($endereco);
		});

		$("form#pedido").on('submit', function(event) {
			$.ajax({
				url: "BLL/cadastroPedido.php",
				data: {
					local: $("input#localizacao").val(),
					assistente: $('tr.active td.id').text()
				},
				method: "POST",
				success: function(data) {
					alert('Pedido Feito, Aguarde por uma Resposta');
					window.location.replace('cliente.php');
				},
				error: function() {
					alert('noão');
				}
			})
			return false;
		});
	});
</script>

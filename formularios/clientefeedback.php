
<div class="col-xs-12">
	
	<div class="content-box-large box-with-header">
		<form>
			
			<p class="lead">Feedback</p>
			<p>Ficariamos gratos se avaliasse nossos profissionais</p>
			<table class="table table-hover" style="font-size:14px">
				<thead>
					<tr>
						<th>#</th>
						<th>Assistente</th>
						<th>Local</th>
						<th>Horário</th>
						<th>Nota</th>
						
					</tr>
				</thead>
				<tbody class="">
					<?php
					require_once("/../DAL/conexao.php");
					$bd = new banco('ajudaaqui');
					session_start();

					$cliente = @$_SESSION['user']->fk;

					$sql = "SELECT pedido.id, SUBSTRING(pedido.local,1,30) as local,pedido.data_hora,assistente.nome,assistente.id AS assistente_id,assistente.nota AS assistente_nota
					FROM pedido JOIN cliente JOIN assistente
					ON cliente.id = pedido.cliente_id AND assistente.id = pedido.assistente_id
					WHERE pedido.status = 3 AND cliente.id = $cliente";



					$result = mysqli_query($bd->conexaobd, $sql);

					for ($i=0; $i < mysqli_num_rows($result); $i++) { 
						$linha = mysqli_fetch_object($result);

						$table = "<tr class='pedido'><td class='id'>$linha->id</td>";
						$table .= "<td>$linha->nome</td>";
						$table .= "<td class=''>$linha->local</td>";
						$table .= "<td class=''>$linha->data_hora</td>";
						$table .= "<td class='nota'><input type='number' name='pedido$linha->id' min='1' max='10'></td></tr>";

						echo utf8_encode($table);
					}
					?>
				</tbody>
			</table>
			<input type="submit" class="form-control btn btn-info col-xs-12" value="Enviar">
			
			<p class="text-right">Ajuda Aqui!</p>
		</form>
		
	</div>
</div>
<script>
$(document).ready(function($) {
		$("tr.pedido").on('click', function(event) {
			event.preventDefault();
			$idPedido = $("td.id", this).text();
			$idCliente = <?php echo $_SESSION['user']->fk; ?>;
			$idAssistente = <?php echo $linha->assistente_id; ?>;
			$NotaAssistente = <?php echo $linha->assistente_nota; ?>;

			if ($(this).hasClass('active')) {
				$(this).removeClass('active');
				delete $idPedido;
				delete $idCliente;
			} else {
				$('tr.active').removeClass('active');
				$(this).addClass('active');
			}
		});
		$('form').on('submit', function(event) {
			event.preventDefault();
			$.get({
				url: "BLL/feedback.php",
				data: {
					idPedido: $idPedido,
					idCliente: $idCliente,
					idAssistente: $idAssistente,
					NotaAssistente: $NotaAssistente
				},
				success: function() {
					alert('Nota enviada com sucesso!');
					window.location.replace("cliente.php");
				}
			})
		});
	});

  
</script>
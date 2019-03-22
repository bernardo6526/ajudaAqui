<div class="col-xs-12">
	
	<div class="content-box-large box-with-header">
		<form>
			
			<p class="lead">Pedido</p>
			<table class="table table-hover" style="font-size:14px">
				<thead>
					<tr>
						<th>#</th>
						<th>Cliente</th>
						<th>Local</th>
						<th>Horário</th>
						
					</tr>
				</thead>
				<tbody class="">
					<?php
					session_start();
					require_once("../DAL/conexao.php");
					$bd = new banco('ajudaaqui');

					$sql = "SELECT cliente.id, cliente.nome,pedido.local,pedido.data_hora,pedido.id FROM pedido JOIN cliente WHERE cliente_id = cliente.id AND Assistente_id =".$_SESSION['user']->fk." AND pedido.status = 0";
					$sql .=" ORDER BY cliente.nome LIMIT 10";
					$result = mysqli_query($bd->conexaobd, $sql);

					for ($i=0; $i < mysqli_num_rows($result); $i++) { 
						$linha = mysqli_fetch_object($result);

						$table = "<tr class='pedido'><td class='id'>$linha->id</td>";
						$table .= "<td>$linha->nome</td>";
						$table .= "<td class=''>$linha->local</td>";
						$table .= "<td class=''>$linha->data_hora</td></tr>";

						echo $table;
					}
					?>
				</tbody>
			</table>
			<input type="submit" class="form-control btn btn-info col-xs-12" value="Ativar">
			
			<p class="text-right">Ajuda Aqui!</p>
		</form>
		
	</div>
</div>
<script>
	$(document).ready(function($) {
		$("tr.pedido").on('click', function(event) {
			event.preventDefault();
			$idPedido = $("td.id", this).text();
			
			$idAssistente = <?php echo $_SESSION['user']->fk; ?>;

			if ($(this).hasClass('active')) {
				$(this).removeClass('active');
				delete $idPedido;
				delete $idAssistente;
			} else {
				$('tr.active').removeClass('active');
				$(this).addClass('active');
			}
		});
		$('form').on('submit', function(event) {
			event.preventDefault();
			$.get({
				url: "BLL/ativarPedido.php",
				data: {
					idPedido: $idPedido,
					idAssistente: $idAssistente
				},
				success: function() {
					alert('Pedido aceito com sucesso!');
					window.location.replace("assistente.php");
				}
			})
		});
	});

</script>

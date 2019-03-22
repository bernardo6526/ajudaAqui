<div  class="content-box-large ">
	<div class="jumbotron text-center" style="background-color: #1985a1;color: #F3F5F5;">
		<h1>Relatórios do Sistema</h1>

	</div>  
	<div class="container" id="impresso">  
		<form action="" id="relatorios" method="post">
			

			<div class="row ">
				<div class="col-md-6">
					<h3>Selecione um parâmetro</h3> 
					
					<label class="radio-inline">
						<input type="radio" name="tabela" id="tabela" value="Clinica" required>Clínica
					</label>
					<label class="radio-inline">
						<input type="radio" name="tabela" id="tabela" value="Assistente" >Assistente
					</label>
					<label class="radio-inline">
						<input type="radio" name="tabela" id="tabela" value="Cliente" >Cliente
					</label>	
					<label class="radio-inline">
						<input type="radio" name="tabela" id="tabela" value="Pedido" >Pedido	
					</label>
					<br><br>


					
					<div id="custom-search-input form-group">
						<div class="input-group col-md-12">
							<input type="text" class="form-control input-lg" placeholder="Buscar"/>
							<span class="input-group-btn">
								<input class="btn btn-info btn-lg" type="submit" style="background-color: #1985a1;" value="Ir">						
							</span>
						</div>
					</div>
				</div>
			</div>		
		</form>
	</div>
	<!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script>
		$("form#relatorios").on('submit', function() {
			$rola = $('form :input').serializeArray();
			$pesq = $('input:text').val();

			$("#conteudo").load("formularios/relatorios.php",{
				tabela: $rola[0].value,
				pesq: $pesq
			});

			return false;
		});

		function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open();
        mywindow.document.write('<html><head><title>Imprimir Relatórios</title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }
	</script>
	

	<!-- /SCRIPTS -->



	<?php 

	require_once("../BLL/relatoriosBLL.php");
	$rBLL = new relatorioBLL();



	if (isset ($_POST['tabela']))
	{
		$tabela = $_POST['tabela'];

		
		
		if(isset($_POST['pesq']))
		{
			$pesq = $_POST['pesq'];
			
		}
		else 
		{
			$pesq = "";
			
		}
		
		switch ($tabela) 
		{
			case "Clinica":
			if ($pesq == "")
			{
				$sql = "SELECT clinica.id,clinica.nome,clinica.nota,clinica.telefone,clinica.cnpj,clinica.uf,clinica.cidade,clinica.cep,clinica.bairro,clinica.logradouro,clinica.numero,clinica.complemento FROM clinica ORDER BY clinica.id";
			}
			else {
				$sql = "SELECT clinica.id,clinica.nome,clinica.nota,clinica.telefone,clinica.cnpj,clinica.uf,clinica.cidade,clinica.cep,clinica.bairro,clinica.logradouro,clinica.numero,clinica.complemento FROM clinica  ";
				$sql .= "WHERE clinica.id LIKE '%$pesq%' OR clinica.nome LIKE '%$pesq%' OR clinica.nota = '$pesq' OR clinica.telefone = '$pesq' OR clinica.cnpj LIKE '%$pesq%' OR clinica.uf LIKE '%$pesq%' OR clinica.cidade LIKE '%$pesq%'";
				$sql .= "OR clinica.cep LIKE '%$pesq%' OR clinica.bairro LIKE '%$pesq%' OR clinica.logradouro = '$pesq' OR clinica.numero = '$pesq' OR clinica.complemento LIKE '%$pesq%' AND clinica.id != 1 ORDER BY clinica.id";

			}

			ECHO $rBLL->pesqClinica($sql);

			break;
			case "Assistente":
			if ($pesq == "")
			{
				$sql = "SELECT clinica.nome as nomeClinica,assistente.id,assistente.nome,assistente.nota,assistente.telefone,assistente.email,assistente.nascimento,";
				$sql .="assistente.tipo,assistente.certificado,assistente.cpf,assistente.rg,assistente.uf,assistente.cidade,assistente.cep,assistente.bairro,assistente.logradouro,assistente.numero,assistente.complemento FROM assistente JOIN clinica ON clinica.id = assistente.clinica_id";

			}
			else {
				$sql = "SELECT clinica.nome,assistente.nome,assistente.id,assistente.nota,assistente.nascimento,assistente.cpf,assistente.rg,assistente.cep,assistente.bairro,assistente.logradouro,assistente.complemento,assistente.numero,assistente.telefone,assistente.email,assistente.tipo,assistente.certificado,assistente.clinica_id,assistente.uf,assistente.cidade FROM assistente JOIN clinica";
				$sql .= " WHERE clinica_id = clinica.id AND (assistente.nome LIKE '%$pesq%' OR assistente.nota = '$pesq' OR assistente.telefone LIKE '%$pesq%' OR assistente.email LIKE '%$pesq%' OR assistente.tipo LIKE '%$pesq%' OR assistente.certificado LIKE '%$pesq%' OR clinica.nome LIKE '%$pesq%' OR assistente.uf LIKE '%$pesq%' ";
				$sql .= "OR assistente.cidade LIKE '%$pesq%')";

			}

			ECHO $rBLL->pesqAssistente($sql);
			break;

			case "Cliente":
			if ($pesq == "")
			{
				$sql = "SELECT cliente.id,cliente.nome,cliente.telefone,cliente.email,cliente.nascimento,cliente.tipo_deficiencia,";
				$sql .=" cliente.cpf,cliente.rg,cliente.uf,cliente.cidade,cliente.cep,cliente.bairro,cliente.logradouro,cliente.numero,cliente.complemento FROM cliente ORDER BY id";
			}
			else {
				$sql = "SELECT cliente.id,cliente.nome,cliente.telefone,cliente.email,cliente.nascimento,cliente.tipo_deficiencia,cliente.cpf,cliente.rg,cliente.uf,";
				$sql .= "cliente.cidade,cliente.cep,cliente.bairro,cliente.logradouro,cliente.numero,cliente.complemento FROM cliente WHERE cliente.id LIKE '%$pesq%' OR cliente.nome LIKE '%$pesq%' ";
				$sql .= "OR cliente.telefone LIKE '%$pesq%' OR cliente.email LIKE '%$pesq%' OR cliente.nascimento LIKE '%$pesq' OR cliente.tipo_deficiencia LIKE '%$pesq%'";
				$sql .= "OR cliente.cpf LIKE '%$pesq%' OR cliente.rg LIKE '%$pesq%' OR cliente.uf LIKE '%$pesq' OR cliente.cidade LIKE '%$pesq%'";
				$sql .= "OR cliente.cep LIKE '%$pesq%' OR cliente.bairro LIKE '%$pesq%' OR cliente.logradouro LIKE '%$pesq' OR cliente.numero LIKE '%$pesq%'";
				$sql .= "OR cliente.complemento LIKE '%$pesq%' ORDER BY cliente.id ";

			}
			ECHO $rBLL->pesqCliente($sql);	 

			break;
			case "Pedido":
			if ($pesq == "")
			{
				$sql = "SELECT pedido.id,pedido.local,pedido.data_hora,pedido.status,cliente.nome as nomeCliente,assistente.nome as nomeAssistente,pagamento.valor_bruto,pagamento.valor_liquido,pagamento.imposto
								FROM pedido LEFT JOIN pagamento
								ON pedido.id = pagamento.pedido_id
								LEFT OUTER JOIN assistente
								ON assistente.id = pedido.assistente_id
								LEFT OUTER JOIN cliente
								ON cliente.id = pedido.cliente_id
								ORDER BY pedido.id";

			}
			else {
				$sql = "SELECT pedido.id,pedido.local,pedido.data_hora,pedido.status,cliente.nome as nomeCliente,assistente.nome as nomeAssistente,pagamento.valor_bruto,pagamento.valor_liquido,pagamento.imposto
								FROM pedido LEFT JOIN pagamento
								ON pedido.id = pagamento.pedido_id
								LEFT OUTER JOIN assistente
								ON assistente.id = pedido.assistente_id
								LEFT OUTER JOIN cliente
								ON cliente.id = pedido.cliente_id
								WHERE (pedido.local LIKE '%$pesq%' OR pedido.data_hora LIKE '%$pesq%' OR pedido.status = '$pesq' OR cliente.nome LIKE '%$pesq%' OR assistente.nome LIKE '%$pesq%' OR pagamento.valor_bruto='$pesq' OR pagamento.valor_liquido='$pesq') ORDER BY pedido.id";

			}

			ECHO $rBLL->pesqPedido($sql);

			break;


		}		
	}
	?>
</div>

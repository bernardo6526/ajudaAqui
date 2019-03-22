<div  class="content-box-large ">
	<div class="jumbotron text-center" style="background-color: #1985a1;color: #F3F5F5;">
		<h1>Histórico de Assistências</h1>

	</div>  
	<div class="container" id="impresso">  
		<form action="" id="relatorios" method="post">
			

			<div class="row ">
				<div class="col-md-6">
										
					<div id="custom-search-input form-group">
						<div class="input-group col-md-12">
							<input type="text" name="pesq" class="form-control input-lg" placeholder="Buscar"/>
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

			$("#conteudo").load("formularios/relatoriosAssistente.php",{
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
	session_start();
	require_once("../BLL/relatoriosBLL.php");
	$rBLL = new relatorioBLL();



		
		
		if(isset($_POST['pesq']))
		{
			$pesq = $_POST['pesq'];
			
		}
		else 
		{
			$pesq = "";
			
		}
		
			if ($pesq == "")
			{
				$sql= "SELECT pedido.id,cliente.nome,pedido.local,pedido.data_hora,pedido.status FROM pedido JOIN cliente ON pedido.cliente_id = cliente.id AND assistente_id =".$_SESSION['user']->fk;

			}
			else {
				
				$sql= "SELECT pedido.id,cliente.nome,pedido.local,pedido.data_hora,pedido.status FROM pedido JOIN cliente WHERE pedido.cliente_id = cliente.id AND assistente_id =".$_SESSION['user']->fk." AND(";
				$sql.= "cliente.nome LIKE '%".$pesq."%' OR pedido.local LIKE  '%".$pesq."%' OR pedido.data_hora LIKE '%".$pesq."%' OR pedido.status = '".$pesq."' )";
				
				

			}
			ECHO $rBLL->pesqAssistentePedido($sql);
			
			
	
	?>
</div>

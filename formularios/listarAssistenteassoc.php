<div  class="content-box-large ">
	<div class="jumbotron text-center" style="background-color: #1985a1;color: #F3F5F5;">
		<h1>Relatórios do Sistema</h1>

	</div>  
	<div class="container ">  
		<form action="" id="relatorios" method="post">
			

			<div class="row ">
				<div class="col-md-6">
					


					
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
		$(document).ready(function() {
				$("form#relatorios").on('submit', function() {
					
					$pesq = $('input:text').val();

					$("#conteudo").load("formularios/listarAssistenteassoc.php",{
						
						pesq: $pesq
					});

					return false;
				});
				
			
		});
	</script>
	
	

	<!-- /SCRIPTS -->



	<?php 
	session_start();
	require_once("../BLL/clinicaBLL.php");
	$cBLL = new clinicaBLL();
	$clinicaid = $_SESSION['user']->fk;
		
		
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
				$sql = "SELECT clinica.nome as nomeClinica,assistente.id,assistente.nome,assistente.nota,assistente.telefone,assistente.email,assistente.nascimento,";
				$sql .="assistente.tipo,assistente.certificado,assistente.cpf,assistente.rg,assistente.uf,assistente.cidade,assistente.cep,assistente.bairro,assistente.logradouro,assistente.numero,assistente.complemento FROM assistente JOIN clinica 
				ON assistente.clinica_id = clinica.id WHERE clinica.id = $clinicaid";

			}
			else {
				$sql = "SELECT clinica.nome as nomeClinica,assistente.nome,assistente.id,assistente.nota,assistente.nascimento,assistente.cpf,assistente.rg,assistente.cep,assistente.bairro,assistente.logradouro,assistente.complemento,assistente.numero,assistente.telefone,assistente.email,assistente.tipo,assistente.certificado,assistente.clinica_id,assistente.uf,assistente.cidade FROM assistente JOIN clinica";
				$sql .= " ON clinica_id = clinica.id AND clinica.id= $clinicaid AND (assistente.nome LIKE '%$pesq%' OR assistente.nota = '$pesq' OR assistente.telefone LIKE '%$pesq%' OR assistente.email LIKE '%$pesq%' OR assistente.tipo LIKE '%$pesq%' OR assistente.certificado LIKE '%$pesq%' OR clinica.nome LIKE '%$pesq%' OR assistente.uf LIKE '%$pesq%' ";
				$sql .= "OR assistente.cidade LIKE '%$pesq%')";

			}
				
	?>
	<div class="container ">  
		<form action=""  method="post" id="excluir">
			

			<div class="row ">
				<div class="col-md-6">
					


					
					<div id="custom-search-input form-group">
						<div class="input-group col-md-12">
								<?php ECHO $cBLL->pesqAssistente($sql); ?>
							
								<input class="btn btn-info btn-lg" type="submit" style="background-color: #1985a1;" value="Excluir">						
							
						</div>
					</div>
				</div>
			</div>		
		</form>
	</div>
</div>
<script>
		
		
	
$("form#excluir").on('submit', function(event) {
			$.ajax({
				url: "BLL/excluiAssistente.php",
				data: {
					
					 radiobtn: $('input[type="radio"]:checked').val()
				},
				method: "POST",
				success: function(data) {
					alert('Assistente excluido com sucesso!');
					window.location.replace('clinica.php');
				},
				error: function() {
					alert('noão');
				}
			})
			return false;
		});
		
</script>
<?php 
// if (isset($_POST['radiobtn']))
// {
	// $radiobtn = $_POST['radiobtn'];
	
	// $cBLL->excluiAssistente($radiobtn);
// }
?>
	

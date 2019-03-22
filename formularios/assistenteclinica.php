<div class="col-xs-12">
	
	<div class="content-box-large box-with-header">
		<form action = "" method="post" id="assistenteclinica">
			
			<p class="lead">Clínica Associada</p>
		<?php 
				session_start();
				require_once("../DAL/conexao.php");
				$bd = new banco('ajudaaqui');
												
				$sql = "SELECT clinica.nome,clinica.telefone,clinica.uf,clinica.cidade,clinica.bairro,clinica.logradouro,clinica.numero,clinica.complemento FROM assistente JOIN clinica WHERE clinica_id = clinica.id AND assistente.id =".$_SESSION['user']->fk;
				$sql .=" ORDER BY clinica.nome LIMIT 10";
				$result = mysqli_query($bd->conexaobd, $sql);
				$linha = mysqli_fetch_object($result);
				if ($linha->nome != "Nenhuma")
			{			
							
		?>
			<table class="table" style="font-size:14px">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Telefone</th>
						<th>UF</th>
						<th>Cidade</th>
						<th>Bairro</th>
						<th>Logradouro</th>
						<th>Número</th>
						<th>Complemento</th>
						
					</tr>
				</thead>
				<tbody class="">
		<?php
							$table = "<tr class=''><td class='id'>$linha->nome</td>";
							$table .= "<td class=''>$linha->telefone</td>";
							$table .= "<td class=''>$linha->uf</td>";
							$table .= "<td class=''>$linha->cidade</td>";
							$table .= "<td class=''>$linha->bairro</td>";
							$table .= "<td class=''>$linha->logradouro</td>";
							$table .= "<td class=''>$linha->numero</td>";
							$table .= "<td class=''>$linha->complemento</td></tr></tbody></table>";
							ECHO utf8_encode($table);
		?>
								<!--								 Button trigger modal 
									<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
									  Sair
									</button>

									 Modal 
									<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Você realmente deseja sair da clínica?</h4>
										  </div>										  
										  <div class="modal-footer">											
											<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>											
											<input class="btn btn-info btn-lg" type="submit" name ="submit "value="Desassociar">
										  </div>
										</div>
									  </div>
									</div> -->
		<?php
					// if(isset($_POST['submit']))
					// {
						
						
						
						// $sql = "UPDATE assistente SET clinica_id = 1 WHERE assistente.id=".$_SESSION["user"]->fk;
						// $result = mysqli_query($bd->conexaobd, $sql);
						// ECHO "<script>alert('Desassociação realizada!');</script>";
					// }	
			}
			
			
			else { ?>
							
							

			<p>Você ainda não está associado a nenhuma clínica</p>		
			<div id="custom-search-input">
						<div class="input-group col-md-12">
							<input type="text" class="form-control input-lg" placeholder="Login - Clínica" name="login" />
							<span class="input-group-btn">
								<input class="btn btn-info btn-lg" type="submit" value="Associar">						
							</span>
						</div>
					</div>
					
				
			<?php 
					if(isset($_POST['login']))
					{
						//Pegando o id da clinica
						$sql = "SELECT usuario.fk FROM usuario WHERE usuario.login='".$_POST["login"]."'";
						$result = mysqli_query($bd->conexaobd, $sql);
						$row=mysqli_fetch_assoc($result);		
						
						
						$sql = "UPDATE assistente SET clinica_id =".$row["fk"]." WHERE assistente.id=".$_SESSION["user"]->fk;
						$result = mysqli_query($bd->conexaobd, $sql);
						ECHO "<script>alert('Associação efetuada com sucesso!');</script>";
						header("Location: assistente.php");
					}
				} 
			?>
			<p class="text-right">Ajuda Aqui!</p>
		</form>
		
	</div>
</div>
<!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>	   
	<script>
		$("form#assistenteclinica").on('submit', function() {
			
			$login = $('input:text').val();
			// $submit = $('input:submit').val();

			$("#conteudo").load("formularios/assistenteclinica.php",{
				
				login: $login
			//	submit: $submit
			});

			return false;
			
			
		});
		
	</script>
	

	<!-- /SCRIPTS -->
		

<?php
require_once("/../DAL/conexao.php");
$bd = new banco('ajudaaqui');

session_start();

$id = $_SESSION['user']->fk;
$sql = "SELECT * FROM clinica WHERE id = $id";
$result = mysqli_query($bd->conexaobd, $sql);

$dados = mysqli_fetch_assoc($result);

?>


<div class="col-xs-12">
	<div class="content-box-header">
		<h4>Editar dados</h4>
	</div>
	<div class="content-box-large box-with-header">
		<form>
			<input type="hidden" name="id" value="<?php echo $dados['id'] ?>">
			<div class="form-group col-xs-12">
				<label for="nome">Nome: </label>
				<input type="text" name="nome" value="<?php echo $dados['nome'] ?>" class="form-control">
			</div>
			<div class="form-group col-xs-12">
				<label for="nome">CNPJ: </label>
				<input type="text" name="cnpj" value="<?php echo $dados['cep'] ?>" class="form-control">
			</div>
			<div class="form-group col-xs-12">
				<label for="nome">Telefone: </label>
				<input type="text" name="telefone" value="<?php echo $dados['telefone'] ?>" class="form-control">
			</div>
			<div class="form-group col-xs-12">
				<label for="nome">Cidade: </label>
				<input type="text" name="cidade" value="<?php echo $dados['cidade'] ?>" class="form-control">
			</div>
			<div class="form-group col-xs-12">
				<label for="nome">Bairro: </label>
				<input type="text" name="bairro" value="<?php echo $dados['Bairro'] ?>" class="form-control">
			</div>
			<div class="form-group col-xs-12">
				<label for="nome">Logradouro: </label>
				<input type="text" name="logradouro" value="<?php echo $dados['Logradouro'] ?>" class="form-control">
			</div>
			<div class="form-group col-xs-12">
				<label for="nome">Complemento: </label>
				<input type="text" name="complemento" value="<?php echo $dados['complemento'] ?>" class="form-control">
			</div>
			<div class="form-group col-xs-12">
				<label for="nome">Número: </label>
				<input type="text" name="numero" value="<?php echo $dados['numero'] ?>" class="form-control">
			</div>
			<div class="form-group col-xs-12">
				<label for="nome">UF: </label>
				<input type="text" name="uf" value="<?php echo $dados['uf'] ?>" class="form-control">
			</div>
			<div class="form-group col-xs-12">
				<label for="nome">CEP: </label>
				<input type="text" name="cep" value="<?php echo $dados['cep'] ?>" class="form-control">
			</div>
			<div class="form-group col-xs-12">
				<label for="nome">Nota: </label>
				<input type="text" name="nota" value="<?php echo $dados['nota'] ?>" class="form-control">
			</div>
			<div class="">	
				<input type="submit" value="Alterar" class="btn btn-info col-xs-12" style="margin-top:30px">
			</div>
			<p class="text-right">Ajuda Aqui!</p>
		</form>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('form').on('submit', function(ev) {
			ev.preventDefault;

			$.getJSON({
				url: "BLL/alterarClinica.php",
				data: $('form').serializeArray(),
				success: function(data) {
					alert("Alterado com Sucesso!");
					window.location.reload();
				}
			});
		});
	});
</script>
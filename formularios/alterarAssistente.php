<?php
require_once("/../DAL/conexao.php");
$bd = new banco('ajudaaqui');

session_start();

$id = $_SESSION['user']->fk;
$sql = "SELECT * FROM assistente WHERE id = $id";
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
				<label for="nome">CPF: </label>
				<input type="text" name="cpf" value="<?php echo $dados['cpf'] ?>" class="form-control">
			</div>
			<div class="form-group col-xs-12">
				<label for="nome">Email: </label>
				<input type="text" name="email" value="<?php echo $dados['email'] ?>" class="form-control">
			</div>
			<div class="form-group col-xs-12">
				<label for="nome">Nascimento: </label>
				<input type="date" name="nascimento" value="<?php echo $dados['nascimento'] ?>" class="form-control">
			</div>
			<div class="form-group col-xs-12">
				<label for="nome">RG: </label>
				<input type="text" name="rg" value="<?php echo $dados['rg'] ?>" class="form-control">
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
				<label for="nome">Certifucado: </label>
				<input type="text" name="certificado" value="<?php echo $dados['certificado'] ?>" class="form-control">
			</div>
			<div class="form-group col-xs-12">
				<label for="nome">Tipo: </label>
				<input type="text" name="tipo" value="<?php echo $dados['tipo'] ?>" class="form-control">
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
				url: "BLL/alterarAssistente.php",
				data: $('form').serializeArray(),
				success: function(data) {
					alert("Alterado com Sucesso!");
					window.location.reload();
				}
			});
		});
	});
</script>
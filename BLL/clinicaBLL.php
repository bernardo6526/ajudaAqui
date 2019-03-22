
<?php

class clinicaBLL 
{
	private $result;
	private $resultfk;
	private $qtdeLinhas;
	private $row;
	private $rowfk;
	public $exibicao;
	public $exibicaofk;
	private $sql;
	private $sqlfk;
	private $bd;
	private $id;
	
	public function __construct() 
	{
		
		require_once("../DAL/conexao.php");
		$this->bd = new banco("ajudaaqui");
		
		
		
		
	}


	
	public function pesqAssistente($sql)
	{
		
		$this->sql = $sql;
		
		$this->result=mysqli_query($this->bd->conexaobd,$this->sql);
		$this->qtdeLinhas = mysqli_num_rows($this->result);
		
		
		$this->exibicao =	"<div class='container'>
		<h2>Assistente</h2>
		
		<table class='table table-hover'>
			<thead>
				<tr>
					<th>Id</th>
					<th>Nome</th>	
					<th>Nota</th>
					<th>Telefone</th>
					<th>Email</th>
					<th>Nascimento</th>
					<th>Tipo</th>
					<th>Certificado</th>
					<th>Clinica</th>
					<th>CPF</th>
					<th>RG</th>
					<th>UF</th>
					<th>Cidade</th>
					<th>CEP</th>
					<th>Bairro</th>
					<th>Logradouro</th>
					<th>Numero</th>
					<th>Complemento</th>
				</tr>
			</thead>
			<tbody>";

				for($x=0; $x < $this->qtdeLinhas; $x++)
				{
					$this->row=mysqli_fetch_assoc($this->result);
					
					$this->exibicao .= "<tr><td><input type='radio' name='radiobtn' value='".$this->row["id"]."' class='radiobtn'>".$this->row["id"]."</td>";
					$this->exibicao .= "<td>".$this->row["nome"]."</td>";
					$this->exibicao .= "<td>".$this->row["nota"]."</td>";
					$this->exibicao .= "<td>".$this->row["telefone"]."</td>";
					$this->exibicao .= "<td>".$this->row["email"]."</td>";
					$this->exibicao .= "<td>".$this->row["nascimento"]."</td>";
					$this->exibicao .= "<td>".$this->row["tipo"]."</td>";
					$this->exibicao .= "<td>".$this->row["certificado"]."</td>";
					$this->exibicao .= "<td>".$this->row['nomeClinica']."</td>";
					$this->exibicao .= "<td>".$this->row["cpf"]."</td>";
					$this->exibicao .= "<td>".$this->row["rg"]."</td>";
					$this->exibicao .= "<td>".$this->row["uf"]."</td>";
					$this->exibicao .= "<td>".$this->row["cidade"]."</td>";
					$this->exibicao .= "<td>".$this->row["cep"]."</td>";
					$this->exibicao .= "<td>".$this->row["bairro"]."</td>";
					$this->exibicao .= "<td>".$this->row["logradouro"]."</td>";
					$this->exibicao .= "<td>".$this->row["numero"]."</td>";
					$this->exibicao .= "<td>".$this->row["complemento"]."</td></tr>";
					
				}
				
				$this->exibicao .= "</tbody>
			</table>
		</div>";
		return utf8_encode($this->exibicao);
		
		
	}
		public function excluiAssistente($id)
		{
			$this->id = $id;
			$this->sql = "DELETE FROM assistente WHERE assistente.id=".$this->id;
		
			$this->result=mysqli_query($this->bd->conexaobd,$this->sql);
			
			$this->sql = "DELETE FROM usuario WHERE usuario.fk=".$this->id." AND usuario.tipo=2";
		
			$this->result=mysqli_query($this->bd->conexaobd,$this->sql);
			
			
		}
	
					
		// Trabalho Desnecessauro Abaixo
		// maldito eu n sabia do AS nomecampo

		public function fk_join($tabela,$campo,$id)
		{
			$this->sqlfk = "SELECT $tabela.$campo FROM $tabela WHERE $tabela.id = $id";
			$this->resultfk=mysqli_query($this->bd->conexaobd,$this->sqlfk);
			$this->rowfk=mysqli_fetch_assoc($this->resultfk);
			$this->exibicaofk = $this->rowfk["$campo"];
			
			return utf8_encode($this->exibicaofk);
		}
			
	public function fk_pagamento($tabela,$campo,$id)
		{
			$this->sqlfk = "SELECT $tabela.$campo FROM $tabela WHERE $tabela.Pedido_id = $id";
			$this->resultfk=mysqli_query($this->bd->conexaobd,$this->sqlfk);
			$this->rowfk=mysqli_fetch_assoc($this->resultfk);
			$this->exibicaofk = $this->rowfk["$campo"];
			
			return utf8_encode($this->exibicaofk);
		}
	
	public function pedidostatus($status)
	{
		if($status)
		{
			$this->exibicaofk = "Pendente";
		}
		
		else 
		{
			$this->exibicaofk = "Realizado";
		}
		
		return $this->exibicaofk;
	}
		
		
	
}

?>

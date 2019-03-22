
<?php

class relatorioBLL 
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
	
	public function __construct() 
	{
		
		require_once("../DAL/conexao.php");
		$this->bd = new banco("ajudaaqui");
		
		
		
		
	}


	public function pesqClinica($sql)
	{
		
		$this->sql = $sql;
		$this->result=mysqli_query($this->bd->conexaobd,$this->sql);
		$this->qtdeLinhas = mysqli_num_rows($this->result);
		
		
		$this->exibicao =	"<div class='container' id='tabela'>
		<h2>Clínica</h2>
		
		<table class='table table-hover'>
			<thead>
				<tr>
					<th>Id</th>
					<th>Nome</th>
					<th>Nota</th>
					<th>Telefone</th>
					<th>UF</th>
					<th>Cidade</th>
				</tr>
			</thead>
			<tbody>";

				for($x=0; $x < $this->qtdeLinhas; $x++)
				{
					$this->row=mysqli_fetch_assoc($this->result);
					$this->exibicao .= "<tr><td>".$this->row["id"]."</td>";
					$this->exibicao .= "<td>".$this->row["nome"]."</td>";
					$this->exibicao .= "<td>".$this->row["nota"]."</td>";
					$this->exibicao .= "<td>".$this->row["telefone"]."</td>";
					$this->exibicao .= "<td>".$this->row["uf"]."</td>";
					$this->exibicao .= "<td>".$this->row["cidade"]."</td>";
					
				}
				
				$this->exibicao .= "</tbody>
			</table>
		</div>
		<input type='button' value='Imprimir' class='btn btn-default' onclick=window.print()>";
		return utf8_encode($this->exibicao);
		
		
	}
	public function pesqAssistente($sql)
	{
		
		$this->sql = $sql;
		
		$this->result=mysqli_query($this->bd->conexaobd,$this->sql);
		$this->qtdeLinhas = mysqli_num_rows($this->result);
		
		
		$this->exibicao =	"<div class='container' id='tabela'>
		<h2>Assistente</h2>
		
		<table class='table table-hover'>
			<thead>
				<tr>
					<th>Id</th>
					<th>Nome</th>	
					<th>Nota</th>
					<th>Telefone</th>
					<th>Email</th>
					<th>Certificado</th>
					<th>Clinica</th>
				</tr>
			</thead>
			<tbody>";

				for($x=0; $x < $this->qtdeLinhas; $x++)
				{
					$this->row=mysqli_fetch_assoc($this->result);
					
					$this->exibicao .= "<tr><td>".$this->row["id"]."</td>";
					$this->exibicao .= "<td>".$this->row["nome"]."</td>";
					$this->exibicao .= "<td>".$this->row["nota"]."</td>";
					$this->exibicao .= "<td>".$this->row["telefone"]."</td>";
					$this->exibicao .= "<td>".$this->row["email"]."</td>";
					$this->exibicao .= "<td>".$this->row["certificado"]."</td>";
					$this->exibicao .= "<td>".$this->row["nomeClinica"]."</td>";
				}
				
				$this->exibicao .= "</tbody>
			</table>
		</div>
		<input type='button' value='Imprimir' class='btn btn-default' onclick=window.print()>";
		return utf8_encode($this->exibicao);
		
		
	}
	public function pesqCliente($sql)
	{
		
		$this->sql = $sql;
		$this->result=mysqli_query($this->bd->conexaobd,$this->sql);
		$this->qtdeLinhas = mysqli_num_rows($this->result);
		
		
		$this->exibicao =	"<div class='container' id='tabela'>
		<h2>Cliente</h2>
		
		<table class='table table-hover'>
			<thead>
				<tr>
					<th>Id</th>
					<th>Nome</th>			
					<th>Telefone</th>
					<th>Email</th>
					<th>CPF</th>
					<th>CEP</th>
				</tr>
			</thead>
			<tbody>";

				for($x=0; $x < $this->qtdeLinhas; $x++)
				{
					$this->row=mysqli_fetch_assoc($this->result);
					$this->exibicao .= "<tr><td>".$this->row["id"]."</td>";
					$this->exibicao .= "<td>".$this->row["nome"]."</td>";
					$this->exibicao .= "<td>".$this->row["telefone"]."</td>";
					$this->exibicao .= "<td>".$this->row["email"]."</td>";
					$this->exibicao .= "<td>".$this->row["cpf"]."</td>";
					$this->exibicao .= "<td>".$this->row["cep"]."</td>";
				}
				
				$this->exibicao .= "</tbody>
			</table>
		</div>
		<input type='button' value='Imprimir' class='btn btn-default' onclick=window.print()>";
		return utf8_encode($this->exibicao);
		
		
	}
	
			public function pesqPedido($sql)
	{
		
		$this->sql = $sql;
		$this->result=mysqli_query($this->bd->conexaobd,$this->sql);
		$this->qtdeLinhas = mysqli_num_rows($this->result);
		
		
		$this->exibicao =	"<div class='container' id='tabela'>
		<h2>Pedido</h2>
		
		<table class='table table-hover'>
			<thead>
				<tr>
					<th>Id</th>
					<th>Nome Cliente</th>
					<th>Nome Assistente</th>
					<th>Local</th>
					<th>Data e Hora</th>
					<th>Status</th>
					<th>Valor Bruto</th>
					<th>Valor Líquido</th>
					<th>Taxa</th>

				</tr>
			</thead>
			<tbody>";

				for($x=0; $x < $this->qtdeLinhas; $x++)
				{
					$this->row=mysqli_fetch_assoc($this->result);
					$this->exibicao .= "<tr><td>".$this->row["id"]."</td>";
					$this->exibicao .= "<td>".$this->row['nomeCliente']."</td>";
					$this->exibicao .= "<td>".$this->row['nomeAssistente']."</td>";
					$this->exibicao .= "<td>".$this->row["local"]."</td>";
					$this->exibicao .= "<td>".$this->row["data_hora"]."</td>";
					$this->exibicao .= "<td>".$this->pedidostatus($this->row["status"])."</td>";
					$this->exibicao .= "<td>".$this->fk_pagamento("pagamento","valor_bruto",$this->row["id"])."</td>";
					$this->exibicao .= "<td>".$this->fk_pagamento("pagamento","valor_liquido",$this->row["id"])."</td>";
					$this->exibicao .= "<td>".$this->fk_pagamento("pagamento","imposto",$this->row["id"])."</td></tr>";

					
				}
				
				$this->exibicao .= "</tbody>
			</table>
		</div>
		<input type='button' value='Imprimir' class='btn btn-default' onclick=window.print()>";
		return utf8_encode($this->exibicao);
		
		
	}
	
			public function pesqAssistentePedido($sql)
	{
		
		$this->sql = $sql;
		$this->result=mysqli_query($this->bd->conexaobd,$this->sql);
		$this->qtdeLinhas = mysqli_num_rows($this->result);
		
		
		$this->exibicao =	"<div class='container' id='tabela'>
		<h2>Pedido</h2>
		
		<table class='table table-hover'>
			<thead>
				<tr>
					
					<th>Nome Cliente</th>
					<th>Local</th>
					<th>Data e Hora</th>
					<th>Status</th>
					<th>Valor Bruto</th>
					<th>Valor Líquido</th>
					<th>Taxa</th>

				</tr>
			</thead>
			<tbody>";

				for($x=0; $x < $this->qtdeLinhas; $x++)
				{
					$this->row=mysqli_fetch_assoc($this->result);
					$this->exibicao .= "<td>".$this->row['nome']."</td>";
					$this->exibicao .= "<td>".$this->row["local"]."</td>";
					$this->exibicao .= "<td>".$this->row["data_hora"]."</td>";
					$this->exibicao .= "<td>".$this->pedidostatus($this->row["status"])."</td>";
					$this->exibicao .= "<td>".$this->fk_pagamento("pagamento","valor_bruto",$this->row["id"])."</td>";
					$this->exibicao .= "<td>".$this->fk_pagamento("pagamento","valor_liquido",$this->row["id"])."</td>";
					$this->exibicao .= "<td>".$this->fk_pagamento("pagamento","imposto",$this->row["id"])."</td></tr>";

					
				}
				
				$this->exibicao .= "</tbody>
			</table>
		</div>
		<input type='button' value='Imprimir' class='btn btn-default' onclick=window.print()>";
		return utf8_encode($this->exibicao);
		
		
	}
	
	public function pesqClientePedido($sql)
	{
		
		$this->sql = $sql;
		$this->result=mysqli_query($this->bd->conexaobd,$this->sql);
		$this->qtdeLinhas = mysqli_num_rows($this->result);
		
		
		$this->exibicao =	"<div class='container' id='tabela'>
		<h2>Pedido</h2>
		
		<table class='table table-hover'>
			<thead>
				<tr>
					
					<th>Nome Assistente</th>
					<th>Local</th>
					<th>Data e Hora</th>
					<th>Status</th>
					<th>Valor Bruto</th>
					<th>Valor Líquido</th>
					<th>Taxa</th>

				</tr>
			</thead>
			<tbody>";

				for($x=0; $x < $this->qtdeLinhas; $x++)
				{
					$this->row=mysqli_fetch_assoc($this->result);
					$this->exibicao .= "<td>".$this->row['nome']."</td>";
					$this->exibicao .= "<td>".$this->row["local"]."</td>";
					$this->exibicao .= "<td>".$this->row["data_hora"]."</td>";
					$this->exibicao .= "<td>".$this->pedidostatus($this->row["status"])."</td>";
					$this->exibicao .= "<td>".$this->fk_pagamento("pagamento","valor_bruto",$this->row["id"])."</td>";
					$this->exibicao .= "<td>".$this->fk_pagamento("pagamento","valor_liquido",$this->row["id"])."</td>";
					$this->exibicao .= "<td>".$this->fk_pagamento("pagamento","imposto",$this->row["id"])."</td></tr>";

					
				}
				
				$this->exibicao .= "</tbody>
			</table>
		</div>
		<input type='button' value='Imprimir' class='btn btn-default' onclick=window.print()>";
		return utf8_encode($this->exibicao);
		
		
	}
					
		// Trabalho Desnecessauro Abaixo

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

<?php
include "conexao.php";
session_start();
$cpf = $_SESSION['cpf'];
$id = $_SESSION['id'];
$query_user = "SELECT * FROM usuario WHERE usu_cpf = '$cpf' AND usu_id = '$id'";
$sql_user = mysqli_query($conexao,$query_user);
while ($ln = mysqli_fetch_assoc($sql_user)) {
	$nome = $ln['usu_nome'];
}

$query_conta = "SELECT * FROM conta
INNER JOIN usuario on usuario.usu_id = conta.usuario_usu_id
INNER JOIN endereco on conta.endereco_end_id = endereco.end_id WHERE usuario_usu_id = '$id'";
$sql_conta = mysqli_query($conexao,$query_conta);
while($d = mysqli_fetch_assoc($sql_conta)){
	$id_cli = $d['con_id'];
	$end = $d['endereco_end_id'];
	$valor = $d['con_valor'];
	$consumo = $d['con_consumo'];
	$bandeira = $d['con_bandeira'];
	$mes = $d['con_mes'];
	$venci = $d['con_vencimento'];
	$qtd = $d['con_qtd'];
	$inst = $d['con_intalacao'];
	$debito = $d['con_debito'];
	$classe = $d['con_classe'];
	$dnf = $d['con_dnf'];
	$pre = $d['con_pre'];

}
$query_end = "SELECT * FROM endereco WHERE end_id = '$end'";
$sql_end = mysqli_query($conexao,$query_end);
while ($e = mysqli_fetch_assoc($sql_end)){
	$cep = $e['end_cep'];
	$num = $e['end_numero'];
	$rua = $e['end_rua'];
	$bairro = $e['end_bairro'];
	$ref = $e['end_referencia'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
<div class="container fundo">
	<div class="row header">
		<div class="col-md-12" style="margin-top: 23px"><label>ENERGY J.C.A</label></div>
	</div>
	<div class="row">
		<div class="col-sm-1 col-md-4 te"><?php echo $nome;?><br><?php echo $rua;?><br><?php echo $bairro;?>
			<br><?php echo $cep;?>, UF<br>CPF <?php echo $cpf;?></div>
			<div class="col-md-4 ml-md-auto te">
				Referente a<br>DEZ/2016<br>Código de Débito Automático<br><?php echo $debito;?>
			</div>
	    <div class="col-sm-5 offset-sm-2 col-md-4 offset-md-0"><h3>Nº DO CLIENTE</h3><H3><?php echo $id_cli;?></H3>
	    </div>	
	</div>
	<p style="color: green">NOTA FISCAL-CONTA DE ENERGIA ELÉTRICA-SÉRIE U N 0000000-PTA Nº16.0000114527.70</p>
	<div class="row">
		<div class="col-md-2 fun te"><h6>Classe</h6><?php echo $classe;?></div>
		<div class="col-md-2 fun te"><h6>Subclasse</h6>Residencial</div>
		<div class="col-md-3 fun te">
			<h6>Data da leitura</h6>
			<table class="w3-table size te">
				<tr class="center">
					<td>ATUAL</td>
				</tr>
				<tr>
					<td><?php echo $mes;?></td>
			</table>
		</div>
		<div class="col-dm-4 fun te">
			<table class="w3-table size">
				<h6>Data da Nota Fiscal</h6>
				<tr class="center">
					<td>EMISSÃO</td>
					<td>APRESENTAÇÃO</td>
				</tr>
				<tr>
					<td><?php echo $mes;?></td>
					<td><?php echo $dnf;?></td>
			</table>
		</div>
		<div class="col-md-2 fun te" style="
		background-color: #278200;
    	color: #fff;">
				<h5>Nº DA INSTALAÇÃO</h5>
				<h3><?php echo $inst;?></h3>
		</div>
		</div>
		<div class="row te">
			<div class="col-md-5 fun"><h4>Informações Gerais</h4>Tarifa vigente conforme res. aneel nº 626 de 07/04/08<br>
				nota fiscal quitada em 23/01/2009<br>
				há debitos anteriores<br>
				o pagamento desta conta não quita debitos anteriores.
	</div>
	<!-- QUEBRA DE COLUNA -->

			<div class="col-md-6 fun">
				<h4 class="center">Valores Faturados</h4>
				<table class="w3-table">
					<tr class="center">
						<th class="t">Descrição</th>
						<th class="t">Quantidade</th>
						<th class="t">Preço</th>
						<th class="t">Valor(R$)</th>
					</tr>
					<tr>
						<td>ENERGIA KWH</td>
						<td><?php echo $qtd;?></td>
						<td><?php echo $pre;?></td>
						<td><?php echo $valor;?></td>
					</tr>
				</table>
			</div>
		</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
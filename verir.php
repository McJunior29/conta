<?php
include "conexao.php";
session_start();
$_SESSION['cpf'] = $_POST['cpf'];
$cpf = $_SESSION['cpf'];
$_SESSION['senha'] = $_POST['senha'];
$senha = $_SESSION['senha'];
$_SESSION['user'] = $_POST['user'];
$user = $_SESSION['user'];

$query = "SELECT * FROM usuario WHERE usu_cpf = '$cpf'";
$sql = mysqli_query($conexao,$query);

while ($ln = mysqli_fetch_assoc($sql)){
	$id = $ln['usu_id'];
	$cpf_v = $ln['usu_cpf'];
	$senha_v = $ln['usu_senha'];
}
if($user == 2){
	if ($cpf == $cpf_v && $senha == $senha_v) {
		$_SESSION['id'] = $id;
		 header('location:logado.php');
	}
}
if ($user == 1) {
	if ($cpf == 123 && $senha == 123) {
		header('location:cadastro.php');
	}
}
?>
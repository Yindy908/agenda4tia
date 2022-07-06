<?php
include 'classes/contato.class.php';

$contato = new Contatos();

if(!empty($_POST['id'])){
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$endereco = $_POST['endereco'];
	$data_nasc = $_POST['data_nasc'];
	$id = $_POST['id'];

	if(!empty($email)){
		$contato->editar($nome, $email, $telefone, $endereco, $data_nasc, $id);
	}
	header('Location: /agenda4tia');
	exit;
}
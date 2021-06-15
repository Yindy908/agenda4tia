<?php
include 'classes/contato.class.php';

$cont = new Contato();

	if(!empty($_POST['email'])){
		$nome = $_POST['nome'];
		$telefone = $_POST['telefone'];
		$email = $_POST['email'];
		$endereco = $_POST['endereco'];
		//$data_nasc = $_POST['data_nasc'];

		$cont->adicionar($email, $nome, $telefone, $endereco);

		header('Location: index.php');
	} else {
		echo '<script type="text/javascript">alert("Email já cadastrado!");</script>';
		
	}


?>
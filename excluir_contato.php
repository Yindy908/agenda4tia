<?php
include 'classes/contato.class.php';
$contato = new Contatos();

if(!empty($_GET['id'])){
	$id = $_GET['id'];
	$contato->excluir($id);
	header("Location: /agenda4tia");
}else{
	echo '<script type="text/javascript">alert("erro ao excluir")</script>';
}
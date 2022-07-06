<?php 
include 'inc/header.inc.php';
include 'classes/contato.class.php';

$contato = new Contatos();

if(!empty($_GET['id'])){
	$id = $_GET['id'];
	$info = $contato->busca($id);
	if(empty($info['email'])){
		header("Location: /agenda4tia");
		exit;
	}
}
else{
	header("Location: /agenda4tia");
	exit;
}

?>
<h1>Editar Contatos</h1>
<form action="editar_contato_submit.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $info['id']; ?>">
	<label>Nome:</label><br><br>
	<input type="text" name="nome" required="required" value="<?php echo $info['nome']; ?>"><br><br>
	<label>Telefone:</label><br><br>
	<input type="text" name="telefone" required="required" value="<?php echo $info['telefone']; ?>"><br><br>
	<label>Email:</label><br><br>
	<input type="mail" name="email" value="<?php echo $info['email']; ?>"><br><br>
	<label>Endereço:</label><br><br>
	<input type="text" name="endereco" required="required" value="<?php echo $info['endereco'];?>"><br><br>
	<label>Data Nascimento:</label><br><br>
	<input type="date" name="data_nasc" value="<?php echo $info['data_nasc'];?>"><br><br>

	<input type="submit" value="salvar">
</form>


<?php include 'inc/footer.inc.php'; ?>
<?php require_once 'inc/header.inc.php'?>
<h1>Adicionar Contatos</h1>
<form action="adicionar_contatos_submit.php" method="POST">
	<label>Nome:</label><br><br>
	<input type="text" name="nome" required="required"><br><br>
	<label>Telefone:</label><br><br>
	<input type="text" name="telefone" required="required"><br><br>
	<label>Email:</label><br><br>
	<input type="mail" name="email"><br><br>
	<label>Endereço:</label><br><br>
	<input type="text" name="endereco" required="required"><br><br>
	<label>Data Nascimento:</label><br><br>
	<input type="date" name="data_nasc"><br><br>

	<input type="submit" name="btCadastrar" value="Cadastrar">
</form>


<?php require_once 'inc/footer.inc.php'?>
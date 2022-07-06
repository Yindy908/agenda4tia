<?php 
include 'inc/header.inc.php';
include 'classes/contato.class.php';
$contatos = new Contatos();
?>
<div class="corpo">

<h1>CORPO DA AGENDA</h1>
<hr>
<a href="adicionar_contatos.php">adicionar</a>
<hr>
<table border="2" width="900px">
	<tr>
		<th>ID</th>
		<th>NOME</th>
		<th>EMAIL</th>
		<th>TELEFONE</th>
		<th>ENDEREÇO</th>
		<th>DATA NASCIMENTO</th>
	</tr>
	<?php
		$lista = $contatos->listar();
		foreach($lista as $item):		
	?>
	<tr>
		<td><?php echo $item['id']; ?></td>
		<td><?php echo $item['nome']; ?></td>
		<td><?php echo $item['email']; ?></td>
		<td><?php echo $item['telefone']; ?></td>
		<td><?php echo $item['endereco']; ?></td>
		<td><?php  echo $item['data_nasc']; ?></td>
		<td><a href="editar_contato.php?id=<?php echo $item['id'];?>">[Editar]</a></td>
		<td><a href="excluir_contato.php?id=<?php echo $item['id'];?>">[Excluir]</a></td>
	</tr>
	<?php endforeach; ?>
</table>

</div>
<?php include 'inc/footer.inc.php'?>
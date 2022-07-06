<?php
require_once 'conexao.class.php';

class Contatos {
	private $con;

	private $id;
	private $nome;
	private $telefone;
	private $email;
	private $endereco;
	private $data_nasc;

	public function __construct(){
		$this->con = new Conexao();
	}
	public function __set($atributo, $valor){
		$this->atributo = $valor;
	}
	public function __get($atributo){
		return $this->$atributo;
	}

	public function adicionar ($email, $nome, $telefone, $endereco, $data_nasc){
		$emailExistente = $this->existeEmail($email);
		if(count($emailExistente) == 0){
			try{
				$this->nome = $nome;
				$this->email  = $email;
				$this->telefone = $telefone;
				$this->endereco = $endereco;
				$this->data_nasc = $data_nasc;
					$sql = $this->con->conectar()->prepare("INSERT INTO contatos(nome, email, telefone, endereco, data_nasc) VALUES (:nome, :email, :telefone, :endereco, :data_nasc)");
					$sql->bindParam(":nome", $this->nome, PDO::PARAM_STR);
					$sql->bindParam(":email", $this->email, PDO::PARAM_STR);
					$sql->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
					$sql->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
					$sql->bindParam(":data_nasc", $this->data_nasc, PDO::PARAM_STR);
					$sql->execute();
					return TRUE;
			}catch(PDOException $ex){
				return 'erro: '.$ex->getMessage();
			}
		}else{
			return FALSE;
		}
	}

	public function existeEmail($email){
		$sql = $this->con->conectar()->prepare("SELECT id FROM contatos WHERE email = :email");
		$sql->bindParam(":email", $email, PDO::PARAM_STR);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}else{
			$array = array();
		}
		return $array;
	}

	public function listar(){
		try{
			$sql = $this->con->conectar()->prepare("SELECT id, nome, email, telefone, endereco, data_nasc FROM contatos");
			$sql->execute();
			return $sql->fetchAll();
		}catch(PDOException $ex){
			return 'Erro: '.$ex.getMessage();
		}
	}

	public function busca($id)
	{
		try{
			$sql = $this->con->conectar()->prepare("SELECT * FROM contatos WHERE id = :id");
			$sql->bindValue(':id', $id);
			$sql->execute();
			if($sql->rowCount()>0){
				return $sql->fetch();
			}else{
				return array();
			}
		}catch(PDOException $ex){
			echo "ERRO:".$ex->getMessage();
		}
	}


	public function editar($nome, $email, $telefone, $endereco, $data_nasc, $id){
		$emailExistente = $this->existeEmail($email);
		if(count($emailExistente) > 0 && $emailExistente['id'] != $id){
			return FALSE;
		}else{
			try{
				$sql = $this->con->conectar()->prepare("UPDATE contatos SET nome = :nome, email = :email, telefone = :telefone, endereco  = :endereco, data_nasc = :data_nasc WHERE id = :id");
				$sql->bindValue(':nome', $nome);
				$sql->bindValue(':email', $email);
				$sql->bindValue(':telefone', $telefone);
				$sql->bindValue(':endereco', $endereco);
				$sql->bindValue(':data_nasc', $data_nasc);
				$sql->bindValue(':id', $id);
				$sql->execute();
				return TRUE;
			}catch(PDOException $ex){
				echo "erro: ".$ex->getMessage();
			}
		}
	}
	public function excluir($id){
		$sql = $this->con->conectar()->prepare("DELETE FROM contatos WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

}

?>
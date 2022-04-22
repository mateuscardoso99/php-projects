<?php

	include('../database/connection.php');

	class News{
		private $db;
		private $connection;

		function __construct(){
			$this->db = new Database();
			$this->connection = $this->db->getConnection();
		}

		function store($request){
			try {
				$sql = "insert into noticias (title,content,id_categoria) values(:title,:content,:id_categoria)";
				$stmt = $this->connection->prepare($sql);
				$stmt->bindValue(':title',trim(htmlspecialchars($request['titulo'])),PDO::PARAM_STR);
				$stmt->bindValue(':content',trim(htmlspecialchars($request['conteudo'])),PDO::PARAM_STR);
				$stmt->bindValue(':id_categoria',trim(strip_tags($request['id_categoria'])),PDO::PARAM_INT);
				$stmt->execute();

				session_start();
				$_SESSION['status'] = 'Cadastrado com sucesso';
				
				header("Location: ../pages/index.php");
			} catch (Exception $e) {
				$_SESSION['status'] = 'Não foi possível cadastrar';
				header("Location: ../pages/index.php");
			}
		}

		function show($valor = null){
			$sql = "select noticias.id as nid,noticias.title,
				noticias.content, categorias.id as cid, categorias.name from noticias join categorias 
				on(noticias.id_categoria = categorias.id)";
			if (!$valor) {
				$result = $this->connection->query($sql);
				$news = $result->fetchAll(PDO::FETCH_ASSOC);
				return $news;
			}else{
				$sql .= "where title like :valor";
				$stmt = $this->connection->prepare($sql);
				$stmt->bindValue(':valor','%'.$valor.'%',PDO::PARAM_STR);
				$stmt->execute();
				$noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $noticias;
			}
		}


		function update($request){
			try {
				$sql = "update noticias set title=:title, content=:content,id_categoria=:id_categoria where id=:id";
				$stmt = $this->connection->prepare($sql);
				$stmt->bindValue(':title',trim(htmlspecialchars($request['titulo'])),PDO::PARAM_STR);
				$stmt->bindValue(':content',trim(htmlspecialchars($request['conteudo'])),PDO::PARAM_STR);
				$stmt->bindValue(':id_categoria',trim(strip_tags($request['id_categoria'])),PDO::PARAM_INT);
				$stmt->bindValue(':id',trim(strip_tags($request['id'])),PDO::PARAM_INT);
				$stmt->execute();

				session_start();
				$_SESSION['status'] = 'Atualizado com sucesso';
				
				header("Location: ../pages/index.php");
			} catch (Exception $e) {
				$_SESSION['status'] = 'Não foi possível atualizar';
				header("Location: ../pages/index.php");
			}
		}

		function delete($id){
			try {
				$sql = "delete from noticias where id = :id";
				$stmt = $this->connection->prepare($sql);
				$stmt->bindValue(':id',trim(strip_tags($id)),PDO::PARAM_INT);
				$stmt->execute();

				session_start();
				$_SESSION['status'] = 'Removido com sucesso';
				header("Location: ../pages/index.php");
			} catch (Exception $e) {
				$_SESSION['status'] = "Não foi possível apagar";
				header("Location: ../pages/index.php");
			}
		}

	}

?>
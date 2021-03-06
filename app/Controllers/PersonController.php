<?php
namespace App\Controllers;

use App\Models\BaseModel;

class PersonController extends BaseController
{
  function __construct()
  {
    $this->banco = new BaseModel();
  }

	public function index()
	{
		parent::buildViewStructure('Person/index');
	}

	public function index_update()
	{
		$stmt = $this->banco->conn->prepare("SELECT * FROM torcedor");
		$stmt->execute();
		$data = $stmt->fetchAll();

		parent::buildViewStructure('Person/index_update', $data);
	}

	public function index_update_form($param = '')
	{
		if(isset($param) && $param != '')
		{
			$_SESSION['id'] = $param;
			parent::buildViewStructure('Person/index_insert_fields');
		}
	}

	public function update()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {	
			if($_POST['telefone'] != '' &&
				 $_POST['email'] != '')
			{
				try
				{
					$stmt = $this->banco->conn->prepare("UPDATE torcedor SET telefone = ?, email = ? WHERE id = ?");
					$stmt->execute([$_POST['telefone'], $_POST['email'], $_SESSION['id']]);
					
					session_destroy();
					session_start();
          $_SESSION['msg'] = 'Torcedor atualizado com sucesso!';
					header('Location: /');
				}
				catch(\PDOException $e) 
				{
          $_SESSION['msg'] = $e->getMessage();
				}
				
			}
		}
	}

	public function insert()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {	
			if($_POST['nome'] != '' &&
			   $_POST['documento'] != '' &&
				 $_POST['cep'] != '' &&
				 $_POST['endereco'] != '' &&
				 $_POST['bairro'] != '' &&
				 $_POST['cidade'] != '' &&
				 $_POST['uf'] != '' &&
				 $_POST['telefone'] != '' &&
				 $_POST['email'] != '')
			{
				try
				{
					$stmt = $this->banco->conn->prepare("INSERT INTO torcedor (nome, documento, cep, endereco, bairro, cidade, uf, telefone, email, ativo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
					$stmt->execute([$_POST['nome'], $_POST['documento'], $_POST['cep'], $_POST['endereco'], $_POST['bairro'], $_POST['cidade'], $_POST['uf'], $_POST['telefone'], $_POST['email'], '1']);
					
          $_SESSION['msg'] = 'Torcedor inserido com sucesso!';
					header('Location: /');
				}
				catch(\PDOException $e) 
				{
          $_SESSION['msg'] = $e->getMessage();
				}
				
			}
		}
	}
}
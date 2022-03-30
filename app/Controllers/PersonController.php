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
					header('Location: /');
				}
				catch(\PDOException $e) 
				{
					echo $e->getMessage();
				}
				
			}
		}
	}
}
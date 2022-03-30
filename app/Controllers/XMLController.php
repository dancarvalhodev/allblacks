<?php
namespace App\Controllers;

use App\Models\BaseModel;

class XMLController extends BaseController
{
  private  $banco;

	public function index()
	{
		parent::buildViewStructure('XML/index');
	}

  function __construct()
  {
    $this->banco = new BaseModel();
  }

  public function upload()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      $xml = $_FILES['xmlFile'];

      if(isset($xml))
      {
        $file_name = $xml['name'];
        $file_tmp = $xml['tmp_name'];
        $file_type = $xml['type'];
        $file_ext = strtolower(end(explode('.',$xml['name'])));
        
        $extensions= array("xml");
        
        if(in_array($file_ext,$extensions) === false)
        {
          $_SESSION['msg'] = 'Extensão não válida, por favor escolha um XML.';
          header('Location: /');
        }

        if($file_type !== 'text/xml')
        {
          $_SESSION['msg'] = 'Arquivo inválido, por favor escolha um XML.';
          header('Location: /');
        }
        
        move_uploaded_file($file_tmp,"./Uploads/".$file_name);

        $xmlFile = simplexml_load_file("./Uploads/". $file_name) or die("Error: Cannot create object");
        
        if($this->banco->status)
        {
          $errors = array();

          foreach($xmlFile->torcedor as $pessoa)
          {
            try
            {
              $stmt = $this->banco->conn->prepare("INSERT INTO torcedor (nome, documento, cep, endereco, bairro, cidade, uf, telefone, email, ativo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
              $stmt->execute([$pessoa['nome'], $pessoa['documento'], $pessoa['cep'], $pessoa['endereco'], $pessoa['bairro'], $pessoa['cidade'], $pessoa['uf'], $pessoa['telefone'], $pessoa['email'], $pessoa['ativo']]);
            }
            catch(\PDOException $e) 
            {
              $errors[] = $e->getMessage();
              continue;
            }
          }
        }

        if(empty($errors))
        {
          $_SESSION['msg'] = 'Arquivo enviado e consumido com sucesso!';
        }
        else
        {
          foreach($errors as $erro)
          {
            $_SESSION['msg'] = $erro . '|';
          }
        }
        
        header('Location: /');
      }
    }
  }
}
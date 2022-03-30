<?php
namespace App\Controllers;

class XMLController extends BaseController
{
	public function index()
	{
		parent::buildViewStructure('XML/index');
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
        
        // Consumo do XML

        $_SESSION['msg'] = 'Arquivo enviado com sucesso';
        header('Location: /');
      }
    }
  }
}
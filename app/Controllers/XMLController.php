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

      if(isset($xml)){
        $errors= array();

        $file_name = $xml['name'];
        $file_tmp = $xml['tmp_name'];
        $file_type = $xml['type'];
        $file_ext = strtolower(end(explode('.',$xml['name'])));
        
        $extensions= array("xml");
        
        if(in_array($file_ext,$extensions) === false)
        {
          $errors[] = "Extensão não válida, por favor escolha um XML.";
        }

        if($file_type !== 'text/xml')
        {
          $errors[] = "Arquivo inválido, por favor escolha um XML.";
        }
        
        if(empty($errors)==true)
        {
          move_uploaded_file($file_tmp,"./Uploads/".$file_name);
          echo "Deu Certo";
        }
        else
        {
          print_r($errors);
        }
     }
    }
  }
}
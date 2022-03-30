<?php
namespace App\Models;

class BaseModel
{
  public $status;
  public $conn;

	function __construct()
	{
    $servername = "mysql";
    $username = "root";
    $password = "root";
    
    try 
    {
      $this->conn = new \PDO("mysql:host=$servername;dbname=allblacks", $username, $password);
      $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

      try
      {
        $sql = "CREATE TABLE torcedor (
          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          nome VARCHAR(100) NOT NULL,
          documento VARCHAR(30) NOT NULL,
          cep VARCHAR(30) NOT NULL,
          endereco VARCHAR(100) NOT NULL,
          bairro VARCHAR(100) NOT NULL,
          cidade VARCHAR(100) NOT NULL,
          uf VARCHAR(3) NOT NULL,
          telefone VARCHAR(15),
          email VARCHAR(50),
          ativo VARCHAR(1) NOT NULL
        )";
        
        $this->conn->exec($sql);
        $this->status = true;  
      }
      catch(\PDOException $e) 
      {
        $code = $e->getCode();
      }
      finally
      {
        if($code == '42S01')
        {
          return $this->status = true;
        }
      }
    } 
    catch(\PDOException $e) 
    {
      $this->status = false;
      echo "Falha na conexão com o banco. Motivo: " . $e->getMessage();
    }
	}
}
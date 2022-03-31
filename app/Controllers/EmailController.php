<?php
namespace App\Controllers;

use App\Models\BaseModel;

class EmailController extends BaseController
{
  function __construct()
  {
    $this->banco = new BaseModel();
  }

	public function send()
	{
    $stmt = $this->banco->conn->prepare("SELECT email FROM torcedor");
		$stmt->execute();
		$data = $stmt->fetchAll();

    foreach($data as $torcedor)
    {
      $email = new \SendGrid\Mail\Mail();
      $email->setFrom(EMAIL_MARKETING);
      $email->setSubject("E-mail de Marketing");
      $email->addTo($torcedor['email']);
      $email->addContent(
          "text/html",
          'Marketing'
      );

      $sendgrid = new \SendGrid(trim(SENDGRID_APIKEY));

      try 
      {
        $response = $sendgrid->send($email);

        if($response->statusCode() == 401)
        {
          $_SESSION['msg'] = 'Limite diário de envio de e-mails atingido!';
          header('Location: /');
        }
        else
        {
          $_SESSION['msg'] = 'Disparo feito com sucesso!';
          header('Location: /');
        }

      } 
      catch (\Exception $e) 
      {
        echo $e->getMessage();
      }
    }
	}
}
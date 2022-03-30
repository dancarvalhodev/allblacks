<?php
namespace App\Controllers;

class BaseController
{
	function __construct()
	{
		if(!session_status())
		{
			session_start();
		}
	}

    protected function buildViewStructure($viewName, $viewArray = [])
    {
			$_SESSION['data'] = $viewArray;
			
			include $_SERVER['DOCUMENT_ROOT'] . '/../app/Views/Templates/header.php';
			include $_SERVER['DOCUMENT_ROOT'] . '/../app/Views/' . $viewName . '.php';
			include $_SERVER['DOCUMENT_ROOT'] . '/../app/Views/Templates/end.php';
    }
}
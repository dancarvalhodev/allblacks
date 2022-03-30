<?php
namespace App\Controllers;

class BaseController
{
	function __construct()
	{
		session_start();
	}

    protected function buildViewStructure($viewName, $viewArray = [])
    {
			$_SESSION['data'] = $viewArray;

			include 'views/header.php';
			include 'views/' . $viewName . '.php';
			include 'views/end.php';
    }
}
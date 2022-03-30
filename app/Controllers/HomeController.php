<?php
namespace App\Controllers;

class HomeController extends BaseController
{
	public function index()
	{
		parent::buildViewStructure('home');
	}
}
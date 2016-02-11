<?php

include_once('core/Controller.php');


class TerminatorController extends Controller
{
	private $nomDuModule;

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		parent::loadView('generator');
	}
	
	public function treatForm()
	{
		if (isset($_POST['nomModule']) && $_POST['nomModule'])
		{
			$this->nomDuModule = htmlentities($_POST['nomModule']);

			# ici on va créer les script adaptés
			
		}
		else
			echo 'form vide';
	}

}
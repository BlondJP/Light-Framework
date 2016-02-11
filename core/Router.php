<?php

class Router
{
	private $inputUrl;
	private $segments;
	private $isIndex = FALSE;

	public function __construct()
	{
		# Récupération des routes
		$this->inputUrl = $_SERVER["REQUEST_URI"];
		$parts = explode('/', $this->inputUrl);
		$isSegment =  -1;
		$this->segments = [];
		foreach ($parts as $part)
		{
			if ($isSegment === 0 && strlen($part) !== 0)
				$this->segments[] = $part;

			if (strcmp($part, 'index.php') === 0)
				$isSegment = 0;
		}
		if ($isSegment ===  0 && count($this->segments) === 0)
		{
			# Cas ou l'url entrée est seulement index.php
			$this->isIndex = TRUE;
		}
	}

	public function applyRoute()
	{
		# dans cette fonction on va appliquer la route donnée et appeler le controller adapté

		include_once('app/config/routes.php');
		$routes = getRoutes();

		if ($this->isIndex === TRUE)
		{
			# Cas ou l'url est seulement index.php
			foreach ($routes as $url => $pathToControllerAndMethod)
			{
				if (strcmp($url, '__default') === 0)
				{
					# on découpe la route pour trouver le controller
					$paths = explode('/', $pathToControllerAndMethod);
					$pathOfTheController = 'app/controllers/'. ucfirst($paths[0]) . 'Controller.php';
					if (file_exists($pathOfTheController) === TRUE)
					{
						include_once($pathOfTheController);

						# ici on va definir le basepath
						//$basePath = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
						//var_dump($basepath)

						//echo 'lol'; die;
						$phpRequest = ucfirst($paths[0]) . 'Controller::' . $paths[1] . '();';
						eval($phpRequest);
					}
					else
					{
						echo 'bad route';
					}
					die;
				}
			}

			# erreur 404
			echo 'erreur 404 1';
			#  faire le nécéssaire#

		}
		else
		{
			# I hope
		$cleanuUrl = implode('/', $this->segments);
		//var_dump($cleanuUrl); die;

		$error404 = TRUE;

		foreach ($routes as $url => $pathToControllerAndMethod)
		{
			//echo $cleanuUrl . ' ' .$url . '<br>';
			if (strcmp($cleanuUrl, $url) === 0)
			{
				//echo 'oui';
				# Cas ou on a tapé une url validée dans les routes
				$error404 = FALSE;

				# on découpe la route pour trouver le controller
				$paths = explode('/', $pathToControllerAndMethod);
				if (count($paths) == 2)
				{
					# Cas normal
					$pathOfTheController = 'app/controllers/'. ucfirst($paths[0]) . 'Controller.php';
					if (file_exists($pathOfTheController) === TRUE)
					{
						include_once($pathOfTheController);

						$phpRequest = ucfirst($paths[0]) . 'Controller::' . $paths[1] . '();';
						eval($phpRequest);
					}
					else
					{
						echo 'bad route';
					}
				}
				else
				{
					# bad route entered
					echo 'bad route format :: ex: controller/method';
				}
			}
		}

		if ($error404 === TRUE)
			echo 'erreur 404 2';

		}
	}

}

?>
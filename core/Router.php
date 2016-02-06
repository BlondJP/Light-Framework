<?php

class Router
{
	private $inputUrl;
	private $segments;

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

	}

	public function applyRoute()
	{
		# dans cette fonction on va appliquer la route donnée et appeler le controller adapté

		include_once('app/config/routes.php');
		$routes = getRoutes();

		# I hope
		$cleanuUrl = implode('/', $this->segments);
		
		$error404 = TRUE;

		foreach ($routes as $url => $pathToControllerAndMethod)
		{
			if (strcmp($cleanuUrl, $url) === 0)
			{
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
			echo 'erreur 404';


	}

}

?>
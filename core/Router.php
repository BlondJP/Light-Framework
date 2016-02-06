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

		# Gestion des urls de mauvaise longueur
		if (count($this->segments) !== 2)
		{
			echo 'Bad URL Length';
			$this->segments = FALSE;
		}
	}

	public function applyRoute()
	{
		# dans cette fonction on va appliquer la route donnée et appeler le controller adapté
		if ($this->segments !== FALSE)
		{
			# Cas où la route est reglementaire  #ex:  /mon/chemin/
			$pathOfTheController = 'app/controllers/' . ucfirst($this->segments[0]) . 'Controller' . '.php';
			if (file_exists($pathOfTheController) === TRUE)
			{
				include_once($pathOfTheController);

				# Ici on va essayer d'appeler la méthode dite dans l'url
				$phpRequest = ucfirst($this->segments[0]) . 'Controller' . '::' . $this->segments[1] . '();';

				# On masque le message d'erreur de eval()
				$response = @eval($phpRequest);
			}
			else
			{
				# Code 404
				echo 'erreur 404 :: controller ';
			}
		}	
	}

}

?>
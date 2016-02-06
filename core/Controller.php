<?php 


class Controller
{
	protected function loadModel($model)
	{
		# creation du pathToModel
		$pathToAModel = 'app/models/'. ucfirst($model) . 'Model.php';

		if (file_exists($pathToAModel) === FALSE)
		{
			echo "model $pathToAModel not found !";
		}
		else
		{
			include_once($pathToAModel);
		}
	}

	protected function loadView($view)
	{
		# creation du pathToView
		$pathToAView = 'app/views/'. $view . 'View.php';

		if (file_exists($pathToAView) === FALSE)
		{
			echo "model $pathToAView not found !";
		}
		else
		{
			include_once($pathToAView);
		}
	}
}


 ?>
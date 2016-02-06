<?php 


class DbzController{

	public static function presentation()
	{
		echo 'salut c\'est JP';
	}

	public function test()
	{
		echo file_get_contents('http://localhost/light/index.php/presentation');
	}
}


 ?>
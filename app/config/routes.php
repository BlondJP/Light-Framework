<?php

function getRoutes()
{
	$routes = [];
	# Ici vous écrirez les routes que vous autorisez

	# Exemples
	# $routes['monurl'] = 'controller/method';
	# $routes['mon/url'] = 'controller/method';
	
	$routes['presentation'] = 'dbz/presentation';
	$routes['ma/presentation'] = 'dbz/presentation';
	$routes['test'] = 'dbz/test';

	return $routes;
}

?>
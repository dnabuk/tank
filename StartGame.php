<?php
require_once('Config.php');

$Main = new MainGame();
//Sekcja odpowiedzialna za logowanie START
if(!$Main->CheckMyPlayerName())
{
	$LoginResult = $Main->Login();
	if($LoginResult->errno == 0)
	{
		$_SESSION['key'] = $LoginResult->data->key;
	}
	else 
	{
		echo 'Error Login no. '.$LoginResult->data->key;
	}
}
if(!isset($_SESSION['key']) )
{
	$_SESSION['key'] = KEY;
}
//Sekcja odpowiedzialna za logowanie END
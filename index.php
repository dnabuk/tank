<?php
session_start();

define("GAMEURL", "http://tank.iai.ninja/api");
define("PLAYERNAME", "Team_5");
define("KEY", "02dab45610fa718dcf1d06fb514abb8d");


require_once('MainGame.php');
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
//Sekcja odpowiedzialna za logowanie END

//Pobieranie pozycji i decyzja o ruchu START
$GetBoardResult = $Main->GetBoard();
$DrawBoardResult = $Main->DrawBoard($GetBoardResult);

print_r($DrawBoardResult);







//Pobieranie pozycji i decyzja o ruchu END
die;






//Wykonywanie ruchow START
$direction = 'S';
$distance = '1';
$fire = false;

$MoveResult = $Main->MoveTo($_SESSION['key'], $direction, $distance, $fire);

print_r($_SESSION['key']);
//Wykonywanie ruchow END
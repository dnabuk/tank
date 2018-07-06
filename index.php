<?php
//02dab45610fa718dcf1d06fb514abb8d 
define("GAMEURL", "http://tank.iai.ninja/api");
define("PLAYERNAME", "Team_5");

require_once('MainGame.php');


//Logowanie do gry start
$Login = new MainGame();
$LoginResult = $Login->Login();
$Login->moveTo2('02dab45610fa718dcf1d06fb514abb8d', 'E', 2, true);

if($LoginResult->errno == 0)
{
	print_r($LoginResult);
}
else 
{
	echo 'Error no: '.$LoginResult->errno;
}

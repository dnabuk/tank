<?php
define("GAMEURL", "http://tank.iai.ninja/api");
define("PLAYERNAME", "Team_5");

require_once('MainGame.php');

//Logowanie do gry start
$Login = new MainGame();
$LoginResult = $Login->Login();

if($LoginResult->errno == 0)
{
	
}
else 
{
	echo 'Error no: '.$LoginResult->errno;
}



//Logowanie do gry end
print_r($LoginResult);
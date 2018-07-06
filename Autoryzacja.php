<?php
class LoginToGame
{
	public function __construct()
	{
		
	}
	
	public function Login()
	{
		$data = array('name' => 'Team_5');
		$ch = curl_init('http://tank.iai.ninja/api/join-current-game.php');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$result = curl_exec($ch);
		print_r($result);
		$result = json_decode($result);
		curl_close($ch);
	}
}
$login = new LoginToGame();
print_r($login->Login());
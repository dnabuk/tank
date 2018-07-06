<?php
class LoginToGame
{
	private static $name = 'Team_5';
	private static $url = 'http://tank.iai.ninja/api/';
	
	public function __construct()
	{
		
	}
	
	public function Login()
	{
		$data = array('name' => self::$name);
		$ch = curl_init(self::$url.'join-current-game.php');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		$result = curl_exec($ch);
		$result = json_decode($result);
		curl_close($ch);
		return $result;
	}
}

<?php
class MainGame
{	
	public function Login()
	{
		$data = array('name' => PLAYERNAME);
		$ch = curl_init(GAMEURL.'/join-current-game.php');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		$result = curl_exec($ch);
		$result = json_decode($result);
		curl_close($ch);
		return $result;
	}
	
	public function MoveTo($key, $direction, $distance, $fire)
	{
		$data = array(
				'key' => $key,
				'direction' => $direction,
				'distance' => $distance,
				'fire' => $fire,
		);
		$ch = curl_init(GAMEURL.'/make-move.php');
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

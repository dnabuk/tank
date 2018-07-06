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
	public function moveTo2($key, $direction, $distance, $fire){
        $post = [
            'key' => $key,
            'direction' => $direction,
            'distance'   => $distance,
            'fire' => $fire
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, GAMEURL.'/make-move.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        $response = curl_exec($ch);
        var_export($response);

        echo '<pre>';
        echo var_dump($post);
        echo '</pre>';
    }
    public function  gameStatus(){
        $url = "http://tank.iai.ninja/api/get-current-board.php";
        $data = json_decode(file_get_contents($url), true);
        echo "id: ", $data['id'];
        echo '<br>';
        echo "Name: ", $data['name'];
        echo '<br>';
        echo "Status: ",$data['state'];
    }
}

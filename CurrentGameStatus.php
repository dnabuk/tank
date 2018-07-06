<?php
class CurrentGameStatus{
    static function  gameStatus(){
        $url = "http://tank.iai.ninja/api/get-current-board.php";
        $data = json_decode(file_get_contents($url), true);
        echo "id: ", $data['id'];
        echo '<br>';
        echo "Name: ", $data['name'];
        echo '<br>';
        echo "Status: ",$data['state'];
    }
    static function makeMove(){
        $post = [
            'key' => '02dab45610fa718dcf1d06fb514abb8d',
            'direction' => 'e',
            'distance'   => 2,
            'fire' => true
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://tank.iai.ninja/api/make-move.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        $response = curl_exec($ch);
        var_export($response);

        echo '<pre>';
        echo var_dump($post);
        echo '</pre>';
    }
}

CurrentGameStatus::gameStatus();
CurrentGameStatus::makeMove();


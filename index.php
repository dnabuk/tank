<?php
session_start();

define("GAMEURL", "http://tank.iai.ninja/api");
define("PLAYERNAME", "Team_5");
define("KEY", "02dab45610fa718dcf1d06fb514abb8d");


require_once('MainGame.php');
$Main = new MainGame();
;
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
?>
<table>
	<tr>
		<td bgcolor="green"><b>Others_players</b></td>
        <td bgcolor="orange"><b>My_tank</b></td>
        <td bgcolor="blue"><b>Others_base</b></td>
        <td bgcolor="yellow"><b>My_base</b></td>
        <td bgcolor="red"><b>obstacle</b></td>
        <td bgcolor="black"<b> <font color="white">missile</font> </b></td>
        
	</tr>

</table>
<?php
//Pobieranie pozycji i decyzja o ruchu START
$GetBoardResult = $Main->GetBoard();
if(($GetBoardResult->state == 'open'))
{
	echo 'Rozrywka jeszcze nie rozpoczeta...';
	die;
}

$DrawBoardResult = $Main->DrawBoard($GetBoardResult);

print_r($DrawBoardResult);
//Pobieranie pozycji i decyzja o ruchu END

//Wykonywanie ruchow START
$direction = 'W';
$distance = '2';
$fire = false;

$MoveResult = $Main->MoveTo($_SESSION['key'], $direction, $distance, $fire);

print_r($MoveResult);
//Wykonywanie ruchow END
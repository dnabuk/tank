<?php
require_once('Config.php');

$Main = new MainGame();
//Pobieranie pozycji i decyzja o ruchu START
$GetBoardResult = $Main->GetBoard();
if(($GetBoardResult->state == 'open'))
{
	echo 'Rozrywka jeszcze nie rozpoczeta... Czekaj cierpliwie :)';
	die;
}
?>
<table border="1" width="100%">
	<tr>
		<td colspan="6"><h2>LEGEND</h2></td>
	</tr>
	<tr>
		<td bgcolor="green"><b>others_players</b></td>
		<td bgcolor="orange"><b>my_tank</b></td>
		<td bgcolor="blue"><b>others_base</b></td>
		<td bgcolor="yellow"><b>my_base</b></td>
		<td bgcolor="red"><b>obstacle</b></td>
		<td bgcolor="black"><b><font color="white">missile</font></b></td>
	</tr>

</table></br><br/>
<?php
$Main->Clasification($GetBoardResult);	//Klasyfikacja

$DrawBoardResult = $Main->DrawBoard($GetBoardResult);

//Pobieranie pozycji i decyzja o ruchu END
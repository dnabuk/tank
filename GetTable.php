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
<table border="1" cellpadding="15" cellspacing="0" width="100%">
	<tr>
		<td colspan="6"><h2><center>LEGEND</center></h2></td>
	</tr>
	<tr>
		<td bgcolor="green"><b><center>others_players</center></b></td>
		<td bgcolor="orange"><b><center>my_tank</center></b></td>
		<td bgcolor="blue"><b><center><font color="white">others_base</font></center></b></td>
		<td bgcolor="yellow"><b><center>my_base</center></b></td>
		<td bgcolor="red"><b><center>obstacle</center></b></td>
		<td bgcolor="black"><b><center><font color="white">missile</font></center></b></td>
	</tr>

</table></br><br/>
<?php
$Main->Clasification($GetBoardResult);	//Klasyfikacja

$DrawBoardResult = $Main->DrawBoard($GetBoardResult);

//Pobieranie pozycji i decyzja o ruchu END
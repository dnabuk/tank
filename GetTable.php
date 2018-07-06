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
<table id="console">
    <tr>
		 <td></td>
        <td></td>
        <td></td>
        <td><button id="7">Attack North</button></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><button id="8">x2 North</button></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><button id="9">x1 North</button></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td><button id="1">Attack West</button></td>
        <td><button id="2">x2 West</button></td>
        <td><button id="3">x1 West</button></td>
        <td></td>
        <td><button id="4">x1 East</button></td>
        <td><button id="5">x1 East</button></td>
        <td><button id="6">Attack East</button></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><button id="10">x1 South</button></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><button id="11">x2 South</button></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><button id="12">Attack South</button></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>


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

</table>
<?php
$Main->Clasification($GetBoardResult);	//Klasyfikacja

$DrawBoardResult = $Main->DrawBoard($GetBoardResult);

//Pobieranie pozycji i decyzja o ruchu END
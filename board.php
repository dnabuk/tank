<style>
	table{
		background:#000;}
	td{
		width:25px;
		height:25px;
		background-color:#fff;

	}
	
</style>
<?php
function idpola($id){
	$l=1;
		for($x = 'A'; $x < 'ZZ'; $x++){
			if($l!=$id){
			$l++;
			}
			else{
				return $x;
				break;
				
				}
				
			}
	
	}

class board
{
	public function __construct()
	{
		
	}
	public function poz($board){
		
		$r=count($board["board"]);
		for($i=0;$i<$r;$i++){			
			$a=$board["board"][$i]['type'];
			$b=$board["board"][$i]['position'];
			echo $a." ".$b."<br/>";
			}
		
	}
	public function board()
	{
		$ch=curl_init('http://tank.iai.ninja/api/get-current-board.php');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$response =curl_exec($ch);
$board=json_decode($response,1);
//print_r($board["board"][0]);
//$r=count($board["board"][0]);
///echo $r;
$this->poz($board);
$a=($board ["settings"]["boardSize"]);

?>
<table>
<?php
for($i=1;$i<=$a;$i++){
	
	echo "<tr id='$i'>";

	for($j=1;$j<=$a;$j++){
		$x=idpola($j);
		echo "<td id='$x'>";
	?>
	
	
	</td>
	<?php
		}
	?>
	</tr>
<?php
	
	}
?>
</table>
<?php
die;
	}
}

$plansza = new board();
print_r($plansza->board());
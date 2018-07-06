<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<style>
	table{
		background:#000;}
	td{
		width:25px;
		height:25px;
		background-color:#fff;
		

	}
	.obstacle{
		background:#500;}
	
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
			$x="";
			$y="";		
			$a=$board["board"][$i]['type'];
			$b=$board["board"][$i]['position'];
			$lpoz=strlen($b);
			
			for($j=0;$j<$lpoz;$j++){
				if(($b[$j]>='0')&&($b[$j]<='9')){
					$x=$x.$b[$j];
					}else{
						$y=$y.$b[$j];}
				}
				//echo $a." ".$b." x=".$x." y=".$y."<br/>";]
				if($a=="obstacle"){
				?>
				<script>
					var poz='<?= $b ?>';
					poz='#'+poz;
					$(poz).addClass('obstacle');
				</script>
                <?php
				}
			
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

$a=($board ["settings"]["boardSize"]);

?>
<table>
<?php
for($i=1;$i<=$a;$i++){
	
	echo "<tr class='$i'>";

	for($j=1;$j<=$a;$j++){
		$x=idpola($j);
		echo "<td  id='$x$i'>";
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
$this->poz($board);
die;
	}
}

$plansza = new board();
print_r($plansza->board());
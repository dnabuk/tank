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
	
	public function GetBoard()
	{
		$ch = curl_init(GAMEURL.'/get-current-board.php');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		$result = curl_exec($ch);
		$result = json_decode($result);
		curl_close($ch);
		return $result;
	}
	public function CheckPositionBoard($id, $data)
	{
		$board = $data->board;
		for($i=0; $i<count($board); $i++)
		{
			if($board{$i}->position == $id)
			{
				$type = $board{$i}->type;
				
				if($type == 'empty')
				{
					return 'white';
				}
				else if($type == 'obstacle')
				{
					return 'red';
				}
				else if($type == 'player')
				{
					$name = $board{$i}->name;
					if($name == PLAYERNAME)
					{
						return 'orange';
					}
					return 'green';
				}
				else if($type == 'player_base')
				{
					$name = $board{$i}->name;
					if($name == PLAYERNAME)
					{
						return 'yellow';
					}
					return 'blue';
				}
				else if($type == 'missile')
				{
					return 'black';
				}				
				return false;
			}
		}
		return false;
	}
	public function Clasification($data)
	{
		?>
		<h3>Klasyfikacja</h3>
		<table id="klasyfikacja" border="1" cellspacing="0">
			<tr>
				<td>lp.</td>
				<td id="srodek">Nazwa</td>
				<td>Pkt</td>
			</tr>	
			<?php	
			for($i=0; $i<count($data->players); $i++)
			{
				$j=$i+1;
				echo "<tr><td>".$j ."</td><td>".$data->players{$i}->name."</td><td>".$data->players{$i}->score."</td></tr>";
			}		
		
		
		echo '</table>';
	}
	public function DrawBoard($data)
	{
		$boardSize = $data->settings->boardSize;
		$boardSizeLetters = $this->getNameFromNumber($boardSize);
		
		echo '<table id="board">';
		for($j = 1; $j <=$boardSize; $j++)
		{
			echo '<tr>';
			for ($i = 'A'; $i !== ''.$boardSizeLetters.''; $i++)
			{
				$color = $this->CheckPositionBoard($i.$j, $data);
				if($color)
				{
					echo '<td bgcolor="'.$color.'">';
					//echo $i.$j;
					echo '</td>';					
				}
				else
				{
					echo '<td>';
					echo $i.$j;
					echo '</td>';					
				}
			}
			echo '</tr>';
		}
		echo '</table>';
		
	}
	public function getNameFromNumber($num)
	{
		$numeric = $num % 26;
		$letter = chr(65 + $numeric);
		$num2 = intval($num / 26);
		if ($num2 > 0) {
			return $this->getNameFromNumber($num2 - 1) . $letter;
		} else {
			return $letter;
		}
	}
	public function sortObjectsByByField($objects, $fieldName, $sortOrder = SORT_ASC, $sortFlag = SORT_REGULAR)
	{
		$sortFields = array();
		foreach ($objects as $key => $row) {
			$sortFields[$key] = $row->{$fieldName};
		}
		array_multisort($sortFields, $sortOrder, $sortFlag, $objects);
		return $objects;
	}
	public function CheckMyPlayerName()
	{
		$ch = curl_init(GAMEURL.'/get-current-board.php');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		$result = curl_exec($ch);
		$result = json_decode($result);
		curl_close($ch);

		for($i=0; $i<count($result->players); $i++)
		{
			if($result->players{$i}->name == PLAYERNAME)
			{
				return true;
			}
		}
		return false;
	}
	public function MoveTo($key, $direction = false, $distance = false, $fire = false)
	{
		if($fire)
		{
			$data = array(
					'key' => $key,
					'direction' => $direction,
					'fire' => true,
			);			
		}
		else
		{
			$data = array(
					'key' => $key,
					'direction' => $direction,
					'distance' => $distance,
					'fire' => false,
			);			
		}

		
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

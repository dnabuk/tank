<?php
require_once('Config.php');

$Main = new MainGame();


$id = isset($_GET['id']) ? $_GET['id'] : false;

if($id == 1) // Atak W
{
	$fire = true;
	$direction = 'W';
}
else if($id == 2) //Wx2
{
	$fire = false;
	$direction = 'W';
	$distance = '2';
}
else if($id == 3) //Wx1
{
	$fire = false;
	$direction = 'W';
	$distance = '1';
}
else if($id == 4) //Ex1
{
	$fire = false;
	$direction = 'E';
	$distance = '1';
}
else if($id == 5) //Ex2
{
	$fire = false;
	$direction = 'E';
	$distance = '2';
}
else if($id == 6) //Atak E
{
	$fire = true;
	$direction = 'E';
}
else if($id == 7) //Atak N
{
	$fire = true;
	$direction = 'N';
}
else if($id == 8) //Nx2
{
	$fire = false;
	$direction = 'N';
	$distance = '2';
}
else if($id == 9) //Nx1
{
	$fire = false;
	$direction = 'N';
	$distance = '1';
}
else if($id == 10) //Sx1
{
	$fire = false;
	$direction = 'S';
	$distance = '1';
}
else if($id == 11) //Sx2
{
	$fire = false;
	$direction = 'S';
	$distance = '2';
}
else if($id == 12) //Atak S
{
	$fire = true;
	$direction = 'S';
}
$MoveResult = $Main->MoveTo($_SESSION['key'], $direction, $distance, $fire);
print_r($MoveResult);
//Wykonywanie ruchow END
?>
<?php
require_once('Autoryzacja.php');

$login = new LoginToGame();
print_r($login->Login());
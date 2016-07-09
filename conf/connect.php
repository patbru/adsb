<?php
try
{
	$db = new PDO('mysql:host=localhost;dbname=myadsb;charset=utf8', 'adsb1', 'adsb1');
}
catch (Exception $e)
{
    die('Error : ' . $e->getMessage());
}

?>

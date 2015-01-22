<?php

$firstCard=rand(1,52);
$secondCard=rand(1,52);
$cardImage="cards/1.png";
?>
<html>
<head>
	<title>Jeff's Blackjack Game</title>
</head>
<body><center>
<form>
<table border="1">
	<td width="150" height="200">
		<img width="150" height="200" src="<? echo $cardImage ?>">
	</td>
	<td width="20"></td>
	<td width="150" height="200"><? echo $secondCard ?></td>
</table>
<br>
<input type="submit" value="Deal!">
</form>
</center>
</body>
</html>
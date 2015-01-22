<?php

include 'functions.php';

$firstCard = rand(1,52);
$firstCardCount = countIt(cardValue($firstCard));

$secondCard = rand(1,52);
$secondCardCount = countIt(cardValue($secondCard));

$cardsDealt=[$firstCard, $secondCard];

$handValue = cardValue($firstCard) + cardValue($secondCard);
$handCount = $firstCardCount + $secondCardCount;

// Need to find the correct syntax for this.
if (!empty($_POST)) {
	$previousCount=$_POST["runningCount"];
}
else {
	$previousCount=0;
}

$runningCount=$previousCount + $handCount;

if ($handValue == 21) {
	$response="Blackjack!";
}
else $response="&nbsp;";

?>
<html>
<head>
	<title>Jeff's Blackjack Game</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Copperplate, sans-serif;
			color: white;
		}
		h2 {
			color: #FFCC00;
		}
	</style>
</head>
<body bgcolor="005533"><center>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td><img width="920" height="123" src="images/BlackjackBanner.jpg"></td></tr>
<tr>
	<td bgcolor="black" align="center">
		<table height="30" border="0">
			<td>Basic Strategy</td>
			<td width="30"></td>
			<td>Basic Counting</td>
			<td width="30"></td>
			<td>Hand Count</td>
			<td width="30"></td>
			<td>Running Count</td>
			<td width="30"></td>
			<td>True Count</td>			
		</table>
	</td>
</tr>
</table>

<form action="running_count.php" method="post">
<input type="hidden" name="runningCount" value="<?=$runningCount?>">
<br>
<table border="0">
<tr>
 	<td>
 		<img width="150" src="images/<? echo $firstCard ?>.png">
	</td>
	<td align="center" width="40"></td>
	<td>
 		<img width="150" src="images/<? echo $secondCard ?>.png">
	</td>
	<td align="center" width="40"></td>
	<td align="center">
		<h2>Previous:<br>
		<div id="prevCount"><?=formatCount($previousCount)?></div>
			<br>
		Hand:<br>
		<div id="handCount"><?=formatCount($handCount)?></div>
			<br>
		Running:<br>
		<div id="runningCount"><?=formatCount($runningCount)?></div></h2>
	</td>
</tr>
<tr>
	<td align="center"><h1><?=formatCount($firstCardCount)?></h1></td>
	<td><input type="submit" value="Deal!"></td>
	<td align="center"><h1><?=formatCount($secondCardCount)?></h1></td>
	<td></td>
	<td>
		<button id="btn1" type="button">Clear!</button>
		<button id="btn2" type="button">Switch!</button>
	</td>
</tr>
</table>
</form>

<script>
var prevCount = document.getElementById('prevCount');
var handCount = document.getElementById('handCount');
var runningCount = document.getElementById('runningCount');

var clearListener = function (event) {
	prevCount.innerHTML="&nbsp;";
	handCount.innerHTML="&nbsp;";
}
document.getElementById('btn1').addEventListener('click', clearListener, false);

var switchListener = function (event) {
	prevCount.innerText=runningCount.innerText;
	runningCount.innerHTML="&nbsp;";
}
document.getElementById('btn2').addEventListener('click', switchListener, false);


</script>

<!-- <table>
	<tr>
		<td bgcolor="blue" colspan="5" align="center">Add 1 to Count</td>
		<td width="20"></td>
		<td bgcolor="yellow" colspan="3" align="center">Neutral</td>
		<td width="20"></td>
		<td bgcolor="red" colspan="5" align="center">Subtract 1 from Count</td>
	</tr>
	<tr>
		<td><img width="50" src="images/2.png"></td>
		<td><img width="50" src="images/3.png"></td>
		<td><img width="50" src="images/4.png"></td>
		<td><img width="50" src="images/5.png"></td>
		<td><img width="50" src="images/6.png"></td>
		<td></td>
		<td><img width="50" src="images/7.png"></td>
		<td><img width="50" src="images/8.png"></td>
		<td><img width="50" src="images/9.png"></td>
		<td></td>
		<td><img width="50" src="images/10.png"></td>
		<td><img width="50" src="images/11.png"></td>
		<td><img width="50" src="images/12.png"></td>
		<td><img width="50" src="images/13.png"></td>
		<td><img width="50" src="images/1.png"></td>
	</tr>
	<tr>
		<td><img width="50" src="images/15.png"></td>
		<td><img width="50" src="images/16.png"></td>
		<td><img width="50" src="images/17.png"></td>
		<td><img width="50" src="images/18.png"></td>
		<td><img width="50" src="images/19.png"></td>
		<td></td>
		<td><img width="50" src="images/20.png"></td>
		<td><img width="50" src="images/21.png"></td>
		<td><img width="50" src="images/22.png"></td>
		<td></td>
		<td><img width="50" src="images/23.png"></td>
		<td><img width="50" src="images/24.png"></td>
		<td><img width="50" src="images/25.png"></td>
		<td><img width="50" src="images/26.png"></td>
		<td><img width="50" src="images/14.png"></td>
	</tr>
	<tr>
		<td><img width="50" src="images/41.png"></td>
		<td><img width="50" src="images/42.png"></td>
		<td><img width="50" src="images/43.png"></td>
		<td><img width="50" src="images/44.png"></td>
		<td><img width="50" src="images/45.png"></td>
		<td></td>
		<td><img width="50" src="images/46.png"></td>
		<td><img width="50" src="images/47.png"></td>
		<td><img width="50" src="images/48.png"></td>
		<td></td>
		<td><img width="50" src="images/49.png"></td>
		<td><img width="50" src="images/50.png"></td>
		<td><img width="50" src="images/51.png"></td>
		<td><img width="50" src="images/52.png"></td>
		<td><img width="50" src="images/40.png"></td>
	</tr>
	<tr>
		<td><img width="50" src="images/28.png"></td>
		<td><img width="50" src="images/29.png"></td>
		<td><img width="50" src="images/30.png"></td>
		<td><img width="50" src="images/31.png"></td>
		<td><img width="50" src="images/32.png"></td>
		<td></td>
		<td><img width="50" src="images/33.png"></td>
		<td><img width="50" src="images/34.png"></td>
		<td><img width="50" src="images/35.png"></td>
		<td></td>
		<td><img width="50" src="images/36.png"></td>
		<td><img width="50" src="images/37.png"></td>
		<td><img width="50" src="images/38.png"></td>
		<td><img width="50" src="images/39.png"></td>
		<td><img width="50" src="images/27.png"></td>
	</tr>
</table> -->
</center>
</body>
</html>
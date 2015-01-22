<?php

include 'functions.php';

$firstCard = rand(1,52);
$firstCardCount = countIt(cardValue($firstCard));

$secondCard = rand(1,52);
$secondCardCount = countIt(cardValue($secondCard));

$cardsDealt=[$firstCard, $secondCard];

$handValue = cardValue($firstCard) + cardValue($secondCard);
$handCount = $firstCardCount + $secondCardCount;

if ($handValue >= 17) {
$strategy="You should always stand on 17 or higher, as the next card is likely to bust your hand.";
}
elseif ($handValue <= 11) {
$strategy="You should always hit on hard 11 or less, since there is no way to bust your hand.";
}
else {
$strategy="You should stay if the dealer up card is 6 or less, otherwise you should hit.";
}


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

<form action="basic_strategy.php" method="post">
<input type="hidden" name="runningCount" value="<?=$runningCount?>">
<br>
<table border="0">
<tr>
	<td width="180" valign="top">
		<br><center><h1><?=$handValue?></h1></center>
		<font color="FFCC00">Strategy:</font><br>
		<?=$strategy?>
	</td>
	<td width="20"></td>
 	<td>
 		<img width="150" src="images/<? echo $firstCard ?>.png">
	</td>
	<td valign="middle" align="center" width="60"><input type="submit" value="Deal!"></td>
	<td>
 		<img width="150" src="images/<? echo $secondCard ?>.png">
	</td>
</tr>
</table>
<br><br>
<img src="images/strategy.gif">
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

</center>
</body>
</html>
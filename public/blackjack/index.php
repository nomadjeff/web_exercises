<?php

function handvalue ($someHand) {

}

include 'functions.php';

$firstCard = rand(1,52);
$secondCard = rand(1,52);
$firstDealerCard = rand(1,52);
$secondDealerCard = rand(1,52);

$cardsDealt=[$firstCard, $secondCard];

$playerHandValue = cardValue($firstCard) + cardValue($secondCard);
$dealerHandValue = cardValue($firstDealerCard) + cardValue($secondDealerCard);

if ($playerHandValue > $dealerHandValue) {
	$gameResult="Player Wins!";
}
elseif ($playerHandValue < $dealerHandValue) {
	$gameResult="Dealer Wins!";
}
else $gameResult="Push!";

if ($playerHandValue == 21) {
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

<form action="index.php" method="post">
<br>
<table border="0">
<tr>
	<td align="center" colspan="3"><h2>Player</h2></td>
	<td></td>
	<td align="center" colspan="3"><h2>Dealer</h2></td>
<tr>
 	<td>
 		<img width="150" src="images/<?=$firstCard ?>.png">
	</td>
	<td align="center" width="20">
			</td>
	<td>
 		<img width="150" src="images/<?=$secondCard ?>.png">
	</td>
	<td align="center" valign="middle" width="80">
		&nbsp;<button style="width:60px" id="btn1" type="button">Hit</button>
		<br><br>
		&nbsp;<button style="width:60px" id="btn2" type="button">Stay</button>
		<br><br><br>
		&nbsp;<input style="width:60px" type="submit" value="Deal!">
		<br>
	</td>
	<td>
 		<img width="150" src="images/<?=$firstDealerCard?>.png">
	</td>
	<td align="center" width="20"></td>
	<td valign="center" bgcolor="black" id="downcard">
 		<img width="150" src="images/codeup-logo.png"><br>
 		<img width="150" src="images/codeup-logo.png"><br>
 		<img width="150" src="images/codeup-logo.png"><br>
	</td>
</tr>
<tr>
	<td valign="middle" align="center" colspan="3"><h1><?=$playerHandValue?></h1></td>
	<td></td>
	<td valign="middle" align="center" colspan="3" id="dealer-hand-value"></td>
</tr>
<tr>
	<td colspan="7" align="center" id="winner-box"></td>
</tr>
</table>
</form>
</center>
<script>
(function() {
    var listener = function (event) {
        alert('Hit!');
    }

    // register the listener to handle clicks on btn1
    document.getElementById('btn1').addEventListener('click', listener, false);

	        // create a handler function
    var listener = function (event) {
		var dealerDowncard = document.getElementById('downcard');
    	dealerDowncard.innerHTML='<img width="150" src="images/<?=$secondDealerCard?>.png">';
		var dealerScore = document.getElementById('dealer-hand-value');
    	dealerScore.innerHTML='<h1><?=$dealerHandValue?></h1>';
		var gameResult = document.getElementById('winner-box');
    	gameResult.innerHTML='<h2><?=$gameResult?></h2>';
    }

    // register the listener to handle clicks on btn1
    document.getElementById('btn2').addEventListener('click', listener, false);
})();
</script>
</body>
</html>
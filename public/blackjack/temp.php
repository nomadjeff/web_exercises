<?php

function cardSuit ($cardNumber) {

// This function generates the card suit.
// Not sure if we're using this anymore.
// May be okay to delete.

	if ($cardNumber >= 1 && $cardNumber <= 13) {
		$cardSuit = "clubs";
	}
	elseif ($cardNumber >= 14 && $cardNumber <= 26) {
		$cardSuit = "diamonds";
	}
	elseif ($cardNumber >= 27 && $cardNumber <= 39) {
		$cardSuit = "hearts";
	}
	else $cardSuit = "spades";

	return $cardSuit;
}

function cardName ($cardNumber) {

// This function generates card name and value
// Not sure if we're using this anymore.
// May be okay to delete.

	if ($cardNumber % 13 == 1) {
		$cardName = "Ace";
	}
	elseif ($cardNumber % 13 == 11) {
		$cardName = "Jack";
	}
	elseif ($cardNumber % 13 == 12) {
		$cardName = "Queen";
	}
	elseif ($cardNumber % 13 == 0) {
		$cardName = "King";
	}
	else $cardName = $cardNumber % 13;

	return $cardName;
}

function cardValue ($cardNumber) {

	switch ($cardNumber % 13) {
		case 1:
			$cardValue=11;
			break;
		case 11:
			$cardValue=10;
			break;
		case 12:
			$cardValue=10;
			break;
		case 0:
			$cardValue=10;
			break;
		default:
			$cardValue=$cardNumber % 13;
	}
	return $cardValue;
}
function countIt ($cardValue) {

	$count=0;

	if ($cardValue >= 10) {
		$count--;
	}
	elseif ($cardValue >= 2 && $cardValue <= 6) {
		$count++;
	}
	return $count;
}

function formatCount ($count) {
if ($count > 0) {
	$fCount="+".$count;
}
else $fCount=$count;

return $fCount;
}

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

?>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jeff's Blackjack Game</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
/*	body {
		font-family: Arial, sans-serif;
		color: white;
	}
*/</style>
</head>
<body bgcolor="005533">

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<center>
<form action="temp.php" method="post">
<input type="hidden" name="runningCount" value="<?=$runningCount?>">
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
		Previous:<br>
		<div id="prevCount"><?=formatCount($previousCount)?></div>
			<br>
		Hand:<br>
		<div id="handCount"><?=formatCount($handCount)?></div>
			<br>
		Running:<br>
		<div id="runningCount"><?=formatCount($runningCount)?></div>
	</td>
</tr>
<tr>
	<td align="center"><?=formatCount($firstCardCount)?></td>
	<td><input type="submit" value="Deal!"></td>
	<td align="center"><?=formatCount($secondCardCount)?></td>
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

<table>
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
</table>
</center>
</body>
</html>
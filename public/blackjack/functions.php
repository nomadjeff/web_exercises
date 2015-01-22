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

	if ($cardNumber % 13 == 1) {
		$cardValue = 11;
	}
	elseif ($cardNumber % 13 == 11) {
		$cardValue = 10;
	}
	elseif ($cardNumber % 13 == 12) {
		$cardValue = 10;
	}
	elseif ($cardNumber % 13 == 0) {
		$cardValue = 10;
	}
	else $cardValue = $cardNumber % 13;
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

?>
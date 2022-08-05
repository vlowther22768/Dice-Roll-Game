<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dice Roll</title>
</head>
<body>
	<h2>Dice Roll Game</h2>
	<hr/>
	<?php
		$FaceNamesSingular = array("one", "two", "three", "four", "five", "six");
		$FaceNamesPlural = array("ones", "twos", "threes", "fours", "fives", "sixes");
		function CheckForDoubles($Die1, $Die2) {
			global $FaceNamesSingular;
			global $FaceNamesPlural;
			$ReturnValue = false;
			if($Die1 == $Die2) {
				echo "The roll was a double ", $FaceNamesPlural[$Die1 - 1], ".<br/>";
				$ReturnValue = true;
			}
			else {
				echo "The roll was a ", $FaceNamesSingular[$Die1 - 1], " and a ", $FaceNamesSingular[$Die2 - 1], ".<br/>";
				$ReturnValue = false;
			}
			return $ReturnValue;
		} // end of CheckForDoubles function
		function DisplayScoreText($Score, $Doubles) {
			switch($Score) {
				case 2:
					echo "You rolled snake eyes!<br/>";
					break;
				case 3:
					echo "You rolled a loose deuce!<br/>";
					break;
				case 5:
					echo "You rolled a fever five!<br/>";
					break;
				case 7:
					echo "You rolled a natural!<br/>";
					break;
				case 9:
					echo "You rolled a nina!<br/>";
					break;
				case 11:
					echo "You rolled a yo!<br/>";
					break;
				case 12:
					echo "You rolled boxcars!<br/>";
					break;
				default:
					if($Score % 2 == 0) {
						// we have an even number
						if($Doubles){
							echo "You rolled a hard $Score!<br/>";
						}
						else {
							echo "You rolled an easy $Score!<br/>";
						}
					}
					break;
			} //end of switch
		} // end of DisplayScoreText function
		// global code that rolls the dice and calls the functions
		$Dice = array();
		$DoublesCount = 0;
		
		for($RollNumber = 1; $RollNumber <= 5; ++$RollNumber) {
		$Dice[0] = rand(1, 6);
		$Dice[1] = rand(1, 6);
		$Score = $Dice[0] + $Dice[1];
		echo "<p>The total score for the roll $RollNumber was $Score.<br/>";
		$Doubles = CheckForDoubles($Dice[0], $Dice[1]);
		DisplayScoreText($Score, $Doubles);
		echo "</p>";
		if($Doubles){
			++$DoublesCount;
		}
	
	}// end of while loop

	echo "<p>Doubles occurred on $DoublesCount of the five rolls.</p>";
	?>
</body>
</html>